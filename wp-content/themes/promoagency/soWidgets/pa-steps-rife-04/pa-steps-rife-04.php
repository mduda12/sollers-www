<?php

/*
Widget Name: PA Steps RIFE - 04
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_steps_rife_04 extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-steps-rife-04',
			__('PA Steps RIFE - step 4', 'pa-sowidgets'),
			array(
                'description' => __('PA Steps RIFE - step 4', 'pa-sowidgets'),
                'panels_groups' => array('pa_other_widgets'),
			),
			array(

            ),
            false,
			plugin_dir_path(__FILE__)
		);
    }

    function get_widget_form() {
        return array(
            'mod_name' => array(
                'type' => 'text',
                'label' => __('Module name', 'pa-sowidgets'),
                'description' => __('(for easier management only)'),
                'default' => 'Widget - sample description',
            ),
            'widget_content' => array(
				'type' => 'section',
				'label' => __('Step 4 content', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'number' => array(
                        'type' => 'text',
                        'label' => __( 'Number', 'pa-sowidgets' ),
                        'default' => '04'
                    ),
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 2,
                        'default_editor' => 'tinymce',
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'checkbox' => array(
                        'type' => 'checkbox',
                        'label' => __( 'Column background image?', 'pa-sowidgets' ),
                        'default' => false
                    )
                ),
            ),
            'chart' => array(
				'type' => 'section',
				'label' => __('Chart column', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'chart_image' => array(
                        'type' => 'media',
                        'label' => __( 'Image', 'pa-sowidgets' ),
                        'choose' => __( 'Choose image', 'pa-sowidgets' ),
                        'update' => __( 'Set image', 'pa-sowidgets' ),
                        'library' => 'image',
                        'fallback' => true
                    ),
                    'tooltip_one_header' => array(
                        'type' => 'text',
                        'label' => __( 'Tooltip one header', 'pa-sowidgets' ),
                    ),
                    'tooltip_one_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip one content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_two_header' => array(
                        'type' => 'text',
                        'label' => __( 'Tooltip two header', 'pa-sowidgets' ),
                    ),
                    'tooltip_two_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip two content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_three_header' => array(
                        'type' => 'text',
                        'label' => __( 'Tooltip three header', 'pa-sowidgets' ),
                    ),
                    'tooltip_three_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip three content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_four_header' => array(
                        'type' => 'text',
                        'label' => __( 'Tooltip four header', 'pa-sowidgets' ),
                    ),
                    'tooltip_four_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip four content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'widget_settings' => array(
				'type' => 'section',
				'label' => __('Widget styles', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'widget_bg_color' => array(
                        'type' => 'color',
                        'label' => __('Background - color', 'pa-sowidgets'),
                        'default' => '#ffffff'
                    ),
                    'widget_bg' => array(
                        'type' => 'select',
                        'label' => __('Background pattern - position', 'pa-sowidgets'),
                        'default' => 'none',
                        'options' => array(
                            'none' => __( 'Without background', 'pa-sowidgets' ),
                            'left' => __( 'Background on the left', 'pa-sowidgets' ),
                            'right' => __( 'Background on the right', 'pa-sowidgets' ),
                        )
                    ),
                    'widget_bg_offset' => array(
                        'type' => 'number',
                        'label' => __('Background pattern - negative offset vertically', 'pa-sowidgets'),
                        'default' => '0',
                        'description' => 'set the negative values'
                    ),
                    'widget_top' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding top', 'pa-sowidgets'),
                        'default' => '50px',
                    ),
                    'widget_bottom' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding bottom', 'pa-sowidgets'),
                        'default' => '50px',
                    ),
                    'widget_alternative' => array(
                        'type' => 'checkbox',
                        'label' => __('Layout alternative - like RIFE', 'pa-sowidgets'),
                        'default' => false
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-steps-rife-04-template';
	}

	function get_style_name($instance) {
		return 'pa-steps-rife-04-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
        );
    }
    
}

siteorigin_widget_register('pa-steps-rife-04', __FILE__, 'pa_steps_rife_04');