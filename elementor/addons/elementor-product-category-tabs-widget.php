<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Product_Category_Tabs_Widget extends Widget_Base
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
		return 'wpboilerplate-product-category-tabs-widget';
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
		return esc_html__('Product Category Tabs', 'wpboilerplate-core');
	}

	public function get_keywords()
	{
		return ['category', 'wpboilerplate', 'products', 'categories', 'tabs'];
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

		$this->add_control(
			'per_page',
			[
				'label'   => esc_html__('Posts Per Page', 'plugin-name'),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 4,
				'max'     => 100,
				'step'    => 1,
				'default' => 8,
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

		// Get product categories
		$product_categories = get_terms(array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'parent'     => 0,
		));

		// General options
		$post_id     = get_the_ID();
		$total_posts = get_post_meta($post_id, 'total_posts', true);
		$category    = get_post_meta($post_id, 'category', true);
		$order       = get_post_meta($post_id, 'order', true);
		$orderby     = get_post_meta($post_id, 'orderby', true);

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

?>

		<div class="wpboilerplate-product-outer-wrapper">
			<!-- Bootstrap Tabs Navigation -->
			<ul class="nav nav-tabs" id="productCategoryTabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="all-products-tab" data-bs-toggle="tab" href="#all-products"
						role="tab" aria-controls="all-products" aria-selected="true">
						All
					</a>
				</li>
				<?php foreach ($product_categories as $category) : ?>
					<li class="nav-item">
						<a class="nav-link" id="tab-<?php echo esc_attr($category->slug); ?>" data-bs-toggle="tab"
							href="#<?php echo esc_attr($category->slug); ?>" role="tab"
							aria-controls="<?php echo esc_attr($category->slug); ?>" aria-selected="false">
							<?php echo esc_html($category->name); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>

			<!-- Tab Content -->
			<div class="tab-content" id="productCategoryContent">
				<!-- All Products Tab -->
				<div class="tab-pane fade show active" id="all-products" role="tabpanel"
					aria-labelledby="all-products-tab">
					<div class="product-wrapper">
						<?php
						$args = array(
							'post_type'      => 'product',
							'posts_per_page' => $settings['per_page'],
							'paged'          => $paged,
							'order'          => $order,
							'orderby'        => $orderby,
							'post_status'    => 'publish',
						);

						$all_products = new \WP_Query($args);

						while ($all_products->have_posts()) : $all_products->the_post();
							global $product;
						?>
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

				<!-- Individual Category Tabs -->
				<?php foreach ($product_categories as $category) : ?>
					<div class="tab-pane fade" id="<?php echo esc_attr($category->slug); ?>" role="tabpanel"
						aria-labelledby="tab-<?php echo esc_attr($category->slug); ?>">
						<div class="product-wrapper">
							<?php
							$args['tax_query'] = array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'slug',
									'terms'    => $category->slug,
								),
							);

							$category_products = new \WP_Query($args);

							while ($category_products->have_posts()) :

								$category_products->the_post();

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
				<?php endforeach; ?>
			</div>
		</div>
<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Product_Category_Tabs_Widget());
