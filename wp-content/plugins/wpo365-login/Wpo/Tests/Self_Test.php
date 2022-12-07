<?php

    namespace Wpo\Tests;

    use \Wpo\Aad\Auth;
    use \Wpo\Util\Helpers;
    use \Wpo\Util\Logger;
    use \Wpo\Util\Options;
    use \Wpo\Util\Request;

    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    if( !class_exists( '\Wpo\Tests\Self_Test' ) ) {

        class Self_Test {

            private $test_results = array();

            public function __construct() {
                $this->run_tests();
            }

            public function run_tests() {
                $test_sets = array( new Test_OpenId_Connect() );

                if( Options::get_global_boolean_var( 'test_configuration' ) ) {
                    $test_sets[] = new Test_Configuration();
                }
                
                if( Options::get_global_boolean_var( 'test_access_token' ) ) {
                    $test_sets[] = new Test_Access_Tokens();
                }

                $test_sets[] = $this;

                foreach( $test_sets as $test_set ) {
                    $tests = preg_grep( '/^test_/', get_class_methods( $test_set ) );

                    foreach( $tests as $test ) {
                        $this->test_results[] = $test_set->$test();
                    }
                }

                Helpers::mu_set_transient( 'wpo365_self_test_results', $this->test_results );
            }

            public function test_no_errors() {
                $test_result = new Test_Result( 'Debug log contains no errors', 'Errors', Test_Result::SEVERITY_CRITICAL );
                $test_result->passed = true;

                $request = Request::get_instance( $_GET[ 'WPO365_REQUEST_ID' ] );
                $request_log = $request->get_item( 'wpo365_log' );

                if( !is_array( $request_log ) ) {
                    return $test_result;
                }

                $error_entries = array_filter( $request_log, function( $entry ) {
                    return ( false !== strpos( $entry, ' ERROR ' ) );
                } );

                if( !empty( $error_entries ) ) {
                    $test_result->passed = false;
                    $test_result->message = 'The error log for this self-test request contains errors. Please review the <a href="#debug">debug log</a>.';
                    $test_result->more_info = '';
                }

                return $test_result;
            }
        }
    }