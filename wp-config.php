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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\AurigaCus\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'aurigacus' );

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
define( 'AUTH_KEY',         'UYV93HkO0juhYguFpStUJFqOY5W-:GAz9PO_e+k{PZ&OEBeb]33c3EdI@F`:_(@q' );
define( 'SECURE_AUTH_KEY',  'E4s7wmfrCu3*h<3at6|+Yv)-XIw}vKe+KImKRfbV-SmZ&/j]UA>3T8x&X%PrYOeB' );
define( 'LOGGED_IN_KEY',    ' vyM:N!`v}IG<%kB=@W49aYE8I? i*!*Vku-Uo%_l&m[pkTdE349^g9:ei.4$>!a' );
define( 'NONCE_KEY',        'eX06rS-eW`MnqIzU72Vqui1=IPFY|}x DNc<=svk.0$+[TX#b^Z/,O8NVUGZW~UI' );
define( 'AUTH_SALT',        '4CTl|RbPMk|(ot80WDP!AmPInof{qqh~<#Ew3dLvRWWUGjsY_b%T_8yW`0!l-8q}' );
define( 'SECURE_AUTH_SALT', ',r.?DvP|vJ|H72e*suA%~ v{~cq*SO;U)-2CySoBZF/)BjM%Hj>p.eFA&,17_k`]' );
define( 'LOGGED_IN_SALT',   'BiZ1,tPsCaj)88J/^F&pSfvi22-choWd|L]26G=T,NI!$7gR nJiU}I^<09APfCw' );
define( 'NONCE_SALT',       'M;z7_Ufm;j_=UC+2a<nr|&,6H@r,dwiTyMUm+#8Yc#liaj_)Q*am#lF+!h:RA6i6' );

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
