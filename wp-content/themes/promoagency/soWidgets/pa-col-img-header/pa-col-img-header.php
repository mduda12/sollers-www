<?php

/*
Widget Name: PA Image & Header - one or multiple column
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_col_img_header extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-col-img-header',
			__('PA Image & Header - one or multiple column', 'pa-sowidgets'),
			array(
                'description' => __('PA Image & Header - one or multiple column', 'pa-sowidgets'),
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
            'widget_header' => array(
                'type' => 'text',
                'label' => __( 'Header', 'pa-sowidgets' ),
            ),
            'widget_subheader' => array(
                'type' => 'tinymce',
                'label' => __( 'Subheader', 'pa-sowidgets' ),
                'rows' => 2,
                'default_editor' => 'tinymce',
            ),
            'a_repeater' => array(
                'type' => 'repeater',
                'label' => __( 'Widget content' , 'pa-sowidgets' ),
                'item_name'  => __( 'Slide item', 'siteorigin-widgets' ),
                'fields' => array(
                    'header' => array(
                        'type' => 'text',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                    ),
                    'subheader' => array(
                        'type' => 'text',
                        'label' => __( 'Subheader', 'pa-sowidgets' ),
                    ),
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),  
                )
            ),
            'widget_btn' => array(
				'type' => 'section',
				'label' => __('Buttons', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'btn_top_name' => array(
                        'type' => 'text',
                        'label' => __( 'Button Top - text', 'pa-sowidgets' )
                    ),
                    'btn_top_url' => array(
                        'type' => 'link',
                        'label' => __('Button Top - url', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'btn_top_url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Button Top - Link in a new window ?', 'pa-sowidgets'),
                        'default' => false
                    ),
                    'btn_bottom_name' => array(
                        'type' => 'text',
                        'label' => __( 'Button Bottom - text', 'pa-sowidgets' )
                    ),
                    'btn_bottom_url' => array(
                        'type' => 'link',
                        'label' => __('Button Bottom - url', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'btn_bottom_url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Button Bottom - Link in a new window ?', 'pa-sowidgets'),
                        'default' => false
                    )
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
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-col-img-header-template';
	}

	function get_style_name($instance) {
		return 'pa-col-img-header-style';
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

siteorigin_widget_register('pa-col-img-header', __FILE__, 'pa_col_img_header');