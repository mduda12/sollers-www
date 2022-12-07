<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\CF7Helper;
use JiraConnect\Atlassian\JiraHelper;
use JiraConnect\Core\ControllerCore;

class AsyncSubmit extends ControllerCore {
	private $jiraHelper;

	public function __construct(JiraHelper $jiraHelper) {
		$this->jiraHelper = $jiraHelper;
	}

	public function submenu() {
        return [
            'page_title' => 'Test Async Submit',
            'menu_title' => 'Test Async Submit',
            'capability' => 'administrator',
            'menu_slug' => 'jira_async',
            'parent_slug' => 'jira_main',
        ];
    }

    public function page() {
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
        echo '<div style="margin-top:50px;">';
        echo '<form method="post">';
        echo '<input type="hidden" name="action" value="submit"/>';
        echo '<button type="submit">POST</button>';
        echo '</form><br>';
        echo '<pre>';
        if (!empty($_POST['action'])) {
        	$submit = $this->jiraHelper->getSubmitToSend();
	        var_dump($submit);
	        if(!empty($submit)&&$submit) {
		        CF7Helper::updateSubmitJiraStatus($submit, 'IN QUEUE2');
		        $this->jiraHelper->sendSubmit($submit);
	        }
        }
        echo '</pre>';
        echo '</div>';
    }
}