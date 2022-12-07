<?php

/*
Widget Name: PA Slider - partners
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_slider_partners extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-slider-partners',
			__('PA Slider - partners', 'pa-sowidgets'),
			array(
                'description' => __('PA Slider - partners', 'pa-sowidgets'),
                'panels_groups' => array('pa_slider_widgets'),
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
            'widget_title' => array(
				'type' => 'section',
				'label' => __('Widget header', 'pa-sowidgets'),
                'hide' => true,
                'optional' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'text',
                        'label' => __('Header', 'pa-sowidgets')
                    )
                ),
            ),
            'widget_content' => array(
				'type' => 'section',
				'label' => __('Widget content', 'pa-sowidgets'),
                'hide' => false,
				'fields' => array(
                    'a_repeater' => array(
                        'type' => 'repeater',
                        'label' => __('Box', 'pa-sowidgets'),
                        'item_name'  => __( 'Box item', 'pa-sowidgets' ),
                        'hide' => false,
                        'fields' => array(
                            'box_image' => array(
                                'type' => 'media',
                                'library' => 'image',
                                'label' => __('Image', 'pa-sowidgets' )
                            ),
                            'box' => array(
                                'type' => 'tinymce',
                                'label' => __('Box - content', 'pa-sowidgets'),
                                'rows' => 2,
                                'default_editor' => 'html'
                            ),
                            'url' => array(
                                'type' => 'link',
                                'label' => __('Link url', 'pa-sowidgets'),
                                'optional' => true
                            ),
                            'url_target' => array(
                                'type' => 'checkbox',
                                'label' => __('Link in a new window', 'pa-sowidgets'),
                                'default' => false
                            )
                        ),
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
		return 'pa-slider-partners-template';
	}

	function get_style_name($instance) {
		return 'pa-slider-partners-style';
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

siteorigin_widget_register('pa-slider-partners', __FILE__, 'pa_slider_partners');