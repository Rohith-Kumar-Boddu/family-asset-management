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
define( 'AUTH_KEY',         'olo+eKiyhLfu&rnAdQ8PGJQ[lsd92;%Zx,?$ W>p Ft$<3DgF;>BXSW1L XKZp}C' );
define( 'SECURE_AUTH_KEY',  '])F8%st+7d]NLAv0(7Z_d^u5;|%kA9|PitiZnr3dn4?/Rd]=K^s[zpi6lZGLc;m_' );
define( 'LOGGED_IN_KEY',    'q6_w2$3bd8~<<_#!C`#5E7($D~-yJ>TP5D(T]mZLKZ*By,5zyh=q+KU_em_OTV&w' );
define( 'NONCE_KEY',        'E0z2^QxT;]IX&B=g_pE_7v%*m939T5uQs8D.Lq<p0(f}l8fTUP/&| Fa@JYu[;~a' );
define( 'AUTH_SALT',        '}|EcqH-[;[uv`DH.*`IvvOqgf[>dsy1nRO%8n,lM,U9@bNL^N*S_c-iOQ^rPBiZ9' );
define( 'SECURE_AUTH_SALT', '@J<CLqaezI>t_(g=Eqp6d!2O8n*}LcyJWj/(^{4QLVOdCGJvblld|:|90j1*7su3' );
define( 'LOGGED_IN_SALT',   'W$J8tFiS@D3M@cW+b8>7btutZAQLQ8i8]ECUK%8DV]^`,]xUAdhC8U{(&AmAovWq' );
define( 'NONCE_SALT',       ' b8*ud_v2N[H0cV5oo7;^5A2H<,6uJs!Ch nd_SIxF?:o.{wYqp7M?M@et1+}(Xn' );

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
