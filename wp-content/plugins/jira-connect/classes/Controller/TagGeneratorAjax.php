<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\FieldHelper;
use JiraConnect\Atlassian\OAuthFactory;
use JiraConnect\Core\ControllerCore;
use JiraConnect\Core\Registerer;
use WPCF7_TagGenerator;

class TagGeneratorAjax extends ControllerCore {
	private $fieldHelper;

	/**
	 * CF7Ajax constructor.
	 *
	 * @param Registerer $registerer
	 * @param FieldHelper $fieldHelper
	 *
	 * @uses wp_ajax_jira_fields()
	 */
	public function __construct(Registerer $registerer, FieldHelper $fieldHelper) {
		$this->fieldHelper = $fieldHelper;
		$registerer->add_action('wp_ajax_jira_fields', $this);
	}

	public function wp_ajax_jira_fields() {
		$field_id = $_POST['field_id'];
		$data = $this->fieldHelper->getFieldType($field_id);
		echo json_encode([
			'id' => $field_id,
			'type' => !empty($data['type']) ? $data['type'] : 'text',
			'allowedOptions' => !empty($data['allowedOptionsArray']) ? $data['allowedOptionsArray'] : null,
			'allowedValues' => !empty($data['allowedOptionsArrayValue']) ? $data['allowedOptionsArrayValue'] : [],
			'parentValue' => !empty($data['parentValue']) ? $data['parentValue'] : null,
			'schema' => !empty($data['schema']) ? $data['schema'] : null
		]);
		exit();
	}
}
