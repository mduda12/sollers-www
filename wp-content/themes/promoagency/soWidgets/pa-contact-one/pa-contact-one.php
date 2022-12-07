<?php

/*
Widget Name: PA Contact us - one or two contacts 
Description: Slider box widget. SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
Developer: MK
*/


class pa_contact_one extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-contact-one',
			__('PA Contact us - one or two contacts', 'pa-sowidgets'),
			array(
                'description' => __('PA Contact us - one or two contacts', 'pa-sowidgets'),
                'panels_groups' => array('pa_contact_widgets'),
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
            'url' => array(
                'type' => 'link',
                'label' => __('Button - link', 'pa-sowidgets'),
                'default' => '#'
            ),
            'url_target' => array(
                'type' => 'checkbox',
                'label' => __('Link in a new window', 'pa-sowidgets'),
                'default' => false
            ),
            'widget_title' => array(
				'type' => 'section',
				'label' => __('Widget title', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'title' => array(
                        'type' => 'text',
                        'label' => __( 'Title', 'pa-sowidgets' ),
                        'default' => 'Contact Us'
                    )
                ),
            ),
            'person_1' => array(
				'type' => 'section',
				'label' => __('Box one', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'box_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),
                    'box_name' => array(
                        'type' => 'text',
                        'label' => __( 'Name', 'pa-sowidgets' )
                    ),
                    'box_position' => array(
                        'type' => 'text',
                        'label' => __( 'Position', 'pa-sowidgets' )
                    ),
                    'box_mail_description' => array(
                        'type' => 'text',
                        'label' => __( 'Mail cta text', 'pa-sowidgets' )
                    ),
                    'box_mail' => array(
                        'type' => 'tinymce',
                        'rows' => 1,
                        'label' => __('Module form', 'pa-sowidgets'),
                        'description' => __('Embed IFRAME - use the SOURCE CODE in the Visual editor or paste the code directly into the Text editor'),
                    ),
                    'box_color' => array(
                        'type' => 'color',
                        'label' => __( 'recommended colors for this section: #004387 and #9cc85d', 'pa-sowidgets' ),
                        'default' => '#004387'
                    )
                ),
            ),
            'person_2' => array(
				'type' => 'section',
				'label' => __('Box two', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'box_image' => array(
                        'type' => 'media',
                        'library' => 'image',
                        'label' => __('Image', 'pa-sowidgets' ),
                    ),
                    'box_name' => array(
                        'type' => 'text',
                        'label' => __( 'Name', 'pa-sowidgets' ),
                        'description' => __( 'If empty, only one person will be displayed', 'pa-sowidgets' ),
                    ),
                    'box_position' => array(
                        'type' => 'text',
                        'label' => __( 'Position', 'pa-sowidgets' )
                    ),
                    'box_mail_description' => array(
                        'type' => 'text',
                        'label' => __( 'Mail cta text', 'pa-sowidgets' )
                    ),
                    'box_mail' => array(
                        'type' => 'tinymce',
                        'rows' => 1,
                        'label' => __('Module form', 'pa-sowidgets'),
                        'description' => __('Embed IFRAME - use the SOURCE CODE in the Visual editor or paste the code directly into the Text editor'),
                    ),
                    'box_color' => array(
                        'type' => 'color',
                        'label' => __( 'recommended colors for this section: #004387 or #9cc85d', 'pa-sowidgets' ),
                        'default' => '#004387'
                    )
                ),
                'optional' => true,
            ),
            'widget_settings' => array(
				'type' => 'section',
				'label' => __('Widget styles', 'pa-sowidgets'),
				'hide' => true,
				'fields' => array(
                    'widget_bg' => array(
                        'type' => 'checkbox',
                        'label' => __('Enable background image', 'pa-sowidgets'),
                        'default' => true
                    ),
                    'widget_top' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding top', 'pa-sowidgets'),
                        'default' => '50px',
                    ),
                    'widget_bottom' => array(
                        'type' => 'measurement',
                        'label' => __('Widget - padding bottom', 'pa-sowidgets'),
                        'default' => '185px',
                    ),
                    'widget_alternative' => array(
                        'type' => 'checkbox',
                        'label' => __('Layout alternative - like RIFE', 'pa-sowidgets'),
                        'default' => false
                    )
                ),
            )
        );
    }

	function get_template_name($instance) {
		return 'pa-contact-one-template';
	}

	function get_style_name($instance) {
		return 'pa-contact-one-style';
    }

    function get_less_variables( $instance ) {
        return array(
            'widget_padding_top' => ($instance['widget_settings']['widget_top']),
            'widget_padding_bottom' => ($instance['widget_settings']['widget_bottom']),
            'box_one_color' => ($instance['person_1']['box_color']),
            'box_two_color' => ($instance['person_2']['box_color'])
        );
    }
    
}

siteorigin_widget_register('pa-contact-one', __FILE__, 'pa_contact_one');