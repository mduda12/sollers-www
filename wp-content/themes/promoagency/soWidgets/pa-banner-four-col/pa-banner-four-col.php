<?php

/*
Widget Name: PA Full width banner with four columns
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_banner_four_col extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-banner-four-col',
			__('PA Full width banner with four columns', 'pa-sowidgets'),
			array(
                'description' => __('PA Full width banner with four columns', 'pa-sowidgets'),
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
            'col_one' => array(
				'type' => 'section',
				'label' => __('Column one', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'col_two' => array(
				'type' => 'section',
				'label' => __('Column two', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'col_three' => array(
				'type' => 'section',
				'label' => __('Column three', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'col_four' => array(
				'type' => 'section',
				'label' => __('Column four', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text', 'pa-sowidgets' ),
                        'rows' => 3,
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
		return 'pa-banner-four-col-template';
	}

	function get_style_name($instance) {
		return 'pa-banner-four-col-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
        );
    }
    
}

siteorigin_widget_register('pa-banner-four-col', __FILE__, 'pa_banner_four_col');