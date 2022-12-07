<?php

/*
Widget Name: PA Quote - like Agile Philosophy
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_quote_alternative extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-quote-alternative',
			__('PA Quote - like Agile Philosophy', 'pa-sowidgets'),
			array(
                'description' => __('PA Quote - like Agile Philosophy', 'pa-sowidgets'),
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
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
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
                    'widget_bg_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Background - image', 'pa-sowidgets' ),
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
		return 'pa-quote-alternative-template';
	}

	function get_style_name($instance) {
		return 'pa-quote-alternative-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_image' => ($instance['widget_settings']['widget_bg_image']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
        );
    }
    
}

siteorigin_widget_register('pa-quote-alternative', __FILE__, 'pa_quote_alternative');