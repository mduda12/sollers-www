<?php

    namespace Wpo\Util;

    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    use \Wpo\Util\Request;

    if( !class_exists( '\Wpo\Util\Logger' ) ) {

        class Logger {
            /**
             * Writes a message to the Wordpress debug.log file
             *
             * @since   1.0
             * 
             * @param   string  level => The level to log e.g. DEBUG or ERROR
             * @param   string  log => Message to write to the log
             */
            public static function write_log( $level, $log ) {
                // Using Options class causes circular reference
                $debug_log = isset( $GLOBALS[ 'wpo365_options' ] ) 
                    && isset( $GLOBALS[ 'wpo365_options' ][ 'debug_log' ] ) 
                    && $GLOBALS[ 'wpo365_options' ][ 'debug_log' ] === true
                        ? true
                        : false;
                
                if( $level == 'DEBUG' && false === $debug_log ) {
                    return; 
                }
                
                $request = Request::get_instance( $_GET[ 'WPO365_REQUEST_ID' ] );
                $request_id = $request->current_request_id();
                $request_log = $request->get_item( 'wpo365_log' );
                
                if( empty( $request_log ) ) {
                    $request_log = array();
                }
                
                $body = is_array( $log ) || is_object( $log ) ? print_r( $log, true ) : $log;
                $now = \DateTime::createFromFormat( 'U.u', number_format( microtime( true ), 6, '.', '' ) );
                $message = '[' . $now->format( 'm-d-Y H:i:s.u' ) . ' | ' . $request_id . '] ' . $level . ' ( ' . phpversion() .' ): ' . $body;

                $request_log[] = $message;
                $request->set_item( 'wpo365_log', $request_log );

                // Once every day a flag - used to show an admin notice - is set in case an error occurred
                if( $level == 'ERROR' && false === get_transient( 'wpo365_has_errors' ) ) {
                    set_transient( 'wpo365_has_errors', date( 'd' ), 172800 );
                }
            }

            /**
             * Writes the log file to the defined output stream
             * 
             * @since 7.11
             * 
             * @return void
             */
            public static function flush_log() {

                $request = Request::get_instance( $_GET[ 'WPO365_REQUEST_ID' ] );
                $request_log = $request->get_item( 'wpo365_log' );

                // Nothing to flush
                if( empty( $request_log ) ) {
                    return;
                }

                $wpo365_log = get_option( 'wpo365_log' );
                
                if( !is_array( $wpo365_log ) ) {
                    $wpo365_log = array();
                }
                
                $wpo365_log = array_merge( $wpo365_log, $request_log );
                $count = sizeof( $wpo365_log );
                
                if( $count > 500 ) {
                    $wpo365_log = array_slice( $wpo365_log, ( $count - 500 ) );
                }
                
                // Store the log in the wp_options table
                update_option( 'wpo365_log', $wpo365_log );
                
                // Still also write it to default debug output
                if( defined( 'WP_DEBUG' ) && constant( 'WP_DEBUG' ) === true ) {
                    
                    foreach( $request_log as $message ) {
                        error_log( $message );
                    }
                }

                $request->remove_item( 'wpo365_log' );
            }
        }
    }

?>