<?php

/*
Widget Name: PA Google Maps
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_maps extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-maps',
			__('PA Google Maps', 'pa-sowidgets'),
			array(
                'description' => __('PA Google Maps', 'pa-sowidgets'),
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
            'layout' => array(
                'type' => 'select',
                'label' => __( 'Module layout', 'widget-form-fields-text-domain' ),
                'default' => 'two',
                'options' => array(
                    'two' => __( '2 column', 'widget-form-fields-text-domain' ),
                    'one' => __( '1 column', 'widget-form-fields-text-domain' )
                )
            ),
            'activate_map_one' => array(
                'type' => 'checkbox',
                'label' => __( 'Show map one?', 'pa-sowidgets' ),
                'default' => true
            ),
            'map_widget_one' => array(
                'type' => 'widget',
                'label' => __( 'First Map display settings', 'pa-sowidgets' ),
                'class' => 'SiteOrigin_Widget_GoogleMap_Widget',
                'hide' => true
            ),
            'map_widget_one_other' => array(
				'type' => 'section',
				'label' => __('First Map other settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'left_col' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Left column', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'right_col' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Right column', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'virtual_walk' => array(
                        'type' => 'link',
                        'label' => __('Virtual walk link', 'pa-sowidgets'),
                    )
                ),
            ),
            'activate_map_two' => array(
                'type' => 'checkbox',
                'label' => __( 'Show map two?', 'pa-sowidgets' ),
                'default' => true
            ),
            'map_widget_two' => array(
                'type' => 'widget',
                'label' => __( 'Second Map Settings', 'pa-sowidgets' ),
                'class' => 'SiteOrigin_Widget_GoogleMap_Widget',
                'hide' => true
            ),
            'map_widget_two_other' => array(
				'type' => 'section',
				'label' => __('Second Map other settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'left_col' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Left column', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'right_col' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Right column', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'virtual_walk' => array(
                        'type' => 'link',
                        'label' => __('Virtual walk link', 'pa-sowidgets'),
                    )
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
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-maps-template';
	}

	function get_style_name($instance) {
		return 'pa-maps-style';
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

siteorigin_widget_register('pa-maps', __FILE__, 'pa_maps');