<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'quizzerDBj27aa');

/** MySQL database username */
define( 'DB_USER', 'quizzerDBj27aa');

/** MySQL database password */
define( 'DB_PASSWORD', 'lGJM477ADG');

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY', 'hVOGC81:[3}>,@zvnjgYUQMJB73>,^zvrnjcYUQIFB7}>,$yvnjfbUQMI}>|@zv');
define( 'SECURE_AUTH_KEY', '3{yurjfbXQMIE73{,^$yqnjfXTQMEA>,!zvrngcYUNJFB30}>^@zvnjgcUQMJB73');
define( 'LOGGED_IN_KEY', '>^yvrnfbYUMIE73{,^$yrnjfXUQMEA73{<,okgcURNJF740},!@zrnkgYUQNJB7');
define( 'NONCE_KEY', 'PH96;]#*+xtmieWSPLD952]#_+xtpieWSOLD9<.+yuqifbTPLIA62;<.*+uqmebXT');
define( 'AUTH_SALT', 'eTPHDA6;]#.+xtqieaWPLHD62;].*+xpmieWSPLD952;#_*jfbTPMIE62{.*+yqm');
define( 'SECURE_AUTH_SALT', 'WLH952;#_*xtpleaWSLHD91;]#~+xtlheaSOKHD51;]_~-ibXTPHEA6;]<.+xumie');
define( 'LOGGED_IN_SALT', 'LD62;].*+tpmiaWSPHD952]#_*xtpieaWOLHD91;]#~+xtlheaEA62;<.*+uqmibX');
define( 'NONCE_SALT', 'MALD95;]#_+xtlheaWOKHD51;]_~-xplhdWSOKD951:#_~-tplhZWDA2;]<*+xtmi');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
