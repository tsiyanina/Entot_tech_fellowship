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
define( 'DB_NAME', 'W5D3' );

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
define( 'AUTH_KEY',         '8X(*H05GijA:(Tx.)_3P?fHS|G h8-^:CUHVk)v`;95I7{XbC(y_mNf[/M[yXgE$' );
define( 'SECURE_AUTH_KEY',  'YkVqCC9m,LuA/@blAEH(928?!1S:. &U~e?p2NJyzDB.{x(vU%,>yME3nSB^A *^' );
define( 'LOGGED_IN_KEY',    '~edQHII)vVmw}Sbbe{7>z+O{0`1sowp zw1l<|+zc?B1C%vr<$Ug>4!f3{_H@jX~' );
define( 'NONCE_KEY',        'GfJ9UOGovqrtHfo0p<,/(IT1]Pg[=I4/#xexe{dO,ys.{(qev@$QXHkxO6lcw2|?' );
define( 'AUTH_SALT',        '9rE/[]?.i?>^55[;Qcsw#DkxHk,LeQCC-nAfe/U@{c;PX!?tRr-)0LY2sf]8cV&y' );
define( 'SECURE_AUTH_SALT', 'iX,4^P|R-bO+.@8i)*#iv|u=g)kD<WI2_zh:+x;9O9:B-Rq5g+D%VOSU&j@N=y9i' );
define( 'LOGGED_IN_SALT',   '3<U],]2?vL4&SlA,&6~r%LJ;1Cvf1}s~]tN%dLvl>$*MCJQP)#Pl6Sxh1j?F}sf.' );
define( 'NONCE_SALT',       'cLW )+U7[Foh SF[uY~/j@4-pyPjz9[[Cas-){$CPrh3~:3E^M:=P595^]:maX<%' );

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
