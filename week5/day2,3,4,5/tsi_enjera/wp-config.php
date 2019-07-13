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
define( 'DB_NAME', 'tsi_enjera' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'LKARHMg*xt{~D(;,l]mvQ YPs_JEfAnj-<olr8^ZB9>YNCl|Osak OdH7]ot#akW' );
define( 'SECURE_AUTH_KEY',  'HtL=x3lujV?eYv!;Ewywx#yC;RC``5w.>^/U4]`m+/-HXFS1|zRQ:2WzGmi.ds`9' );
define( 'LOGGED_IN_KEY',    't]p,<{4LTZjBIZ-:CH(1=@MCBN`Y0OOs.0;<*H,oHM9pnkV)iz{?v,J7o~5I|wbL' );
define( 'NONCE_KEY',        'q^b$OUhyNX?oh2:;ILJ$P0b,v{R8(3[`]z&/C[l9s~ 2g_VnF-c@`2X=w(I8Sf.c' );
define( 'AUTH_SALT',        'XtZ hWn; o}#=&%T9vCnhy(VkZ6j&>#`=O4(Ej#*}Bx jr ]8bU/4q_ws18w[`GM' );
define( 'SECURE_AUTH_SALT', 'Se]MO*,nwMkI&#^|Wtv}%eY!cmD&=TqdY6{La&xO(MDIv<mR3q:vps`QyWzjI{yJ' );
define( 'LOGGED_IN_SALT',   '-JE_oN,Y-.Mqfu?Kh2-ZG=1aWyV-IYPy0|w:yunh`_n{3}ryKnt>?L*ECW|w`-e7' );
define( 'NONCE_SALT',       'E(U%MY>$[?2l@R=Z,~3#bLN18i)AE~w3MY6([E5rA<Y%y#4<^eHq1{+H>8#0/.xa' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
