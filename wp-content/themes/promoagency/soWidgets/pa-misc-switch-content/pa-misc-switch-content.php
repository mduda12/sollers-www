<?php

/*
Widget Name: PA - switch content (2 Tabs)
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_misc_switch_content extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-misc-switch-content',
			__('PA - switch content (2 Tabs)', 'pa-sowidgets'),
			array(
                'description' => __('PA - switch content (2 Tabs)', 'pa-sowidgets'),
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
            'tab_one' => array(
				'type' => 'section',
				'label' => __('Tab - one', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Title', 'pa-sowidgets' ),
                        'rows' => 1,
                        'default_editor' => 'html'
                    ),
                    'title_content' => array(
                        'type' => 'text',
                        'label' => __( 'Title - content', 'pa-sowidgets' ),
                    ),
                ),
            ),
            'tab_two' => array(
				'type' => 'section',
				'label' => __('Tab - two', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Title', 'pa-sowidgets' ),
                        'rows' => 1,
                        'default_editor' => 'html'
                    ),
                    'title_content' => array(
                        'type' => 'text',
                        'label' => __( 'Title - content', 'pa-sowidgets' ),
                    ),
                ),
            ),
            'repeater_one' => array(
                'type' => 'repeater',
                'label' => __( 'Content - one' , 'pa-sowidgets' ),
                'item_name'  => __( 'Item', 'siteorigin-widgets' ),
                'fields' => array(
                    'item_content' => array(
                        'type' => 'section',
                        'label' => __('Item content', 'pa-sowidgets'),
                        'hide' => true,
                        'fields' => array(
                            'image' => array(
                                'type' => 'media',
                                'library' => 'image',
                                'label' => __('Image', 'pa-sowidgets' ),
                            ),
                            'header' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Header', 'pa-sowidgets' ),
                                'rows' => 2,
                                'default_editor' => 'tinymce',
                            ),
                            'content' => array(
                                'type' => 'tinymce',
                                'label' => __('Content', 'pa-sowidgets'),
                                'rows' => 5,
                                'default_editor' => 'html'
                            ),
                            'checkbox' => array(
                                'type' => 'checkbox',
                                'label' => __( 'Column background image?', 'pa-sowidgets' ),
                                'default' => false
                            ),
                            'li_underline' => array(
                                'type' => 'checkbox',
                                'label' => __( 'Turn off list underline?', 'pa-sowidgets' ),
                                'default' => false
                            ),
                            'url_name' => array(
                                'type' => 'text',
                                'label' => __( 'Link - Button text', 'pa-sowidgets' ),
                                'optional' => true
                            ),
                            'url' => array(
                                'type' => 'link',
                                'label' => __('Link _URL', 'pa-sowidgets'),
                                'optional' => true
                            ),
                            'url_target' => array(
                                'type' => 'checkbox',
                                'label' => __('Link in a new window', 'pa-sowidgets'),
                                'default' => false,
                                'optional' => true
                            ),
                            'top_padding' => array(
                                'type' => 'measurement',
                                'label' => __('Row - padding top', 'pa-sowidgets'),
                                'default' => '0px',
                            ),
                            'bottom_padding' => array(
                                'type' => 'measurement',
                                'label' => __('Row - padding bottom', 'pa-sowidgets'),
                                'default' => '0px',
                            ),
                        ),
                    ),
                )
            ),
            'repeater_two' => array(
                'type' => 'repeater',
                'label' => __( 'Content - two' , 'pa-sowidgets' ),
                'item_name'  => __( 'Item', 'siteorigin-widgets' ),
                'fields' => array(
                    'ordering' => array(
                        'type' => 'order',
                        'label' => __( 'Column order', 'pa-sowidgets' ),
                        'options' => array(
                            'right' => __( 'Content - right | Image - left', 'pa-sowidgets' ),
                            'left' => __( 'Content - left | Image - right', 'pa-sowidgets' ),
                        ),
                        'default' => array( 'right', 'left' ),
                    ),
                    'item_content' => array(
                        'type' => 'section',
                        'label' => __('Item content', 'pa-sowidgets'),
                        'hide' => true,
                        'fields' => array(
                            'image' => array(
                                'type' => 'media',
                                'library' => 'image',
                                'label' => __('Image', 'pa-sowidgets' ),
                            ),
                            'header' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Header', 'pa-sowidgets' ),
                                'rows' => 2,
                                'default_editor' => 'tinymce',
                            ),
                            'content' => array(
                                'type' => 'tinymce',
                                'label' => __('Content', 'pa-sowidgets'),
                                'rows' => 5,
                                'default_editor' => 'html'
                            ),
                            'checkbox' => array(
                                'type' => 'checkbox',
                                'label' => __( 'Column background image?', 'pa-sowidgets' ),
                                'default' => false
                            ),
                            'li_underline' => array(
                                'type' => 'checkbox',
                                'label' => __( 'Turn off list underline?', 'pa-sowidgets' ),
                                'default' => false
                            ),
                            'url_name' => array(
                                'type' => 'text',
                                'label' => __( 'Link - Button text', 'pa-sowidgets' ),
                                'optional' => true
                            ),
                            'url' => array(
                                'type' => 'link',
                                'label' => __('Link _URL', 'pa-sowidgets'),
                                'optional' => true
                            ),
                            'url_target' => array(
                                'type' => 'checkbox',
                                'label' => __('Link in a new window', 'pa-sowidgets'),
                                'default' => false,
                                'optional' => true
                            ),
                            'top_padding' => array(
                                'type' => 'measurement',
                                'label' => __('Row - padding top', 'pa-sowidgets'),
                                'default' => '0px',
                            ),
                            'bottom_padding' => array(
                                'type' => 'measurement',
                                'label' => __('Row - padding bottom', 'pa-sowidgets'),
                                'default' => '0px',
                            ),
                        ),
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
                        'default' => '#e9ecf3'
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
                ),
            ),
        );
    }

	function get_template_name($instance) {
		return 'pa-misc-switch-content-template';
	}

	function get_style_name($instance) {
		return 'pa-misc-switch-content-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
        );
    }
    
}

siteorigin_widget_register('pa-misc-switch-content', __FILE__, 'pa_misc_switch_content');