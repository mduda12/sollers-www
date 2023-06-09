<?php

namespace JiraConnect\Controller;

use JiraConnect\Atlassian\FieldHelper;
use JiraConnect\Core\ControllerCore;
use JiraConnect\Core\Registerer;
use WPCF7_TagGenerator;

class AcceptanceContainer extends ControllerCore {
	private $fieldHelper;

	/**
	 * DescriptionChanger constructor.
	 *
	 * @param Registerer $registerer
	 * @param FieldHelper $fieldHelper
	 * @uses SelectFieldType::wpcf7_init()
	 */
	public function __construct(Registerer $registerer, FieldHelper $fieldHelper) {
		$this->fieldHelper = $fieldHelper;
		$registerer->add_action('wpcf7_init', $this);
		$registerer->add_action('wpcf7_admin_init', $this);

	}

	public function wpcf7_init() {
		wpcf7_add_form_tag(['acceptcontainer'], [$this, 'custom_double_form_tag_handler'], ['name-attr' => true]);
	}

	public function wpcf7_admin_init() {
		$tag_generator = WPCF7_TagGenerator::get_instance();
		$tag_generator->add('acceptcontainer', 'jira acceptance', [$this, 'wpcf7_tag_generator_acceptance']);
	}

	public function wpcf7_tag_generator_acceptance($contact_form, $args = '') {
		$args = wp_parse_args($args, array());
		$type = $args['id'];
		?>
        <div class="control-box">
            <fieldset>
                <legend>Jira Acceptance Container - generated by Jira Connect</legend>
                Jira Acceptance Container detects the content of selected acceptance fields and submits data to single
                Jira field.
                <table class="form-table">
                    <tr>
                        <th scope="row">Acceptance field:</th>
                        <td>
                            <select onchange="updateJiraAcceptance()" name="first-value"
                                    class="jira-cf7-acceptance-select">
								<?php echo $this->fieldHelper->getOptions(); ?>
                                <input type="hidden" name="name" id="jira-cf7-acceptance-name"/>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>

        <div class="insert-box">
            <input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly"
                   onfocus="this.select()"/>

            <div class="submitbox">
                <input type="button" class="button button-primary insert-tag"
                       value="<?php echo esc_attr(__('Insert Tag', 'contact-form-7')); ?>"/>
            </div>

            <br class="clear"/>

        </div>
        <script>
            function updateJiraAcceptance() {
                var selectedValue = jQuery('.jira-cf7-acceptance-select').children("option:selected").val();
                jQuery('#jira-cf7-acceptance-name').val(selectedValue);
            }
        </script>

		<?php
	}


	function custom_double_form_tag_handler($tag) {
		$atts['name'] = $tag->name;
		return <<<HTML
        <input type="hidden" name="{$atts['name']}" class="jira-acceptance">
        <input type="hidden" name="jiracustom_acceptance" class="jira-acceptance">
        <script>
        jQuery('input[type=checkbox]').change(function() {
            var acceptance = jQuery('.wpcf7-acceptance input:checked').parent().map(function() {
                return $(this).text();
            }).get().join('; ');
            jQuery('input[type=hidden].jira-acceptance').val(acceptance);
        });
        </script>
HTML;
	}


}