<?php

/*
Widget Name: PA Flip Cards
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class PA_Flip_Cards extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-flip-cards',
			__('PA Flip Cards', 'pa-sowidgets'),
			array(
                'description' => __('PA Flip Cards', 'pa-sowidgets'),
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
            'cards_settings' => array(
				'type' => 'section',
				'label' => __('Cards settings', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'card_height' => array(
                        'type' => 'measurement',
                        'label' => __( 'Enter Cards height in pixels', 'pa-sowidgets' ),
                        'default' => '480px',
                    ),
                ),
            ),
            'card_one' => array(
				'type' => 'section',
				'label' => __('Card one', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'card_one_icon' => array(
                        'type' => 'media',
                        'label' => __( 'Icon', 'pa-sowidgets' ),
                        'choose' => __( 'Choose icon', 'pa-sowidgets' ),
                        'update' => __( 'Set icon', 'pa-sowidgets' ),
                        'library' => 'image',
                        'fallback' => true
                    ),
                    'card_one_name' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card name', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'card_one_subcopy' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'card_one_back' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card back content', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'card_two' => array(
				'type' => 'section',
				'label' => __('Card two', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'card_two_icon' => array(
                        'type' => 'media',
                        'label' => __( 'Icon', 'pa-sowidgets' ),
                        'choose' => __( 'Choose icon', 'pa-sowidgets' ),
                        'update' => __( 'Set icon', 'pa-sowidgets' ),
                        'library' => 'image',
                        'fallback' => true
                    ),
                    'card_two_name' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card name', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'card_two_subcopy' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'card_two_back' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card back content', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                ),
            ),
            'card_three' => array(
				'type' => 'section',
				'label' => __('Card three', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'card_three_icon' => array(
                        'type' => 'media',
                        'label' => __( 'Icon', 'pa-sowidgets' ),
                        'choose' => __( 'Choose icon', 'pa-sowidgets' ),
                        'update' => __( 'Set icon', 'pa-sowidgets' ),
                        'library' => 'image',
                        'fallback' => true
                    ),
                    'card_three_name' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card name', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'card_three_subcopy' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card subheader', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                    ),
                    'card_three_back' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Card back content', 'pa-sowidgets' ),
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
                    ),
                    'widget_alternative' => array(
                        'type' => 'checkbox',
                        'label' => __('Layout alternative - like RIFE', 'pa-sowidgets'),
                        'default' => false
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-flip-cards-template';
	}

	function get_style_name($instance) {
		return 'pa-flip-cards-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'card_height' => ($instance['cards_settings']['card_height']),
        );
    }
    
}

siteorigin_widget_register('pa-flip-cards', __FILE__, 'PA_Flip_Cards');