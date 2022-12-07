<?php

/*
Widget Name: PA Box - Insurance
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_box_insurance extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-box-insurance',
			__('PA Box - Insurance', 'pa-sowidgets'),
			array(
                'description' => __('PA Box - Insurance', 'pa-sowidgets'),
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
                'type' => 'text',
                'label' => __('Header', 'pa-sowidgets'),
            ),
            'box_one' => array(
				'type' => 'section',
				'label' => __('Box - one with image'),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),  
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 5,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Button - link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
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
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 5,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Button - link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
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
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 5,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Button - link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
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
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 5,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Button - link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
                    )
                ),
            ),
            'box_five' => array(
				'type' => 'section',
				'label' => __('Box - five'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 5,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Button - link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
                    )
                ),
            ),
            'box_six' => array(
				'type' => 'section',
				'label' => __('Box - six'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 5,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Button - link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
                    )
                ),
            ),
            'box_seven' => array(
				'type' => 'section',
				'label' => __('Box - seven with image'),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ), 
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Title', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'content' => array(
                        'type' => 'tinymce',
                        'label' => __('Content', 'pa-sowidgets'),
                        'rows' => 5,
                        'default_editor' => 'html'
                    ),
                    'url' => array(
                        'type' => 'link',
                        'label' => __('Button - link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'url_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
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
		return 'pa-box-insurance-template';
	}

	function get_style_name($instance) {
		return 'pa-box-insurance-style';
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

siteorigin_widget_register('pa-box-insurance', __FILE__, 'pa_box_insurance');