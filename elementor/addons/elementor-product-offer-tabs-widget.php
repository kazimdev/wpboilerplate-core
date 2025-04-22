<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Product_Offer_Tabs_Widget extends Widget_Base
{
	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name()
	{
		return 'wpboilerplate-product-offer-tabs-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title()
	{
		return esc_html__('Latest/Discount Products', 'wpboilerplate-core');
	}

	public function get_keywords()
	{
		return ['latest', 'discount', 'wpboilerplate', 'products', 'offers', 'tabs'];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon()
	{
		return 'eicon-pojome';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories()
	{
		return ['wpboilerplate_widgets'];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls()
	{
		$this->start_controls_section(
			'quiery_section',
			[
				'label' => esc_html__('Query', 'wpboilerplate-core'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_menu_styling_section',
			[
				'label' => esc_html__('Product Menu Styling', 'wpboilerplate-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_bottom_space',
			[
				'label'      => esc_html__('Menu Bottom Space', 'wpboilerplate-core'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'title_style_tabs'
		);

		$this->start_controls_tab(
			'title_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'wpboilerplate-core'),
			]
		);
		$this->add_control('menu_color', [
			'label'     => esc_html__('Menu Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li" => "color: {{VALUE}}"
			]
		]);

		$this->add_control('menu_bg_color', [
			'label'     => esc_html__('Menu BG Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li:after" => "background-color: {{VALUE}}"
			]
		]);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'label'    => esc_html__('Border', 'wpboilerplate-core'),
				'selector' => '{{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li:after',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'wpboilerplate-core'),
			]
		);

		$this->add_control('menu_hover_color', [
			'label'     => esc_html__('Menu Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li:hover, 
                {{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li.active" => "color: {{VALUE}}"
			]
		]);

		$this->add_control('menu_bg_hover_color', [
			'label'     => esc_html__('Menu BG Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li:hover:after, 
			    {{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li.active:after" => "background-color: {{VALUE}}"
			]
		]);

		$this->add_control('menu_border_color', [
			'label'     => esc_html__('Border Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li:hover:after, 
			    {{WRAPPER}} .wpboilerplate-product-outer-wrapper .product-menu li.active:after" => "border-color: {{VALUE}}"
			]
		]);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'content_styling_section',
			[
				'label' => esc_html__('Content Styling', 'wpboilerplate-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control('normal_background_color', [
			'label'     => esc_html__('Background', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-product-box" => "background-color: {{VALUE}};"
			]
		]);
		$this->add_control('normal_title_color', [
			'label'     => esc_html__('Title Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-product-box .content .title" => "color: {{VALUE}};"
			]
		]);
		$this->add_control('normal_description_color', [
			'label'     => esc_html__('Description Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-product-box .content p" => "color: {{VALUE}};"
			]
		]);
		$this->add_control('normal_price_color', [
			'label'     => esc_html__('Price Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-product-box .content p" => "color: {{VALUE}};"
			]
		]);
		$this->end_controls_section();

		/* button styling */

		$this->start_controls_section('button_section', [
			'label' => esc_html__('Button Settings', 'wpboilerplate-core'),
			'tab'   => Controls_Manager::TAB_STYLE
		]);

		$this->start_controls_tabs('button_styling');

		$this->start_controls_tab('normal_style', [
			'label' => esc_html__('Button Normal', "wpboilerplate-core")
		]);

		$this->add_control('button_normal_color', [

			'label'     => esc_html__('Button Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}}  .single-product-box .content .add_to_cart_button" => "color: {{VALUE}}"
			]

		]);

		$this->add_control('divider_01', [
			'type' => Controls_Manager::DIVIDER
		]);

		//        $this->add_group_control(Group_Control_Background::get_type(), [
		//
		//            'name' => 'button_background',
		//            'label' => esc_html__('Button Background ', 'wpboilerplate-core'),
		//            'selector' => "{{WRAPPER}}  .single-product-box .content .add_to_cart_button"
		//        ]);

		$this->add_control('divider_02', [

			'type' => Controls_Manager::DIVIDER

		]);

		$this->add_group_control(Group_Control_Border::get_type(), [
			'name'     => 'button_border',
			'label'    => esc_html__('Border', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .single-product-box .content .add_to_cart_button"
		]);

		$this->end_controls_tab();


		$this->start_controls_tab('hover_style', [
			'label' => esc_html__('Button Hover', "wpboilerplate-core")
		]);

		$this->add_control('button_hover_normal_color', [
			'label'     => esc_html__('Button Color', 'wpboilerplate-core'),
			'type'      => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .single-product-box .content .add_to_cart_button:hover" => "color: {{VALUE}}"
			]
		]);

		$this->add_control('divider_03', [
			'type' => Controls_Manager::DIVIDER
		]);

		$this->add_group_control(Group_Control_Background::get_type(), [
			'name'     => 'button_hover_background',
			'label'    => esc_html__('Button Background ', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .single-product-box .content .add_to_cart_button:hover"
		]);

		$this->add_control('divider_04', [
			'type' => Controls_Manager::DIVIDER
		]);

		$this->add_group_control(Group_Control_Border::get_type(), [
			'name'     => 'hover_button_border',
			'label'    => esc_html__('Border', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .single-product-box .content .add_to_cart_button:hover"
		]);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control('divider_05', [

			'type' => Controls_Manager::DIVIDER

		]);

		$this->add_control(

			'button_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'wpboilerplate-core'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .single-product-box .content .add_to_cart_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		/* button styling end */

		$this->start_controls_section(
			'typography_settings_section',
			[
				'label' => esc_html__('Typography Settings', 'wpboilerplate-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'title_typography',
			'label'    => esc_html__('Title Typography', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .single-product-box .content .title"
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'button_typography',
			'label'    => esc_html__('Button Typography', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .single-product-box .content .add_to_cart_button"
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name'     => 'description_typography',
			'label'    => esc_html__('Description Typography', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .single-product-box .content p"
		]);

		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		// General options
		$post_id     = get_the_ID();
		$total_posts = get_post_meta($post_id, 'total_posts', true);
		$category    = get_post_meta($post_id, 'category', true);

		$tabs = array(
			'latest-products' => 'Latest Products',
			'popular-products' => 'Popular Products',
			'discount-offer' => 'Discount Offer',
		);
?>

		<div class="wpboilerplate-product-outer-wrapper">
			<!-- Tabs Navigation -->
			<ul class="nav nav-tabs" id="productOfferTabs" role="tablist">
				<?php foreach ($tabs as $key => $value) {

					$activeClass = ('latest-products' == $key) ? ' active' : '';

					echo '<li class="nav-item"> <a class="nav-link ' . $activeClass . '" id="' . $key . '-tab" data-bs-toggle="tab" href="#' . $key . '"
                       role="tab" aria-controls="' . $key . '" aria-selected="true"> ' . $value . ' </a> </li>';
				} ?>
			</ul>

			<!-- Tab Content -->
			<div class="tab-content" id="productOfferContent">
				<?php
				foreach ($tabs as $key => $value) {
					$args = array(
						'post_type'      => 'product',
						'posts_per_page' => 5,
						'post_status'    => 'publish',
					);

					if ('discount-offer' == $key) {
						$products = $this->get_sale_products(array(
							'posts_per_page' => 5,  // Show 12 products per page
							'orderby'        => 'meta_value_num',
							'meta_key'       => '_price',
							'order'          => 'ASC'  // Sort by price low to high
						));
					} elseif ('popular-products' == $key) {
						$products = $this->get_bestselling_products(array(
							'posts_per_page' => 5,  // Show top 5 bestsellers
							'date_query'     => array(
								'after' => '30 days ago'  // Only products sold in last 30 days
							)
						));
					} else {

						$products = new \WP_Query($args);
					}


					$activeClass = ('latest-products' == $key) ? ' show active' : '';
				?>
					<!-- Products Tab -->
					<div class="tab-pane fade <?php echo $activeClass; ?>" id="<?php echo $key; ?>" role="tabpanel"
						aria-labelledby="<?php echo $key; ?>-tab">
						<div class="product-wrapper">
							<?php
							// echo "<p>" . $value . "</p>";
							while ($products->have_posts()) : $products->the_post();
								global $product; ?>
								<div class="product-card">
									<div class="product-image">
										<?php if ($product->is_in_stock()) : ?>
											<span class="stock-status">In Stock</span>
										<?php else : ?>
											<span class="stock-status out-of-stock">Out of Stock</span>
										<?php endif; ?>
										<a href="<?php echo esc_url($product->get_permalink()); ?>">
											<img src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())); ?>"
												alt="<?php echo esc_attr($product->get_name()); ?>">
										</a>
									</div>
									<div class="product-info">
										<h3 class="product-title">
											<a href="<?php echo esc_url($product->get_permalink()); ?>">
												<?php echo esc_html($product->get_name()); ?>
											</a>
										</h3>

										<div class="product-price">
											<span class="sale-price"><?php echo $product->get_price_html(); ?></span>
										</div>

										<?php if ($product->is_in_stock() && $product->is_type('simple')) : ?>
											<form class="add-to-cart-form" method="post"
												action="<?php echo esc_url(home_url('/?add-to-cart=' . $product->get_id())); ?>">
												<button type="button" class="add-to-cart-button ajax-add-to-cart"
													data-product_id="<?php echo esc_attr($product->get_id()); ?>">
													Add to Cart
												</button>
												<span class="added-message" style="display:none;">Added!</span>
											</form>
										<?php endif; ?>

										<?php if ($product->is_type('variable')) : ?>
											<a href="<?php echo esc_url($product->get_permalink()); ?>" class="add-to-cart-button">
												Select Options
											</a>
										<?php endif; ?>

									</div>
								</div>
							<?php endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
<?php
	}

	/**
	 * Query WooCommerce best selling products
	 * 
	 * @param array $args Additional WP_Query arguments
	 * @return WP_Query Query result with best selling products
	 */
	function get_bestselling_products($args = array())
	{
		// Default query arguments
		$default_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => -1,
			'meta_key'            => 'total_sales',
			'orderby'            => 'meta_value_num',
			'order'              => 'DESC',
			'meta_query'         => array(
				array(
					'key'     => '_price',
					'value'   => 0,
					'compare' => '>',
					'type'    => 'NUMERIC'
				),
				array(
					'key'     => 'total_sales',
					'value'   => 0,
					'compare' => '>',
					'type'    => 'NUMERIC'
				)
			),
			'tax_query'          => array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'exclude-from-catalog',
					'operator' => 'NOT IN',
				),
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				)
			)
		);

		// Merge user arguments with defaults
		$query_args = wp_parse_args($args, $default_args);

		// Create new query
		$query = new \WP_Query($query_args);

		return $query;
	}

	/**
	 * Query WooCommerce products that are on sale
	 * 
	 * @param array $args Additional WP_Query arguments
	 * @return WP_Query Query result with sale products
	 */
	function get_sale_products($args = array())
	{
		// Get all product ids on sale
		$product_ids_on_sale = wc_get_product_ids_on_sale();

		// Default query arguments
		$default_args = array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'date',
			'order'          => 'DESC',
			'post__in'       => array_merge(array(0), $product_ids_on_sale), // Include 0 to prevent showing all products when there are no sales
			'meta_query'     => array(
				'relation' => 'AND',
				array(
					'key'     => '_price',
					'value'   => 0,
					'compare' => '>',
					'type'    => 'NUMERIC'
				),
				array(
					'key'     => '_sale_price',
					'value'   => 0,
					'compare' => '>',
					'type'    => 'NUMERIC'
				)
			),
			'tax_query'      => array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'exclude-from-catalog',
					'operator' => 'NOT IN',
				)
			)
		);

		// Merge user arguments with defaults
		$query_args = wp_parse_args($args, $default_args);

		// Create new query
		$query = new \WP_Query($query_args);

		return $query;
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Product_Offer_Tabs_Widget());
