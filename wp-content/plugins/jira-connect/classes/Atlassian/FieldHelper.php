<?php
namespace JiraConnect\Atlassian;

class FieldHelper {
	private $prefix = 'jira_';
	private $definitions = null;

	public function getDefinitions() {
		if(is_null($this->definitions)) {
			$this->definitions = [];
			foreach (get_option('jira_connect_base',[]) as $field) {
				$this->definitions[$field['fieldId']] = $field;
			}
		}
		$schema = [
			'type' => 'string'
		];
		$this->definitions['description'] = [
			'fieldId' => 'description',
			'name' => 'Description',
			'schema' => $schema
		];
		$this->definitions['summary'] = [
			'fieldId' => 'summary',
			'name' => 'Summary',
			'schema' => $schema
		];
		return $this->definitions;
	}

	public function getOptions() {
		$options = '<option selected="selected">Wybierz:</option>';
		foreach ($this->getDefinitions() as $field) {
			$options .= $this->getHTML($this->prefix . $field['fieldId'],$field['name']);
		}
		return $options;
	}

	public function getHTML($field_id,$name) {
		return '<option value="'.$field_id.'">'.$name.'</option>';
	}

	/**
	 * @return string
	 */
	public function getPrefix(): string {
		return $this->prefix;
	}

	public function getFieldType($field_id) {
		$type = 'error';
		if (strpos($field_id, $this->getPrefix()) !== 0) {
			return 'ERROR';
		}
		$real_field_id = str_replace($this->getPrefix(), '', $field_id);
		if (empty($this->getDefinitions()[ $real_field_id ])) {
			return 'ERROR';
		}
		$field = $this->getDefinitions()[ $real_field_id ];
		if (!is_array($field) || empty($field['schema'])) {
			return 'ERROR';
		}
		$schema = $field['schema'];
		if (!is_array($schema) || empty($schema['type'])) {
			return 'ERROR';
		}
		$parentvalue = '';
		$allowedOptions = '';
		$allowedOptionsArray = [];
		$allowedOptionsArrayValue = [];
		$i = 0;
		if (isset($field['allowedValues'])) {
			foreach ($field['allowedValues'] as $allowed) {
				$allowedOptionsArray[] = $allowed;
				$allowedOptionsArrayValue[] = $allowed['value'];
				$allowedOptions .= ' "' . $allowed['value'] . '"';
				if (isset($field['allowedValues'][ $i ]['value'])) {
					$parentvalue .= ' "' . $field['allowedValues'][ $i ]['value'] . '"';
					$i ++;
				}
			}
		}
		//return print_r($field,1);
		$name = $field['name'];
		switch ($schema['type']) {
			case 'any':
			case 'datetime':
			case 'string':
			{
				$type = 'text';
				//return '[text ' . $field_id . ']';
				break;
			}
			case 'user':
			{
				$type = 'text';
				$defaultValue = !empty($field['defaultValue']) && !empty($field['defaultValue']['name']) ? $field['defaultValue']['name'] : '';
				if(!empty($defaultValue) && (!is_numeric($defaultValue) || (((int)$defaultValue) > 0))) {
					//return '[text ' . $field_id . ' "' . $defaultValue . '"]';
				} else {
					//return '[text ' . $field_id . ']';
				}
				break;
			}
			case 'option':
			{
				$type = 'jirafield';
				//return '[select ' . $field_id . $allowedOptions . ']';
				break;
			}
			case 'date':
			{
				$type = 'date';
				//return '[date ' . $field_id . ']';
				break;
			}
			case 'number':
			{
				$type = 'number';
				//return '[number ' . $field_id . ']';
				break;
			}
			case 'option-with-child':
			{
				$type = 'jirafield';
				//return '[select ' . $field_id . $parentvalue . ']'; //Pierwszy poziom
				break;
			}
			case 'array':
			{
				if (!empty($schema['items'])) {
					switch ($schema['items']) {
						case 'attachment':
						{
							$type = 'file';
							//return '[file ' . $field_id . ']';
							break;
						}
						case 'option':
						{
							$type = 'select';
							//return '[select ' . $field_id . ' multiple' . $allowedOptions . ']';
							break;
						}
						case 'user':
						{
							$type = 'text';
							//return '[text ' . $field_id . ']'; //Brak uprawnień do użytkowników - jira pokazuje pole tekstowe
							break;
						}

					}
				} else {
					$type = 'text';
				}
				break;
			}
			default:
				//$type = 'text';
				//return 'ERROR';
		}

		return [
			'type' => $type,
			'allowedOptionsArray' => $allowedOptionsArray,
			'allowedOptionsArrayValue' => $allowedOptionsArrayValue,
			'parentValue' => $parentvalue,
			'schema' => $schema
		];
	}
}