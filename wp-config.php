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
define( 'DB_NAME', 'fbfp' );

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
define( 'AUTH_KEY',         'A61#TcWLIsc~7PHRa^Dm[S90k~ryN9UgLCas0Z@p~VcHITrBPmTOGi=:jXrh8<Fl' );
define( 'SECURE_AUTH_KEY',  '/^7wL2a>4MM{2-]nbCe>z$J[Z+h8%PyG!BMOJY,yA(^,n.:@1fK(uq&oWtbf<PCX' );
define( 'LOGGED_IN_KEY',    'y=2_1KZD,9$WUfwEeA@8}J-t?@PejG9,LanEx o`O<Ltvrio%57qU2}Pk}Nyrrv`' );
define( 'NONCE_KEY',        'oi/&;nW9-_&*.T86>9{~Jr$Pl0R?`#Qcxiewc]6qLqi?yaz5OsCM$@-W-GU)Jtjf' );
define( 'AUTH_SALT',        '-av.IP#n;:Ym][fET$V5O>Y:|RgO13<]z<c|_$/.Z721<Y=EcR`49x;I1ECU=Yg}' );
define( 'SECURE_AUTH_SALT', '%KAV5R)`0}qJka+P]NR]WAG@b5zPO|2}yh]~+XUwl;s{6},,_BN{Ux@nbR&WfdI+' );
define( 'LOGGED_IN_SALT',   'Y7<xo7A2th-d@Oq!>=:+V x?,ayg*yF$X[}79O _$e9FIo%t!rL9`R4#dV}TbgfH' );
define( 'NONCE_SALT',       'x;^!OP<08rySm1/`G+q+Z4Q,85_Tv[rEk=7:eg{~DO[*DzkXJ}PN.GpSD7f_nj}Z' );

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
