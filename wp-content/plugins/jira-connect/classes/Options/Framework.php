<?php

namespace JiraConnect\Options;

use DI\Container;
use JiraConnect\Plugin;

/**
 * @package   Options_Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2016 WP Theming
 */
class Framework {

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since 1.7.0
     * @type string
     */
    const VERSION = '1.8.6';

    /**
     * Initialize the plugin.
     *
     * @since 1.7.0
     */
    public function init() {
        //Silence
    }

    public static $options = [];

    private $options_key = 'jira-connect';

    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
	    $this->set_theme_option();
    }

    public function run() {
        // Load translation files
        $plugin = $this->container->get(Plugin::class);
        load_plugin_textdomain('options-framework', false, dirname(plugin_basename($plugin->getPluginEntryFile())) . '/languages/');
    }


    /**
     * Wrapper for optionsframework_options()
     *
     * Allows for manipulating or setting options via 'of_options' filter
     * For example:
     *
     * <code>
     * add_filter( 'of_options', function( $options ) {
     *     $options[] = array(
     *         'name' => 'Input Text Mini',
     *         'desc' => 'A mini text input field.',
     *         'id' => 'example_text_mini',
     *         'std' => 'Default',
     *         'class' => 'mini',
     *         'type' => 'text'
     *     );
     *
     *     return $options;
     * });
     * </code>
     *
     * Also allows for setting options via a return statement in the
     * options.php file.  For example (in options.php):
     *
     * <code>
     * return array(...);
     * </code>
     *
     * @return array (by reference)
     */
    public static function &_optionsframework_options() {
        return self::$options;
    }


    /**
     * Sets option defaults
     *
     * @since 1.7.0
     */
    public function set_theme_option() {
        // Load settings
        $optionsframework_settings = get_option($this->options_key);

	    $default_themename = get_option('stylesheet');
	    $default_themename = preg_replace("/\W/", "_", strtolower($default_themename));
	    $default_themename = 'pkarecki-experts_' . $default_themename;
	    if (isset($optionsframework_settings['id'])) {
		    if ($optionsframework_settings['id'] !== $default_themename) {
			    $optionsframework_settings['id'] = $default_themename;
			    update_option($this->options_key, $optionsframework_settings);
		    }
	    } else {
		    $optionsframework_settings['id'] = $default_themename;
		    update_option($this->options_key, $optionsframework_settings);
	    }
    }

    /**
     * Helper function to add options
     *
     * @param $arr
     *
     * @author Piotr Karecki <pkarecki@gmail.com>
     */
    public function add_option($arr) {
        array_push(Framework::$options, $arr);
    }


    /**
     * Helper function to return the theme option value.
     * If no value has been saved, it returns $default.
     * Needed because options are saved as serialized strings.
     *
     * Not in a class to support backwards compatibility in themes.
     *
     * @param $name
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    public function get($name, $default = null) {
        $config = get_option($this->options_key);

        $name = strtolower($name);
        if (!isset($config['id'])) {
            return $default;
        }

        $options = get_option($config['id']);

        if (isset($options[ $name ])) {
            return $options[ $name ];
        }

        $options = Framework::$options;
        $index = array_search($name, array_column($options, 'id'));
        if ($index && isset($options[ $index ]['std'])) {
            return $options[ $index ]['std'];
        }

        return $default;
    }
}
