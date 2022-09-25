<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'upwork_fga' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!siv8hzw8z,0Q{qSIUYxLNNJ!khmgeGI3 vy;bCCUaItB,$@K{7vSPXfH@Rfiq(<' );
define( 'SECURE_AUTH_KEY',  'pmY=q^)Y?$Wqsm(3Q$xh)yY1Rc/wg)>z5{?DJAJz$ctkjM&1B)>14{uh(36;aW@1' );
define( 'LOGGED_IN_KEY',    '<@._Lf?R/4Y=dGMc$g5TQp(^E|iX:2F]E+?0L!bvbuoy>@~5y|C3AUOUsnu-MYJf' );
define( 'NONCE_KEY',        '1i! QyNv(nwE J;?q;]q%D2pY9d55Zlm]qBu5|d<<.tq{tm2[7=Q;(#!S@34IS{w' );
define( 'AUTH_SALT',        'hdn5h?DKA y?$+lS~pNp)w!#HFR2J/wkD~TOA)I8)v4Xdk!{l7vfdz2f!4mk;=a ' );
define( 'SECURE_AUTH_SALT', 'J[d+Zt>u&vG<mz`$prkG>5 h;CX DR-wy%?-Nk9X7*gN`J]>6aP>*)d.+uQM?{gu' );
define( 'LOGGED_IN_SALT',   '{Qr;bKqOrPu4SCApvqXwjO-_1=zR6mMHT_emel<x@md/HYxu)[2QM2oOTy`5Y0Gt' );
define( 'NONCE_SALT',       'EKtr->i6`g q~Tx~ME#Wx=jsb:B&_4F>Qnw*-4iP>Z60,}`Bqt[$((WSBGF;Z %M' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
