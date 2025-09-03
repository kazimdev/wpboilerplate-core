<?php

$php_files = array(
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
    $php_files[] = array(
        'file-name' => 'theme-elementor-icon-manager',
        'folder-name' => WPBOILERPLATE_CORE_INC
    );
}

return $php_files;
