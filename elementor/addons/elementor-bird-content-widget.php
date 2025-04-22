<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Bird_Content_Widget extends Widget_Base
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
        return 'wpboilerplate-bird-content-widget';
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
        return esc_html__('Bird Content', 'wpboilerplate-core');
    }

    public function get_keywords()
    {
        return ['tooton', 'wpboilerplate', 'image box'];
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
            'image',
            [
                'label' => esc_html__('Image', 'wpboilerplate-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'bird_image',
            [
                'label' => esc_html__('Bird Image', 'wpboilerplate-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control('invest_title', [
            'label' => esc_html__('Invest Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Investments', 'wpboilerplate-core')
        ]);
        $this->add_control('invest_desc', [
            'label' => esc_html__('Invest Description', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Equities, fixed income, mutual funds, real-estate, private equity, separately managed account.', 'wpboilerplate-core')
        ]);
        $this->add_control('retirement_title', [
            'label' => esc_html__('Retirement Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Retirement & Education Planning', 'wpboilerplate-core')
        ]);
        $this->add_control('retirement_desc', [
            'label' => esc_html__('Retirement Description', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('401k/403b, IRAs, defined benefit/pensions, SEP/SIMPLE IRAs, UTMAs, 529 plans.', 'wpboilerplate-core')
        ]);
        $this->add_control('trusts_title', [
            'label' => esc_html__('Trusts Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Trusts, estates, insurance and asset protection', 'wpboilerplate-core')
        ]);
        $this->add_control('trusts_desc', [
            'label' => esc_html__('Trusts Description', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('We collaborate with top-tier accounting, legal firms, insurance brokers, and trusted experts, including your existing partners.', 'wpboilerplate-core')
        ]);
        $this->add_control('philanthropy_title', [
            'label' => esc_html__('Philanthropy Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Philanthropy and non-profits', 'wpboilerplate-core')
        ]);
        $this->add_control('philanthropy_desc', [
            'label' => esc_html__('Philanthropy Description', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Donor Advised Funds, family foundations, charitable trusts, endowments.', 'wpboilerplate-core')
        ]);
        $this->add_control('cash_title', [
            'label' => esc_html__('Cash Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Cash, credit and lending solutions', 'wpboilerplate-core')
        ]);
        $this->add_control('cash_desc', [
            'label' => esc_html__('Cash Description', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Lines of credit collateralized by eligible securities, non-margin and margin lending, cash management tools,and cash sweep options.', 'wpboilerplate-core')
        ]);
        $this->add_control('events_title', [
            'label' => esc_html__('Event Title', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Liquidity events & windfall solutions', 'wpboilerplate-core')
        ]);
        $this->add_control('events_desc', [
            'label' => esc_html__('Event Description', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Tax & investment strategies for sale of major asset, large settlements.', 'wpboilerplate-core')
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
        $img_id = $settings['image']['id'] ?? '';
        $image_url = !empty($img_id) ? wp_get_attachment_image_src($img_id, 'full', false)[0] : '';
        $bird_img_id = $settings['bird_image']['id'] ?? '';
        $bird_image_url = !empty($bird_img_id) ? wp_get_attachment_image_src($bird_img_id, 'full', false)[0] : '';
        $bird_image_alt = get_post_meta($bird_img_id, '_wp_attachment_image_alt', true);
        $image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('link_wrapper', $settings['link']);
        }
?>
        <div class="wpboilerplate-bird-content">
            <div class="bird-content-item style-02">

                <div class="bird-content-title">
                    <?php echo $settings['retirement_title'] ?>
                </div>
                <div class="bird-content-dot">
                    <div class="bird-hover-content">
                        <?php echo $settings['retirement_desc'] ?>
                    </div>
                </div>
            </div>
            <div class="bird-content-item style-01">
                <div class="bird-content-title">
                    <?php echo $settings['invest_title'] ?>
                </div>
                <div class="bird-content-dot">
                    <div class="bird-hover-content">
                        <?php echo $settings['invest_desc'] ?>
                    </div>
                </div>
            </div>
            <div class="bird-content-item style-03">
                <div class="bird-content-title">
                    <?php echo $settings['trusts_title'] ?>
                </div>
                <div class="bird-content-dot">
                    <div class="bird-hover-content">
                        <?php echo $settings['trusts_desc'] ?>
                    </div>
                </div>
            </div>
            <div class="bird-content-image">
                <?php if (!empty($bird_image_url)):
                    printf('<img class="bird-image" src="%1$s" alt="%2$s">', esc_url($bird_image_url), esc_attr($bird_image_alt));
                endif; ?>
                <?php if (!empty($img_id)):
                    printf('<img src="%1$s" alt="%2$s">', esc_url($image_url), esc_attr($image_alt));
                endif; ?>
            </div>
            <div class="bird-content-item style-04">
                <div class="bird-content-dot">
                    <div class="bird-hover-content">
                        <?php echo $settings['events_desc'] ?>
                    </div>
                </div>
                <div class="bird-content-title">
                    <?php echo $settings['events_title'] ?>
                </div>
            </div>
            <div class="bird-content-item style-05">
                <div class="bird-content-dot">
                    <div class="bird-hover-content">
                        <?php echo $settings['philanthropy_desc'] ?>
                    </div>
                </div>
                <div class="bird-content-title">
                    <?php echo $settings['philanthropy_title'] ?>
                </div>
            </div>
            <div class="bird-content-item style-06">
                <div class="bird-content-dot">
                    <div class="bird-hover-content">
                        <?php echo $settings['cash_desc'] ?>
                    </div>
                </div>
                <div class="bird-content-title">
                    <?php echo $settings['cash_title'] ?>
                </div>
            </div>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Bird_Content_Widget());
