<?php

$js_files = array(
    array(
        'handle' => 'wow',
        'src' => WPBOILERPLATE_CORE_JS . '/wow.min.js',
        'deps' => array('jquery'),
        'in_footer' => true
    ),
    array(
        'handle' => 'waypoints',
        'src' => WPBOILERPLATE_CORE_JS . '/waypoints.min.js',
        'deps' => array('jquery'),
        'in_footer' => true
    ),
    array(
        'handle' => 'slick',
        'src' => WPBOILERPLATE_CORE_JS . '/slick.min.js',
        'deps' => array('jquery'),
        'in_footer' => true
    ),
    array(
        'handle' => 'gsap',
        'src' => WPBOILERPLATE_CORE_JS . '/gsap.min.js',
        'deps' => array('jquery'),
        'in_footer' => true
    ),
    array(
        'handle' => 'main',
        'src' => WPBOILERPLATE_CORE_JS . '/main.js',
        'deps' => array('jquery'),
        'in_footer' => true
    ),
);

if (!wpboilerplate_core()->is_wpboilerplate_active()) {
    $js_files[] = array(
        'handle' => 'bootstrap',
        'src' => WPBOILERPLATE_CORE_JS . '/bootstrap.min.js',
        'deps' => array('jquery'),
        'in_footer' => true
    );
}

return $js_files;
