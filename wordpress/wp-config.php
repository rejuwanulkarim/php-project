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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'n`Kaaha@Uc AO*Nc1r(_gQW!70Nfl|1]C4vVAou3+l1k5,!1XK4LG-s=c7`[RRN]' );
define( 'SECURE_AUTH_KEY',  '!G2XHv.q<139nW/r#2RVeC7$i_@<9(x-u=b4hN#.z<?mNJO>0f4NW<O43?Z/:C#:' );
define( 'LOGGED_IN_KEY',    'wDeo_qB0Ja]>cgaw.%x$Ld.n-n.t0S[Ou?4lr vUMAX! CQZe_N?12{IXd^tkM}v' );
define( 'NONCE_KEY',        'w].J4AM>NEk>+&>Mb[SX~$v,Q;B(-a`U%rYcg31&@fikFwx.DEk]wxQ*Y9Or`OwP' );
define( 'AUTH_SALT',        ',?zc217Znty)1CG1`.ze([.<)M@>kJm3|a1Vfaz/o{u(6QR9/ct)y9.e./>Xyp+M' );
define( 'SECURE_AUTH_SALT', '=X73a.Jci~H0GN,{rhe<xEz]97(#|sn;%d-W~X:@W~|!YY<B@qA2sd7sj-JL dm>' );
define( 'LOGGED_IN_SALT',   's&J%|KRrwZ$wUTN>W{5kC>%1D8O@Ay7a)ibS`UwrYWs`(DM[vC!dU<G0HhT#L:P(' );
define( 'NONCE_SALT',       'e23x6Y_Ek|ud@e/?;n>=0L&is4;Gl2;(V(l#+^|XqLRPY.;F~3,b_)o@E0)M|Ud]' );

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
