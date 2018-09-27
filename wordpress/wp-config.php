<?php
define('WP_AUTO_UPDATE_CORE', false);// This setting was defined by WordPress Toolkit to prevent WordPress auto-updates. Do not change it to avoid conflicts with the WordPress Toolkit auto-updates feature.
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
define('DB_NAME', 'wordpress_2');

/** MySQL database username */
define('DB_USER', 'wordpress_0');

/** MySQL database password */
define('DB_PASSWORD', 'pkK5wBO2!0');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'nZ5|15T|6%_6NOegt%R#]Fx2a]*U7ep04Qn)@8Tes9O~q0#46PyM1k30[TPwn1kH');
define('SECURE_AUTH_KEY', '8;IY433)!J8&zMy787i_&PA14z0qy5Rs&pbA2Co!EFGK~tlhZJ(%JUAK9A#)w#cO');
define('LOGGED_IN_KEY', '[YU5[ec1Ha4NYv]y)SjqaOE:L@*6]]x~Iv58&2_1(5T:0q1kg7|&2/)SilG*zD/+');
define('NONCE_KEY', '6yDj3w/!;%_7L8W#31h9)o(ts3MNzQ[e3I|FQi*nEc1jG|67690@3@i31)yJ6X)&');
define('AUTH_SALT', 'dT~46wWw7ow-5WDM_laRxXnMrz;:a0hoAPkLK@[0qP1r|V3PmFb81]Qe-~p;Cu0/');
define('SECURE_AUTH_SALT', 'p%!T6E9vx70XW!x_Hj*J0Srv4D16!7%#A47aAB-4WF!k[[XvVXvVnn:-86XeNf~B');
define('LOGGED_IN_SALT', '7GF*dZA/U97!7E&v9-4hk3044&(7@)+g2*42:%W*jO9N1z*0(-Z45(J!mr53W]WE');
define('NONCE_SALT', '3!*5c4*1:%_q!5:j3|0rtd@TE~~7@tFqsDRL)4[cIbh[ji~9UUW+n2/%DlhR*0*]');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '0dOE3_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
