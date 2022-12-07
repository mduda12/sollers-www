<?php

/*
Widget Name: PA DMS - chart
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_misc_dms extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-misc-dms',
			__('PA DMS - chart', 'pa-sowidgets'),
			array(
                'description' => __('PA DMS - chart', 'pa-sowidgets'),
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
            'ordering' => array(
                'type' => 'order',
                'label' => __( 'Column order', 'pa-sowidgets' ),
                'options' => array(
                    'left' => __( 'Content - left | Image - right', 'pa-sowidgets' ),
                    'right' => __( 'Content - right | Image - left', 'pa-sowidgets' ),
                ),
                'default' => array( 'left', 'right' ),
            ),
            'widget_content' => array(
				'type' => 'section',
				'label' => __('Widget content', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 2,
                        'default_editor' => 'tinymce',
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'column_top_padding' => array(
                        'type' => 'measurement',
                        'label' => __('Column - padding top', 'pa-sowidgets'),
                        'default' => '0px',
                    ),
                    'column_bottom_padding' => array(
                        'type' => 'measurement',
                        'label' => __('Column - padding bottom', 'pa-sowidgets'),
                        'default' => '0px',
                    ),
                ),
            ),
            'chart' => array(
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
                    'tooltip_one_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip one content', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_two_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip two content', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_three_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip three content', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_four_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip four content', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
                    'tooltip_five_content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Tooltip five content', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
                    'chart_image_text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text under chart', 'pa-sowidgets' ),
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
		return 'pa-misc-dms-template';
	}

	function get_style_name($instance) {
		return 'pa-misc-dms-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'column_top_padding' => ($instance['widget_content']['column_top_padding']),
            'column_bottom_padding' => ($instance['widget_content']['column_bottom_padding']),
        );
    }
    
}

siteorigin_widget_register('pa-misc-dms', __FILE__, 'pa_misc_dms');