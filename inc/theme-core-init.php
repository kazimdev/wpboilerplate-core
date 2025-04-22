<?php

/**
 * Theme Core Init
 * @package wpboilerplate
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('WPBoilerplate_Core_Init')) {

    class WPBoilerplate_Core_Init
    {
        /**
         * $instance
         * @since 1.0.0
         */
        protected static $instance;

        public function __construct()
        {
            //Load plugin assets
            add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
            //Load plugin admin assets
            add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
            //load plugin text domain
            add_action('init', array($this, 'load_textdomain'));
            //load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
        }

        /**
         * getInstance()
         * @since 1.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Load Plugin Text domain
         * @since 1.0.0
         */
        public function load_textdomain()
        {
            load_plugin_textdomain('wpboilerplate-core', false, WPBOILERPLATE_CORE_ROOT_PATH . '/languages');
        }

        /**
         * Load plugin dependency files()
         * @since 1.0.0
         */
        public function load_plugin_dependency_files()
        {
            $includes_files = array(
                array(
                    'file-name' => 'codestar-framework',
                    'folder-name' => WPBOILERPLATE_CORE_LIB . '/codestar-framework'
                ),
                array(
                    'file-name' => 'theme-menu-page',
                    'folder-name' => WPBOILERPLATE_CORE_ADMIN
                ),
                array(
                    'file-name' => 'theme-custom-post-type',
                    'folder-name' => WPBOILERPLATE_CORE_ADMIN
                ),
                array(
                    'file-name' => 'theme-post-column-customize',
                    'folder-name' => WPBOILERPLATE_CORE_ADMIN
                ),
                array(
                    'file-name' => 'theme-wpboilerplate-core-excerpt',
                    'folder-name' => WPBOILERPLATE_CORE_INC
                ),
                array(
                    'file-name' => 'csf-taxonomy',
                    'folder-name' => WPBOILERPLATE_CORE_INC
                ),
                array(
                    'file-name' => 'theme-core-shortcodes',
                    'folder-name' => WPBOILERPLATE_CORE_INC
                ),
                array(
                    'file-name' => 'elementor-widget-init',
                    'folder-name' => WPBOILERPLATE_CORE_ELEMENTOR
                ),
                array(
                    'file-name' => 'theme-about-me-widget',
                    'folder-name' => WPBOILERPLATE_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-about-us-widget',
                    'folder-name' => WPBOILERPLATE_CORE_WP_WIDGETS
                ),
                array(
                    'file-name' => 'theme-contact-info-widget',
                    'folder-name' => WPBOILERPLATE_CORE_WP_WIDGETS
                )
            );

            if (defined('ELEMENTOR_VERSION')) {
                $includes_files[] = array(
                    'file-name' => 'theme-elementor-icon-manager',
                    'folder-name' => WPBOILERPLATE_CORE_INC
                );
            }
            if (is_array($includes_files) && !empty($includes_files)) {
                foreach ($includes_files as $file) {
                    if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
                        require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
                    }
                }
            }
        }

        /**
         * Admin assets
         * @since 1.0.0
         */
        public function plugin_assets()
        {
            self::load_plugin_css_files();
            self::load_plugin_js_files();
        }

        /**
         * Load plugin css files()
         * @since 1.0.0
         */
        public function load_plugin_css_files()
        {
            $plugin_version = WPBOILERPLATE_CORE_VERSION;
            $all_css_files = array(
                array(
                    'handle' => 'slick',
                    'src' => WPBOILERPLATE_CORE_CSS . '/slick.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
                array(
                    'handle' => 'wpboilerplate-core-main-style',
                    'src' => WPBOILERPLATE_CORE_CSS . '/main-style.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                )
            );

            if (!wpboilerplate_core()->is_wpboilerplate_active()) {
                $all_css_files[] = array(
                    'handle' => 'animate',
                    'src' => WPBOILERPLATE_CORE_CSS . '/animate.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                );
                $all_css_files[] = array(
                    'handle' => 'bootstrap',
                    'src' => WPBOILERPLATE_CORE_CSS . '/bootstrap.min.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                );
                $all_css_files[] = array(
                    'handle' => 'magnific-popup',
                    'src' => WPBOILERPLATE_CORE_CSS . '/magnific-popup.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                );
                $all_css_files[] = array(
                    'handle' => 'wpboilerplate-main-style',
                    'src' => WPBOILERPLATE_CORE_CSS . '/theme-style.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                );
                $all_css_files[] = array(
                    'handle' => 'wpboilerplate-responsive',
                    'src' => WPBOILERPLATE_CORE_CSS . '/theme-responsive.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                );
            }
            $all_css_files = apply_filters('wpboilerplate_core_css', $all_css_files);

            if (is_array($all_css_files) && !empty($all_css_files)) {
                foreach ($all_css_files as $css) {
                    call_user_func_array('wp_enqueue_style', $css);
                }
            }
        }

        /**
         * Load plugin js
         * @since 1.0.0
         */
        public function load_plugin_js_files()
        {
            $plugin_version = WPBOILERPLATE_CORE_VERSION;
            $all_js_files = array(
                array(
                    'handle' => 'wow',
                    'src' => WPBOILERPLATE_CORE_JS . '/wow.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'waypoints',
                    'src' => WPBOILERPLATE_CORE_JS . '/waypoints.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'slick',
                    'src' => WPBOILERPLATE_CORE_JS . '/slick.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'gsap',
                    'src' => WPBOILERPLATE_CORE_JS . '/gsap.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
                array(
                    'handle' => 'main',
                    'src' => WPBOILERPLATE_CORE_JS . '/main.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                ),
            );

            if (!wpboilerplate_core()->is_wpboilerplate_active()) {
                $all_js_files[] = array(
                    'handle' => 'bootstrap',
                    'src' => WPBOILERPLATE_CORE_JS . '/bootstrap.min.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                );
                $all_js_files[] = array(
                    'handle' => 'magnific-popup',
                    'src' => WPBOILERPLATE_CORE_JS . '/jquery.magnific-popup.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                    'in_footer' => true
                );
            }

            $all_js_files = apply_filters('wpboilerplate_core_frontend_script_enqueue', $all_js_files);
            if (is_array($all_js_files) && !empty($all_js_files)) {
                foreach ($all_js_files as $js) {
                    wp_enqueue_script(
                        $js['handle'],
                        $js['src'],
                        $js['deps'],
                        $js['ver'],
                        $js['in_footer'] // Ensure this is passed to load the script in the footer
                    );
                }
            }
        }

        /**
         * Admin assets
         * @since 1.0.0
         */
        public function admin_assets()
        {
            self::load_admin_css_files();
            self::load_admin_js_files();
        }

        /**
         * Load plugin admin css files()
         * @since 1.0.0
         */
        public function load_admin_css_files()
        {
            $plugin_version = WPBOILERPLATE_CORE_VERSION;
            $all_css_files = array(
                array(
                    'handle' => 'wpboilerplate-core-admin-style',
                    'src' => WPBOILERPLATE_CORE_ADMIN_ASSETS . '/css/admin.css',
                    'deps' => array(),
                    'ver' => $plugin_version,
                    'media' => 'all'
                ),
            );

            $all_css_files = apply_filters('wpboilerplate_admin_css', $all_css_files);
            if (is_array($all_css_files) && !empty($all_css_files)) {
                foreach ($all_css_files as $css) {
                    call_user_func_array('wp_enqueue_style', $css);
                }
            }
        }

        /**
         * Load plugin admin js
         * @since 1.0.0
         */
        public function load_admin_js_files()
        {
            $plugin_version = WPBOILERPLATE_CORE_VERSION;
            $all_js_files = array(
                array(
                    'handle' => 'wpboilerplate-core-widget',
                    'src' => WPBOILERPLATE_CORE_ADMIN_ASSETS . '/js/widget.js',
                    'deps' => array('jquery'),
                    'ver' => $plugin_version,
                ),
            );

            $all_js_files = apply_filters('wpboilerplate_admin_js', $all_js_files);
            if (is_array($all_js_files) && !empty($all_js_files)) {
                foreach ($all_js_files as $js) {
                    call_user_func_array('wp_enqueue_script', $js);
                }
            }
        }
    } //end class
    if (class_exists('WPBoilerplate_Core_Init')) {
        WPBoilerplate_Core_Init::getInstance();
    }
}
