<?php

/*
Widget Name: PA Page top (header only)
Description: Page top with header widget. SiteOrigin Widgets Bundle is required to work.
Author: PromoAgency
*/

class PA_Page_Top_One extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'pa-page-top-one',
			__('PA Page top One', 'pa-sowidgets'),
			array(
                'description' => __('Page top with header', 'pa-sowidgets'),
                'panels_groups' => array('pa_tops_widgets'),
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
            'pt_one_background' => array(
                'type' => 'media',
                'label' => __( 'Background image', 'pa-sowidgets' ),
            ),
            'pt_one_background_mobile' => array(
                'type' => 'media',
                'label' => __( 'Background image - mobile', 'pa-sowidgets' ),
            ),
            'pt_one_header' => array(
                'type' => 'tinymce',
                'label' => __( 'Header text', 'pa-sowidgets' ),
                'rows' => 10,
                'default_editor' => 'tinymce',
            ),
            'pt_one_subheader' => array(
                'type' => 'tinymce',
                'label' => __( 'Subheader text', 'pa-sowidgets' ),
                'rows' => 5,
                'default_editor' => 'tinymce',
                'optional' => true
            ),
            'pt_one_rife' => array(
                'type' => 'checkbox',
                'label' => __('Header font alternative - like RIFE', 'pa-sowidgets'),
                'default' => false
            )
        );
    }


	function get_template_name($instance) {
		return 'pa-page-top-one-template';
	}

	function get_style_name($instance) {
		return 'pa-page-top-one-style';
    }

    function get_less_variables( $instance ) {
        $less_vars = array();

		return $less_vars;
	}
    
}

siteorigin_widget_register('pa-page-top-one', __FILE__, 'PA_Page_Top_One');