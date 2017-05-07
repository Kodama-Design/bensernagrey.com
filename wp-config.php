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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'C:\xampp\htdocs\bensernagrey.com\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'bensernagrey');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ',lF4S!TaDn79*B?$K 82! rGq1TrRh@mJ<x-IIbwEMaXC@k/-j,ss<[C4qpjW?I=');
define('SECURE_AUTH_KEY',  'omIaPxCyueDu(P/*Vd$v20 %xOIc.60XG9p=An=~>iM,Q^@BsTyFM4J}7?ZieP`.');
define('LOGGED_IN_KEY',    'dGN[|.$,a2{t6fP%9^Z)!!UN*b;p9V=!hhY1PVDELAX#5fkb`;]$cK_Pr!hIE0UD');
define('NONCE_KEY',        'W7<ZY F^Uc?rjbH%<2e.;&/6F5-0wCx0)fC8kN)deB8Sm+BEz:h7=KJeVa}e/DD<');
define('AUTH_SALT',        'Awkf=p3&00_]7|rO1-6#;LIf%920suUlvFRS`WGhw3 G{10A=zcj~doIkQlB#UVg');
define('SECURE_AUTH_SALT', ',tC0DxG+3.8;&IyRfCtP@3E&|Nr*;@_4i&;*asA<HnE`jeB#Dl`|c7G#nXz^vm.B');
define('LOGGED_IN_SALT',   'A3X&WiE9KV6aTTTc*?M6h}1x&<q0lRqhNC2p_qXhhe$9e~lVhtnQ}SGi2F_1^0aT');
define('NONCE_SALT',       '2@%RweqL?){/o3$ZWXa+!($VM20s.|ZiP_En3hY2w}Wr{WO5F3/QM;:y*tU.f~/>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
