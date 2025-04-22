<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Table_Of_Content_Widget extends Widget_Base
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
        return 'wpboilerplate-table-of-content-widget';
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
        return esc_html__('Table Of Content', 'wpboilerplate-core');
    }

    public function get_keywords()
    {
        return ['ir-tech', 'wpboilerplate', 'image box'];
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
    protected function _register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'is_arabic',
            [
                'label' => esc_html__('Select Arabic Version', 'wpboilerplate-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show arabic.', 'wpboilerplate-core'),
                'default' => 'no'
            ]
        );
        $this->add_control('topic_title', [
            'label' => esc_html__('Topic Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('List of topic', 'wpboilerplate-core')
        ]);
        $this->add_control('cash_title', [
            'label' => esc_html__('Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Acceptance of Terms', 'wpboilerplate-core')
        ]);
        $repeater = new Repeater();
        $repeater->add_control('description', [
            'label' => esc_html__('Description', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('By using the Services, you agree to be bound by these Terms, as well as any additional terms and conditions that may apply to specific features or services provided by Quranuna Inc.. These Terms constitute a legally binding agreement between you and Quranuna Inc..', 'wpboilerplate-core')
        ]);
        $this->add_control(
            'case-study-list',
            [
                'label' => esc_html__('Case Study List', 'wpboilerplate-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'slider_navigation_styling_settings_section',
            [
                'label' => esc_html__('Slider Nav Styling Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
        );

        $this->start_controls_tab(
            'active_hover_style_normal_tab',
            [
                'label' => esc_html__('Active and Hover Style', 'wpboilerplate-core'),
            ]
        );
        $this->add_control('case_menu_title_hover_color', [
            'label' => esc_html__('Menu Title Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .table-of-contents-wrap .toc-navigation .nav-item a.active" => "color: {{VALUE}}",
                "{{WRAPPER}} .table-of-contents-wrap .toc-navigation .nav-item a:hover" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();
        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Normal', 'wpboilerplate-core'),
            ]
        );
        $this->add_control('case_menu_title_hover_color', [
            'label' => esc_html__('Menu Title Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .table-of-contents-wrap .toc-navigation .nav-item" => "color: {{VALUE}}",
                "{{WRAPPER}} .table-of-contents-wrap .table-of-contents .table-of-content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_description_color', [
            'label' => esc_html__('Description Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .table-of-contents-wrap .table-of-contents .table-of-content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_content_border_color', [
            'label' => esc_html__('Content Border Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-tabs .tab-inner" => "border-color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();


        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Typography Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'wpboilerplate-core'),
            'selectors' => [
                "{{WRAPPER}} .table-of-contents-wrap .toc-navigation .nav-item",
                "{{WRAPPER}} .table-of-contents-wrap .table-of-contents .table-of-content .title"
            ],
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .table-of-contents-wrap .table-of-contents .table-of-content p"
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
        $case_study_tab_item = $settings['case-study-list'];

?>
        <div class="table-of-contents-wrap <?php if ($settings['is_arabic'] == 'yes') {
                                                echo 'arabic';
                                            } ?>">
            <ul class="toc-navigation">
                <li class="topic-title"><?php echo  $settings['topic_title'] ?></li>
                <?php foreach ($case_study_tab_item as $key => $item) : ?>
                    <li class="nav-item">
                        <a href="#toc-<?php echo esc_attr($key); ?>"
                            class="toc-link <?php if ($key == 0): ?>active <?php endif; ?>">
                            <?php echo esc_html($item['title']) ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <g clip-path="url(#clip0_1333_3035)">
                                    <path d="M9 6L15 12L9 18" stroke="#D2CFD0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1333_3035">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="table-of-contents">
                <?php foreach ($case_study_tab_item as $key => $details_item) : ?>
                    <div class="table-of-content <?php if ($key == 0) : ?> active show <?php endif; ?>"
                        id="toc-<?php echo esc_attr($key); ?>">
                        <div class="contents-inner">
                            <h3 class="title"><?php echo esc_html($details_item['title']) ?> </h3>
                            <p><?php echo $details_item['description'] ?></p>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Table_Of_Content_Widget());
