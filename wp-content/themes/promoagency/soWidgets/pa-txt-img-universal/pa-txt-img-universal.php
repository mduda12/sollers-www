<?php

/*
Widget Name: PA Text and Image | Universal ( 2 columns )
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_txt_img_universal extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-txt-img-universal',
			__('PA Text and Image | Universal ( 2 columns )', 'pa-sowidgets'),
			array(
                'description' => __('PA Text and Image | Universal ( 2 columns )', 'pa-sowidgets'),
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
                    'video_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Video - trigger', 'pa-sowidgets' ),
                        'optional' => true,
                        'description' => 'To attach the video, complete the fields: Image, Video - trigger, Video - Youtube ID'
                    ),
                    'video_id' => array(
                        'type' => 'text',
                        'label' => __( 'Video - Youtube ID', 'pa-sowidgets' ),
                        'optional' => true,
                        'description' => 'To attach the video, complete the fields: Image, Video - trigger, Video - Youtube ID'
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
		return 'pa-txt-img-universal-template';
	}

	function get_style_name($instance) {
		return 'pa-txt-img-universal-style';
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

siteorigin_widget_register('pa-txt-img-universal', __FILE__, 'pa_txt_img_universal');