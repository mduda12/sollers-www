<?php

/*------------------------------------*\
	Add CSS and JavaScript
\*------------------------------------*/
function enqueue_scripts() {
  if(is_dir('./wp-content/themes/promoagency/dist/js/')){
    $dirJS = new DirectoryIterator('./wp-content/themes/promoagency/dist/js/');
    wp_deregister_script('jquery');

    foreach ($dirJS as $file) {

        if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
            $fullName = basename($file);
            $name = substr(basename($fullName), 0, strpos(basename($fullName), '-'));

            switch($name) {

                case 'vendors':
                    $deps = array('jquery');
                    break;

                case 'main':
                    $deps = array('vendors');
                    break;

                case 'widget':
                    $deps = array('main');
                    break;

                default:
                    $deps = null;
                    break;

            }

            wp_enqueue_script( $name, get_template_directory_uri() . '/dist/js/' . $fullName, $deps, null, true );

        }

    }
  }

}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function enqueue_styles() {
  if(is_dir('./wp-content/themes/promoagency/dist/css/')){
    $dirCSS = new DirectoryIterator('./wp-content/themes/promoagency/dist/css/');

    foreach ($dirCSS as $file) {

        if (pathinfo($file, PATHINFO_EXTENSION) === 'css') {
          $fullName = basename($file);
          $name = substr(basename($fullName), 0, strpos(basename($fullName), '-'));

          switch($name) {

            case 'main':
                $deps = array('vendors');
                break;

            case 'widget':
                $deps = array('main');
                break;

            default:
                $deps = null;
                break;
            }

            wp_enqueue_style( $name, get_template_directory_uri() . '/dist/css/' . $fullName, $deps, null, 'all' );
        }

    }
  }

}
add_action('wp_enqueue_scripts', 'enqueue_styles');

/*------------------------------------*\
	Menu
\*------------------------------------*/
// Register Navigation
function register_website_menu() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header menu' ),
            'footer-menu-1' => __( 'Footer column 1' ),
            'footer-menu-2' => __( 'Footer column 2' ),
            'footer-menu-3' => __( 'Footer column 3' ),
            'footer-menu-4' => __( 'Footer column 4' ),
            'footer-menu-5' => __( 'Footer column 5' ),
            'footer-menu-6' => __( 'Footer column 6' ),
            'landing-menu' => __( 'Landing menu' ),
        )
    );
}
add_action( 'init', 'register_website_menu' );

/*------------------------------------*\
	Image sizes
\*------------------------------------*/
// Make sure featured images are enabled
add_theme_support( 'post-thumbnails' );

// Add featured image sizes
add_image_size( 'slider-hp-left', 668, 520, true );
add_image_size( 'slider-hp-right', 555, 535, true );
add_image_size( 'slider-cs', 540, 470, true );
add_image_size( 'slider-col-4', 255, 315, true );
add_image_size( 'box-dms', 540, 300, true );
add_image_size( 'slider-technology-market', 350, 350, true );
add_image_size( 'contact-one', 350, 210, true );
add_image_size( 'core-slider', 200, 200, true );
add_image_size( 'flip-card-icon', 140, 140, false );
add_image_size( 'chart-image-410', 410, 410, true );
add_image_size( 'chart-image-350', 350, 350, true );
add_image_size( 'chart-image-320', 320, 320, true );
add_image_size( 'double-image', 260, 460, true );
add_image_size( 'insights-thumb', 350, 300, true );
add_image_size( 'insights-single', 760, 600, false );
add_image_size( 'insurance-thumb', 350, 320, true );
add_image_size( 'box-dms-four', 255, 303, true );
add_image_size( 'risk-box', 570, 253, true );
add_image_size( 'timeline-icon', 82, 82, true );
add_image_size( 'event-list', 445, 320, true );
add_image_size( 'contact-four', 260, 210, true );
add_image_size( 'media-kit', 330, 217, true );

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/
// Wygeneruj za pomoca: https://generatewp.com/post-type/

/*------------------------------------*\
	Hide admin bar on frontend
\*------------------------------------*/
add_filter('show_admin_bar', '__return_false');

/*------------------------------------*\
Limit content & excerpt length
\*------------------------------------*/
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
  }

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
      array_pop($content);
      $content = implode(" ",$content).'...';
    } else {
      $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

function trim_text($string, $repl, $limit) 
{
  if(strlen($string) > $limit) 
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
}

/*------------------------------------*\
ACF - Options Page
\*------------------------------------*/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
  ));
  
  acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Copyright Settings',
		'menu_title'	=> 'Copyright & Social',
		'parent_slug'	=> 'theme-general-settings',
  ));
  
  acf_add_options_sub_page(array(
		'page_title' 	=> 'Linkedin',
		'menu_title'	=> 'Linkedin',
		'parent_slug'	=> 'theme-general-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Career – single',
		'menu_title'	=> 'Career – single',
		'parent_slug'	=> 'theme-general-settings',
	));

}

/*------------------------------------*\
	REMOVE UNSUPPORTED WIDGETS
\*------------------------------------*/
function remove_unsupported_widget() {
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Media_Audio');
  unregister_widget('WP_Widget_Media_Image');
  unregister_widget('WP_Widget_Media_Video');
  unregister_widget('WP_Widget_Media_Gallery');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Tag_Cloud');
  unregister_widget('WP_Nav_Menu_Widget');
  unregister_widget('WP_Widget_Custom_HTML');
  unregister_widget('SiteOrigin_Panels_Widgets_Layout');
//   unregister_widget('SiteOrigin_Panels_Widgets_PostLoop');
  unregister_widget('SiteOrigin_Panels_Widgets_PostContent');
  unregister_widget('Mega_Menu_Widget');
}
add_action( 'widgets_init', 'remove_unsupported_widget' );

// Add custom Mega Menu font weight
function megamenu_add_font_weights($weights) {
  $weights['500'] = "Medium (500)";
  return $weights;
}
add_filter('megamenu_font_weights', 'megamenu_add_font_weights');

// Custom Site Origin - css
function load_custom_wp_admin_style(){
  wp_register_style( 'custom_wp_admin_css', get_bloginfo('stylesheet_directory') . '/builder.css', false, '1.0.0' );
  wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

/*------------------------------------*\
	Register SO Custom widget & groups
\*------------------------------------*/
// Register SO Custom widget
function add_so_custom_widgets_collection($folders){
  $folders[] = get_template_directory() . '/soWidgets/'; // important: Slash on end string is required
  return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_so_custom_widgets_collection');

// Add new SO widget group
function pa_other_widgets($tabs) {
  $tabs[] = array(
  'title' => __('PA other widgets', 'siteorigin-panels'),
  'filter' => array(
      'groups' => array('pa_other_widgets')
  )
  );

  return $tabs;
}
add_action('siteorigin_panels_widget_dialog_tabs', 'pa_other_widgets');

function pa_slider_widgets($tabs) {
  $tabs[] = array(
  'title' => __('PA Sliders', 'siteorigin-panels'),
  'filter' => array(
      'groups' => array('pa_slider_widgets')
  )
  );

  return $tabs;
}
add_action('siteorigin_panels_widget_dialog_tabs', 'pa_slider_widgets');

function pa_page_top_widgets($tabs) {
  $tabs[] = array(
  'title' => __('PA Page tops', 'siteorigin-panels'),
  'filter' => array(
      'groups' => array('pa_tops_widgets')
  )
  );

  return $tabs;
}
add_action('siteorigin_panels_widget_dialog_tabs', 'pa_page_top_widgets');

function pa_contact_widgets($tabs) {
  $tabs[] = array(
  'title' => __('PA Contact us', 'siteorigin-panels'),
  'filter' => array(
      'groups' => array('pa_contact_widgets')
  )
  );

  return $tabs;
}
add_action('siteorigin_panels_widget_dialog_tabs', 'pa_contact_widgets');

function pa_banner_widgets($tabs) {
    $tabs[] = array(
    'title' => __('PA banner widgets', 'siteorigin-panels'),
    'filter' => array(
        'groups' => array('pa_banner_widgets')
    )
    );

    return $tabs;
  }
  add_action('siteorigin_panels_widget_dialog_tabs', 'pa_banner_widgets');


// Add class img-fluid to all uploaded images
function pa_charts_widgets($tabs) {
  $tabs[] = array(
  'title' => __('PA Charts', 'siteorigin-panels'),
  'filter' => array(
      'groups' => array('pa_charts_widgets')
    )
  );
  return $tabs;
}
add_action('siteorigin_panels_widget_dialog_tabs', 'pa_charts_widgets');

function pa_form_widgets($tabs) {
    $tabs[] = array(
    'title' => __('PA Contact Forms', 'siteorigin-panels'),
    'filter' => array(
        'groups' => array('pa_form_widgets')
    )
    );

    return $tabs;
  }
  add_action('siteorigin_panels_widget_dialog_tabs', 'pa_form_widgets');

// Add class img-fluid to all uploaded images
function wpse302130_add_image_class ($class){
    $class .= ' img-fluid';
    return $class;
    }

add_filter('get_image_tag_class','wpse302130_add_image_class');
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {

// loop
foreach( $items as &$item ) {

		// vars
    $icon = get_field('icon', $item);
    $iconHover = get_field('icon_hover', $item);

		// append icon
		if( $icon ) {

			$item->title = '<span class="mm-custom-icon mm-custom-icon-normal"><img src="'.$icon['url'].'" class="pa-menu-icon" /></span><span class="mm-custom-icon mm-custom-icon-hov"><img src="'.$iconHover['url'].'" class="pa-menu-icon" /></span>' . $item->title;
			// <i class="fa fa-'.$icon.'"></i>
		}

}

	// return
	return $items;

}

// Add TinyMCE custom dropdown
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );
function my_mce_before_init( $settings ) {
    $style_formats = array(
            array(
                    'title' => 'font 40 (BATS chart)',
                    'inline' => 'span',
                    'classes' => 'pa-font40-bats',
            ),
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

// Register Press releases Custom Post Type
function press() {

	$labels = array(
		'name'                  => _x( 'Press releases', 'Post Type General Name', 'pa' ),
		'singular_name'         => _x( 'Press releases', 'Post Type Singular Name', 'pa' ),
		'menu_name'             => __( 'Press releases', 'pa' ),
		'name_admin_bar'        => __( 'Press releases', 'pa' ),
		'archives'              => __( 'Item Archives', 'pa' ),
		'attributes'            => __( 'Item Attributes', 'pa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'pa' ),
		'all_items'             => __( 'All Items', 'pa' ),
		'add_new_item'          => __( 'Add New Item', 'pa' ),
		'add_new'               => __( 'Add New', 'pa' ),
		'new_item'              => __( 'New Item', 'pa' ),
		'edit_item'             => __( 'Edit Item', 'pa' ),
		'update_item'           => __( 'Update Item', 'pa' ),
		'view_item'             => __( 'View Item', 'pa' ),
		'view_items'            => __( 'View Items', 'pa' ),
		'search_items'          => __( 'Search Item', 'pa' ),
		'not_found'             => __( 'Not found', 'pa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pa' ),
		'featured_image'        => __( 'Featured Image', 'pa' ),
		'set_featured_image'    => __( 'Set featured image', 'pa' ),
		'remove_featured_image' => __( 'Remove featured image', 'pa' ),
		'use_featured_image'    => __( 'Use as featured image', 'pa' ),
		'insert_into_item'      => __( 'Insert into item', 'pa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'pa' ),
		'items_list'            => __( 'Items list', 'pa' ),
		'items_list_navigation' => __( 'Items list navigation', 'pa' ),
		'filter_items_list'     => __( 'Filter items list', 'pa' ),
	);
	$args = array(
		'label'                 => __( 'Press releases', 'pa' ),
		'description'           => __( 'Post Type Description', 'pa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'press', $args );

}
add_action( 'init', 'press', 0 );


// Register Insights Custom Post Type
function insights() {

	$labels = array(
		'name'                  => _x( 'Insights', 'Post Type General Name', 'pa' ),
		'singular_name'         => _x( 'Insight', 'Post Type Singular Name', 'pa' ),
		'menu_name'             => __( 'Insights', 'pa' ),
		'name_admin_bar'        => __( 'Insights', 'pa' ),
		'archives'              => __( 'Item Archives', 'pa' ),
		'attributes'            => __( 'Item Attributes', 'pa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'pa' ),
		'all_items'             => __( 'All Items', 'pa' ),
		'add_new_item'          => __( 'Add New Item', 'pa' ),
		'add_new'               => __( 'Add New', 'pa' ),
		'new_item'              => __( 'New Item', 'pa' ),
		'edit_item'             => __( 'Edit Item', 'pa' ),
		'update_item'           => __( 'Update Item', 'pa' ),
		'view_item'             => __( 'View Item', 'pa' ),
		'view_items'            => __( 'View Items', 'pa' ),
		'search_items'          => __( 'Search Item', 'pa' ),
		'not_found'             => __( 'Not found', 'pa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pa' ),
		'featured_image'        => __( 'Featured Image', 'pa' ),
		'set_featured_image'    => __( 'Set featured image', 'pa' ),
		'remove_featured_image' => __( 'Remove featured image', 'pa' ),
		'use_featured_image'    => __( 'Use as featured image', 'pa' ),
		'insert_into_item'      => __( 'Insert into item', 'pa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'pa' ),
		'items_list'            => __( 'Items list', 'pa' ),
		'items_list_navigation' => __( 'Items list navigation', 'pa' ),
		'filter_items_list'     => __( 'Filter items list', 'pa' ),
	);
	$args = array(
		'label'                 => __( 'Insight', 'pa' ),
		'description'           => __( 'Post Type Description', 'pa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
		'taxonomies'            => array( 'type', 'post_tag', 'topic' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'insights', $args );

}
add_action( 'init', 'insights', 0 );

// Create custom Topics taxonomy for Insights

add_action( 'init', 'create_topics_taxonomy', 0 );

function create_topics_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Topics', 'taxonomy general name' ),
    'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Topics' ),
    'popular_items' => __( 'Popular Topics' ),
    'all_items' => __( 'All Topics' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Topic' ),
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Add New Topic' ),
    'new_item_name' => __( 'New Topic Name' ),
    'separate_items_with_commas' => __( 'Separate topics with commas' ),
    'add_or_remove_items' => __( 'Add or remove topics' ),
    'choose_from_most_used' => __( 'Choose from the most used topics' ),
    'menu_name' => __( 'Topics' ),
  );

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('topics','insights',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  ));
}

// Create custom Type taxonomy for Insights

add_action( 'init', 'create_type_taxonomy', 0 );

function create_type_taxonomy() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'popular_items' => __( 'Popular Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Type' ),
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'separate_items_with_commas' => __( 'Separate types with commas' ),
    'add_or_remove_items' => __( 'Add or remove types' ),
    'choose_from_most_used' => __( 'Choose from the most used types' ),
    'menu_name' => __( 'Types' ),
  );

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('types','insights',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
}


// Register Careers Custom Post Type and taxonomies
add_action( 'init', 'register_careers');
function register_careers() {

    $labels = array(
        'name'                  => _x( 'Careers', 'Post Type General Name', 'pa' ),
        'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'pa' ),
        'menu_name'             => __( 'Careers', 'pa' ),
        'name_admin_bar'        => __( 'Careers', 'pa' ),
        'archives'              => __( 'Item Archives', 'pa' ),
        'attributes'            => __( 'Item Attributes', 'pa' ),
        'parent_item_colon'     => __( 'Parent Item:', 'pa' ),
        'all_items'             => __( 'All Items', 'pa' ),
        'add_new_item'          => __( 'Add New Item', 'pa' ),
        'add_new'               => __( 'Add New', 'pa' ),
        'new_item'              => __( 'New Item', 'pa' ),
        'edit_item'             => __( 'Edit Item', 'pa' ),
        'update_item'           => __( 'Update Item', 'pa' ),
        'view_item'             => __( 'View Item', 'pa' ),
        'view_items'            => __( 'View Items', 'pa' ),
        'search_items'          => __( 'Search Item', 'pa' ),
        'not_found'             => __( 'Not found', 'pa' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'pa' ),
        'featured_image'        => __( 'Featured Image', 'pa' ),
        'set_featured_image'    => __( 'Set featured image', 'pa' ),
        'remove_featured_image' => __( 'Remove featured image', 'pa' ),
        'use_featured_image'    => __( 'Use as featured image', 'pa' ),
        'insert_into_item'      => __( 'Insert into item', 'pa' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'pa' ),
        'items_list'            => __( 'Items list', 'pa' ),
        'items_list_navigation' => __( 'Items list navigation', 'pa' ),
        'filter_items_list'     => __( 'Filter items list', 'pa' ),
    );
    $args = array(
        'label'                 => __( 'Career', 'pa' ),
        'description'           => __( 'Post Type Description', 'pa' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
        'taxonomies'            => array( 'careers_path', 'careers_offices', 'careers_experience' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'careers', $args );

    $labels = array(
        'name' => _x( 'Path', 'taxonomy general name' ),
        'singular_name' => _x( 'Path', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Paths' ),
        'popular_items' => __( 'Popular Paths' ),
        'all_items' => __( 'All Paths' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Path' ),
        'update_item' => __( 'Update Path' ),
        'add_new_item' => __( 'Add New Path' ),
        'new_item_name' => __( 'New Path Name' ),
        'separate_items_with_commas' => __( 'Separate Paths with commas' ),
        'add_or_remove_items' => __( 'Add or remove Paths' ),
        'choose_from_most_used' => __( 'Choose from the most used Paths' ),
        'menu_name' => __( 'Paths' ),
    );
    register_taxonomy('careers_path','careers',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'careers-path' ),
    ));

    $labels = array(
        'name' => _x( 'Office', 'taxonomy general name' ),
        'singular_name' => _x( 'Office', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Offices' ),
        'popular_items' => __( 'Popular Offices' ),
        'all_items' => __( 'All Offices' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Office' ),
        'update_item' => __( 'Update Office' ),
        'add_new_item' => __( 'Add New Office' ),
        'new_item_name' => __( 'New Office Name' ),
        'separate_items_with_commas' => __( 'Separate Offices with commas' ),
        'add_or_remove_items' => __( 'Add or remove Office' ),
        'choose_from_most_used' => __( 'Choose from the most used Offices' ),
        'menu_name' => __( 'Offices' ),
    );
    register_taxonomy('careers_offices','careers',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'careers-office' ),
    ));

    $labels = array(
        'name' => _x( 'Experience', 'taxonomy general name' ),
        'singular_name' => _x( 'Experience', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Experiences' ),
        'popular_items' => __( 'Popular Experiences' ),
        'all_items' => __( 'All Experiences' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Experience' ),
        'update_item' => __( 'Update Experience' ),
        'add_new_item' => __( 'Add New Experience' ),
        'new_item_name' => __( 'New Experience Name' ),
        'separate_items_with_commas' => __( 'Separate Experiences with commas' ),
        'add_or_remove_items' => __( 'Add or remove Experiences' ),
        'choose_from_most_used' => __( 'Choose from the most used Experiences' ),
        'menu_name' => __( 'Experiences' ),
    );
    register_taxonomy('careers_experience','careers',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'careers-experience' ),
    ));

}

// Register Events Custom Post Type
function events() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'pa' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'pa' ),
		'menu_name'             => __( 'Events', 'pa' ),
		'name_admin_bar'        => __( 'Events', 'pa' ),
		'archives'              => __( 'Item Archives', 'pa' ),
		'attributes'            => __( 'Item Attributes', 'pa' ),
		'parent_item_colon'     => __( 'Parent Item:', 'pa' ),
		'all_items'             => __( 'All Items', 'pa' ),
		'add_new_item'          => __( 'Add New Item', 'pa' ),
		'add_new'               => __( 'Add New', 'pa' ),
		'new_item'              => __( 'New Item', 'pa' ),
		'edit_item'             => __( 'Edit Item', 'pa' ),
		'update_item'           => __( 'Update Item', 'pa' ),
		'view_item'             => __( 'View Item', 'pa' ),
		'view_items'            => __( 'View Items', 'pa' ),
		'search_items'          => __( 'Search Item', 'pa' ),
		'not_found'             => __( 'Not found', 'pa' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pa' ),
		'featured_image'        => __( 'Featured Image', 'pa' ),
		'set_featured_image'    => __( 'Set featured image', 'pa' ),
		'remove_featured_image' => __( 'Remove featured image', 'pa' ),
		'use_featured_image'    => __( 'Use as featured image', 'pa' ),
		'insert_into_item'      => __( 'Insert into item', 'pa' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'pa' ),
		'items_list'            => __( 'Items list', 'pa' ),
		'items_list_navigation' => __( 'Items list navigation', 'pa' ),
		'filter_items_list'     => __( 'Filter items list', 'pa' ),
	);
	$args = array(
		'label'                 => __( 'Insight', 'pa' ),
		'description'           => __( 'Post Type Description', 'pa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'events', 0 );

/**
* Add an automatic default custom taxonomy for custom post type.
* If no taxonomy is set, the post will be sorted as “draft” and won’t return an offset error.
*
*/
function set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status && $post->post_type === 'insights' ) {
        $defaults = array(
            'post_tag' => array( 'draft' ),
            'topics' => array( 'draft' ),
            'types' => array( 'draft' ),
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'set_default_object_terms', 0, 2 );


add_filter('redirection_role', 'change_redirection_role', 10, 1);

function change_redirection_role($role) {

    $cap = 'edit_redirections';
    
    return $cap;
}

add_action( 'admin_init', 'subscriber_remove_admin_read' );
function subscriber_remove_admin_read(){
	$role = get_role( 'subscriber' );
	$role->remove_cap( 'read' );
}

add_action('wp_head','subscriber_remove_admin_bar');
function subscriber_remove_admin_bar() {
	if (current_user_can('subscriber')) {
		add_filter('show_admin_bar','__return_false');
	}
}