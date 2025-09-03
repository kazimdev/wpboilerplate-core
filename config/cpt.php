<?php

return array(
    [
        'post_type' => 'property',
        'args' => array(
            'label' => esc_html__('Property Post', 'wpboilerplate-core'),
            'description' => esc_html__('Property Post', 'wpboilerplate-core'),
            'labels' => array(
                'name' => esc_html_x('Property Post', 'Post Type General Name', 'wpboilerplate-core'),
                'singular_name' => esc_html_x('Property Post', 'Post Type Singular Name', 'wpboilerplate-core'),
                'menu_name' => esc_html__('Property Post', 'wpboilerplate-core'),
                'all_items' => esc_html__('Property Post', 'wpboilerplate-core'),
                'view_item' => esc_html__('View Arabic Post', 'wpboilerplate-core'),
                'add_new_item' => esc_html__('Add New Property Post', 'wpboilerplate-core'),
                'add_new' => esc_html__('Add New Property Post', 'wpboilerplate-core'),
                'edit_item' => esc_html__('Edit Property Post', 'wpboilerplate-core'),
                'update_item' => esc_html__('Update Property Post', 'wpboilerplate-core'),
                'search_items' => esc_html__('Search Property Post', 'wpboilerplate-core'),
                'not_found' => esc_html__('Not Found', 'wpboilerplate-core'),
                'not_found_in_trash' => esc_html__('Not found in Trash', 'wpboilerplate-core'),
                'featured_image' => esc_html__('Property Post Image', 'wpboilerplate-core'),
                'remove_featured_image' => esc_html__('Remove Property Image', 'wpboilerplate-core'),
                'set_featured_image' => esc_html__('Set Property Post Image', 'wpboilerplate-core'),
            ),
            'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
            'taxonomies' => array('post_tag'), // this is IMPORTANT
            'hierarchical' => false,
            'public' => true,
            "publicly_queryable" => true,
            'show_ui' => true,
            'show_in_menu' => 'wpboilerplate_theme_options',
            "rewrite" => array('slug' => 'property', 'with_front' => true),
            'can_export' => true,
            'capability_type' => 'post',
            "show_in_rest" => true,
            'query_var' => true
        )
    ]
);
