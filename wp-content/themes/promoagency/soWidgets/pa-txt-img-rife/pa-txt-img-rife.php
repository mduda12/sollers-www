<?php

/*
Widget Name: PA Text 4 point and Image - RIFE
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/

class pa_txt_img_rife extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-txt-img-rife',
			__('PA Text 4 point and Image - RIFE', 'pa-sowidgets'),
			array(
                'description' => __('PA Text 4 point and Image - RIFE', 'pa-sowidgets'),
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
            'widget_content' => array(
				'type' => 'section',
				'label' => __('Widget content', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Header - image', 'pa-sowidgets' ),
                    ),
                    'header' => array(
                        'type' => 'text',
                        'label' => __('Header', 'pa-sowidgets'),
                    ),
                    'intro' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Intro', 'pa-sowidgets' ),
                        'rows' => 5,
                        'default_editor' => 'tinymce',
                    ),
                    'point_1' => array(
                        'type' => 'text',
                        'label' => __('Point 1', 'pa-sowidgets'),
                    ),
                    'point_2' => array(
                        'type' => 'text',
                        'label' => __('Point 2', 'pa-sowidgets'),
                    ),
                    'point_3' => array(
                        'type' => 'text',
                        'label' => __('Point 3', 'pa-sowidgets'),
                    ),
                    'point_4' => array(
                        'type' => 'text',
                        'label' => __('Point 4', 'pa-sowidgets'),
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
                        'default' => '#f7f9fb'
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
		return 'pa-txt-img-rife-template';
	}

	function get_style_name($instance) {
		return 'pa-txt-img-rife-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'bg_color' => ($instance['widget_settings']['widget_bg_color']),
        );
    }
    
}

siteorigin_widget_register('pa-txt-img-rife', __FILE__, 'pa_txt_img_rife');