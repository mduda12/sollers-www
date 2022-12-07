<?php

    namespace Wpo\Tests;

    use \Wpo\Aad\Auth;
    use \Wpo\Util\Options;

    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    if( !class_exists( '\Wpo\Tests\Test_Access_Tokens' ) ) {

        class Test_Access_Tokens {

            private $access_token = null;
            private $static_permissions = array();

            public function test_prefetch_access_token() {
                $test_result = new Test_Result( 'Can fetch access tokens', 'Access Tokens', Test_Result::SEVERITY_LOW );
                $test_result->passed = true;

                $use_v2 = Options::get_global_boolean_var( 'use_v2' );

                if( false === $use_v2 ) {
                    $test_result->passed = false;
                    $test_result->message = "Azure AD v2 not enabled and the self-test does not support Azure AD endpoint v1. Please upgrade your Azure AD App registration and start using Azure AD endpoint v2. Consult the online documentation below for instructions.";
                    $test_result->more_info = 'https://wpo365.helpscoutdocs.com/article/4-upgrade-to-azure-ad-app-registration-v2-0';
                    return $test_result;
                }
                
                if( empty( Options::get_global_string_var( 'application_secret' ) ) ) {
                    $test_result->passed = false;
                    $test_result->message = "An 'Application secret' has not been configured (on the <a href=\"#integration\">Integration</a> tab). Please consult the online documentation using the link below and create an 'Application secret' and update the plugin's configuration.";
                    $test_result->more_info = 'https://www.wpo365.com/application-secret/';
                    return $test_result;
                }

                $this->access_token = Auth::prefetch_bearer_token( 'https://graph.microsoft.com/user.read' );

                if( is_wp_error( $this->access_token ) || !property_exists( $this->access_token, 'access_token' ) ) {
                    $test_result->passed = false;
                    $test_result->message = 'Could not fetch access token. The following error occurred: ' . $this->access_token->get_error_message();
                    $test_result->more_info = '';
                }
                elseif( property_exists( $this->access_token, 'scope' ) ) {
                    $this->static_permissions = explode( ' ', $this->access_token->scope );
                }

                return $test_result;
            }

            public function test_access_token_static_permissions_email() {
                return $this->check_static_permission( 
                    'openid', 
                    Test_Result::SEVERITY_BLOCKING,
                    'and as a result the plugin may not be able to obtain ID tokens from Azure AD' );
            }

            public function test_access_token_static_permissions_openid() {
                return $this->check_static_permission( 
                    'email', 
                    Test_Result::SEVERITY_CRITICAL, 
                    'and as a result the plugin will fail when trying to create a new WordPress user for this Office 365 / Azure AD user.' );
            }

            public function test_access_token_static_permissions_profile() {
                return $this->check_static_permission( 'profile', Test_Result::SEVERITY_CRITICAL );
            }

            public function test_access_token_static_permissions_user_read() {
                return $this->check_static_permission( 'https://graph.microsoft.com/User.Read', Test_Result::SEVERITY_CRITICAL );
            }

            public function test_access_token_static_permissions_user_read_all() {
                return $this->check_static_permission( 
                    'https://graph.microsoft.com/User.Read.All', 
                    Test_Result::SEVERITY_LOW, 
                    'and as a result premium features such as User Synchronization may not work unless you have configured an app-only access token and assigned this permission to the Azure AD App registration used to obtain app-only tokens.', 
                    'https://www.wpo365.com/use-app-only-token/' );
            }

            public function test_access_token_static_permissions_sites_search_all() {
                return $this->check_static_permission( 
                    'https://graph.microsoft.com/Sites.Search.All', 
                    Test_Result::SEVERITY_LOW, 
                    'and as a result the <a href="https://www.wpo365.com/content-by-search/" target="_blank">SharePoint Content by Search app</a> will not work as expected.', 
                    'https://www.wpo365.com/content-by-search/' );
            }

            public function test_access_token_static_permissions_sites_read_all() {
                return $this->check_static_permission( 
                    'https://graph.microsoft.com/Sites.Read.All', 
                    Test_Result::SEVERITY_LOW, 
                    'and as a result the <a href="https://www.wpo365.com/documents/" target="_blank">SharePoint Documents app</a> will not work as expected.', 
                    'https://www.wpo365.com/documents/' );
            }

            public function test_refresh_token() {
                $test_result = new Test_Result( 'Access token contains refresh token', 'Access Tokens', Test_Result::SEVERITY_CRITICAL );
                $test_result->passed = true;

                if( empty( $this->access_token ) ) {
                    $test_result->passed = false;
                    $test_result->message = 'Could not fetch access token -> test skipped';
                    $test_result->more_info = '';
                    return $test_result;
                }

                if( !property_exists( $this->access_token, 'refresh_token' ) ) {
                    $test_result->passed = false;
                    $test_result->message = 'Access token does not contain refresh token. As a result the plugin is not able to request more than 1 access token and therefore subsequent calls to Microsoft Graph for different scopes will fail.';
                    $test_result->more_info = '';
                    return $test_result;
                }

                return $test_result;
            }

            public function test_app_only_application_id() {
                $test_result = new Test_Result( 'App-only application ID has been configured', 'Access Tokens', Test_Result::SEVERITY_LOW );
                $test_result->passed = true;

                $application_id = Options::get_global_string_var( 'app_only_application_id' );

                if( empty( $application_id ) ) {
                    $test_result->passed = false;
                    $test_result->message = "It is recommended to register a secondary App in Azure Active Directory for more advanced scenarios e.g. User Synchronization to restrict permissions otherwise available to all users. Please consult the online documentation for more information.";
                    $test_result->more_info = 'https://www.wpo365.com/use-app-only-token/';
                }
                elseif ( !preg_match( '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $application_id ) ) {
                    $test_result->passed = false;
                    $test_result->message = 'App-only Application ID is not a valid GUID';
                    $test_result->more_info = 'https://www.wpo365.com/use-app-only-token/';
                }

                return $test_result;
            }

            public function test_app_only_application_secret() {
                $test_result = new Test_Result( 'App-only application secret has been configured', 'Access Tokens', Test_Result::SEVERITY_LOW );
                $test_result->passed = true;

                $application_secret = Options::get_global_string_var( 'app_only_application_secret' );

                if( empty( $application_secret ) ) {
                    $test_result->passed = false;
                    $test_result->message = "It is recommended to register a secondary App in Azure Active Directory for more advanced scenarios e.g. User Synchronization to restrict permissions otherwise available to all users. Please consult the online documentation for more information.";
                    $test_result->more_info = 'https://www.wpo365.com/use-app-only-token/';
                }

                return $test_result;
            }

            private function check_static_permission( $permission, $severity, $additional_message = '', $more_info = 'https://www.wpo365.com/azure-application-registration/' ) {
                $test_result = new Test_Result( "Static permission (scope) '$permission' has been configured", 'Access Tokens', $severity );
                $test_result->passed = true;

                if( empty( $this->access_token ) ) {
                    $test_result->passed = false;
                    $test_result->message = 'Could not fetch access token -> test skipped';
                    $test_result->more_info = '';
                    return $test_result;
                }

                if( empty( $this->static_permissions ) ) {
                    $test_result->passed = false;
                    $test_result->message = 'Could not determine static permissions of the current access token -> test skipped';
                    $test_result->more_info = '';
                    return $test_result;
                }

                if( !in_array( $permission, $this->static_permissions ) ) {
                    $test_result->passed = false;
                    $test_result->message = "Static permission '$permission' is not configured for current access token $additional_message";
                    $test_result->more_info = $more_info;
                }

                return $test_result;
            }
        }
    }