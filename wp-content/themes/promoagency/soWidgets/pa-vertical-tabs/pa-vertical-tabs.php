<?php

/*
Widget Name: PA Vertical Tabs
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class PA_Vertical_Tabs extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-vertical-tabs',
			__('PA Vertical Tabs', 'pa-sowidgets'),
			array(
                'description' => __('PA Vertical Tabs', 'pa-sowidgets'),
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
            'tabs' => array(
				'type' => 'section',
				'label' => __('Tabs', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'pa_tab_id' => array(
                        'type' => 'text',
                        'label' => __('Tab ID', 'pa-sowidgets'),
                        'description' => '*REQUIRED - Add ID to item. If this widget is used more than once on page, the IDs must be different. (only letters without space and special characters)'
                    ),
                    'pa_widget_tabs' => array(
                        'type' => 'repeater',
                        'label' => __( 'Tabs' , 'pa-sowidgets' ),
                        'item_name'  => __( 'Tab', 'pa-sowidgets' ),
                        'fields' => array(
                            'tab_name' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Tab name', 'pa-sowidgets' ),
                                'rows' => 2,
                                'default_editor' => 'tinymce',
                            ),  
                            'tab_content' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Tab content', 'pa-sowidgets' ),
                                'rows' => 5,
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
		return 'pa-vertical-tabs-template';
	}

	function get_style_name($instance) {
		return 'pa-vertical-tabs-style';
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

siteorigin_widget_register('pa-vertical-tabs', __FILE__, 'PA_Vertical_Tabs');