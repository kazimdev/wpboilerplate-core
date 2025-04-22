<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Section_Title_One_Widget extends Widget_Base
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
        return 'wpboilerplate-theme-heading-title-one-widget';
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
        return esc_html__('Heading Title: 01', 'wpboilerplate-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Heading', 'Title', "ThemeIM", 'WPBoilerplate'];
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
        return 'eicon-heading';
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
        $this->add_control(
            'white_section_title',
            [
                'label' => esc_html__('Subtitle Plane Animation', 'wpboilerplate-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'white' => esc_html__('White Style', 'wpboilerplate-core'),
                    '' => esc_html__('Default Style', 'wpboilerplate-core'),
                ],
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('About WPBoilerplate', 'wpboilerplate-core'),
                'description' => esc_html__('enter title. use {c} color text {/c} for color text', 'wpboilerplate-core'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('What We Do', 'wpboilerplate-core'),
            ]
        );
        $this->add_control(
            'description_status',
            [
                'label' => esc_html__('Description Show/Hide', 'wpboilerplate-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'wpboilerplate-core'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter  description.', 'wpboilerplate-core'),
                'default' => esc_html__('Top Packages', 'wpboilerplate-core'),
                'condition' => ['description_status' => 'yes']
            ]
        );
        $this->add_responsive_control(
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

        $this->end_controls_section();

        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'shape_top_space',
            [
                'label' => esc_html__('Sub Title Margin Bottom', 'wpboilerplate-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme-heading-title .subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_bottom_space',
            [
                'label' => esc_html__('Title Bottom Space', 'wpboilerplate-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme-heading-title .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('subtitle_color', [
            'label' => esc_html__('Sub Title Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .subtitle" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('subtitle_bg_color', [
            'label' => esc_html__('Sub Title Background Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .subtitle" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'wpboilerplate-core'),
                'selector' => '{{WRAPPER}} .theme-heading-title .subtitle',
            ]
        );
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Box Border Radius', 'wpboilerplate-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .theme-heading-title .subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('subtitle_extra_color', [
            'label' => esc_html__('Sub Title Extra Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .subtitle span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('description_color', [
            'label' => esc_html__('Description Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title p" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_extra_color', [
            'label' => esc_html__('Title Extra Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .title span" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_section();
        $this->start_controls_section(
            'styling_typogrpahy_section',
            [
                'label' => esc_html__('Typography Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'sub_title_typography',
            'label' => esc_html__('Sub Title Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .subtitle"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_extra_typography',
            'label' => esc_html__('Title Extra Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .title span"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title p"
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
?>
        <div class="theme-heading-title <?php echo $settings['white_section_title'] ?>"
            style="text-align:<?php echo $settings['text_align']; ?>">
            <?php if (!empty($settings['subtitle'])) : ?>
                <div class="subtitle">
                    <?php
                    $subtitle = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['subtitle']);
                    print wp_kses($subtitle, wpboilerplate_core()->kses_allowed_html('all'));
                    ?>
                </div>
            <?php endif; ?>
            <h3 class="title">
                <?php
                $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['title']);
                print wp_kses($title, wpboilerplate_core()->kses_allowed_html('all'));
                ?>
            </h3>
            <?php
            if (!empty($settings['description_status'])) {
                printf('<p>%1$s</p>', esc_html($settings['description']));
            }
            ?>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Section_Title_One_Widget());
