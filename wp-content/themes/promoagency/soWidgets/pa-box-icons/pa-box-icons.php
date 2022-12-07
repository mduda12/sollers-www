<?php

/*
Widget Name: PA Box - icons
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_box_icons extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-box-icons',
			__('PA Box - icons', 'pa-sowidgets'),
			array(
                'description' => __('PA Box - icons', 'pa-sowidgets'),
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
            'widget_title' => array(
				'type' => 'section',
				'label' => __('Widget header', 'pa-sowidgets'),
                'hide' => true,
                'optional' => true,
				'fields' => array(
                    'header' => array(
                        'type' => 'tinymce',
                        'label' => __('Header', 'pa-sowidgets'),
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'subheader' => array(
                        'type' => 'text',
                        'label' => __('Subheader', 'pa-sowidgets')
                    )
                ),
            ),
            'widget_content' => array(
				'type' => 'section',
				'label' => __('Widget content', 'pa-sowidgets'),
                'hide' => false,
				'fields' => array(
                    'title' => array(
                        'type' => 'tinymce',
                        'label' => __('Header', 'pa-sowidgets'),
                        'optional' => true,
                        'rows' => 2,
                        'default_editor' => 'html'
                    ),
                    'layout' => array(
                        'type' => 'select',
                        'label' => __( 'Module layout', 'widget-form-fields-text-domain' ),
                        'default' => 'four',
                        'options' => array(
                            'three' => __( '3 column', 'widget-form-fields-text-domain' ),
                            'four' => __( '4 column', 'widget-form-fields-text-domain' )
                        )
                    ),
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
                        'default' => '#ecf0f5'
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
		return 'pa-box-icons-template';
	}

	function get_style_name($instance) {
		return 'pa-box-icons-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
        );
    }
    
}

siteorigin_widget_register('pa-box-icons', __FILE__, 'pa_box_icons');