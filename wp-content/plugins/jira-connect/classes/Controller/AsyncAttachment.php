<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\JiraHelper;
use JiraConnect\Core\ControllerCore;

class AsyncAttachment extends ControllerCore {
	private $jiraHelper;

	public function __construct(JiraHelper $jiraHelper) {
		$this->jiraHelper = $jiraHelper;
	}

	public function submenu() {
		return [
			'page_title' => 'Test Async Attachment',
			'menu_title' => 'Test Async Attachment',
			'capability' => 'administrator',
			'menu_slug' => 'jira_attach',
			'parent_slug' => 'jira_main',
		];
	}

	public function page() {
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
		echo '<div style="margin-top:50px;">';
		echo '<form method="post">';
		echo '<input type="hidden" name="action" value="submit"/>';
		echo '<button type="submit">Add attachment</button>';
		echo '</form><br>';
		echo '<pre>';
		if (!empty($_POST['action'])) {
			$data = $this->jiraHelper->getFileToSend();
			if(is_array($data)&&!empty($data['submit'])) {
				$this->jiraHelper->sendFile($data['submit'], $data['file']);
			}
		}
		echo '</pre>';
		echo '</div>';
	}
}