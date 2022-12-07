<?php


namespace JiraConnect\Controller;

use JiraConnect\Atlassian\FieldHelper;
use JiraConnect\Core\ControllerCore;
use JiraConnect\Core\Registerer;
use WPCF7_FormTag;


class SelectFieldType extends ControllerCore {
	private $fieldHelper;

	/**
	 * SelectFieldType constructor.
	 *
	 * @param Registerer $registerer
	 * @param FieldHelper $fieldHelper
     * @uses SelectFieldType::wpcf7_init()
     * @uses SelectFieldType::wp_footer()
     * @uses SelectFieldType::wpcf7_validate_jirafield()
	 */
	public function __construct(Registerer $registerer, FieldHelper $fieldHelper) {
		$this->fieldHelper = $fieldHelper;
		$registerer->add_action('wpcf7_init', $this);
		$registerer->add_action('wp_footer', $this);
        $registerer->add_filter( 'wpcf7_validate_jirafield', $this, 'wpcf7_validate_jirafield', 10, 2 );
	}

	/**
	 * @uses SelectFieldType::custom_double_form_tag_handler()
	 */
	public function wpcf7_init() {
		wpcf7_add_form_tag(['jirafield','jirafield*'], [$this, 'custom_double_form_tag_handler'], ['name-attr' => true]);
	}

    public function wp_footer() { ?>
        <script type="application/javascript">
            jQuery(($) => {
                $('.jira-custom-parent').change(function () {
                    var container = $(this).parent().find('.jira-custom-child').html('<option selected="selected" disabled="disabled">Select:</option>');
                    $(this).find('option:selected').data('children').forEach((child) => {
                        container.append('<option value="' + child.id  + '">' + child.value + '</option>');
                    });
                });
            });
        </script>
		<?php
	}



	function custom_double_form_tag_handler($tag) {

        $tag = new WPCF7_FormTag( $tag );

        if ( empty( $tag->name ) ) {
            return '';
        }
        $validation_error = wpcf7_get_validation_error( $tag->name );

        $class = wpcf7_form_controls_class( $tag->type );

        if ( $validation_error ) {
            $class .= ' wpcf7-not-valid';
        }

		$field = null;
		$fieldName = $tag->name;

		foreach ($this->fieldHelper->getDefinitions() as $value) {
			if ('jira_' . $value['fieldId'] === $fieldName) {
				$field = $value;
				break;
			}
		}

		if (empty($field)) {
			return ('Błąd!');
		}
		$hasChildren = false;
		$parentOptions = '<option value="" disabled="disabled" selected="selected">Select:</option>';
		foreach ($field['allowedValues'] as $allowedValue) {
			$parentValue = $allowedValue['value'];
			$parentId = $allowedValue['id'];
			$children = !empty($allowedValue['children']) ? $allowedValue['children'] : [];
			if (!empty($children)) {
				$hasChildren = true;
			}
			foreach ($children as $key => &$child) {
				unset($child['self']);
			}
			$parentOptions .= '<option value="' . $parentId . '" data-children=\'' . json_encode($children) . '\'>' . $parentValue . '</option>';
		}

		$extra = '';
		if ($hasChildren) {

			$atts = [];
			$atts['name'] = $tag->name.'[1]';
			$atts['class'] = 'jira-custom-child';
			$atts = wpcf7_format_atts( $atts );

			$options = '<option selected="selected" disabled="disabled">None</option>';
			//$validation_error = '';
			$extra = sprintf('<select %1$s>%2$s</select>%3$s',
				$atts, $options, $validation_error);
		}

		$atts = [];
		$atts['name'] = $tag->name.'[0]';
		$atts['class'] = 'jira-custom-parent ';
        $atts['class'] .= $tag->get_class_option( $class );

        if ( $tag->is_required() ) {
            $atts['aria-required'] = 'true';
            $atts['class'] .= 'wpcf7-form-control wpcf7-select wpcf7-validates-as-required wpcf7-not-valid';
        }
        $atts['aria-invalid'] = $validation_error ? 'true' : 'false';
        $atts = wpcf7_format_atts( $atts );
		//$validation_error = '';
		$html = sprintf(
			'<span class="wpcf7-form-control-wrap %1$s"><select %2$s>%3$s</select>%4$s %5$s</span>',
			sanitize_html_class($tag->name), $atts, $parentOptions, $extra, $validation_error);

		return $html;
	}


    function wpcf7_validate_jirafield( $result, $tag ) {
        $tag = new WPCF7_FormTag( $tag );

        $name = $tag->name;

        if ( isset( $_POST[$name] ) && is_array( $_POST[$name] ) ) {
            foreach ( $_POST[$name] as $key => $value ) {
                if ( '' === $value ) {
                    unset( $_POST[$name][$key] );
                }
            }
        }

        $empty = ! isset( $_POST[$name] ) || empty( $_POST[$name] ) && '0' !== $_POST[$name];

        if ( $tag->is_required() && $empty ) {
	        $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
        }

        return $result;
    }

}