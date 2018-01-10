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
define('DB_NAME', 'reab');

/** MySQL database username */
define('DB_USER', 'reab');

/** MySQL database password */
define('DB_PASSWORD', 'reab');

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
define('AUTH_KEY',         '~u(p`*m9]B9&zXWJRkP4_DgX6S^CmH&&_`&/I{0Rn7S0f!05kd[#a0>1AQcdMmyV');
define('SECURE_AUTH_KEY',  'Q}2GY*lcZOhN}Wd?A1uj8C%0lO_&4{H$vaZ,4iWY*y B)n!Ge{%!!Jikr|2N$Jzc');
define('LOGGED_IN_KEY',    'UxLc1V)x`=h&oq$zo;i)M&yn~cgc[2` IM5R=w<,sq<D,wHI*0@N?pV,x3ZNSJIj');
define('NONCE_KEY',        'm[lbH-GMf1?M?BAst7&$NJJXNPD+}9?In>eJnTgTGfK;g*!BJ#WV#iN2K68=xL=B');
define('AUTH_SALT',        'RTCuHs^ghb;tUqsEegm*P4+s37B6f3^_#Sq)#uF59v:cuwr@vkTBBD3U|n[xHOU&');
define('SECURE_AUTH_SALT', 'Oe5Id97ZIJ!_y/JNH{sP+9S_)$-Q(iqU{vEM!uM*.0lI0&Hof6T#5pFk,F6dE4~2');
define('LOGGED_IN_SALT',   '^_gqxU*_g&5Z~Llh37RYK0 fd~OPHBVNXj24`R xuXlnpt>:Cf.pNu|mokCACT=p');
define('NONCE_SALT',       'F`PXryL gkh##V.,bgC-3:A&n3`nxmYoP~ViEtk<CyuNK&5R9c136d<J (hv%n_l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mguf_';

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
