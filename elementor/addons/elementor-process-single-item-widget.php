<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Process_Single_Item_Widget extends Widget_Base
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
        return 'wpboilerplate-process-single-item-widget';
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
        return esc_html__('Process Single Item : 01', 'wpboilerplate-core');
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
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'wpboilerplate-core'),
                'default' => esc_html__('Luxury & Comfort', 'wpboilerplate-core'),
            ]
        );
        $repeater->add_control(
            'process_number',
            [
                'label' => esc_html__('Process Number', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter process number.', 'wpboilerplate-core'),
                'default' => esc_html__('01', 'wpboilerplate-core'),
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter text.', 'wpboilerplate-core'),
                'default' => esc_html__('Flying should be a pleasure and we’ll make your charter experience as luxurious and comfortable as possible.', 'wpboilerplate-core')
            ]
        );
        $repeater->add_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'wpboilerplate-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'wpboilerplate-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'wpboilerplate-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'wpboilerplate-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        $this->add_control('process_items', [
            'label' => esc_html__('Testimonial Item', 'wpboilerplate-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'title' => esc_html__('William Evans', 'wpboilerplate-core'),
                    'description' => esc_html__("Convallis convallis tellus id interdum velit laoreet id donec ultrices. the for pulvinar neque laoreet suspendisse interdum consectetur libero id. cras adipiscing enim eu turpis.", 'wpboilerplate-core'),
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


        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('icon_color_circle', [
            'label' => esc_html__('Icon Circle Background Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .process-single-item .icon:before" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .process-single-item .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .process-single-item .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_color', [
            'label' => esc_html__('Paragraph Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .process-single-item .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'wpboilerplate-core'),
            'name' => 'background',
            'selector' => "{{WRAPPER}} .process-single-item "
        ]);
        $this->add_control('dot_color', [
            'label' => esc_html__('Dot Border Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .slick-carousel-controls .slick-dots li button" => "border-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        /* icon hover controls tabs end */


        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Typography Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_title_typography',
            'label' => esc_html__('Title Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .process-single-item .content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_paragraph_typography',
            'label' => esc_html__('Paragraph Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .process-single-item .content p"
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
        $all_process_items = $settings['process_items'];
        $rand_numb = rand(333, 999999999);

        //slider settings

        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            //            "items" => esc_attr($settings['items'] ?? 3),
            "center" => esc_attr($settings['center']),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "dot" => esc_attr($settings['dots']),
            "navleft" => wpboilerplate_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => wpboilerplate_core()->render_elementor_icons($settings['nav_right_arrow'])

        ]
?>
        <div class="process-carousel-wrapper wpboilerplate-rtl-slider">
            <div class="process-carousel"
                id="process-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                data-settings='<?php echo json_encode($slider_settings) ?>'>
                <?php
                foreach ($all_process_items as $item): ?>
                    <div class="ps-outer-wrap">
                        <div class="process-single-item">
                            <div class="icon">
                                <?php
                                if (!empty($item['process_number'])) {
                                    printf('<span class="title">%1$s</span>',  esc_html($item['process_number']));
                                }
                                ?>
                            </div>
                            <div class="content">
                                <?php
                                if (!empty($item['title'])) {
                                    printf('<a %1$s ><h3 class="title">%2$s</h3></a>', $this->get_render_attribute_string('link_wrapper'), esc_html($item['title']));
                                }
                                if (!empty($item['description'])) {
                                    printf('<p>%1$s</p>', esc_html($item['description']));
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="slick-carousel-controls">
                <?php if (!empty($settings['nav'])) : ?>
                    <div class="process-slider-nav"></div>
                <?php endif; ?>
                <div class="slider-dots"></div>
            </div>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Process_Single_Item_Widget());
