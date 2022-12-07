<?php

/*
Widget Name: PA Number counter
Description: Number counter widget. SiteOrigin Widgets Bundle is required to work.
Author: Piotr Baran
*/

class PA_Number_Counter extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-number-counter',
			__('PA number counter', 'pa-sowidgets'),
			array(
                'description' => __('Number counter widget', 'pa-sowidgets'),
                'panels_groups' => array('pa_widgets'),
			),
			array(

            ),
            false,
			plugin_dir_path(__FILE__)
		);
    }
    
    function get_widget_form() {
        return array(
            'counter_name' => array(
                'type' => 'text',
                'label' => __('Counter name', 'pa-sowidgets'),
            ),
            'counter_number' => array(
                'type' => 'number',
                'label' => __('Counter number', 'pa-sowidgets'),
                'default' => 0
            ),
            'counter_icon' => array(
                'type' => 'media',
                'label' => __( 'Counter icon', 'pa-sowidgets' ),
                'optional' => true,
            ),
            'name_settings' => array(
				'type' => 'section',
				'label' => __('Name settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
					'name_color' => array(
						'type' => 'color',
                        'label' => __('Name color', 'pa-sowidgets'),
                        'default' => '#273461'
					),
                    'name_font_size' => array(
                        'type' => 'measurement',
                        'label' => __('Name size', 'pa-sowidgets'),
                        'default' => '20px',
                    )
				),
			),
            'number_settings' => array(
				'type' => 'section',
				'label' => __('Number settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
					'number_color' => array(
						'type' => 'color',
                        'label' => __('Number color', 'pa-sowidgets'),
                        'default' => '#00e2b9',
                        'description' => 'Default value: #00e2b9',
					),
                    'number_font_size' => array(
                        'type' => 'measurement',
                        'label' => __('Number size', 'pa-sowidgets'),
                        'default' => '45px',
                    )
				),
            ),
            'box_settings' => array(
				'type' => 'section',
				'label' => __('Box settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
					'box_color' => array(
						'type' => 'color',
                        'label' => __('Box background', 'pa-sowidgets'),
                        'default' => '#273461',
                        'description' => 'Default value: #273461',
					),
                    'box_radius' => array(
                        'type' => 'measurement',
                        'label' => __('Border radius', 'pa-sowidgets'),
                        'default' => '10px',
                        'description' => 'Default value: 10px',
                    ),
                    'box_width' => array(
                        'type' => 'measurement',
                        'label' => __('Box width', 'pa-sowidgets'),
                        'default' => '250px',
                        'description' => 'Default value: 250px',
                    ),
                    'box_height' => array(
                        'type' => 'measurement',
                        'label' => __('Box height', 'pa-sowidgets'),
                        'default' => '250px',
                        'description' => 'Default value: 250px',
                    ),
				),
			),
        );
    }


	function get_template_name($instance) {
		return 'pa-number-counter-template';
	}

	function get_style_name($instance) {
		return 'pa-number-counter-style';
    }

    function get_less_variables( $instance ) {
        $less_vars = array();
        

		// All the number counter attributes
        $less_vars['number_settings_color'] = isset( $instance['number_settings']['number_color'] ) ? $instance['number_settings']['number_color'] : false;
        $less_vars['number_settings_font_size'] = isset( $instance['number_settings']['number_font_size'] ) ? $instance['number_settings']['number_font_size'] : false;
        $less_vars['box_settings_height'] = isset( $instance['box_settings']['box_height'] ) ? $instance['box_settings']['box_height'] : false;
        $less_vars['name_settings_color'] = isset( $instance['name_settings']['name_color'] ) ? $instance['name_settings']['name_color'] : false;
        $less_vars['name_settings_font_size'] = isset( $instance['name_settings']['name_font_size'] ) ? $instance['name_settings']['name_font_size'] : false;
        $less_vars['box_settings_color'] = isset( $instance['box_settings']['box_color'] ) ? $instance['box_settings']['box_color'] : false;
        $less_vars['box_settings_radius'] = isset( $instance['box_settings']['box_radius'] ) ? $instance['box_settings']['box_radius'] : false;
        $less_vars['box_settings_width'] = isset( $instance['box_settings']['box_width'] ) ? $instance['box_settings']['box_width'] : false;
        $less_vars['box_settings_height'] = isset( $instance['box_settings']['box_height'] ) ? $instance['box_settings']['box_height'] : false;

		return $less_vars;
	}
    
}

siteorigin_widget_register('pa-number-counter', __FILE__, 'PA_Number_Counter');