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
define('DB_NAME', 'everest');

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
define('AUTH_KEY',         '?j$Q]1 M.V-H7lQ!y>@@nn=c1e,EbEiV-/zJ<r*6.x8ZQ>+UBStx{J2<okV=seRY');
define('SECURE_AUTH_KEY',  '(KJjuea}ARXaU[l4y~mah=?wi3NK_!0};?o_( ;S]X5Dt6WVkj#Xiq;OpBMB4m;!');
define('LOGGED_IN_KEY',    'oHie1;[u 5v_AT (_U`A1}bDdR$x[Exbn#G|=FU3zJf-|Cq?d8nRNi)ekVvjg+(g');
define('NONCE_KEY',        '#i3pQiC@l#gQtfJG/Jp%z|2kl;272!39HB(SZP)J#{ony)o-N)K|VLEEI(+a+t)4');
define('AUTH_SALT',        'W/@wB<< 6oZ+~m+fE;s0NT)%2gBQJ2!_qfJrK2P+I|ScqvHm-zB<8^5_+#N&w4Gl');
define('SECURE_AUTH_SALT', '9#;nhXmkdkOW2`5Og9q~iOlo#.jaFI.%%ephR^|$tO+ }XU/;RTe|P~e>z#/{fn]');
define('LOGGED_IN_SALT',   '-@Vx}.dfy_,ZMDZ}2jr7O7uk*B0_A&42x~ZagmTG}RoK8#n/;H8V.|kv&~BuYua ');
define('NONCE_SALT',       'h&iJWMYNePixrm+ueD56g9vBUxZC%F%!f&$%|DitoN2obBeJ|J$9({j_H8-$Xas)');

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
