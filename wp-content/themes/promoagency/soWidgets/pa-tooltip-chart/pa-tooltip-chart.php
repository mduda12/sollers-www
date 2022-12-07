<?php

/*
Widget Name: PA Tooltip Chart (3 tooltips)
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class PA_Tooltip_Chart extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-tooltip-chart',
			__('PA Tooltip Chart (3 tooltips)', 'pa-sowidgets'),
			array(
                'description' => __('PA Tooltip Chart (3 tooltips)', 'pa-sowidgets'),
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
            'content_col' => array(
				'type' => 'section',
				'label' => __('Content column', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'pa_col_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'pa_col_desc' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Subheader text', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                ),
            ),
            'chart_col' => array(
				'type' => 'section',
				'label' => __('Chart column', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'chart_image' => array(
                        'type' => 'media',
                        'label' => __( 'Image', 'pa-sowidgets' ),
                        'choose' => __( 'Choose image', 'pa-sowidgets' ),
                        'update' => __( 'Set image', 'pa-sowidgets' ),
                        'library' => 'image',
                        'fallback' => true
                    ),
                    'tooltip_one_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip one header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_one_subheader' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip one subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_one_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip one content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_two_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip two header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_two_subheader' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip two subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_two_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip two content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_three_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip three header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_three_subheader' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip three subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_three_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip three content', 'pa-sowidgets' ),
                        'rows' => 10,
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
                        'default' => '#edf2f6'
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
		return 'pa-tooltip-chart-template';
	}

	function get_style_name($instance) {
		return 'pa-tooltip-chart-style';
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

siteorigin_widget_register('pa-tooltip-chart', __FILE__, 'PA_Tooltip_Chart');