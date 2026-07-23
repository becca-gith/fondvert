<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fondvert' );

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
define( 'AUTH_KEY',         '1}?p}L+KW=;|p|1Vv?6Zf6C{`Y:}c-%rZJ({bfF]fxf*OEvTJg=6,f;S Wf`C}uH' );
define( 'SECURE_AUTH_KEY',  '.JG/#DU]{jwN7MF@2&.)R_x?s=Phw>HDu}5T^ 7T.g#O%ka<nHEZg8Gjc9<&.$*)' );
define( 'LOGGED_IN_KEY',    'UOZB3JI!R+O4a,x~mkAsN/}Gb@;1$1KY{vZxXeD9H~P0YChSzbu STMi7mG5QFk-' );
define( 'NONCE_KEY',        '7|Z-Mr0jC5I/jzn3vVfa0vlt7(8U]d,gEv&Z6|u%0cp2DOC*zP(PbP*]nj(;^UXI' );
define( 'AUTH_SALT',        '0Gv,jj/K2+b/rzUn?W?G&7DCr&cWU-`LE9KG>0Ils]xw`,DQ4_7i/ pR@MGA67dH' );
define( 'SECURE_AUTH_SALT', '_!NP9[l*aMTQtYQ(3+cu ba.p)*FG0MAo3oT[p:eA_:Qnv3OxIQ(LX?>aRlKZkYo' );
define( 'LOGGED_IN_SALT',   'p`ng4~I+{hg6[*nJAa DxMhlp[qwm#Fw_y1Q^K:?)O0,svO~1e*#Xvc9G,vh2qTi' );
define( 'NONCE_SALT',       ';1m*A .kZsd9,N`Qn,g)=Wk>;Xvcetptyri`|CSiV{&>AMdGjMNJO=?=;{A:&n`#' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
