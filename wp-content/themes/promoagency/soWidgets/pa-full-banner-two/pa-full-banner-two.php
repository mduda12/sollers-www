<?php

/*
Widget Name: PA Full Width Banner Two Columns
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class PA_Full_Banner_Two extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-full-banner-two',
			__('PA Full Width Banner Two Columns', 'pa-sowidgets'),
			array(
                'description' => __('PA Full Width Banner Two Columns', 'pa-sowidgets'),
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
            'banner_settings' => array(
				'type' => 'section',
				'label' => __('Banner settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'banner_image' => array(
                        'type' => 'media',
                        'label' => __( 'Banner Image', 'pa-sowidgets' ),
                        'library' => 'image',
                        'fallback' => true,
                        'optional' => true,
                    ),
                    'banner_number' => array(
                        'type' => 'number',
                        'label' => __('Banner number', 'pa-sowidgets'),
                        'default' => '0',
                    ),
                    'banner_text' => array(
                        'type' => 'text',
                        'label' => __('Banner text', 'pa-sowidgets'),
                    ),
                    'banner_desc' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Description', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                ),
            ),
            'widget_settings' => array(
				'type' => 'section',
				'label' => __('Widget styles', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'widget_top' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding top', 'pa-sowidgets'),
                        'default' => '50px',
                    ),
                    'widget_bottom' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding bottom', 'pa-sowidgets'),
                        'default' => '50px',
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-full-banner-two-template';
	}

	function get_style_name($instance) {
		return 'pa-full-banner-two-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
        );
    }
    
}

siteorigin_widget_register('pa-full-banner-two', __FILE__, 'PA_Full_Banner_Two');