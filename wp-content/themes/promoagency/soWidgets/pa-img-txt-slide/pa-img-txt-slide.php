<?php

/*
Widget Name: PA Image text with slider option
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_img_txt_slide extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-img-txt-slide',
			__('PA Image text with slider option', 'pa-sowidgets'),
			array(
                'description' => __('PA Image text with slider option', 'pa-sowidgets'),
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
            'items' => array(
				'type' => 'section',
				'label' => __('Module items', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'a_repeater' => array(
                        'type' => 'repeater',
                        'label' => __( 'Items' , 'pa-sowidgets' ),
                        'item_name'  => __( 'Module item', 'siteorigin-widgets' ),
                        'fields' => array(
                            'module_header' => array(
                                'type' => 'tinymce',
                                'label' => __( 'Module item header', 'pa-sowidgets' ),
                                'rows' => 3,
                                'default_editor' => 'tinymce',
                            ),  
                            'module_image' => array(
                                'type' => 'media',
                                'library' => 'image',
                                'label' => __('Module image', 'pa-sowidgets' ),
                            ),
                            'module_slider' => array(
                                'type' => 'repeater',
                                'label' => __( 'Module text slider' , 'pa-sowidgets' ),
                                'item_name'  => __( 'Module text item', 'pa-sowidgets' ),
                                'fields' => array(
                                    'item_header' => array(
                                        'type' => 'tinymce',
                                        'label' => __( 'Module text header', 'pa-sowidgets' ),
                                        'rows' => 3,
                                        'default_editor' => 'tinymce',
                                    ),  
                                    'item_text' => array(
                                        'type' => 'tinymce',
                                        'label' => __( 'Module text', 'pa-sowidgets' ),
                                        'rows' => 3,
                                        'default_editor' => 'tinymce',
                                    ),
                                )
                            ),
                        )
                    ),
                ),
            ),
            'button' => array(
				'type' => 'section',
				'label' => __('Button', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'btn_text' => array(
                        'type' => 'text',
                        'label' => __( 'Button text', 'pa-sowidgets' )
                    ),
                    'btn_url' => array(
                        'type' => 'link',
                        'label' => __('Button link', 'pa-sowidgets'),
                        'default' => '#'
                    ),
                    'btn_target' => array(
                        'type' => 'checkbox',
                        'label' => __('Link in a new window', 'pa-sowidgets'),
                        'default' => false
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
		return 'pa-img-txt-slide-template';
	}

	function get_style_name($instance) {
		return 'pa-img-txt-slide-style';
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

siteorigin_widget_register('pa-img-txt-slide', __FILE__, 'pa_img_txt_slide');