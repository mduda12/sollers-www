<?php

namespace JiraConnect\Atlassian;

use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use JiraConnect\Options\Framework;

class JiraHelper {
	private $oauth;
	private $optionsFramework;
	private $fieldHelper;

	public function __construct(OAuthFactory $oauth, Framework $optionsFramework, FieldHelper $fieldHelper) {
		$this->optionsFramework = $optionsFramework;
		$this->fieldHelper = $fieldHelper;
		$this->oauth = $oauth;
	}

	public static function sendMailAboutError($error) {
		$lastSuccess = get_option('jira_success_time');
		$jiraError = get_option('jira_error_mail');
		$howManySeconds = time() - $lastSuccess;
		if ($howManySeconds > 3600 && $jiraError == false) {
			$message = 'Wystąpiły problemy w dodaniu zgłoszenia do systemu Jira: ' . $error;
			$headers = 'From: Jira Sollers';
			if (mail('incybro@gmail.com', 'Jira Error', $message, $headers)) {
				echo "<br>Wysłano wiadomość e-mail";
				update_option('jira_error_mail', true);
			} else {
				echo "<br>Nie udało się wysłać wiadomości e-mail";
			}
		}
	}

	public static function processQueue() {
		global $wpdb;
		$submits = $wpdb->get_results("
				select s.submit_time, s.form_name, ss.field_name, ss.field_value
				from wp_cf7dbplugin_submits as s
				         left join wp_cf7dbplugin_submits as ss
				                   on s.submit_time = ss.submit_time and ss.field_name = 'Jira Status'
				where ss.field_value is null
				   or ss.field_value != 'DONE'
				group by s.submit_time
        	", ARRAY_A);

		//var_dump($submits);
		//echo 'OK';

		foreach ($submits as $submit) {
			/*$form_name = $submit['form_name'];
			$submit_time = $submit['submit_time'];
			$field_name = 'Jira Status';*/
			if (empty($submit['field_name'])) {
				echo 'Working on ' . $submit['submit_time'] . PHP_EOL;
				CF7Helper::insertSubmitFields($submit, 'IN QUEUE');
			}
		}
	}

	public function getSubmitToSend() {
		global $wpdb;
		$submitData = $wpdb->get_results("
				select * from wp_cf7dbplugin_submits 
					where submit_time = (
				    	select submit_time from wp_cf7dbplugin_submits 
				    		where field_name = 'Jira Status' and field_value IN ('IN QUEUE', 'IN QUEUE2') 
				    		order by submit_time 
				    		limit 1
			    	);
        	", ARRAY_A);

		$submit = [];
		foreach ($submitData as $field) {
			$submit[ $field['field_name'] ] = $field['field_value'];
		}

		if (empty($field) || empty($submit)) {
			return null;
		}

		$submit['form_name'] = $field['form_name'];
		$submit['submit_time'] = $field['submit_time'];

		return $submit;
	}


	public function sendSubmit($submit) {
		/*unset($submitData['submit_time']);
		unset($submitData['form_name']);
		unset($submitData['Submitted From']);
		unset($submitData['Jira Status']);*/
        if((!isset($submit['jira_projectId'])) && (!isset($submit['jira_issueTypeId']))){
            CF7Helper::updateSubmitJiraStatus($submit, "FORM");
            echo "It is not Jira form!";
            return;
        }
		$submitData = [];
		if (empty($submit)) {
			echo 'No submit to post!';
			return;
		}
		foreach ($submit as $key => $value) {
			if (strpos($key, 'jira_') !== false) {
				$data = $this->fieldHelper->getFieldType($key);
				if (!is_array($data) || empty($data['type'])) {
					continue;
				}
				$fieldID = substr($key, 5);
				if ($data['type'] === 'jirafield') {
					if (strpos($value, ',') !== false) {
						$value = explode(",", $value);
					} else {
						$value = [$value];
					}
					$value = array_map('trim', $value);
					if (!empty($value[1])) {
						$submitData[ $fieldID ] = [
							'id' => $value[0],
							'child' => [
								'id' => $value[1],
							],
						];
					} else {
						$submitData[ $fieldID ] = [
							'id' => $value[0]
						];
					}
				} else {
					$submitData[ $fieldID ] = $value;
				}
			}
		}
		if (empty($submitData)) {
			echo 'No submit to post!';
			return;
		}
		try {
			$client = $this->oauth->client_factory();
			$projectId = !empty($submit['jira_projectId']) ? (int) $submit['jira_projectId'] : 11024;
			$issueTypeId = !empty($submit['jira_IssueTypeId']) ? (int) $submit['jira_IssueTypeId'] : 12900;

			$jira_description = isset($submit['jira_description']) ? $submit['jira_description'] : '';

			$jira_summary_array = explode(',', $submit['jira_summary']);
			$first_name = $submit[ $jira_summary_array[0] ];
			$last_name = $submit[ $jira_summary_array[1] ];

			$jira_summary = $first_name . ' - ' . $last_name;

			unset($submitData['summary']);
            unset($submitData['description']);
			$data = [
				"fields" => array_merge([
					"project" => [
						"id" => $projectId,
					],
					"issuetype" => [
						"id" => $issueTypeId,
					],
					"summary" => $jira_summary,
                    "description" => $jira_description,
				], $submitData),
			];

			$headers[] = 'Content-Type: application/json';
			echo json_encode($data, JSON_PRETTY_PRINT);
			echo PHP_EOL . PHP_EOL;
			try {
				$response = json_decode($client->post($this->optionsFramework->get('jira_baseUrl', 'https://jirauat.sollers.eu/') . 'rest/api/2/issue/', [
					'auth' => 'oauth',
					RequestOptions::JSON => $data
				])->getBody());
				print_r($response); // rest/api/2/issue/
				if (!isset($response->errors) && !empty($response->id)) {
					CF7Helper::updateSubmitJiraId($submit, $response->id);
					CF7Helper::updateSubmitJiraStatus($submit, "CREATED");
					echo "SUCCESS";
					update_option('jira_success_time', time());
					update_option('jira_error_mail', false);
				}
			} catch (ClientException $e) {
				echo($e->getResponse()->getBody());
				$response = json_decode($e->getResponse()->getBody());
				print_r($response);
				if (isset($response->errors)) {
					CF7Helper::updateSubmitJiraStatus($submit, "ERROR");
					echo "ERROR";
					$this->sendMailAboutError('ERROR');
				}
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			$this->sendMailAboutError($e->getMessage());
		}
	}

	public function getFileToSend() {
		global $wpdb;
		$submitData = $wpdb->get_results("
				select * from wp_cf7dbplugin_submits 
					where submit_time = (
				    	select submit_time from wp_cf7dbplugin_submits 
				    		where field_name = 'Jira Status' and field_value IN ('CREATED') 
				    		order by submit_time 
				    		limit 1
			    	);
        	", ARRAY_A);

		$submit = [];
		$files = [];
		foreach ($submitData as $field) {
			$submit[ $field['field_name'] ] = $field['field_value'];
			if (!empty($field['file'])) {
				$files[] = $field;
			}
		}

		if (empty($field) || empty($submit)) {
			return false;
		}

		$submit['form_name'] = $field['form_name'];
		$submit['submit_time'] = $field['submit_time'];

		return [
			'submit' => $submit,
			'file' => $files,
		];
	}

	public function sendFile($submit, $file) {
		if (empty($file)) {
			CF7Helper::updateSubmitJiraStatus($submit, 'NO_ATTACHMENT');
			$this->sendMailAboutError('NO_ATTACHMENT');
			return;
		}
		if (!is_int($submit['Jira Issue ID'])) {
			$submit['Jira Issue ID'] = (int) $submit['Jira Issue ID'];
		}
		try {
			$client = $this->oauth->client_factory();
		} catch (Exception $e) {
			echo $e->getMessage();
			return;
		}
		try {
			foreach ($file as $fileToSend) {
				$response = json_decode($client->post($this->optionsFramework->get('jira_baseUrl', 'https://jirauat.sollers.eu/') . 'rest/api/2/issue/' . $submit['Jira Issue ID'] . '/attachments', [
					'auth' => 'oauth',
					RequestOptions::HEADERS => [
						'X-Atlassian-Token' => 'no-check'
					],
					RequestOptions::MULTIPART => [
						[
							'name' => 'file',
							'contents' => $fileToSend['file'],
							'filename' => $fileToSend['field_value'],
						],
					]
				])->getBody());
				print_r($response); // rest/api/2/issue/
				echo PHP_EOL . PHP_EOL;
			}
			if (!isset($response->errors)) {
				CF7Helper::updateSubmitJiraStatus($submit, "SUCCESS");
				echo "SUCCESS";
			}
		} catch (ClientException $e) {
			echo($e->getResponse()->getBody());
			$response = json_decode($e->getResponse()->getBody());
			print_r($response);
			if (isset($response->errors)) {
				CF7Helper::updateSubmitJiraStatus($submit, "ATTACHMENT_ERROR");
				echo "Attachment ERROR";
				$this->sendMailAboutError('ATTACHMENT_ERROR');
			}
		}
	}
}