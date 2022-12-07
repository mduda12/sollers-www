<?php

/*
Widget Name:  PA Box - UX rotate
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_box_ux_rotate extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-box-ux-rotate',
			__('PA Box - UX rotate', 'pa-sowidgets'),
			array(
                'description' => __('PA Box - UX rotate', 'pa-sowidgets'),
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
                    'header' => array(
                        'type' => 'text',
                        'label' => __( 'Header', 'pa-sowidgets' )
                    ),
                ),
            ),
            'widget_subheader' => array(
				'type' => 'section',
				'label' => __('Subheader', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'subheader' => array(
                        'type' => 'tinymce',
                        'content' => __( 'Subheader', 'pa-sowidgets' ),
                        'rows' => 2,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'layout' => array(
                'type' => 'select',
                'label' => __('Layout', 'pa-sowidgets'),
                'default' => 'two',
                'options' => array(
                    'two' => __( 'Layout - 2 columns', 'pa-sowidgets' ),
                    'three' => __( 'Layout - 3 columns', 'pa-sowidgets' ),
                )
            ),
            'a_repeater' => array(
                'type' => 'repeater',
                'label' => __( 'Boxes' , 'pa-sowidgets' ),
                'item_name'  => __( 'Box item', 'siteorigin-widgets' ),
                'fields' => array(
                    'repeat_logo' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),  
                    'repeat_title' => array(
                        'type' => 'text',
                        'label' => __( 'Title', 'pa-sowidgets' )
                    ),
                    'repeat_content' => array(
                        'type' => 'tinymce',
                        'content' => __( 'Content', 'pa-sowidgets' ),
                        'rows' => 2,
                        'default_editor' => 'tinymce',
                    ),
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
		return 'pa-box-ux-rotate-template';
	}

	function get_style_name($instance) {
		return 'pa-box-ux-rotate-style';
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

siteorigin_widget_register('pa-box-ux-rotate', __FILE__, 'pa_box_ux_rotate');