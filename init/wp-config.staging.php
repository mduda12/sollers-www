<?php
/**
 * Development environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment 
 * in this file.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    2.0.0
 * @author     Studio 24 Ltd  <hello@studio24.net>
 */
  

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress .*/
define( 'DB_NAME', 'sollers_dev' );

/** MySQL database username */
define( 'DB_USER', 'promo' );

/** MySQL database password */
define( 'DB_PASSWORD', 'MVan5Biggj' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** MySQL database password - set in wp-config.local.php */

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL);
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define( 'DISALLOW_FILE_EDIT', true );
