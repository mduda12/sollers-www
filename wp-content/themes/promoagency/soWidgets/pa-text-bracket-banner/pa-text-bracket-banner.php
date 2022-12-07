<?php

/*
Widget Name: PA Text in Bracket Banner
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_text_bracket_banner extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-text-bracket-banner',
			__('PA Text in Bracket Banner', 'pa-sowidgets'),
			array(
                'description' => __('PA Text in Bracket Banner', 'pa-sowidgets'),
                'panels_groups' => array('pa_banner_widgets'),
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
            'banner_content' => array(
				'type' => 'section',
				'label' => __('Banner settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'subheader' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Subheader text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'link_name' => array(
                        'type' => 'text',
                        'label' => __( 'Button text', 'pa-sowidgets' ),
                        'optional' => true
                    ),
                    'link_url' => array(
                        'type' => 'link',
                        'label' => __('Button link', 'pa-sowidgets'),
                        'default' => '#',
                        'optional' => true
                    ),
                ),
            ),
            'banner_bg_img' => array(
				'type' => 'section',
				'label' => __('Banner background image', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'bg_image' => array(
                        'type' => 'media',
                        'label' => __( 'Background image', 'pa-sowidgets' ),
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
		return 'pa-text-bracket-banner-template';
	}

	function get_style_name($instance) {
		return 'pa-text-bracket-banner-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
        );
    }
    
}

siteorigin_widget_register('pa-text-bracket-banner', __FILE__, 'pa_text_bracket_banner');