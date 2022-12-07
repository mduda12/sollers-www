<?php

    namespace Wpo;

    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    use \Wpo\Util\Files;
    use \Wpo\Util\Logger;
    use \Wpo\Util\Helpers;
    use \Wpo\Util\Request;
    use \Wpo\Aad\Auth;
    
    if( !class_exists( '\Wpo\Wpo365_Login' ) ) {

        class Wpo365_Login {

            private static $instances = array();

            private $services = array();

            public static function getInstance( $id ) {
                
                if( !array_key_exists( $id, self::$instances ) ) {
                    self::$instances[ $id ] = new Wpo365_Login();
                }

                return self::$instances[ $id ];
            }

            private function __construct() {
                $this->services[] = Request::get_instance( $_GET[ 'WPO365_REQUEST_ID' ] );
                $this->add_actions();
                $this->add_filters();
            }

            /**
             * Once we are sure our Redux options are loaded
             * 
             * @since 4.0
             * 
             * @return void
             */
            public function init() {
                $init_func = function() {
                    // Cache the file system helper
                    $this->services[] = Files::get_instance();

                    // Start validating the session as soon as all plugins are loaded
                    Auth::validate_current_session();

                    // Do super admin stuff
                    if( is_admin() && is_super_admin() ) {
                        // Check plugin version
                        Helpers::check_version();
                    }
                };

                if( \Wpo\Util\Options::get_global_boolean_var( 'validate_on_plugins_loaded' ) ) {
                    $init_func();
                }
                else {
                    add_action( 'init', $init_func, 0, 0 );
                }
            }

            /**
             * Add all WP actions
             * 
             * @since 4.0
             * 
             * @return void
             */
            private function add_actions() {
                // Add and hide wizard (page)
                add_action( 'admin_menu', '\Wpo\Pages\Wizard_Page::add_management_page' );
                add_action( 'network_admin_menu', '\Wpo\Pages\Wizard_Page::add_management_page' );

                // Configure the options
                add_action( 'plugins_loaded', array( $this, 'init' ), 1, 0 );

                // Ensure session is valid and remains valid
                add_action( 'destroy_wpo365_session', '\Wpo\Aad\Auth::destroy_session' );

                // Prevent email address update
                add_action( 'personal_options_update', '\Wpo\User\User_Manager::prevent_email_change', 10, 1 );

                // Show admin notification when WPO365 not properly configured
                add_action( 'admin_notices', '\Wpo\Util\Helpers::show_admin_notices', 10, 0 );
                add_action( 'network_admin_notices', '\Wpo\Util\Helpers::show_admin_notices', 10, 0 );
                add_action( 'admin_init', '\Wpo\Util\Helpers::dismiss_admin_notices', 10, 0 );

                // Add short code(s)
                add_action( 'init', 'Wpo\Util\Helpers::ensure_pintra_short_code' );

                // Wire up AJAX backend services
                add_action( 'wp_ajax_get_tokencache', '\Wpo\API\Services::get_tokencache' );
                add_action( 'wp_ajax_delete_tokens', '\Wpo\API\Services::delete_tokens' );
                add_action( 'wp_ajax_get_settings', '\Wpo\API\Services::get_settings' );
                add_action( 'wp_ajax_update_settings', '\Wpo\API\Services::update_settings' );
                add_action( 'wp_ajax_get_log', '\Wpo\API\Services::get_log' );
                add_action( 'wp_ajax_get_self_test_results', '\Wpo\API\Services::get_self_test_results' );

                // Flush log on shutdown
                add_action( 'shutdown', '\Wpo\Util\Logger::flush_log' );

                // Add pintraredirectjs
                add_action( 'wp_enqueue_scripts', '\Wpo\Util\Helpers::enqueue_pintra_redirect', 10, 0 );
                add_action( 'login_enqueue_scripts', '\Wpo\Util\Helpers::enqueue_pintra_redirect', 10, 0 );
                add_action( 'admin_enqueue_scripts', '\Wpo\Util\Helpers::enqueue_pintra_redirect', 10, 0 );
            }

            /**
             * Add all WP filters
             * 
             * @since 4.0
             * 
             * @return void
             */
            private function add_filters() {
                // Only allow password changes for non-O365 users and only when already logged on to the system
                add_filter( 'show_password_fields',  '\Wpo\User\User_Manager::show_password_fields', 10, 2 );
                add_filter( 'allow_password_reset', '\Wpo\User\User_Manager::allow_password_reset', 10, 2 );
                    
                // Enable login message output
                add_filter( 'login_message', '\Wpo\Util\Error_Handler::check_for_login_messages' );

                // Add custom wp query vars
                add_filter( 'query_vars', '\Wpo\Util\Helpers::add_query_vars_filter' );

                // Show settings link
                add_filter( ( is_network_admin() ? 'network_admin_' : '' ) . 'plugin_action_links_' . $GLOBALS[ 'WPO365_PLUGIN' ], 
                    '\Wpo\Util\Helpers::get_configuration_action_link', 10, 1 );

                // Filter to update the redirect url
                add_filter( 'wpo_redirect_url', 'Wpo\Util\Helpers::get_redirect_url', 10, 1 );
            }
        }
    }