<?php

/**
 * Get Theme Options
 * @package wpboilerplate
 * @since 1.0.0
 */

if (! function_exists('cs_get_option')) {
	function cs_get_option($option = '', $default = null)
	{
		$options = get_option('wpboilerplate_theme_options'); // Attention: Set your unique id of the framework
		return (isset($options[$option])) ? $options[$option] : $default;
	}
}

/**
 * Get Switcher Options
 * @package wpboilerplate
 * @since 1.0.0
 */

if (! function_exists('cs_get_switcher_option')) {

	function cs_get_switcher_option($option = '', $default = null)
	{
		$options = get_option('wpboilerplate_theme_options'); // Attention: Set your unique id of the framework
		$return_val =  (isset($options[$option])) ? $options[$option] : $default;
		$return_val =  (is_null($return_val) || '1' == $return_val) ? true : false;;
		return $return_val;
	}
}

/**
 * Get Customize Options
 * @package wpboilerplate
 * @since 1.0.0
 */

if (! function_exists('cs_get_customize_option') && class_exists('CSF')) {

	function cs_get_customize_option($option = '', $default = null)
	{
		$options = get_option('wpboilerplate_customize_options'); // Attention: Set your unique id of the framework
		return (isset($options[$option])) ? $options[$option] : $default;
	}
}
