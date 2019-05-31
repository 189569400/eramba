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
define('DB_NAME', 'wordpress_v3');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'jnpxpvik');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'SZM8,$+t2=dNzWqjoBW&`CV?YH,s=Z$:>i2d-L6&+sqRy;pqB<8zh]8Y CDfH6|#');
define('SECURE_AUTH_KEY',  '9i/,W&]`(0=C .Ll=I|Ivjgc`bNQ_top?6DGqcb1?x/sQRykffLbwJ(|{U`+)Vvp');
define('LOGGED_IN_KEY',    'x>}+L|$am#SCRV,X@Z^I!-$ccRc^T4+M-F;o;VERoT(uQiVsd,mt[,Goqq# j$}<');
define('NONCE_KEY',        '0?6hE.@7=&$RM(|82X?.!j;`WJ>xm5m>H@rN@7_L-t/7qnJ*^ )#G/#uT&Im^8]Q');
define('AUTH_SALT',        '.!EC]!?{vQ>&3NWM+:/A,R-yUvJJ>lD3%<Daq-E~/x)d0*hjOup-GVQtsN^So8#E');
define('SECURE_AUTH_SALT', 'K0%S5.v9k$a{U4j.x]x&kqKu2[3|^z^U8;F6Uz}MqKMvoS6YL9,C_}-g5lv|,FH:');
define('LOGGED_IN_SALT',   'Xl~rBrlqHKWW[z,m}j;U:-QE15xZl}c56YjQ;8q>Bmj|=o2&]EGzL&FCWz-s^~C3');
define('NONCE_SALT',       'Q-Cx9cl4>KKoi#6WHK-)u.PJN;P/U+VUePvh,LX/q8zL>bC|S%UJ+fa,NjyMc|oS');

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