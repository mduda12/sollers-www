<?php

/*
Widget Name: PA DNA
Description: SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: 
*/

class pa_dna extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-dna',
			__('PA DNA', 'pa-sowidgets'),
			array(
                'description' => __('PA DNA', 'pa-sowidgets'),
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
            'icon_texts' => array(
				'type' => 'section',
				'label' => __('Icon texts', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'icon_one_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon one header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_one_text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon one text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_one_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __( 'Icon one mobile icon', 'pa-sowidgets' ),
                    ),
                    'icon_two_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon two header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_two_text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon two text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_two_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __( 'Icon two mobile icon', 'pa-sowidgets' ),
                    ),
                    'icon_three_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon three header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_three_text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon three text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_three_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __( 'Icon three mobile icon', 'pa-sowidgets' ),
                    ),
                    'icon_four_header' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon four header', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_four_text' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Icon four text', 'pa-sowidgets' ),
                        'rows' => 3,
                        'default_editor' => 'tinymce',
                        'optional' => true,
                    ),
                    'icon_four_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __( 'Icon four mobile icon', 'pa-sowidgets' ),
                    ),
                ),
            ),
            'main_image' => array(
				'type' => 'section',
				'label' => __('Center image', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __( 'Image', 'pa-sowidgets' ),
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
		return 'pa-dna-template';
	}

	function get_style_name($instance) {
		return 'pa-dna-style';
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

siteorigin_widget_register('pa-dna', __FILE__, 'pa_dna');