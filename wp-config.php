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
define( 'DB_NAME', 'evolved-info' );

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
define( 'AUTH_KEY',         'hSu+K UsX(dx`@{=5exDmxsuZ@I?&/xTeF`yWG7lUwws}b1Tfx}3_zlut!Woxb(@' );
define( 'SECURE_AUTH_KEY',  'OSxwi.}^BWh/8-Kr.aEEM~^+U/1yYs5CT_OY[xK%rkx_43+moc&fRmg;eOsd^Bqp' );
define( 'LOGGED_IN_KEY',    'RlYm0$6cF_.Vyh}dY&rX=I]m{P(&;yFZ(}YH>nywNUfQ0.j)tt2!6H014|rKUMiz' );
define( 'NONCE_KEY',        'a^GyAG->Ld!{%CrI&k`^YO_.(. 7jE!*_h,3Y0SR%#|F.=}oe(7ko35fKlHaJ-sL' );
define( 'AUTH_SALT',        'jpkCUYt1gRCITd..+&%zzi0mCj[)noL0@~vOkc}10-x8p=j!Ll0vtHfk =X#&>dt' );
define( 'SECURE_AUTH_SALT', 'O^fR/#F;*Wt*im/bdc+iV}y`c2-l%/2f<p.Qzj.UB~_rhu~][6Z=7j%Hn2]5zjl`' );
define( 'LOGGED_IN_SALT',   '%Nu<9ZT_yB[Qc3ObiKiEODcZJ%dX_;L%Z<TI>oiaIZ]^GGatVwQKKAH[eVk|ln91' );
define( 'NONCE_SALT',       '|vLi[+9eo#ck{a|h6oce:v8P=?qIkAhC^X>d.C# *q~&,cz4jm^tOb*$Uw,dY45!' );

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
