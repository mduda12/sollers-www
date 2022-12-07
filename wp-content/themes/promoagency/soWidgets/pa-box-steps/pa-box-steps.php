<?php

/*
Widget Name: PA Box - steps
Description: Box - steps description. SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_box_steps extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-box-steps',
			__('PA Box - steps', 'pa-sowidgets'),
			array(
                'description' => __('PA Box - steps', 'pa-sowidgets'),
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
            'widget_text' => array(
				'type' => 'section',
				'label' => __('Widget header text & subheader text & footer text', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'text_header' => array(
                        'type' => 'text',
                        'label' => __('Header', 'pa-sowidgets'),
                    ),
                    'text_subheader' => array(
                        'type' => 'tinymce',
                        'label' => __('Subheader', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'text_bottom' => array(
                        'type' => 'tinymce',
                        'label' => __('Text in footer', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                ),
            ),
            'box_one' => array(
				'type' => 'section',
				'label' => __('Box - one'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'box' => array(
                        'type' => 'tinymce',
                        'label' => __('Box - content', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'box_color' => array(
                        'type' => 'color',
                        'label' => __( 'Box - background', 'pa-sowidgets' ),
                        'default' => '#c9b19b'
                    )
                ),
            ),
            'box_two' => array(
				'type' => 'section',
				'label' => __('Box - two'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'box' => array(
                        'type' => 'tinymce',
                        'label' => __('Box - content', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'box_color' => array(
                        'type' => 'color',
                        'label' => __( 'Box - background', 'pa-sowidgets' ),
                        'default' => '#544741'
                    )
                ),
            ),
            'box_three' => array(
				'type' => 'section',
				'label' => __('Box - three'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'box' => array(
                        'type' => 'tinymce',
                        'label' => __('Box - content', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'box_color' => array(
                        'type' => 'color',
                        'label' => __( 'Box - background', 'pa-sowidgets' ),
                        'default' => '#edf2f6'
                    )
                ),
            ),
            'box_four' => array(
				'type' => 'section',
				'label' => __('Box - four'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'box' => array(
                        'type' => 'tinymce',
                        'label' => __('Box - content', 'pa-sowidgets'),
                        'rows' => 10,
                        'default_editor' => 'html'
                    ),
                    'box_color' => array(
                        'type' => 'color',
                        'label' => __( 'Box - background', 'pa-sowidgets' ),
                        'default' => '#ffb533'
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
		return 'pa-box-steps-template';
	}

	function get_style_name($instance) {
		return 'pa-box-steps-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'box_one_bg' => ($instance['box_one']['box_color']),
            'box_two_bg' => ($instance['box_two']['box_color']),
            'box_three_bg' => ($instance['box_three']['box_color']),
            'box_four_bg' => ($instance['box_four']['box_color'])
        );
    }
    
}

siteorigin_widget_register('pa-box-steps', __FILE__, 'pa_box_steps');