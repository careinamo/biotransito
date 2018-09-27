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
define('DB_NAME', 'wordpress_d3');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY', '&x&%q2!zQ9dJc!5u71e6Z%/x60rSD6:xS3Z2e7FZIr1qc3gBq@WpnS!y(@~#50r#');
define('SECURE_AUTH_KEY', ']r98N0PM@W73r#g7|8Q#tp8FJ(D&yVr%c(]g!fQO#Pl;Ed)4We|e2[tpg&7L;cha');
define('LOGGED_IN_KEY', '@D![8GT@lH:f6/@dA2Qrpx~kwfoH0@67vMf_80Hb0@gPo/m9S3JS8r2Mo2t_G5:2');
define('NONCE_KEY', ']&;:*71wrR8OBvgcIy~3D1%5]%fOrKKi125j[70|MiBYMj5VnF3a&4W~k-e/7!;H');
define('AUTH_SALT', 'p1/64D1&wj]C31279xl9ZNs53Tus0Sv8Y5E@ZVc7s~+OxY651QGw;5e%@q]89497');
define('SECURE_AUTH_SALT', '5L|(u(N#opy6k0%JF/xLw54w~bT(z1@nH[l0Yfo|7I]8:feV6]1V-;M@3ZAHm423');
define('LOGGED_IN_SALT', '&_(iN!~&K5(LTDWe+jL6G00t6GmP5/k!*_0713qivvO1(Mw93QY]9&98gC!xC*0u');
define('NONCE_SALT', 'KSP;]]Lned!n8@f91ao77T%M:HNaP0(Zg1*s8Me5]tt1bw);515U&ogZKXWTz)*0');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'TA5x5_';

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
