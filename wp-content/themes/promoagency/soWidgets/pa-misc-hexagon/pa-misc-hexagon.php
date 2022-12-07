<?php

/*
Widget Name: PA Hexagon list
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_misc_hexagon extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-misc-hexagon',
			__('PA Hexagon list', 'pa-sowidgets'),
			array(
                'description' => __('PA Hexagon list', 'pa-sowidgets'),
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
            'widget_header' => array(
				'type' => 'section',
				'label' => __('Header', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'text',
                        'label' => __( 'Title', 'pa-sowidgets' )
                    ),
                    'subtitle' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Subtitle', 'pa-sowidgets' ),
                        'rows' => 2,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'widget_content' => array(
				'type' => 'section',
				'label' => __('Widget content', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'bg_color_back' => array(
                        'type' => 'color',
                        'label' => __('All hexagon Back Background ', 'pa-sowidgets'),
                        'default' => '#9cc85d'
                    ),
                    'a_repeater' => array(
                        'type' => 'repeater',
                        'label' => __( 'Hexagon' , 'pa-sowidgets' ),
                        'item_name'  => __( 'Hexagon item', 'siteorigin-widgets' ),
                        'fields' => array(
                            'title' => array(
                                'type' => 'text',
                                'label' => __( 'Front: Title', 'pa-sowidgets' )
                            ),
                            'reverse_title' => array(
                                'type' => 'text',
                                'label' => __( 'Back: Title', 'pa-sowidgets' )
                            ),
                            'reverse_content' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Back: Content', 'pa-sowidgets' ),
                                'rows' => 5,
                                'default_editor' => 'tinymce',
                            ),
                            'reverse_popup' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Back: Text in popup', 'pa-sowidgets' ),
                                'rows' => 5,
                                'default_editor' => 'tinymce',
                                'optional' => true
                            ),
                            'bg_color' => array(
                                'type' => 'color',
                                'label' => __('Front: Background ', 'pa-sowidgets'),
                                'default' => '#ffffff'
                            )
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
		return 'pa-misc-hexagon-template';
	}

	function get_style_name($instance) {
		return 'pa-misc-hexagon-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'bg_color_back' => ($instance['widget_content']['bg_color_back']),
        );
    }
    
}

siteorigin_widget_register('pa-misc-hexagon', __FILE__, 'pa_misc_hexagon');