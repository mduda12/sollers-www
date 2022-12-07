<?php

/*
Widget Name: PA Text - background, header, button | Universal
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_txt_bg_header_btn_universal extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-txt-bg-header-btn-universal',
			__('PA Text - background, header, button | Universal', 'pa-sowidgets'),
			array(
                'description' => __('PA Text - background, header, button | Universal', 'pa-sowidgets'),
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
				'label' => __('Widget content', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'background' => array(
                        'type' => 'media',
                        'label' => __( 'Background image', 'pa-sowidgets' ),
                    ),
                    'header' => array(
                        'type' => 'text',
                        'label' => __('Header', 'pa-sowidgets'),
                    ),
                    'header_color' => array(
                        'type' => 'color',
                        'label' => __( 'Header - color', 'pa-sowidgets' ),
                        'default' => '#003262'
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                    ),
                    'url_name' => array(
                        'type' => 'text',
                        'label' => __( 'Link - Button text', 'pa-sowidgets' ),
                        'optional' => true
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Link _URL', 'pa-sowidgets'),
                        'optional' => true
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false,
                        'optional' => true
                    )
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
		return 'pa-txt-bg-header-btn-universal-template';
	}

	function get_style_name($instance) {
		return 'pa-txt-bg-header-btn-universal-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'header' => ($instance['widget_content']['header_color'])
        );
    }
    
}

siteorigin_widget_register('pa-txt-bg-header-btn-universal', __FILE__, 'pa_txt_bg_header_btn_universal');