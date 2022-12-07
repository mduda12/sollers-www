<?php

/*
Widget Name: PA Chart Slider (4 elements)
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_chart_slider_four extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-chart-slider-four',
			__('PA Chart Slider (4 elements)', 'pa-sowidgets'),
			array(
                'description' => __('PA Chart Slider (4 elements)', 'pa-sowidgets'),
                'panels_groups' => array('pa_charts_widgets'),
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
                    'pa_widget_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'pa_widget_subheader' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Subheader text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                ),
            ),
            'slide_one' => array(
				'type' => 'section',
				'label' => __('Slide one', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'text',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'optional' => true
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Text', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'rectangle_color' => array(
                        'type' => 'color',
                        'label' => __( 'Bottom rectangle color', 'pa-sowidgets' ),
                        'default' => '#0074b8'
                    )
                ),
            ),
            'slide_two' => array(
				'type' => 'section',
				'label' => __('Slide two', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'text',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'optional' => true
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Text', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'rectangle_color' => array(
                        'type' => 'color',
                        'label' => __( 'Bottom rectangle color', 'pa-sowidgets' ),
                        'default' => '#99d65b'
                    )
                ),
            ),
            'slide_three' => array(
				'type' => 'section',
				'label' => __('Slide three', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'text',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'optional' => true
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Text', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'rectangle_color' => array(
                        'type' => 'color',
                        'label' => __( 'Bottom rectangle color', 'pa-sowidgets' ),
                        'default' => '#4fc97c'
                    )
                ),
            ),
            'slide_four' => array(
				'type' => 'section',
				'label' => __('Slide four', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'text',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'optional' => true
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Text', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'rectangle_color' => array(
                        'type' => 'color',
                        'label' => __( 'Bottom rectangle color', 'pa-sowidgets' ),
                        'default' => '#004987'
                    )
                ),
            ),
            'chart_column' => array(
				'type' => 'section',
				'label' => __('Slider chart', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'chart_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __( 'Chart image', 'pa-sowidgets' ),
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
		return 'pa-chart-slider-four-template';
	}

	function get_style_name($instance) {
		return 'pa-chart-slider-four-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'rectangle_color_one' => ($instance['slide_one']['rectangle_color']),
            'rectangle_color_two' => ($instance['slide_two']['rectangle_color']),
            'rectangle_color_three' => ($instance['slide_three']['rectangle_color']),
            'rectangle_color_four' => ($instance['slide_four']['rectangle_color']),
        );
    }
    
}

siteorigin_widget_register('pa-chart-slider-four', __FILE__, 'pa_chart_slider_four');