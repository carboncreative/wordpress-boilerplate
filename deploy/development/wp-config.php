<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('SITE_VERSION', time());

define('DISALLOW_FILE_MODS', true);
define('AUTOMATIC_UPDATER_DISABLED', true);

define('WP_DEBUG', true);
define('SAVEQUERIES', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('SCRIPT_DEBUG', true);

define('DB_NAME', '##DATABASENAME##');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'GenerateSomethingToPutInHere- ');
define('SECURE_AUTH_KEY',  'GenerateSomethingToPutInHere;<');
define('LOGGED_IN_KEY',    'GenerateSomethingToPutInHere=$');
define('NONCE_KEY',        'GenerateSomethingToPutInHere`]');
define('AUTH_SALT',        'GenerateSomethingToPutInHere8(');
define('SECURE_AUTH_SALT', 'GenerateSomethingToPutInHere(g');
define('LOGGED_IN_SALT',   'GenerateSomethingToPutInHere5_');
define('NONCE_SALT',       'GenerateSomethingToPutInHere`#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', __DIR__ . '/wordpress/');

define('WP_SITEURL', WP_HOME . '/wordpress');
define('WP_HOMEPAGE', WP_HOME);

define('WP_CONTENT_DIR', realpath(__DIR__ . '/wp-content/'));
define('WP_CONTENT_URL', WP_HOME . '/wp-content');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
