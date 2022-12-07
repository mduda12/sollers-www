<?php

/*
Widget Name: PA Horizontal Timeline
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_timeline extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-timeline',
			__('PA Horizontal Timeline', 'pa-sowidgets'),
			array(
                'description' => __('PA Horizontal Timeline', 'pa-sowidgets'),
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
            'item_height' => array(
				'type' => 'section',
				'label' => __('Timeline item', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'height' => array(
                        'type' => 'measurement',
                        'label' => __('Set timeline item height in pixels', 'pa-sowidgets'),
                        'default' => '180px',
                    ),
                ),
            ),
            'timeline' => array(
				'type' => 'repeater',
				'label' => __('Timeline', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'icon' => array(
                        'type' => 'media',
                        'label' => __( 'Icon', 'pa-sowidgets' ),
                        'choose' => __( 'Choose icon', 'pa-sowidgets' ),
                        'update' => __( 'Set icon', 'pa-sowidgets' ),
                        'library' => 'image',
                        'fallback' => true
                    ),
                    'year' => array(
                        'type' => 'text',
                        'label' => __( 'Year', 'pa-sowidgets' )
                    ),
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 2,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'desc' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Text', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                        'optional' => true,
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
		return 'pa-timeline-template';
	}

	function get_style_name($instance) {
		return 'pa-timeline-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'item_height' => ($instance['item_height']['height']),
        );
    }
    
}

siteorigin_widget_register('pa-timeline', __FILE__, 'pa_timeline');