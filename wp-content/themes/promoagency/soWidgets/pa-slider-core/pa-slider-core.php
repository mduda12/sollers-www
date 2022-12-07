<?php

/*
Widget Name: PA logo slider (like Core Systems)
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class PA_Slider_Core extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-slider-core',
			__('PA logo slider (like Core Systems)', 'pa-sowidgets'),
			array(
                'description' => __('PA logo slider (like Core Systems)', 'pa-sowidgets'),
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
            'header' => array(
				'type' => 'section',
				'label' => __('Header', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'pa_slider_core_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'slider' => array(
				'type' => 'section',
				'label' => __('Slider', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'pa_slider_core_slides' => array(
                        'type' => 'repeater',
                        'label' => __( 'Slider items' , 'pa-sowidgets' ),
                        'item_name'  => __( 'Slide', 'pa-sowidgets' ),
                        'fields' => array(
                            'repeat_image' => array(
                                'type' => 'media',
                                'library' => 'image',
                                'label' => __( 'Slide image', 'pa-sowidgets' ),
                            ),  
                            'repeat_text' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Slide text', 'pa-sowidgets' ),
                                'rows' => 2,
                                'default_editor' => 'tinymce',
                            ),
                        )
                    ),
                ),
            ),
            'numbers' => array(
				'type' => 'section',
				'label' => __('Numbers', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'pa_slider_core_numbers' => array(
                        'type' => 'repeater',
                        'label' => __( 'Numbers with text' , 'pa-sowidgets' ),
                        'item_name'  => __( 'Number item', 'pa-sowidgets' ),
                        'fields' => array(
                            'repeat_number' => array(
                                'type' => 'text',
                                'label' => __( 'Enter a number', 'pa-sowidgets' ),
                                'default' => '1'
                            ),  
                            'repeat_text' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Number text', 'pa-sowidgets' ),
                                'rows' => 2,
                                'default_editor' => 'tinymce',
                            ),
                        )
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
		return 'pa-slider-core-template';
	}

	function get_style_name($instance) {
		return 'pa-slider-core-style';
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

siteorigin_widget_register('pa-slider-core', __FILE__, 'PA_Slider_Core');