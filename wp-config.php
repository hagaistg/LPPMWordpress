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
define('DB_NAME', 'pa 1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'a2B5y$w@B:Tbk3Dmy}j5t+4fc&iLlR>E$)!#t=*i>9~gakE3Zde~i[yq= G&J(Dl');
define('SECURE_AUTH_KEY',  '^gZa+I4{l^ysnC9lm7u2UU)6Dg<R3#Z>XbyB`p??qL8}g(E<b)!,WR`/>sCWA#Ys');
define('LOGGED_IN_KEY',    'xU:E]=&)CY^U_T31FUHLxv|RPS=l6?r!Niu9)qi ]]PyS{WUQ.nGK01Z|ixX?RVt');
define('NONCE_KEY',        'Au.LASb}O|OM;c`=gOW%)B?*[zz74T8sqsx9.0g`}.@w.ik*DOyZ>s&>{a.#n0.)');
define('AUTH_SALT',        's1M5*)Bt{gZ==L !al18cWe5.C*5_4oA.I[3Rclv[]_erRa5wbU^,6ho*KIXyQFi');
define('SECURE_AUTH_SALT', ')-26!a-i-1>}^t03UwB`vdpS@SR?K?quRsTP[{iCGo!^>rfkk_re~kM=YU#du4 H');
define('LOGGED_IN_SALT',   '/A#h 8ZZY/Y5<&tn)@~-OJ}!g:<g55g)zI4(n@@_JLjZt_h#[CCncEU82(@KrSk/');
define('NONCE_SALT',       '?myG*vej;ES!#sS8Kw>kmAlhfI<:n,K]Z0E2;tz[;}5fQHGm4.E{iuH&&?A(DOO/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
