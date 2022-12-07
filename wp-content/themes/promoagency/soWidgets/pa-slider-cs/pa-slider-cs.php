<?php

/*
Widget Name: PA Slider - case study
Description: Slider - case study. SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_slider_cs extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-slider-cs',
			__('PA Slider - case study', 'pa-sowidgets'),
			array(
                'description' => __('PA Slider - case study', 'pa-sowidgets'),
                'panels_groups' => array('pa_slider_widgets'),
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
            'a_repeater' => array(
                'type' => 'repeater',
                'label' => __( 'Slider' , 'pa-sowidgets' ),
                'item_name'  => __( 'Slide item', 'siteorigin-widgets' ),
                'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),  
                    'title' => array(
                        'type' => 'text',
                        'label' => __( 'Title', 'pa-sowidgets' )
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'optional' => true,
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Link to case study', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'layer' => array(
                        'type' => 'tinymce',
                        'label' => __('Additional box', 'pa-sowidgets'),
                        'optional' => true,
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'layer_color' => array(
                        'type' => 'color',
                        'label' => __( 'Additional box - background', 'pa-sowidgets' ),
                        'optional' => true,
                        'default' => '#9cc85d'
                    )
                )
            ),
            'all_url' => array(
                'type' => 'link',
                'label' => __('Link to all case study', 'pa-sowidgets'),
                'default' => '#'
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
		return 'pa-slider-cs-template';
	}

	function get_style_name($instance) {
		return 'pa-slider-cs-style';
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

siteorigin_widget_register('pa-slider-cs', __FILE__, 'pa_slider_cs');