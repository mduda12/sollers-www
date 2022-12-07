<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file.
 * 
 * Please note if you add constants in this file (i.e. define statements) 
 * these cannot be overridden in environment config files so make sure these are only set once.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    2.0.0
 * @author     Studio 24 Ltd  <hello@studio24.net>
 */
  

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'LEwwy@.|OM<&{Zh;6CFPsiFZh d6l$ZoK1/LY0HgjSk6LR!,ZL=c(.V*Ch6J>Ue3' );
define( 'SECURE_AUTH_KEY',  '7h$OU<C=rJB>tuD`3-6=N+Sf8>2Gxy0xTLpTfY<[8c1x_r5-Z_nE|wb5M={(Z0[^' );
define( 'LOGGED_IN_KEY',    'lhP2p..,X(sRX[3NY(QxVEqTt$y4P!rw6)UcI[F}k}J1#vIdU3#_`nnG,:iNM#pq' );
define( 'NONCE_KEY',        'Uha{7(F(p36689`ivVOMob4.Q[Jp3r4zBO+6j/O,bY?4|+[bfpPbe_,1vN)?GmpP' );
define( 'AUTH_SALT',        'fAb<!9e)hMsb*>_5YU8MF0BfjZ&!p|0ofg-ENF-k&R:+*[o7{tE/y8  Ym2}RgQ`' );
define( 'SECURE_AUTH_SALT', 'b1]*AMN;B(G>|OzP0g+V_&?vdy/Va{dEqwOARW.hDg8>Z0hG]OtQ6WK1T.6RRwAE' );
define( 'LOGGED_IN_SALT',   'MrEPj|p-gc<?[:B6t;%{{*/=#zRcJI(j:mL<[85v[5(dAdkI!Lf_T2+-uwgiBJ(<' );
define( 'NONCE_SALT',       'wm}~%p8Mhve/bOs]QJ2/AtB(wv!d1b2`s/ yh9 oq(Rr ;tT-e4-d@}t]xP>C|P^' );
    
    

/**#@-*/


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * Increase memory limit. 
 */
define('WP_MEMORY_LIMIT', '128M');


