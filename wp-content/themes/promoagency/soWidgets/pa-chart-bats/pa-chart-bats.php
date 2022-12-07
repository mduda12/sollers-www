<?php

/*
Widget Name: PA Chart BATS
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_chart_bats extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-chart-bats',
			__('PA Chart BATS', 'pa-sowidgets'),
			array(
                'description' => __('PA Chart BATS', 'pa-sowidgets'),
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
            'text_column' => array(
				'type' => 'section',
				'label' => __('Text column', 'pa-sowidgets'),
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
                        'default_editor' => 'html',
                    ),
                    'note' => array(
                        'type' => 'tinymce',
                        'label' => __('Note', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html',
                    ),
                ),
            ),
            'chart_column' => array(
				'type' => 'section',
				'label' => __('Image column', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'chart_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __( 'Chart image', 'pa-sowidgets' ),
                    ),
                    'chart_image_header_one' => array(
                        'type' => 'tinymce',
                        'label' => __('Point one name', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'chart_image_header_two' => array(
                        'type' => 'tinymce',
                        'label' => __('Point two name', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'chart_image_header_three' => array(
                        'type' => 'tinymce',
                        'label' => __('Point three name', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'chart_image_header_four' => array(
                        'type' => 'tinymce',
                        'label' => __('Point four name', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'chart_image_header_five' => array(
                        'type' => 'tinymce',
                        'label' => __('Point five name', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'chart_image_header_six' => array(
                        'type' => 'tinymce',
                        'label' => __('Point six name', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
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
		return 'pa-chart-bats-template';
	}

	function get_style_name($instance) {
		return 'pa-chart-bats-style';
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

siteorigin_widget_register('pa-chart-bats', __FILE__, 'pa_chart_bats');