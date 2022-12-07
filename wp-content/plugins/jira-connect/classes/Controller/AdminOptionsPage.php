<?php

namespace JiraConnect\Controller;

use JiraConnect\Core\ControllerCore;
use JiraConnect\Core\Registerer;
use JiraConnect\Options\Framework;
use JiraConnect\Options\Generator;
use JiraConnect\Plugin;

/**
 * @package   Options_Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2016 WP Theming
 */
class AdminOptionsPage extends ControllerCore {

    /**
     * Page hook for the options screen
     *
     * @since 1.7.0
     * @type string
     */
    protected $options_screen = null;

    private $registerer;

    private $optionsFramework;

    private $plugin_file;

    private $options_key = 'jira-connect';

    /**
     * Hook in the scripts and styles
     *
     * @since 1.7.0
     */
    public function init() {
        //Silence
    }

    public function __construct(Plugin $plugin, Framework $optionsFramework, Registerer $registerer) {
        $this->optionsFramework = $optionsFramework;
        $this->plugin_file = $plugin->getPluginEntryFile();
        $this->registerer = $registerer;
	    $this->define_hooks($this->registerer);
	    $this->define_options($this->optionsFramework);
    }

    public function submenu() {
        return [
            'page_title' => 'Jira Connect - Options',
            'menu_title' => 'Options',
            'capability' => 'jira_connect_account',
            'menu_slug' => 'jira_options',
            'parent_slug' => 'jira_main',
        ];
    }

	/**
	 * @param Framework $options
	 */
	private function define_options($options) {
		if (!is_object($options)) {
			return;
		}
		$options->add_option(array(
			'id' => 'jiraConnect-settings',
			'name' => 'Settings',
			'desc' => 'Jira Connection Settings',
			'type' => 'heading'
		));
		$options->add_option([
			'id' => 'jira_baseUrl',
			'name' => 'Base URL',
			'desc' => '',
			'type' => 'text',
			'std' => 'https://jirauat.sollers.eu/'
		]);
		$options->add_option([
			'id' => 'jira_consumerKey',
			'name' => 'Consumer Key',
			'desc' => '',
			'type' => 'text',
			'std' => 'OauthKey'
		]);
		$options->add_option([
			'id' => 'jira_consumerSecret',
			'name' => 'Consumer Secret',
			'desc' => '',
			'type' => 'text',
			'std' => ''
		]);
		if(!Plugin::isDebugMode()) {
			return;
		}
		$options->add_option(array(
			'id' => 'jiraConnect-loader',
			'name' => 'Loader',
			'desc' => 'Hook Loading Configuration',
			'type' => 'heading'
		));
	}

    /**
     * @param Registerer $loader
     *
     * @uses \JiraConnect\Controller\AdminOptionsPage::enqueue_admin_scripts()
     * @uses \JiraConnect\Controller\AdminOptionsPage::enqueue_admin_styles()
     * @uses \JiraConnect\Controller\AdminOptionsPage::settings_init()
     * @uses \JiraConnect\Controller\AdminOptionsPage::optionsframework_admin_bar()
     * @uses \JiraConnect\Controller\AdminOptionsPage::save_options_notice()
     */
    private function define_hooks(Registerer $loader) {
        // Add the required scripts and styles
        $loader->add_action('admin_enqueue_scripts', $this, 'enqueue_admin_styles', 10, 1);
        $loader->add_action('admin_enqueue_scripts', $this, 'enqueue_admin_scripts', 10, 1);

        // Settings need to be registered after admin_init
        $loader->add_action('admin_init', $this, 'settings_init');

        // Displays notice after options save
        $loader->add_action('optionsframework_after_validate', $this, 'save_options_notice');

        // Adds options menu to the admin bar
        //$loader->add_action('wp_before_admin_bar_render', $this, 'optionsframework_admin_bar');


    }

    /**
     * Let's the user know that options aren't available for their theme
     */
    function options_notice() {
        global $pagenow;
        if (!is_multisite() && ($pagenow == 'plugins.php' || $pagenow == 'themes.php')) {
            global $current_user;
            $user_id = $current_user->ID;
            if (!get_user_meta($user_id, 'optionsframework_ignore_notice')) {
                echo '<div class="updated optionsframework_setup_nag"><p>';
                printf(__('Your current theme does not have support for the Options Framework plugin.  <a href="%1$s" target="_blank">Learn More</a> | <a href="%2$s">Hide Notice</a>', 'options-framework'), 'http://wptheming.com/options-framework-plugin', '?optionsframework_nag_ignore=0');
                echo "</p></div>";
            }
        }
    }

    /**
     * Allows the user to hide the options notice
     */
    function options_notice_ignore() {
        global $current_user;
        $user_id = $current_user->ID;
        if (isset($_GET['optionsframework_nag_ignore']) && '0' == $_GET['optionsframework_nag_ignore']) {
            add_user_meta($user_id, 'optionsframework_ignore_notice', 'true', true);
        }
    }

    /**
     * Registers the settings
     *
     * @since 1.7.0
     */
    function settings_init() {
        // Load Options Framework Settings
        $optionsframework_settings = get_option($this->options_key);

        // Registers the settings fields and callback
        if(!empty($optionsframework_settings['id'])) {
	        register_setting($this->options_key, $optionsframework_settings['id'], array($this, 'validate_options'));
        }
    }


    /**
     * Loads the required stylesheets
     *
     * @since 1.7.0
     */
    function enqueue_admin_styles($hook) {
        if (!$this->isCurrentMenuItem($hook)) {
            return;
        }

        wp_enqueue_style(
            'pkarecki-optionsframework',
            plugin_dir_url(($this->plugin_file)) . 'css/optionsframework.css',
            array(),
            Framework::VERSION
        );
        wp_enqueue_style('wp-color-picker');
    }

    /**
     * Loads the required javascript
     *
     * @since 1.7.0
     */
    function enqueue_admin_scripts($hook) {
        if (!$this->isCurrentMenuItem($hook)) {
            return;
        }

        // Enqueue custom option panel JS
        wp_enqueue_script(
            'options-custom',
            plugin_dir_url(($this->plugin_file)) . 'js/options-custom.js',
            array('jquery', 'wp-color-picker'),
            Framework::VERSION
        );

        // Inline scripts from options-interface.php
        add_action('admin_head', array($this, 'of_admin_head'));
    }

    function of_admin_head() {
        // Hook to add custom scripts
        do_action('optionsframework_custom_scripts');
    }

    function page() {
        return $this->options_page();
    }

    private function menu_settings() {
        //return $this->menu();
    }

    /**
     * Builds out the options panel.
     *
     * If we were using the Settings API as it was intended we would use
     * do_settings_sections here.  But as we don't want the settings wrapped in a table,
     * we'll call our own custom optionsframework_fields.  See options-interface.php
     * for specifics on how each individual field is generated.
     *
     * Nonces are provided using the settings_fields()
     *
     * @since 1.7.0
     */
    function options_page() { ?>

        <div id="optionsframework-wrap" class="wrap">

            <?php $menu = $this->menu_settings(); ?>
            <h2><?php echo esc_html($menu['page_title']); ?></h2>

            <h2 class="nav-tab-wrapper">
                <?php echo Generator::optionsframework_tabs(); ?>
            </h2>

            <?php settings_errors('options-framework'); ?>
            <div id="optionsframework-metabox" class="metabox-holder">
                <div id="optionsframework" class="postbox">
                    <form action="options.php" method="post">
                        <?php settings_fields($this->options_key); ?>
                        <?php Generator::optionsframework_fields(); /* Settings */ ?>
                        <div id="optionsframework-submit">
                            <input type="submit" class="button-primary" name="update"
                                   value="<?php esc_attr_e('Save Options', 'options-framework'); ?>"/>
                            <!--input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e('Restore Defaults', 'options-framework'); ?>" onclick="return confirm( '<?php print esc_js(__('Click OK to reset. Any theme settings will be lost!', 'options-framework')); ?>' );" /-->
                            <?php //TODO: Sprawdzić i uruchomić reset ?>
                            <div class="clear"></div>
                        </div>
                    </form>
                </div> <!-- / #container -->
            </div>
            <?php do_action('optionsframework_after'); ?>
        </div> <!-- / .wrap -->

        <?php
    }

    /**
     * Validate Options.
     *
     * This runs after the submit/reset button has been clicked and
     * validates the inputs.
     *
     * @uses $_POST['reset'] to restore default options
     */
    function validate_options($input) {

        /*
         * Restore Defaults.
         *
         * In the event that the user clicked the "Restore Defaults"
         * button, the options defined in the theme's options.php
         * file will be added to the option for the active theme.
         */

        if (isset($_POST['reset'])) {
            add_settings_error(
                'options-framework',
                'restore_defaults',
                __('Default options restored.', 'options-framework'),
                'updated fade'
            );
            return $this->get_default_values();
        }

        /*
         * Update Settings
         *
         * This used to check for $_POST['update'], but has been updated
         * to be compatible with the theme customizer introduced in WordPress 3.4
         */

        $clean = array();
        $options = &Framework::_optionsframework_options();
        foreach ($options as $option) {

            if (!isset($option['id'])) {
                continue;
            }

            if (!isset($option['type'])) {
                continue;
            }

            $id = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($option['id']));

            // Set checkbox to false if it wasn't sent in the $_POST
            if ('checkbox' == $option['type'] && !isset($input[ $id ])) {
                $input[ $id ] = false;
            }

            // Set each item in the multicheck to false if it wasn't sent in the $_POST
            if ('multicheck' == $option['type'] && !isset($input[ $id ])) {
                foreach ($option['options'] as $key => $value) {
                    $input[ $id ][ $key ] = false;
                }
            }

            // For a value to be submitted to database it must pass through a sanitization filter
            if (has_filter('of_sanitize_' . $option['type'])) {
                $clean[ $id ] = apply_filters('of_sanitize_' . $option['type'], $input[ $id ], $option);
            } else {
                if (isset($input[ $id ])) {
                    $clean[ $id ] = $input[ $id ];
                }
            }
        }

        // Hook to run after validation
        do_action('optionsframework_after_validate', $clean);

        return $clean;
    }

    /**
     * Display message when options have been saved
     */

    function save_options_notice() {
        add_settings_error(
            'options-framework',
            'save_options',
            __('Options saved.', 'options-framework'),
            'updated fade'
        );
    }

    /**
     * Get the default values for all the theme options
     *
     * Get an array of all default values as set in
     * options.php. The 'id','std' and 'type' keys need
     * to be defined in the configuration array. In the
     * event that these keys are not present the option
     * will not be included in this function's output.
     *
     * @return array Re-keyed options configuration array.
     *
     */

    function get_default_values() {
        $output = array();
        $config = &Framework::_optionsframework_options();
        foreach ((array) $config as $option) {
            if (!isset($option['id'])) {
                continue;
            }
            if (!isset($option['std'])) {
                continue;
            }
            if (!isset($option['type'])) {
                continue;
            }
            if (has_filter('of_sanitize_' . $option['type'])) {
                $output[ $option['id'] ] = apply_filters('of_sanitize_' . $option['type'], $option['std'], $option);
            }
        }
        return $output;
    }

    /**
     * Add options menu item to admin bar
     */

    function optionsframework_admin_bar() {

        $menu = $this->menu_settings();

        global $wp_admin_bar;

        if ('menu' == $menu['mode']) {
            $href = admin_url('admin.php?page=' . $menu['menu_slug']);
        } else {
            $href = admin_url('themes.php?page=' . $menu['menu_slug']);
        }

        $args = array(
            'parent' => 'appearance',
            'id' => 'of_theme_options',
            'title' => $menu['menu_title'],
            'href' => $href
        );

        $wp_admin_bar->add_menu(apply_filters('optionsframework_admin_bar', $args));
    }

}
