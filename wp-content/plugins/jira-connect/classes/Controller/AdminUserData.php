<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\OAuthFactory;
use JiraConnect\Plugin;
use JiraConnect\Core\ControllerCore;


class AdminUserData extends ControllerCore {

	public $count;

	public function menu() {
		return [
			'page_title' => 'Jira Connect',
			'menu_title' => 'Jira Connect',
			'capability' => 'jira_connect_account',
			'menu_slug' => 'jira_main',
			'icon_url' => 'dashicons-rest-api',
			'position' => 99
		];
	}

	public function submenu() {
		return [
			'page_title' => 'Jira Connect - User Data',
			'menu_title' => 'User Data',
			'capability' => 'jira_connect_account',
			'menu_slug' => 'jira_main',
			'parent_slug' => 'jira_main',
		];
	}

	private static function getSubmitsFields($user_email) {
		global $wpdb;
		$sql = "select s2.*, p.ID, wp.*
				from wp_cf7dbplugin_submits as s1
         			left join wp_cf7dbplugin_submits as s2
                   		on s1.submit_time = s2.submit_time
                       	and s1.form_name = s2.form_name
         join wp_posts as p on p.post_title = s1.form_name and p.post_type = 'wpcf7_contact_form'
         join wp_postmeta wp on p.ID = wp.post_id and wp.meta_key = '_cf7fre_'
			where s1.field_name = wp.meta_value
				and s1.field_value = '" . $user_email . "'
		order by s2.submit_time, s2.field_name
		";
		return $wpdb->get_results($sql, ARRAY_A);
	}

	private static function getConfig() {
		return [
			'name' => 'jira_summary',
			'surname' => 'jira_summary',
			'approvals' => 'jiracustom_acceptance',
		];
	}

	private static function getNames() {
		return [
			'name' => 'First name',
			'surname' => 'Last name',
			'email' => 'E-mail address',
			'approvals' => 'Approvals',
		];
	}

	public function render($email) {
		if(!is_user_logged_in()) {
			wp_redirect(home_url());
			exit();
		}
		$submits = array();
		$config = self::getConfig();
		$names = self::getNames();
		$submitFields = self::getSubmitsFields($email);
		foreach ($submitFields as $submitField) {
			$submits[ $submitField['submit_time'] ][ $submitField['field_name'] ] = $submitField['field_value'];
		}
		$return = '';
		$this->count = count($submits);
		foreach ($submits as $time => $submit) {
			$return .= '<table class="table table-striped">';
			$return .= '<thead><tr><th colspan="2"><div align="center">Data submitted: ' . date('Y-m-d H:i:s', $time) . '</div></th></tr></thead>';
			$return .= '<tbody>';
			foreach ($config as $field => $jiraField) {
				$chField = $nameFields = null;
				if ($field === "name") {
					$chField = 0;
				} else if ($field === "surname") {
					$chField = 1;
				}
				if (!is_null($chField) && isset($submit[ $jiraField ])) {
					$nameFields = explode(',', $submit[ $jiraField ]);
				}
				if (is_array($nameFields) && isset($nameFields[ $chField ])) {
					$nameFields = explode(',', $submit[ $jiraField ]);
					$return .= '<tr>';
					$return .= "<td>$names[$field]</td><td>" . (!empty($submit[ $nameFields[ $chField ] ]) ? $submit[ $nameFields[ $chField ] ] : '-') . "</td>";
					$return .= "</tr>";
					continue;
				}
				$return .= '<tr>';
				$return .= "<td>$names[$field]</td><td>" . (!empty($submit[ $jiraField ]) ? $submit[ $jiraField ] : '-') . "</td>";
				$return .= "</tr>";
			}
		}
		$return .=  '</tbody>';
		$return .=  '</table>';
		$return .=  '<pre>';
		$return .=  '</pre>';
		return $return;
	}

	public function page() {
		echo '<div style="text-align: center;">';
		echo '<br><h4>User data preview:</h4>';
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">';
		echo '<form method="post">';
		echo '<input  type="text" name="mail" placeholder="adres e-mail" value="' . (isset($_POST['mail']) ? $_POST['mail'] : '') . '" />';
		echo '<button type="submit">POST</button>';
		echo '</form><br>';
		echo '</div>';
        if (!empty($_POST['mail'])) {
            echo $this->render($_POST['mail']);
        }
	}
}