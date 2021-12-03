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
define('DB_NAME', 'wp_db');

/** MySQL database username */
define('DB_USER', 'bpm');

/** MySQL database password */
define('DB_PASSWORD', 'mutubpm2020');

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
define('AUTH_KEY',         '5g2^dL2:`5FB_T:>A~.W2]O[:B@E^db6LJM|ixoS~.lz&<vQB:1>`SbW;eXTxa]X');
define('SECURE_AUTH_KEY',  'zL0OnP6^Mk6@%|GAEYyvn7+0|?  J:.pWY{?N&X:hYd{M{FXgbuloB4-Q{ap_Yg{');
define('LOGGED_IN_KEY',    'sx++^Ws&JKW@2oa%4/kNz`R$jM|Jtd]n~365.?1pj4^6d@(z=d^OvMY<d/9Gf}8W');
define('NONCE_KEY',        'qjvZ?|>;yC$[k2/oR2hPjT6-~kTWeytM9S5Z]O=0s@TdH*mh!_H$O1UU_Sj4kG^d');
define('AUTH_SALT',        'OU.5+$:E(*0Ez,s:oRIA.Z06aVT2k^Y(wl[5j*^G.tX/$zTkd]uvp`-Htt`6.zIH');
define('SECURE_AUTH_SALT', 'aZ~ik&fe3@XPR^)r4cNA[6$pi> H;k$3Frvv=i4yxZ HZONl  JB{T$ZtY(o]F$D');
define('LOGGED_IN_SALT',   '}j5iY=iGd**F2fMy#`Rb./6CG3Y3AK*AZ@s8-{is_1 mX).>`RJ&p7}:nWId^}&P');
define('NONCE_SALT',       ';]$N8.<GrpycEx`>]qfYV[VwS/m,5m]}Ea9@oDBN8D<?(2{`VBB^U^p0Y!kl_fOI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ver1_';

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
