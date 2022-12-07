<?php

namespace JiraConnect\Controller;

use Exception;
use JiraConnect\Atlassian\OAuthFactory;
use JiraConnect\Core\ControllerCore;
use JiraConnect\Plugin;

class AdminLogsPage extends ControllerCore {
	private $oauth;

	public function __construct(OAuthFactory $oauth) {
		$this->oauth = $oauth;
	}

	public function submenu() {
		return [
			'page_title' => 'Jira Connect - Logs',
			'menu_title' => 'Logs',
			'capability' => 'jira_connect_account',
			'menu_slug' => 'jira_logs',
			'parent_slug' => 'jira_main',
		];
	}

	public function page() {
		echo '<br><h3>Logs:</h3>';
		$path = dirname(Plugin::getPluginEntryFile()) . '/log/';
		$files = glob($path . '*');
		foreach ($files as $file) {
			$filename = basename($file);
			echo $filename . ' - Lines: ';
			echo ' <a href="?' . http_build_query(array_merge($_GET, [
					'file' => $filename,
					'lines' => '30'
				])) . '">' . '30' . '</a> ';
			echo ' <a href="?' . http_build_query(array_merge($_GET, [
					'file' => $filename,
					'lines' => '60'
				])) . '">' . '60' . '</a> ';
			echo ' <a href="?' . http_build_query(array_merge($_GET, [
					'file' => $filename,
					'lines' => '100'
				])) . '">' . '100' . '</a> ';
			echo ' <a href="?' . http_build_query(array_merge($_GET, ['file' => $filename])) . '">' . 'all' . '</a> ';
			echo '<br>';
		}
		echo '<br><br>';
		echo '<style>pre { white-space: pre-wrap; /* Since CSS 2.1 */ white-space: -moz-pre-wrap; /* Mozilla, since 1999 */ white-space: -o-pre-wrap; /* Opera 7 */ word-wrap: break-word; /* Internet Explorer 5.5+ */}</style>';
		echo '<div style="max-width:90%;">';
		if (!empty($_GET['file']) && !empty($_GET['lines'])) {
			echo '<pre>' . $this->readFromEndByLine($path . stripslashes($_GET['file']), $_GET['lines']) . '</pre>';
		} elseif (!empty($_GET['file'])) {
			echo '<pre>' . file_get_contents($path . stripslashes($_GET['file'])) . '</pre>';
		}
		echo '</div>';
	}

	private function readFromEndByLine($filename, $linesNumber) {
		$lines = array();
		$fp = fopen($filename, "r");
		while (!feof($fp)) {
			$line = fgets($fp, 4096);
			array_push($lines, $line);
			if (count($lines) > $linesNumber) {
				array_shift($lines);
			}
		}
		fclose($fp);
		return implode('', $lines);
	}
}