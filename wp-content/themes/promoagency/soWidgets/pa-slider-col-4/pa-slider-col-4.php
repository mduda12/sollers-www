<?php

/*
Widget Name: PA Slider - 4 columns
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_slider_col_4 extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-slider-col-4',
			__('PA Slider - 4 columns', 'pa-sowidgets'),
			array(
                'description' => __('PA Slider - 4 columns', 'pa-sowidgets'),
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
            'a_repeater' => array(
                'type' => 'repeater',
                'label' => __( 'Slider' , 'pa-sowidgets' ),
                'item_name'  => __( 'Slide item', 'siteorigin-widgets' ),
                'fields' => array(
                    'repeat_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),  
                    'repeat_title' => array(
                        'type' => 'text',
                        'label' => __( 'Title', 'pa-sowidgets' )
                    ),
                    'repeat_hover_intro' => array(
                        'type' => 'text',
                        'label' => __( 'Hover - text', 'pa-sowidgets' )
                    ),
                    'repeat_url' => array(
                        'type' => 'link',
                        'label' => __('Read more', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'repeat_url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
                    )
                )
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
                    'widget_bg_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Background - image', 'pa-sowidgets' ),
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
		return 'pa-slider-col-4-template';
	}

	function get_style_name($instance) {
		return 'pa-slider-col-4-style';
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

siteorigin_widget_register('pa-slider-col-4', __FILE__, 'pa_slider_col_4');