<?php
define('DB_NAME', 'didicatering-wp-wp-j1ilggLM');
define('DB_USER', '2mVRbbQFeoo0');
define('DB_PASSWORD', '4hGu9$Fq%xE2U^6f');

define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY', 'j2cg4zYghnN9qsHg0e7SLwJJev3kGM4kW364JPHE');
define('SECURE_AUTH_KEY', 'sigoRYta1ULE0nCM6Z3smRSfqsMUAtLgWVFZBlaN');
define('LOGGED_IN_KEY', 'aOK8GTjO8P9pvpsWrwL6RsHeetXEjPVc9X1ipDRi');
define('NONCE_KEY', 'Znmeza3AherZLKFB1xRqnHT2on3VNuHy4Uzbi0Pi');
define('AUTH_SALT', 'gqH4B37nGtH3XtEdlN1gdoQnXqxmpMZshR7sF3eW');
define('SECURE_AUTH_SALT', 'FJOtOciKLgrzxyMHu2RNqBM0sZcordo69BAtUidp');
define('LOGGED_IN_SALT', 'SCWL107OfOUKiJDDVWSL03MxTL0Bm5OHHSOq2CuG');
define('NONCE_SALT', 'QiQZUPsh4nIkkW8fIcBWh1fSusi7KttCJfwdFcVb');

$table_prefix = 'wp_eb0054a754_';

define('SP_REQUEST_URL', ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']);

define('WP_SITEURL', SP_REQUEST_URL);
define('WP_HOME', SP_REQUEST_URL);

// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings 
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

/* Change WP_MEMORY_LIMIT to increase the memory limit for public pages. */
define('WP_MEMORY_LIMIT', '256M');

/* Uncomment and change WP_MAX_MEMORY_LIMIT to increase the memory limit for admin pages. */
//define('WP_MAX_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy blogging. */

if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

require_once ABSPATH . 'wp-settings.php';
