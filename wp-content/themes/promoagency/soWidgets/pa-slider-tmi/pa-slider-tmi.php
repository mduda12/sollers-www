<?php

/*
Widget Name: PA Slider TMI
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class PA_Slider_Tmi extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-slider-tmi',
			__('PA Slider TMI', 'pa-sowidgets'),
			array(
                'description' => __('PA Slider TMI', 'pa-sowidgets'),
                'panels_groups' => array('pa_slider_widgets'),
			),
			array(

            ),
            false,
			plugin_dir_path(__FILE__)
		);
    }

    function get_widget_form() {
        $topics_list = wp_list_pluck( get_terms('topics', array(), 'objects' ), 'name', 'slug' );

        return array(
            'mod_name' => array(
                'type' => 'text',
                'label' => __('Module name', 'pa-sowidgets'),
                'description' => __('(for easier management only)'),
                'default' => 'Widget - sample description',
            ),
            'posts_query' => array(
				'type' => 'section',
				'label' => __('Select Insights to display', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'insights_number' => array(
                        'type' => 'number',
                        'label' => __( 'Select max number of Insights to display', 'pa-sowidgets' ),
                        'default' => '5'
                    ),
                    'tags' => array(
                        'type' => 'checkboxes',
                        'label' => __( 'Select at least one Topic', 'pa-sowidgets' ),
                        'description' => __('The latest posts with given Topics will be displayed'),
                        'options' => $topics_list,
                    ),
                ),
            ),
            'slider_header' => array(
				'type' => 'section',
				'label' => __('Slider title', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'slider_title' => array(
                        'type' => 'text',
                        'label' => __( 'Slider title', 'pa-sowidgets' )
                    ),
                    'header_top' => array(
                        'type' => 'measurement',
                        'label' => __('Slider title - padding top', 'pa-sowidgets'),
                        'default' => '50px',
                    ),
                    'header_bottom' => array(
                        'type' => 'measurement',
                        'label' => __('Slider title - padding bottom', 'pa-sowidgets'),
                        'default' => '50px',
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
		return 'pa-slider-tmi-template';
	}

	function get_style_name($instance) {
		return 'pa-slider-tmi-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'header_padding_top' => ($instance['slider_header']['header_top']),
            'header_padding_bottom' => ($instance['slider_header']['header_bottom']),
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
        );
    }
    
    
}

siteorigin_widget_register('pa-slider-tmi', __FILE__, 'PA_Slider_Tmi');