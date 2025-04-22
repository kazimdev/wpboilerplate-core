<?php

/**
 * Theme Custom Post Type(CPTs)
 * @package WPBoilerplate
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

if (!class_exists('WPBoilerplate_Custom_Post_Type')) {
    class WPBoilerplate_Custom_Post_Type
    {

        //$instance variable
        private static $instance;

        public function __construct()
        {
            //register post type
            add_action('init', array($this, 'register_custom_post_type'));
        }

        /**
         * get Instance
         * @since  2.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Register Custom Post Type
         * @since  2.0.0
         */
        public function register_custom_post_type()
        {
            if (!defined('ELEMENTOR_VERSION')) {
                return;
            }
            $all_post_type = array(
                // [
                //     'post_type' => 'property',
                //     'args' => array(
                //         'label' => esc_html__('Property Post', 'wpboilerplate-core'),
                //         'description' => esc_html__('Property Post', 'wpboilerplate-core'),
                //         'labels' => array(
                //             'name' => esc_html_x('Property Post', 'Post Type General Name', 'wpboilerplate-core'),
                //             'singular_name' => esc_html_x('Property Post', 'Post Type Singular Name', 'wpboilerplate-core'),
                //             'menu_name' => esc_html__('Property Post', 'wpboilerplate-core'),
                //             'all_items' => esc_html__('Property Post', 'wpboilerplate-core'),
                //             'view_item' => esc_html__('View Arabic Post', 'wpboilerplate-core'),
                //             'add_new_item' => esc_html__('Add New Property Post', 'wpboilerplate-core'),
                //             'add_new' => esc_html__('Add New Property Post', 'wpboilerplate-core'),
                //             'edit_item' => esc_html__('Edit Property Post', 'wpboilerplate-core'),
                //             'update_item' => esc_html__('Update Property Post', 'wpboilerplate-core'),
                //             'search_items' => esc_html__('Search Property Post', 'wpboilerplate-core'),
                //             'not_found' => esc_html__('Not Found', 'wpboilerplate-core'),
                //             'not_found_in_trash' => esc_html__('Not found in Trash', 'wpboilerplate-core'),
                //             'featured_image' => esc_html__('Property Post Image', 'wpboilerplate-core'),
                //             'remove_featured_image' => esc_html__('Remove Property Image', 'wpboilerplate-core'),
                //             'set_featured_image' => esc_html__('Set Property Post Image', 'wpboilerplate-core'),
                //         ),
                //         'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                //         'taxonomies' => array( 'post_tag'), // this is IMPORTANT
                //         'hierarchical' => false,
                //         'public' => true,
                //         "publicly_queryable" => true,
                //         'show_ui' => true,
                //         'show_in_menu' => 'wpboilerplate_theme_options',
                //         "rewrite" => array('slug' => 'property', 'with_front' => true),
                //         'can_export' => true,
                //         'capability_type' => 'post',
                //         "show_in_rest" => true,
                //         'query_var' => true
                //     )
                // ]
            );

            if (!empty($all_post_type) && is_array($all_post_type)) {

                foreach ($all_post_type as $post_type) {
                    call_user_func_array('register_post_type', $post_type);
                }
            }


            /**
             * Custom Taxonomy Register
             * @since 1.0.0
             */

            $all_custom_taxonmy = array(
                // array(
                //     'taxonomy' => 'property_cat',
                //     'object_type' => 'property',
                //     'args' => array(
                //         "labels" => array(
                //             "name" => esc_html__("Property Category", 'wpboilerplate-core'),
                //             "singular_name" => esc_html__("Property Category", 'wpboilerplate-core'),
                //             "menu_name" => esc_html__("Property Category", 'wpboilerplate-core'),
                //             "all_items" => esc_html__("All Property Category", 'wpboilerplate-core'),
                //             "add_new_item" => esc_html__("Add New Property Category", 'wpboilerplate-core')
                //         ),
                //         "public" => true,
                //         "hierarchical" => true,
                //         "show_ui" => true,
                //         "show_in_menu" => true,
                //         "show_in_nav_menus" => true,
                //         "query_var" => true,
                //         "rewrite" => array('slug' => 'property_cat', 'with_front' => true),
                //         "show_admin_column" => true,
                //         "show_in_rest" => true,
                //         "show_in_quick_edit" => true,
                //     )
                // ),
            );

            if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
                foreach ($all_custom_taxonmy as $taxonomy) {
                    call_user_func_array('register_taxonomy', $taxonomy);
                }
            }

            flush_rewrite_rules();
        }
    } //end class

    if (class_exists('WPBoilerplate_Custom_Post_Type')) {
        WPBoilerplate_Custom_Post_Type::getInstance();
    }
}
