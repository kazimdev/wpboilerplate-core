<?php
/*
Plugin Name: WPBoilerplate Core
Plugin URI: https://musemind.agency
Description: Plugin to contain short codes and custom post types of the WPBoilerplate theme.
Author: Musemind
Author URI: https://musemind.agency
Version: 1.0.0
Text Domain: wpboilerplate-core
*/

/**
 * If this file is called directly, abort.
 * @package wpboilerplate
 * @since 1.0.0
 */
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Plugin directory path
 * @package wpboilerplate
 * @since 1.0.0
 */
define('WPBOILERPLATE_CORE_ROOT_PATH', plugin_dir_path(__FILE__));
define('WPBOILERPLATE_CORE_ROOT_URL', plugin_dir_url(__FILE__));
define('WPBOILERPLATE_CORE_SELF_PATH', 'wpboilerplate-core/wpboilerplate-core.php');
define('WPBOILERPLATE_CORE_VERSION', '2.0.1');
define('WPBOILERPLATE_CORE_INC', WPBOILERPLATE_CORE_ROOT_PATH . '/inc');
define('WPBOILERPLATE_CORE_LIB', WPBOILERPLATE_CORE_ROOT_PATH . '/lib');
define('WPBOILERPLATE_CORE_ELEMENTOR', WPBOILERPLATE_CORE_ROOT_PATH . '/elementor');
define('WPBOILERPLATE_CORE_ADMIN', WPBOILERPLATE_CORE_ROOT_PATH . '/admin');
define('WPBOILERPLATE_CORE_ADMIN_ASSETS', WPBOILERPLATE_CORE_ROOT_URL . 'admin/assets');
define('WPBOILERPLATE_CORE_WP_WIDGETS', WPBOILERPLATE_CORE_ROOT_PATH . '/wp-widgets');
define('WPBOILERPLATE_CORE_ASSETS', WPBOILERPLATE_CORE_ROOT_URL . 'assets/');
define('WPBOILERPLATE_CORE_CSS', WPBOILERPLATE_CORE_ASSETS . 'css');
define('WPBOILERPLATE_CORE_JS', WPBOILERPLATE_CORE_ASSETS . 'js');
define('WPBOILERPLATE_CORE_IMG', WPBOILERPLATE_CORE_ASSETS . 'img');


/**
 * Load additional helpers functions
 * @package wpboilerplate
 * @since 1.0.0
 */
if (!function_exists('wpboilerplate_core')) {
	require_once WPBOILERPLATE_CORE_INC . '/theme-core-helper-functions.php';
	if (!function_exists('wpboilerplate_core')) {
		function wpboilerplate_core()
		{
			return class_exists('WPBoilerplate_Core_Helper_Functions') ? new WPBoilerplate_Core_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action('shutdown', 'wp_ob_end_flush_all', 1);


/**
 * Load Codestar Framework Functions
 * @package wpboilerplate
 * @since 1.0.0
 */
if (!wpboilerplate_core()->is_wpboilerplate_active()) {
	if (file_exists(WPBOILERPLATE_CORE_ROOT_PATH . '/inc/csf-functions.php')) {
		require_once WPBOILERPLATE_CORE_ROOT_PATH . '/inc/csf-functions.php';
	}
}


/**
 * Core Plugin Init
 * @package wpboilerplate
 * @since 1.0.0
 */
if (file_exists(WPBOILERPLATE_CORE_ROOT_PATH . '/inc/theme-core-init.php')) {
	require_once WPBOILERPLATE_CORE_ROOT_PATH . '/inc/theme-core-init.php';
}
