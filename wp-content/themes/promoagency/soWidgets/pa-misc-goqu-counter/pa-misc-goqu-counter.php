<?php

/*
Widget Name: PA GOQU - counter
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_misc_goqu_counter extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-misc-goqu-counter',
			__('PA GOQU - counter', 'pa-sowidgets'),
			array(
                'description' => __('PA GOQU - counter', 'pa-sowidgets'),
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
                'label' => __( 'Widget content' , 'pa-sowidgets' ),
                'fields' => array(
                    'before' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text - before counter', 'pa-sowidgets' ),
                        'rows' => 1,
                        'default_editor' => 'tinymce',
                    ),
                    'number' => array(
                        'type' => 'number',
                        'label' => __( 'Enter a number', 'widget-form-fields-text-domain' ),
                        'default' => '100'
                    ),
                    'after' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text - after counter', 'pa-sowidgets' ),
                        'rows' => 1,
                        'default_editor' => 'tinymce',
                    ),
                )
            ),
            'widget_settings' => array(
				'type' => 'section',
				'label' => __('Widget styles', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'widget_bg_color' => array(
                        'type' => 'color',
                        'label' => __('Background - color', 'pa-sowidgets'),
                        'default' => '#004888'
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
                        'default' => '65px',
                    ),
                    'widget_bottom' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding bottom', 'pa-sowidgets'),
                        'default' => '60px',
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-misc-goqu-counter-template';
	}

	function get_style_name($instance) {
		return 'pa-misc-goqu-counter-style';
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

siteorigin_widget_register('pa-misc-goqu-counter', __FILE__, 'pa_misc_goqu_counter');