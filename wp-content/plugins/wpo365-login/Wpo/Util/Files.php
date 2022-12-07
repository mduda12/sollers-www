<?php

    namespace Wpo\Util;
    
    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    use \Wpo\Util\Options;
    use \Wpo\Util\Helpers;
    use \Wpo\Util\Logger;

    include_once( ABSPATH . 'wp-admin/includes/file.php' );
    
    if( !class_exists( '\Wpo\Util\Files' ) ) {

        class Files { 

            private static $instance = null;

            private $wpo365_profile_images_dir = null;

            private $wpo365_profile_images_url = null;

            public $wpo365_profile_images_configured = false;

            protected function __construct() {}

            public static function get_instance() {
                
                if ( empty(self::$instance ) ) {
                    self::$instance = new Files();
                }
 
                return self::$instance;
            }

            public function configure_wpo365_profile_images () {

                if( $this->wpo365_profile_images_configured ) {
                    return true;
                }

                global $wp_filesystem;
                
                if( false === ( $credentials = request_filesystem_credentials('') ) || !WP_Filesystem( $credentials ) ) 
                {
                    Logger::write_log( 'ERROR', 'Missing / incorrect credentials to write to the file system' );
                    $this->wpo365_profile_images_configured = false;
                    return false;
                }
                
                $upload_dir = wp_upload_dir();
                $this->wpo365_profile_images_dir = trailingslashit( $upload_dir[ 'basedir' ] ) . 'wpo365/profile-images/'; // C:\path\to\wordpress\wp-content\uploads\wpo365\profile-images\
                
                if( !$wp_filesystem->mkdir( $this->wpo365_profile_images_dir, FS_CHMOD_DIR ) && !wp_mkdir_p( $this->wpo365_profile_images_dir ) ) {
                    Logger::write_log( 'DEBUG', 'Files service could not create requested target directory ' . $this->wpo365_profile_images_dir );
                    $this->wpo365_profile_images_configured = false;
                    return false;
                }
                
                $this->wpo365_profile_images_url = trailingslashit( $upload_dir[ 'baseurl' ] ) . 'wpo365/profile-images/'; // http://example.com/wp-content/uploads/wpo365/profile-images/

                Logger::write_log( 'DEBUG', 'Files service has been configured successfully' );
                $this->wpo365_profile_images_configured = true;
                return true;
            }

            public function get_wpo365_profile_images_dir() {
                return $this->wpo365_profile_images_dir;
            }

            public function get_wpo365_profile_images_url() {
                return $this->wpo365_profile_images_url;
            }

            public function save_wpo365_profile_image( $path, $file_content ) {
                
                global $wp_filesystem;

                if( $this->wpo365_profile_images_configured ) {
                    Logger::write_log( 'DEBUG', 'Trying to write a file to the file system' );
                    return $wp_filesystem->put_contents( $path, $file_content, FS_CHMOD_FILE );
                }
                
                return false;
            }
        }
    }
