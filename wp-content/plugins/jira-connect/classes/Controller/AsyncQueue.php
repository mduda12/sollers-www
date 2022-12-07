<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\JiraHelper;
use JiraConnect\Core\ControllerCore;

class AsyncQueue extends ControllerCore {

    public function submenu() {
        return [
            'page_title' => 'Test Async Queue',
            'menu_title' => 'Test Async Queue',
            'capability' => 'administrator',
            'menu_slug' => 'jira_submit',
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
	        JiraHelper::processQueue();
        }
        echo '</pre>';
        echo '</div>';
    }
}