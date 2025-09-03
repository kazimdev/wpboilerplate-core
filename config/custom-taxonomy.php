<?php

return array(
    array(
        'taxonomy' => 'property_cat',
        'object_type' => 'property',
        'args' => array(
            "labels" => array(
                "name" => esc_html__("Property Category", 'wpboilerplate-core'),
                "singular_name" => esc_html__("Property Category", 'wpboilerplate-core'),
                "menu_name" => esc_html__("Property Category", 'wpboilerplate-core'),
                "all_items" => esc_html__("All Property Category", 'wpboilerplate-core'),
                "add_new_item" => esc_html__("Add New Property Category", 'wpboilerplate-core')
            ),
            "public" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => array('slug' => 'property_cat', 'with_front' => true),
            "show_admin_column" => true,
            "show_in_rest" => true,
            "show_in_quick_edit" => true,
        )
    ),
);
