<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\OAuthFactory;
use JiraConnect\Core\ControllerCore;
use JiraConnect\Core\Registerer;
use JiraConnect\Options\Framework;
use JiraConnect\Plugin;

class AdminFieldsPage extends ControllerCore {
    private $oauth;
	private $optionsFramework;

    public function __construct(OAuthFactory $oauth, Registerer $registerer, Framework $optionsFramework) {
	    $this->optionsFramework = $optionsFramework;
        $this->oauth = $oauth;
	    //$registerer->add_filter('wpcf7_editor_panels', $this);
    }

	/**
	 * @param $panels
	 *
	 * @return mixed
	 * @uses form_panel_callback()
	 * @uses generator_panel_callback()
	 */
	public function wpcf7_editor_panels($panels) {
		$generator = [
			'generator-panel' => array(
				'title' => 'Generator',
				'callback' => [$this, 'content'],
			)
		];
		return $generator + $panels;
	}

    public function submenu() {
        return [
            'page_title' => 'Jira Connect - Fields',
            'menu_title' => 'Fields',
            'capability' => 'jira_connect_account',
            'menu_slug' => 'jira_forms',
            'parent_slug' => 'jira_main',
        ];
    }

	public function page() {
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
		return $this->content();
	}

	public function content() {
        date_default_timezone_set('Europe/Warsaw');
        $client = $this->oauth->client_factory();
        echo '<h3>Jira Fields Generator</h3><br>';
        $issueOptions = [];
		$projectOptions = '';
        if(empty($_POST['projectId'])){
            $projectListJson = json_decode($client->get($this->optionsFramework->get('jira_baseUrl', 'https://jirauat.sollers.eu/') .'rest/api/2/project', [
                'auth' => 'oauth',
            ])->getBody(),true);
            foreach($projectListJson as $projectList){
                $projectOptions .= '<option value='.$projectList['id'].','.$projectList['key'].'>'.$projectList['key'].'</option>';
            }
        }
        else{
            $projectParams = explode(',', $_POST['projectId']);
            update_option('jira_projectId', $projectParams[0]);
            update_option('jira_projectKey', $projectParams[1]);
            $projectId = get_option('jira_projectId');
            $issueTypeJson = json_decode($client->get($this->optionsFramework->get('jira_baseUrl', 'https://jirauat.sollers.eu/') .'rest/api/2/issue/createmeta/'.$projectId.'/issuetypes', [
                'auth' => 'oauth',
            ])->getBody(),true);
            foreach($issueTypeJson['values'] as $issueTypeList){
                $issueOptions .= '<option value='.$issueTypeList['id'].','.$issueTypeList['name'].'>'.$issueTypeList['name'].'</option>';
            }


        }
        if(!empty($_POST['issueType'])){
            $IssueTypeParams = explode(',', $_POST['issueType']);
            update_option('jira_IssueTypeId', $IssueTypeParams[0]);
            update_option('jira_IssueTypeKey', $IssueTypeParams[1]);
        }


		$res = null;
        if(empty($_POST['forceDownload'])) {
	        $res = get_option('jira_connect_base_json');
        }
        if(!empty($_POST['issueType'])) {
            $client = $this->oauth->client_factory();
            $res = json_decode($client->get($this->optionsFramework->get('jira_baseUrl', 'https://jirauat.sollers.eu/') .'rest/api/2/issue/createmeta/'.get_option('jira_projectId').'/issuetypes/'.get_option('jira_IssueTypeId').'', [
	            'auth' => 'oauth',
            ])->getBody(),true);
            update_option('jira_connect_base_json', $res);
            update_option('jira_connect_base_json_time', time());
            echo 'Downloaded!<br>';
        }
        if (empty($res['values']) || !is_array($res['values'])) {
            echo "Input error: " . nl2br(print_r($res['values'], 1));
            //return;
        }
        if(!empty($_POST['chk'])&&is_array($_POST['chk'])) {
            $result = [];
            foreach (array_keys($_POST['chk']) as $key) {
                $result[$key] = $res['values'][$key];
            }
            update_option('jira_connect_chk', $_POST['chk']);
            update_option('jira_connect_base', $result);
            update_option('jira_connect_base_time', time());
            echo "<br><strong>Pomyślnie dodano pola do Contact Form 7</strong><br><br>";
        }
        echo '<p>Fetch time: '.date('H:i:s Y-m-d', get_option('jira_connect_base_json_time')).'</p>';
        echo '<p>Set time: '.date('H:i:s Y-m-d', get_option('jira_connect_base_time')).'</p>';
        echo '<form method="post">';
        if(empty($_POST['projectId'])){
            echo '<select name="projectId">'.$projectOptions.'</select>';
            echo '<input type="submit" value="Wybierz projekt">';
        }
        else{
            echo '<select name="issueType">'.$issueOptions.'</select>';
            echo '<input type="submit" value="Wybierz rodzaj aplikacji">';
        }
        echo '</form>';
        echo '<br><form method="post">';
        echo '<button type="submit">Wyslij</button><br><br>';
		//echo '<input name="forceDownload" value="Refresh all" type="submit"/><br><br>';
		if (empty($res['values']) || !is_array($res['values'])) {
			//echo "Input error: " . nl2br(print_r($res['values'], 1));
			return;
		}
		if(!empty($_POST['issueType'])){
            $chk = get_option('jira_connect_chk',[]);
            foreach ($res['values'] as $key => $field) {
                echo '<div class="row">';
                echo '<div class="col-xs-1 text-right">';
                echo "<input ".((isset($chk[$key])&&($chk[$key]==="on"))?"checked='checked'":'')." type='checkbox' name='chk[$key]' style='width: 1em; height: 1em;'/>";
                echo "</div>";
                echo '<div class="col-xs-11">';
                echo $field['name'] . "<br>";
                //echo "<input type='checkbox' name='add_to_form' value='".$field['name']."'>";
                if (is_array($field['schema']) && !empty($field['schema'])) {
                    if (!empty($field['schema']['type'])) {
                        echo $field['schema']['type'] . " - ";
                    }
                    if (!empty($field['schema']['customId'])) {
                        echo $field['schema']['customId'] . " - ";
                    }
                    if (!empty($field['schema']['custom'])) {
                        echo $field['schema']['custom'];
                    }
                    if(Plugin::isDebugMode()) {
                        echo '<pre>'.print_r($field,1).'</pre>';
                    }
                    echo "<br>";
                }
                if (!empty($field['operations']) && is_array($field['operations'])) {
                    echo 'Operations: ' . implode(', ', $field['operations']) . "<br>";
                }
                if (!empty($field['allowedValues']) && is_array($field['allowedValues'])) {
                    echo 'allowedValues: ' . implode(', ', array_column($field['allowedValues'], 'value')) . "<br>";
                }
                echo "<br><br>";
                echo "</div>";
                echo "</div>";
            }
            echo '<button type="submit">Wyslij</button>';
            echo '</form>';
        }

    }
}