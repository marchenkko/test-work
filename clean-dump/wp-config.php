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
define( 'DB_NAME', 'word' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'n! VM0^Ebz2UBTj.d0)ixB]w3^5FQV:&Tyo:$>9]iqE{v})CXwt14$`wjm!jeIrd' );
define( 'SECURE_AUTH_KEY',  'W4x^cRvNSph_mxT(XMg8Z2_Ae~`P_ubYA: oxa,}r9wX7Be6o.J_yC0#Z7|8$;Eo' );
define( 'LOGGED_IN_KEY',    'w[!X)3G#|Ilh}eb9~H#.I0OxbP-%2iFh`yeCa]bzP/*#YXfzKKs^LQS?4:G1n85b' );
define( 'NONCE_KEY',        'P9e?75&^v3q5-b/*+K1}S*(rCI91( _Y-D,xelt`oCm1i*)/I2a`//@)kI?TN,zB' );
define( 'AUTH_SALT',        'qd-BFT&iJ`>_.uZzBKv7vFh$ug_i~[5l]|O_~##?kiY1PG~ZeN-+0WnwpKan!Ln]' );
define( 'SECURE_AUTH_SALT', 'B3ILBJ>o}&J}k}[[>E]-y;F75XhmE+ld,5Byv)1)V*Ww*xHNNaf7j!t^uraDQQGq' );
define( 'LOGGED_IN_SALT',   'v(;)8+4fPO/F`c^rC`3)hQ$K<rqXrEl0O--Q(6zCcJqx=Q7^-/Q9GbORuNjC_TK,' );
define( 'NONCE_SALT',       'UMik2;<N!kO<Y9_KXv)yL t)r@h&(M(XYZBwqMjS`T?;.|>q{l$z`s:tZ 1[@1G=' );

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
