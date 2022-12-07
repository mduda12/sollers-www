<?php

/*
Widget Name: PA Text and Image | Universal ( 2 columns ) plus additional 2 cols inside
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_txt_img_universal_plus extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-txt-img-universal-plus',
			__('PA Text and Image | Universal ( 2 columns ) plus additional 2 cols inside', 'pa-sowidgets'),
			array(
                'description' => __('PA Text and Image | Universal ( 2 columns ) plus additional 2 cols inside', 'pa-sowidgets'),
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
            'ordering' => array(
                'type' => 'order',
                'label' => __( 'Column order', 'pa-sowidgets' ),
                'options' => array(
                    'left' => __( 'Content - left | Image - right', 'pa-sowidgets' ),
                    'right' => __( 'Content - right | Image - left', 'pa-sowidgets' ),
                ),
                'default' => array( 'left', 'right' ),
            ),
            'widget_content' => array(
				'type' => 'section',
				'label' => __('Widget content', 'pa-sowidgets'),
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
                        'rows' => 10,
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
                    'column_top_padding' => array(
                        'type' => 'measurement',
                        'label' => __('Column - padding top', 'pa-sowidgets'),
                        'default' => '50px',
                    ),
                    'column_bottom_padding' => array(
                        'type' => 'measurement',
                        'label' => __('Column - padding bottom', 'pa-sowidgets'),
                        'default' => '0px',
                    ),
                ),
            ),
            'additional_columns' => array(
				'type' => 'section',
				'label' => __('Additional columns inside', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'left_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Left column header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'left_text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Left column text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'right_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Right column header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'right_text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Right column text', 'pa-sowidgets' ),
                        'rows' => 3,
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
		return 'pa-txt-img-universal-plus-template';
	}

	function get_style_name($instance) {
		return 'pa-txt-img-universal-plus-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_offset' => ($instance['widget_settings']['widget_bg_offset']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
            'column_top_padding' => ($instance['widget_content']['column_top_padding']),
            'column_bottom_padding' => ($instance['widget_content']['column_bottom_padding']),
        );
    }
    
}

siteorigin_widget_register('pa-txt-img-universal-plus', __FILE__, 'pa_txt_img_universal_plus');