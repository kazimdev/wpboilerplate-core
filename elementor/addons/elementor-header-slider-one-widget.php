<?php

/**
 * Elementor Widget
 * @package wpboilerplate
 * @since 1.0.0
 */

namespace Elementor;

class wpboilerplate_Header_Area_One_Widget extends Widget_Base
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
		return 'wpboilerplate-header-slider-one-widget';
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
		return esc_html__('Header Slider: 01', 'wpboilerplate-core');
	}

	public function get_keywords()
	{
		return ['Slider', 'Banner', 'Showcase', "Ir Tech", 'wpboilerplate'];
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
		return 'eicon-archive-title';
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
	protected function _register_controls()
	{

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__('Section Contents', 'wpboilerplate-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'background_image',
			[
				'label' => esc_html__('Background Image', 'wpboilerplate-core'),
				'type' => Controls_Manager::MEDIA,
				'show_label' => false,
				'description' => esc_html__('upload background image', 'wpboilerplate-core'),
				'default' => [
					'src' => Utils::get_placeholder_image_src()
				],
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'wpboilerplate-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Prosfer with a good planning and assets.', 'wpboilerplate-core'),
				'description' => esc_html__('enter title', 'wpboilerplate-core')
			]
		);
		$repeater->add_control(
			'description_status',
			[
				'label' => esc_html__('Description Show/Hide', 'wpboilerplate-core'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__('show/hide description', 'wpboilerplate-core')
			]
		);
		$repeater->add_control(
			'description',
			[
				'label' => esc_html__('Description', 'wpboilerplate-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('We seamlessly merge two key components – economics & informatio', 'wpboilerplate-core'),
				'description' => esc_html__('enter description', 'wpboilerplate-core'),
				'condition' => ['description_status' => 'yes']
			]
		);
		$repeater->add_control(
			'btn_status',
			[
				'label' => esc_html__('Button Show/Hide', 'flynext-core'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__('show/hide button', 'flynext-core')
			]
		);
		$repeater->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button Text', 'flynext-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Make Your Trip', 'flynext-core'),
				'description' => esc_html__('enter button text', 'flynext-core'),
				'condition' => ['btn_status' => 'yes']
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_html__('Button URL', 'flynext-core'),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#'
				],
				'description' => esc_html__('enter button url', 'flynext-core'),
				'condition' => ['btn_status' => 'yes']
			]
		);
		$this->add_control('header_sliders', [
			'label' => esc_html__('Header Slider Items', 'wpboilerplate-core'),
			'type' => Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				[
					'background_image' => array(
						'url' => Utils::get_placeholder_image_src()
					),
					'description' => esc_html__('We seamlessly merge two key components – economics & informatio', 'wpboilerplate-core'),
					'title' => esc_html__('Prosfer with a good planning and assets.', 'wpboilerplate-core'),
				]
			],

		]);
		$this->end_controls_section();
		$this->start_controls_section(
			'slider_settings_section',
			[
				'label' => esc_html__('Slider Settings', 'wpboilerplate-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'items',
			[
				'label' => esc_html__('Items', 'wpboilerplate-core'),
				'type' => Controls_Manager::TEXT,
				'description' => esc_html__('you can set how many item show in slider', 'wpboilerplate-core'),
				'default' => '1'
			]
		);
		$this->add_control(
			'margin',
			[
				'label' => esc_html__('Margin', 'wpboilerplate-core'),
				'description' => esc_html__('you can set margin for slider', 'wpboilerplate-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'size_units' => ['px'],
				'condition' => array(
					'autoplay' => 'yes'
				)
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => esc_html__('Loop', 'wpboilerplate-core'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
				'default' => 'yes'
			]
		);
		$this->add_control(
			'nav',
			[
				'label' => esc_html__('Nav', 'wpboilerplate-core'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
				'default' => 'yes'
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => esc_html__('Autoplay', 'wpboilerplate-core'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
				'default' => 'yes'
			]
		);
		$this->add_control(
			'autoplaytimeout',
			[
				'label' => esc_html__('Autoplay Timeout', 'wpboilerplate-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10000,
						'step' => 2,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 5000,
				],
				'size_units' => ['px'],
				'condition' => array(
					'autoplay' => 'yes'
				)
			]

		);
		$this->end_controls_section();


		$this->start_controls_section(
			'css_styles',
			[
				'label' => esc_html__('Styling Settings', 'wpboilerplate-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control('slider_title_color', [
			'label' => esc_html__('Slider Title Color', 'wpboilerplate-core'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .header-area .title" => "color: {{VALUE}}"
			]
		]);
		$this->add_control('description_color', [
			'label' => esc_html__('Description Title Color', 'wpboilerplate-core'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .header-area .header-inner p" => "color: {{VALUE}}"
			]
		]);
		$this->add_control('icon_color', [
			'label' => esc_html__('Icon Color', 'wpboilerplate-core'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .header-area .video-play-btn" => "color: {{VALUE}}"
			]
		]);
		$this->add_control('icon_bg_color', [
			'label' => esc_html__('Icon Background Color', 'wpboilerplate-core'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				"{{WRAPPER}} .header-area .video-play-btn" => "background-color: {{VALUE}}"
			]
		]);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'wpboilerplate-core'),
				'selector' => '{{WRAPPER}} .video-play-btn:before',
			]
		);
		$this->add_responsive_control('padding', [
			'label' => esc_html__('Padding', 'wpboilerplate-core'),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => ['px', 'em'],
			'allowed_dimensions' => ['top', 'bottom'],
			'selectors' => [
				'{{WRAPPER}} .header-area' => 'padding-top: {{TOP}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};'
			],
			'description' => esc_html__('set padding for header area ', 'wpboilerplate-core')
		]);
		$this->add_control('overlay_color', [
			'label' => esc_html__('Overlay Color', 'wpboilerplate-core'),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .header-area.header-bg::before' => 'background-color:{{VALUE}};'
			],
		]);

		$this->end_controls_section();


		/*  slider nav styling tabs start */
		$this->start_controls_section(
			'nav_settings_section',
			[
				'label' => esc_html__('Nav Settings', 'wpboilerplate-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'nav_style_tabs'
		);

		$this->start_controls_tab(
			'nav_style_normal_tab',
			[
				'label' => __('Active Style', 'wpboilerplate-core'),
			]
		);

		$this->add_control('nav_color', [
			'type' => Controls_Manager::COLOR,
			'label' => esc_html__('Title Color', 'wpboilerplate-core'),
			'selectors' => [
				"{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current .title" => "color: {{VALUE}}",
			]
		]);
		$this->add_control('nav_paragraph_color', [
			'type' => Controls_Manager::COLOR,
			'label' => esc_html__('Paragraph Color', 'wpboilerplate-core'),
			'selectors' => [
				"{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current p" => "color: {{VALUE}}",
			]
		]);
		$this->add_control('nav_bg_color', [
			'type' => Controls_Manager::COLOR,
			'label' => esc_html__('Background Color', 'wpboilerplate-core'),
			'selectors' => [
				"{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current" => "background-color: {{VALUE}}",
			]
		]);
		$this->add_control('nav_border_background', [
			'type' => Controls_Manager::COLOR,
			'label' => esc_html__('Border Top Color', 'wpboilerplate-core'),
			'selectors' => [
				"{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item.slick-current" => "border-color: {{VALUE}}",
			]
		]);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'nav_style_hover_tab',
			[
				'label' => esc_html__('Normal', 'wpboilerplate-core'),
			]
		);

		$this->add_control('nav_hover_color', [
			'type' => Controls_Manager::COLOR,
			'label' => esc_html__('Title Color', 'wpboilerplate-core'),
			'selectors' => [
				"{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item .title" => "color: {{VALUE}}",
			]
		]);
		$this->add_control('nav_hover_paragraph_color', [
			'type' => Controls_Manager::COLOR,
			'label' => esc_html__('Paragraph Color', 'wpboilerplate-core'),
			'selectors' => [
				"{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item p" => "color: {{VALUE}}",
			]
		]);
		$this->add_control('nav_hover_bg_color', [
			'type' => Controls_Manager::COLOR,
			'label' => esc_html__('Background Color', 'wpboilerplate-core'),
			'selectors' => [
				"{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item" => "background-color: {{VALUE}}",
			]
		]);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		/*  slider nav styling tabs end */

		/* typography settings start */
		$this->start_controls_section('typography_settings', [
			'label' => esc_html__('Typography Settings', 'wpboilerplate-core'),
			'tab' => Controls_Manager::TAB_STYLE
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name' => 'title_typography',
			'label' => esc_html__('Title Typography', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .header-area .title"
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name' => 'paragraph_typography',
			'label' => esc_html__('Paragraph Typography', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .header-area p"
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name' => 'nav_title_typography',
			'label' => esc_html__('Nav Title Typography', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item .title"
		]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
			'name' => 'nav_paragraph_typography',
			'label' => esc_html__('Nav Paragraph Typography', 'wpboilerplate-core'),
			'selector' => "{{WRAPPER}} .header-carousel-wrapper .main-slider-nav .slide-item p"
		]);
		$this->end_controls_section();
		/* typography settings end */
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
		$all_header_items = $settings['header_sliders'];
		$rand_numb = rand(333, 999999999);

		$slider_settings = [
			"loop" => esc_attr($settings['loop']),
			"margin" => esc_attr($settings['margin']['size'] ?? 0),
			"items" => esc_attr($settings['items'] ?? 1),
			"autoplay" => esc_attr($settings['autoplay']),
			"autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
		]
?>
		<div class="header-carousel-wrapper wpboilerplate-rtl-slider">
			<div class="main-slider header-slider-one"
				id="header-one-carousel-<?php echo esc_attr($rand_numb); ?>"
				data-settings='<?php echo json_encode($slider_settings) ?>'>
				<?php
				foreach ($all_header_items as $item):
					$image_id = $item['background_image']['id'];
					$image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
					$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				?>
					<div class="header-area header-bg">
						<div class="container">
							<div class="row">
								<div class="col-lg-7">
									<div class="header-inner">
										<h2 class="title"><?php echo esc_html($item['title']) ?></h2>
										<?php if ($item['description_status'] == 'yes'): ?>
											<div class="description padding-padding-20">
												<p><?php echo esc_html($item['description']) ?></p>
											</div>
										<?php endif; ?>
										<div class="btn-wrap desktop-left">
											<?php if ($item['btn_status'] == 'yes'): ?>
												<a href="<?php echo esc_url($item['btn_link']['url']) ?>"
													class="boxed-btn yellow-btn"><?php echo esc_html($item['btn_text']) ?></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="col-lg-5">
									<div class="thumb">
										<img src="<?php echo esc_url($image_url) ?>"
											alt="<?php echo esc_url($image_alt) ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="slick-carousel-controls">
				<?php if (!empty($settings['nav'])) : ?>
					<div class="slider-nav"></div>
				<?php endif; ?>
				<div class="slider-dots"></div>
			</div>

			<svg width="211" height="95" viewBox="0 0 211 95" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M32.63 38.5081C33.8762 34.7436 34.4994 32.8614 35.4842 31.2659C36.9668 28.864 39.0584 26.897 41.5467 25.5646C43.1996 24.6795 45.1166 24.1731 48.9504 23.1601L128.825 2.05717C133.396 0.84947 135.682 0.245617 137.869 0.274824C141.162 0.318814 144.361 1.37794 147.03 3.30763C148.802 4.58889 150.276 6.43728 153.223 10.1341L204.727 74.73C207.199 77.8305 208.436 79.3807 209.234 81.0773C210.436 83.6313 210.94 86.4578 210.697 89.2699C210.535 91.1379 209.912 93.0201 208.666 96.7846L179.426 185.11C177.224 191.76 176.124 195.084 174.225 197.39C171.361 200.869 167.164 202.978 162.664 203.201C159.68 203.348 156.355 202.248 149.706 200.046L18.3266 156.553C11.6768 154.352 8.35186 153.251 6.04586 151.352C2.56776 148.489 0.458236 144.291 0.235565 139.791C0.087935 136.808 1.18864 133.483 3.39006 126.833L32.63 38.5081Z" fill="#6908D8" />
			</svg>
		</div>
<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new wpboilerplate_Header_Area_One_Widget());
