<?php

namespace JiraConnect\Controller;

use Exception;
use JiraConnect\Atlassian\OAuthFactory;
use JiraConnect\Core\ControllerCore;
use JiraConnect\Plugin;

class AdminConnectPage extends ControllerCore {
    private $oauth;

    public function __construct(OAuthFactory $oauth) {
        $this->oauth = $oauth;
    }

    public function submenu() {
        return [
            'page_title' => 'Jira Connect - Authorize',
            'menu_title' => 'Authorize',
            'capability' => 'jira_connect_account',
            'menu_slug' => 'jira_connect',
            'parent_slug' => 'jira_main',
        ];
    }

    public function page() {
    	$slug = 'jira_connect';
        $printTokens = function () {
	        if(!Plugin::isDebugMode()) {
		        return;
	        }
            echo '<p>Token: ' . get_option('sollers_jira_token', 'empty') . '</p>';
            echo '<p>Token secret: ' . get_option('sollers_jira_token_secret', 'empty') . '</p>';
            echo '<p>Temp token: ' . get_option('sollers_jira_temp_token') . '</p>';
            echo '<p>Temp token secret: ' . get_option('sollers_jira_temp_token_secret') . '</p>';
            echo '<p>Callback: ' . (get_option('sollers_jira_callback', 'empty')) . '</p>';
            echo '<p>Callback confirmed: ' . (get_option('sollers_jira_temp_callback_confirmed') ? 'true' : 'false') . '</p>';
            if(!empty(get_option('sollers_jira_token_object'))) {
                echo '<p>Token object: '.nl2br(print_r(get_option('sollers_jira_token_object'),1)).'</p><br/>';
            }
            echo '<br/>';
        };

        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
        echo '<div style="margin-top:50px;text-align:center;">';

        if (empty($_GET['process']) && empty($_GET['oauth_verifier'])) {
            $printTokens();
            echo '<p>Connection status: TODO</p>';
            echo '<br><a href="?page='.$slug.'&process=1" class="btn btn-warning">Initialize Authorisation Process</a>';
            echo '</div>';
            return;
        }

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $callbackUrl = "https://";
        } else {
            $callbackUrl = "http://";
        }
        // Append the host(domain name, ip) to the URL.
        $callbackUrl .= $_SERVER['HTTP_HOST'];
        // Append the requested resource location to the URL
        $callbackUrl .= $_SERVER['REQUEST_URI'];

        if (empty($_GET['oauth_verifier'])) {
            update_option('sollers_jira_callback', $callbackUrl);
        }

        $oauth = $this->oauth->oauth_factory();

        if (!empty($_GET['oauth_verifier'])) {
            $token = null;
            try {
                $token = $oauth->requestAuthCredentials(
                    get_option('sollers_jira_temp_token'),
                    get_option('sollers_jira_temp_token_secret'),
                    $_GET['oauth_verifier']
                );
            } catch (Exception $e) {
                echo '<p>Exception: ' . $e->getMessage() . '</p>';
            }
            if (!is_array($token) || empty($token['oauth_token'])) {
                echo "<p>Oauth Failed</p>";
                echo nl2br(print_r($token, 1));
            } else {
                update_option('sollers_jira_token', $token['oauth_token']);
                update_option('sollers_jira_token_secret', $token['oauth_token_secret']);
                update_option('sollers_jira_token_object', $token);
                echo '<p><b>Connected!</b></p>';
                $printTokens();
            }
            echo '<a href="?page='.$slug.'" class="btn btn-cancel">Go back</a><br/><br/>';
            echo '</div>';
            return;
        }

        $tempCredentials = null;
        try {
            $tempCredentials = $oauth->requestTempCredentials();
        } catch (Exception $e) {
            echo '<p>Exception: '.$e->getMessage().'</p>';
        }
        if (is_array($tempCredentials) && !empty($tempCredentials['oauth_token'])) {
            update_option('sollers_jira_temp_token', $tempCredentials['oauth_token']);
            update_option('sollers_jira_temp_token_secret', $tempCredentials['oauth_token_secret']);
            update_option('sollers_jira_temp_callback_confirmed', $tempCredentials['oauth_callback_confirmed']);
        } else {
            echo '<p>Error on jira communication</p>';
            update_option('sollers_jira_temp_token', '');
        }
        $printTokens();
        echo '<a href="?page='.$slug.'" class="btn btn-cancel">Go back</a><br/><br/>';
        if (!empty(get_option('sollers_jira_temp_token'))) {
            echo '<a href="' . $oauth->makeAuthUrl() . '" class="btn btn-success">Continue to Jira</a>';
        }
        echo '</div>';
    }
}