<?php

$css_files = array(
    array(
        'handle' => 'wpboilerplate-core-main-style',
        'src' => WPBOILERPLATE_CORE_CSS . '/main-style.css',
        'deps' => array(),
    )
);

if (!wpboilerplate_core()->is_wpboilerplate_active()) {
    $css_files[] = array(
        'handle' => 'animate',
        'src' => WPBOILERPLATE_CORE_CSS . '/animate.css',
        'deps' => array(),
    );
    $css_files[] = array(
        'handle' => 'bootstrap',
        'src' => WPBOILERPLATE_CORE_CSS . '/bootstrap.min.css',
        'deps' => array(),
    );
    $css_files[] = array(
        'handle' => 'wpboilerplate-main-style',
        'src' => WPBOILERPLATE_CORE_CSS . '/theme-style.css',
        'deps' => array(),
    );
    $css_files[] = array(
        'handle' => 'wpboilerplate-responsive',
        'src' => WPBOILERPLATE_CORE_CSS . '/theme-responsive.css',
        'deps' => array(),
    );
}

return $css_files;
