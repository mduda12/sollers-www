<?php

/*
Widget Name: PA Two Cards
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_two_cards extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-two-cards',
			__('PA Two Cards', 'pa-sowidgets'),
			array(
                'description' => __('PA Two Cards', 'pa-sowidgets'),
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
            'card_one' => array(
				'type' => 'section',
				'label' => __('Card one', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'header_bg' => array(
                        'type' => 'color',
                        'label' => __( 'Header background color', 'pa-sowidgets' ),
                        'default' => '#004488'
                    ),
                    'subheader' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Content', 'pa-sowidgets' ),
                        'rows' => 10,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                ),
            ),
            'card_two' => array(
				'type' => 'section',
				'label' => __('Card two', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'header_bg' => array(
                        'type' => 'color',
                        'label' => __( 'Header background color', 'pa-sowidgets' ),
                        'default' => '#9cc85d'
                    ),
                    'subheader' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Content', 'pa-sowidgets' ),
                        'rows' => 10,
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
		return 'pa-two-cards-template';
	}

	function get_style_name($instance) {
		return 'pa-two-cards-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'header_one_bg' => ($instance['card_one']['header_bg']),
            'header_two_bg' => ($instance['card_two']['header_bg']),
        );
    }
    
}

siteorigin_widget_register('pa-two-cards', __FILE__, 'pa_two_cards');