<?php
/**
 * The plugin bootstrap file
 *
 * @package           jira-connect
 *
 * @wordpress-plugin
 * Plugin Name:       Jira Connect
 * Plugin URI:
 * Description:       Sollers Jira integration
 * Version:           0.4.11
 * Author:            Piotr Karecki
 * Author URI:
 * License:           proprietary
 */

use JiraConnect\Plugin;

/**
 * If this file is called directly, abort.
 */
if (!defined('WPINC')) {
    die;
}

/**
 * Require composer packages
 */
@include_once __DIR__ . '/vendor/autoload.php';
if(!class_exists( 'JiraConnect\\Plugin')) {
    return;
}

/**
 * Set debug mode
 */
Plugin::setDebugMode(false);

/**
 * Set file path
 */
Plugin::setPluginEntryFile(__FILE__);

/**
 * Begins execution of the plugin.
 */
Plugin::runInstance();