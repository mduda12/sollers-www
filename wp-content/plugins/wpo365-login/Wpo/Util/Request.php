<?php

    namespace Wpo\Util;
    
    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    use \Wpo\Util\Options;
    use \Wpo\Util\Helpers;

    if( !class_exists( '\Wpo\Util\Request' ) ) {

        class Request {

            private static $requests = array();
            
            private $id;

            private $storage = array();

            protected function __construct() {
            }

            public static function get_instance( $id ) {

                if( !array_key_exists( $id, self::$requests ) ) {
                    $request = new Request();
                    $request->id = $id;    
                    self::$requests[ $id ] = $request;
                }

                return self::$requests[ $id ];
            }

            public function current_request_id() {
                return $this->id;
            }

            public function set_item( $key, $value ) {

                if( !is_string( $key ) ) {
                    return false;
                }

                if( empty( $key ) ) {
                    return false;
                }

                $this->storage[ $key ] = $value;

                return true;
            }

            public function get_item( $key ) {

                if( !is_string( $key ) || empty( $key ) ) {
                    return false;
                }

                if( array_key_exists( $key, $this->storage ) ) {
                    return $this->storage[ $key ];
                }

                return false;
            }

            public function remove_item( $key ) {

                if( !is_string( $key ) || empty( $key ) ) {
                    return false;
                }

                if( array_key_exists( $key, $this->storage ) ) {
                    unset( $this->storage[ $key ] );
                    return true;
                }

                return false;
            }

            public function clear() {
                $this->storage = array();
            }
        }
    } 
