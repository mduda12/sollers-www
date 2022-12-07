<?php


namespace JiraConnect\Atlassian;


class CF7Helper {
	public static function updateSubmitJiraStatus($submit, $status) {
		if (!is_array($submit)) {
			return false;
		}
		return self::updateJiraStatus($submit['submit_time'], $submit['form_name'], $status);
	}

	public static function updateSubmitJiraId($submit, $id) {
		if (!is_array($submit)) {
			return false;
		}
		return self::updateJiraId($submit['submit_time'], $submit['form_name'], $id);
	}


	public static function insertSubmitFields($submit,$status,$id='') {
		self::insertField('Jira Status', $submit['submit_time'], $submit['form_name'], $status, 10000);
		self::insertField('Jira Issue ID', $submit['submit_time'], $submit['form_name'], $id, 10001);
	}


	/* PRYWATNE */

	private static function updateJiraStatus($submit_time, $form_name, $status) {
		return self::updateField('Jira Status', $submit_time, $form_name, $status);
	}

	private static function updateJiraId($submit_time, $form_name, $id) {
		return self::updateField('Jira Issue ID', $submit_time, $form_name, $id, 10001);
	}

	private static function updateField($field_name, $submit_time, $form_name, $field_value, $field_order = 10000) {
		global $wpdb;
		return $wpdb->update(
			'wp_cf7dbplugin_submits',
			[
				'field_value' => $field_value,
				'field_order' => $field_order,
				'file' => null
			],
			[
				'submit_time' => $submit_time,
				'form_name' => $form_name,
				'field_name' => $field_name,
			],
			array(
				'%s',
				'%d',
				'%s'
			)
		);
	}

	private static function insertField($field_name, $submit_time, $form_name, $field_value, $field_order = 10000) {
		global $wpdb;
		return $wpdb->insert(
			'wp_cf7dbplugin_submits',
			array(
				'submit_time' => $submit_time,
				'form_name' => $form_name,
				'field_name' => $field_name,
				'field_value' => $field_value,
				'field_order' =>  $field_order,
				'file' => NULL
			),
			array(
				'%f',
				'%s',
				'%s',
				'%s',
				'%d',
				'%s'
			)
		);
	}
}