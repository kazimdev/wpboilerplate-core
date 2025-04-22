<?php

/**
 * Elementor Addons Init
 * @package wpboilerplate
 * @since 1.0.0
 */

if (! defined('ABSPATH')) {
	exit(); // exit if access directly
}


if (! class_exists('WPBoilerplate_Elementor_Widget_Init')) {

	class WPBoilerplate_Elementor_Widget_Init
	{
		/**
		 * $instance
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * construct()
		 * @since 1.0.0
		 */
		public function __construct()
		{
			add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));
			//elementor widget registered
			add_action('elementor/widgets/widgets_registered', array($this, '_widget_registered'));
			// elementor editor css
			add_action('elementor/editor/after_enqueue_scripts', array($this, 'load_assets_for_elementor'));
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
		 * _widget_categories()
		 * @since 1.0.0
		 */
		public function _widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'wpboilerplate_widgets',
				[
					'title' => esc_html__('WPBoilerplate Widgets', 'wpboilerplate-core'),
					'icon'  => 'fas fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 */
		public function _widget_registered()
		{
			if (! class_exists('Elementor\Widget_Base')) {
				return;
			}
			$elementor_widgets = array(
				'accordion',
				'empty-div',
				'read-more-item',
				'header-slider-one',
				'heading-title',
				'icon-box-one',
				'bird-content',
				'stock-content',
				'team-list',
				'investment-slider',
				'process-single-item',
				'product-offer-tabs',
				'product-category-item',
				'product-category-tabs',
				'platform-single-item',
				'request-form',
				'video-hover',
			);

			$elementor_widgets = apply_filters('wpboilerplate_elementor_widget', $elementor_widgets);
			ksort($elementor_widgets);
			if (is_array($elementor_widgets) && ! empty($elementor_widgets)) {
				foreach ($elementor_widgets as $widget) {
					if (file_exists(WPBOILERPLATE_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php')) {
						require_once WPBOILERPLATE_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php';
					}
				}
			}
		}


		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		 */
		public function load_assets_for_elementor()
		{
			wp_enqueue_style('flaticon', WPBOILERPLATE_CORE_CSS . '/flaticon.css');
			wp_enqueue_style('wpboilerplate-core-elementor-style', WPBOILERPLATE_CORE_ADMIN_ASSETS . '/css/elementor-editor.css');
		}
	}

	if (class_exists('WPBoilerplate_Elementor_Widget_Init')) {
		WPBoilerplate_Elementor_Widget_Init::getInstance();
	}
}//end if
