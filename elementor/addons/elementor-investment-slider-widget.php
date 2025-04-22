<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Investment_Slider_Item_Widget extends Widget_Base
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
        return 'wpboilerplate-investment-single-item-widget';
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
        return esc_html__('Investment Single Item : 01', 'wpboilerplate-core');
    }

    public function get_keywords()
    {
        return ['ThemeIM', 'wpboilerplate', 'image box'];
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
        return 'eicon-image';
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
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('What We Do', 'wpboilerplate-core'),
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter  description.', 'wpboilerplate-core'),
                'default' => esc_html__('Top Packages', 'wpboilerplate-core'),
            ]
        );
        $this->add_control('investment_items', [
            'label' => esc_html__('Testimonial Item', 'wpboilerplate-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),

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
                'label' => esc_html__('slidesToShow', 'wpboilerplate-core'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__('you can set how many item show in slider', 'wpboilerplate-core'),
                'default' => '3',
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
                'size_units' => ['px']
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'wpboilerplate-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'wpboilerplate-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'wpboilerplate-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
                'default' => 'no'
            ]
        );
        $this->add_control(
            'dots',
            [
                'label' => esc_html__('Dots', 'wpboilerplate-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'wpboilerplate-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
                'default' => [
                    'value' => 'fas fa-arrow-left',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'wpboilerplate-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'center',
            [
                'label' => esc_html__('Center', 'wpboilerplate-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'wpboilerplate-core'),

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
        $all_investment_items = $settings['investment_items'];
        $rand_numb = rand(333, 999999999);
        //slider settings

        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 3),
            "center" => esc_attr($settings['center']),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "dot" => esc_attr($settings['dots']),
            "navleft" => wpboilerplate_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => wpboilerplate_core()->render_elementor_icons($settings['nav_right_arrow'])

        ]
?>
        <div class="investment-carousel-wrapper wpboilerplate-rtl-slider">
            <div class="investment-carousel"
                id="investment-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                data-settings='<?php echo json_encode($slider_settings) ?>'>
                <?php
                foreach ($all_investment_items as $item):

                ?>
                    <div class="ps-outer-wrap">
                        <div class="investment-single-item">
                            <h4 class="title">
                                <?php $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $item['title']);
                                print wp_kses($title, wpboilerplate_core()->kses_allowed_html('all')); ?>
                            </h4>
                            <p><?php echo $item['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slick-carousel-controls">
                <?php if (!empty($settings['nav'])) : ?>
                    <div class="investment-slider-nav"></div>
                <?php endif; ?>
                <div class="slider-dots"></div>
            </div>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Investment_Slider_Item_Widget());
