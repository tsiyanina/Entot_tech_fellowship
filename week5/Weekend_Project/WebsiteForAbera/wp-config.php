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
define( 'DB_NAME', 'photography' );

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
define( 'AUTH_KEY',         ',yr,P{,EP-hOcN3z;CErZP;gn%8Mq+0Si|rr)5j:doQ1KP2IYSTpL|SJ[bsHBMNJ' );
define( 'SECURE_AUTH_KEY',  'yzE/(<F_oF>==<|i<Jw7o|mFsG<i=M>D-|$#lWMgK_Th8@Nr}?/LgL8kLi4=|Idt' );
define( 'LOGGED_IN_KEY',    '1h4,Ot7C b|<OfxFkP<,y/nLOyOyDZr!C$Bf9)e7M*4!!GtUfq?-Hc@55*vbo/2t' );
define( 'NONCE_KEY',        'Fs^yM>N@0i4}LZR%u*3gCGuT5S9Sc76N+jYmu=pWx =s%uK+$piPw8o(4&>OCB0|' );
define( 'AUTH_SALT',        '(^4M((jgL/3Wz#NF<DJ4[4:R|EB2M%0u36w%:4tB5Sm]!n*^}v} $xZO64M6Ys@2' );
define( 'SECURE_AUTH_SALT', 'bn13&8z(#fJiuh#~lFTG$HUltF;o-TOR}G}pkeq=O63;^z%/t0 Z4a*_Atvo.I.B' );
define( 'LOGGED_IN_SALT',   'cIUHx]LxEC%k!K?&>1Y]FK<xujr:s.gyrb^H2V|*~r(h*Uv&]B(>:SIPu2y_Q5o/' );
define( 'NONCE_SALT',       ':vpr58|;aBrAKAj~a&Pzwb%b,zlWFQ:Y!yW%e!EjL7B8[iGZQ;[|#MU[uWkUG:EJ' );

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
