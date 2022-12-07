<?php

/*
Widget Name: PA Banner - video on popup
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_video_popup extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-video-popup',
			__('PA Banner - video on popup', 'pa-sowidgets'),
			array(
                'description' => __('PA Banner - video on popup', 'pa-sowidgets'),
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
                    'video' => array(
                        'type' => 'text',
                        'label' => __( 'Video ID', 'pa-sowidgets' ),
                        'description' => 'Paste - Youtube video ID'
                    ),
                    'video_switch' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Video trigger', 'pa-sowidgets' ),
                        'rows' => 2,
                        'default_editor' => 'tinymce',
                        'description' => 'Text or Image'
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
                        'default' => '75px',
                    ),
                    'widget_bottom' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding bottom', 'pa-sowidgets'),
                        'default' => '150px',
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-video-popup-template';
	}

	function get_style_name($instance) {
		return 'pa-video-popup-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'header' => ($instance['widget_content']['header_color'])
        );
    }
    
}

siteorigin_widget_register('pa-video-popup', __FILE__, 'pa_video_popup');