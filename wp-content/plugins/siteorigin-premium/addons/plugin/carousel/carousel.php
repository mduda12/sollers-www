<?php
/*
Plugin Name: SiteOrigin Carousel
Description: Additional settings and styles for the Widgets Bundle Carousel widgets.
Version: 1.0.0
Author: SiteOrigin
Author URI: https://siteorigin.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
Documentation: https://siteorigin.com/premium-documentation/plugin-addons/carousel
Tags: Widgets Bundle
Video:
Requires: so-widgets-bundle
*/

class SiteOrigin_Premium_Plugin_Carousel {

	function __construct() {
		add_action( 'init', array( $this, 'add_filters' ) );
	}

	static function single() {
		static $single;
		return empty( $single ) ? $single = new self() : $single;
	}
	
	public function add_filters() {
		if ( class_exists( 'SiteOrigin_Widget_Anything_Carousel_Widget' ) ) {
			add_filter( 'siteorigin_widgets_form_options_sow-anything-carousel', array( $this, 'anything_carousel_inject_form_options' ), 10, 2 );
			add_filter( 'siteorigin_widgets_anything_carousel_render_item_content', array( $this, 'anything_carousel_render_item_content' ), 10, 3 );

			add_filter( 'siteorigin_widgets_template_variables_sow-anything-carousel', array( $this, 'anything_carousel_inject_anchor' ), 10, 2 );
			add_action( 'siteorigin_widgets_enqueue_frontend_scripts_sow-anything-carousel', array( $this, 'enqueue_anything_carousel_js' ) );
		}
	}
	
	public function anything_carousel_inject_form_options( $form_options, $widget ) {
		if ( empty( $form_options ) ) {
			return $form_options;
		}

		$form_options['carousel_settings']['fields']['use_anchor_tags'] = array(
			'type' => 'checkbox',
			'label' => __( 'Use item anchor tags in the URL', 'siteorigin-premium' ),
			'state_emitter' => array(
				'callback' => 'conditional',
				'args' => array(
					'anchor_tags[show]: val',
					'anchor_tags[hide]: ! val',
				),
			),
		);

		$form_options['carousel_settings']['fields']['anchor'] = array(
			'type' => 'text',
			'label' => __( 'Carousel anchor', 'siteorigin-premium' ),
			'description' => __( 'Optionally set a custom anchor tag. Required if the widget title field is empty.', 'siteorigin-premium' ),
			'state_handler' => array(
				'anchor_tags[show]' => array( 'show' ),
				'anchor_tags[hide]' => array( 'hide' ),
			),
		);

		// Builder field.
		$items_fields = $form_options['items']['fields'];
		
		if ( array_key_exists( 'content_text', $items_fields ) ) {
			$position = 'content_text';
			$items_fields['content_text']['state_handler'] = array(
				'content_type_{$repeater}[text]' => array( 'show' ),
				'_else[content_type_{$repeater}]' => array( 'hide' ),
			);
		} else {
			$position = count( $items_fields );
		}
	
		// The builder field currently only works in some contexts so we only output it in those contexts for now.
		if ( is_admin() ||
			( defined( 'REST_REQUEST' ) && function_exists( 'register_block_type' ) ) ||
			! empty( $GLOBALS['SITEORIGIN_WIDGET_BLOCK_RENDER'] )
		) {
			$add_fields = array(
				'content_type' => array(
					'type' => 'radio',
					'label' => __( 'Content type', 'siteorigin-premium' ),
					'options' => array(
						'text' => __( 'Text', 'siteorigin-premium' ),
						'layout' => __( 'Layout builder', 'siteorigin-premium' ),
					),
					'default'=> 'text',
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'content_type_{$repeater}' )
					),
				),
				'content_layout' => array(
					'type' => 'builder',
					'label' => __( 'Content', 'siteorigin-premium' ),
					'builder_type' => 'anything_carousel_panel_builder',
					'state_handler' => array(
						'content_type_{$repeater}[layout]' => array( 'show' ),
						'_else[content_type_{$repeater}]' => array( 'hide' ),
					),
				),
			);

			siteorigin_widgets_array_insert( $items_fields, $position, $add_fields );
			$form_options['items']['fields'] = $items_fields;
		}

		return $form_options;
	}

	public function anything_carousel_render_item_content( $content, $item, $instance ) {
		if ( ! empty( $item['content_type'] ) && $item['content_type'] === 'layout' ) {
			if ( function_exists( 'siteorigin_panels_render' ) ) {
				$content_builder_id = substr( md5( json_encode( $item['content_layout'] ) ), 0, 8 );
				$content =  siteorigin_panels_render( 'w' . $content_builder_id, true, $item['content_layout'] );
			} else {
				$content = __( 'This field requires Page Builder.', 'siteorigin-premium' );
			}
		}

		return $content;
	}

	function anything_carousel_inject_anchor( $template_vars, $instance ) {
		if (
			! empty( $template_vars['settings']['attributes'] ) &&
			! empty( $instance['carousel_settings']['use_anchor_tags'] ) &&
			(
				! empty( $instance['carousel_settings']['anchor'] ) ||
				! empty( $instance['title'] )
			)
		) {
			$template_vars['settings']['attributes']['anchor'] = sanitize_title_with_dashes(
				! empty( $instance['carousel_settings']['anchor'] ) ? $instance['carousel_settings']['anchor'] : $instance['title']
			);
		}
		return $template_vars;
	}

	public function enqueue_anything_carousel_js( $instance ) {
		if ( ! empty( $instance['carousel_settings']['use_anchor_tags'] ) ) {
			wp_enqueue_script(
				'so-premium-anything-carousel',
				plugin_dir_url( __FILE__ ) . 'js/anything-carousel' . SITEORIGIN_PREMIUM_JS_SUFFIX . '.js',
				array(),
				SITEORIGIN_PREMIUM_VERSION
			);
		}
	}
}
