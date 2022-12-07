<?php

/*
Widget Name: PA Quote
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_quote extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-quote',
			__('PA Quote', 'pa-sowidgets'),
			array(
                'description' => __('PA Quote', 'pa-sowidgets'),
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
            'a_repeater' => array(
                'type' => 'repeater',
                'label' => __( 'Quote slider' , 'pa-sowidgets' ),
                'item_name'  => __( 'Slide item', 'siteorigin-widgets' ),
                'fields' => array(
                    'quote' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Quote', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
                    'author_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Author thumbnail', 'pa-sowidgets' ),
                        'optional' => true,
                    ),  
                    'author' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Author', 'pa-sowidgets' ),
                        'rows' => 1,
                        'default_editor' => 'tinymce',
                    ),
                    'position' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Position', 'pa-sowidgets' ),
                        'rows' => 1,
                        'default_editor' => 'tinymce',
                    ),
                    'description' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Description', 'pa-sowidgets' ),
                        'optional' => true,
                        'rows' => 1,
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
                        'default' => '#004888'
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
                        'default' => '125px',
                    ),
                    'widget_bottom' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding bottom', 'pa-sowidgets'),
                        'default' => '0px',
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-quote-template';
	}

	function get_style_name($instance) {
		return 'pa-quote-style';
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

siteorigin_widget_register('pa-quote', __FILE__, 'pa_quote');