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
define('DB_NAME', 'bensernagrey');

/** MySQL database username */
define('DB_USER', 'bensernagrey');

/** MySQL database password */
define('DB_PASSWORD', '2HmGRYa6tJgrdqGv');

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
define('AUTH_KEY',         'X%.raE-G]X?|*Fd[gvSfcCIPL;=-iiV-[<Kiu4r=$we7yg8Bhj7i3{#:CZUd$3|~');
define('SECURE_AUTH_KEY',  '~F2rkE&2@;A7RfMC R#~DJ5El0E#lC5Q?aPj;qnJqS-`c5e*jCA~1tJ+JA[vlbma');
define('LOGGED_IN_KEY',    '8w;1$I3~.}oF?G?^;%}6o?<2sqXA hjiXXAT6?7w?@GnH0tdm(^{1I^/.K4Y0brR');
define('NONCE_KEY',        'ps 7vh>2fw[/Ye/)hMc9XO6z*;M%U5/eL;*H #WJ RmD?m<{==U{%mTuC!AVqj{V');
define('AUTH_SALT',        'gXpzkK@w6|F;<,D@JA|u|M!K[by~h|sCPG#R8+ *0G*Vnshw1QE&{Z22!R1>04f;');
define('SECURE_AUTH_SALT', ')#ly&S0yeR `]]LeZ%9?L>h@h$UTN9`6b`7XkugqUAd}N30zqEc][o]6#y4QTp?#');
define('LOGGED_IN_SALT',   '!~|s2^e^>I<aZ=euaNHi$pp#mFA#x6!.E_ /tgCyF:8_v.:n!_H_msMJUdffq4nI');
define('NONCE_SALT',       'M?S  NFe[Htl^+/q:A>B7(jAK!G!J^+ 3En:gC4a?PH=:tA1VZpBrH<EBj49q(7i');

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
