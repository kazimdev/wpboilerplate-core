<?php

/**
 * Elementor Widget
 * @package wpboilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Team_List_Widget extends Widget_Base
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
        return 'wpboilerplate-team-list-widget';
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
        return esc_html__('Team List', 'wpboilerplate-core');
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
        return 'eicon-person';
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
            'slider_settings_section',
            [
                'label' => esc_html__('Team Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('team_grid', [
            'label' => esc_html__('Team Grid', 'wpboilerplate-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'wpboilerplate-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'wpboilerplate-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'wpboilerplate-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'wpboilerplate-core'),
            ),
            'default' => 'col-lg-3',
            'description' => esc_html__('Select Case Study Grid', 'wpboilerplate-core')
        ]);
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'wpboilerplate-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many course you want in masonry , enter -1 for unlimited course.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'wpboilerplate-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => WPBoilerplate()->get_terms_names('team_cat', 'id'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'wpboilerplate-core'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'wpboilerplate-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'wpboilerplate-core'),
                'DESC' => esc_html__('Descending', 'wpboilerplate-core'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'wpboilerplate-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'wpboilerplate-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'wpboilerplate-core'),
                'title' => esc_html__('Title', 'wpboilerplate-core'),
                'date' => esc_html__('Date', 'wpboilerplate-core'),
                'rand' => esc_html__('Random', 'wpboilerplate-core'),
                'comment_count' => esc_html__('Most Comments', 'wpboilerplate-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'wpboilerplate-core')
        ]);
        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Post Offset', 'wpboilerplate-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'case_study_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'normal_background',
                'label' => esc_html__('Background', 'wpboilerplate-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .case-study-single-item-02 .content',
            ]
        );
        $this->add_control('name_color', [
            'label' => esc_html__('Name Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-single-item-02 .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('designation_color', [
            'label' => esc_html__('Designation Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-single-item-02 .content span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('case_study_social_icon_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);

        $this->start_controls_tabs(
            'case_study_social_icon_style_tabs'
        );

        $this->start_controls_tab(
            'case_study_social_icon_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'wpboilerplate-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_bg_icon_normal_background',
                'label' => esc_html__('Background', 'wpboilerplate-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .case-study-single-item-02 .social-icon li',
            ]
        );
        $this->add_control('social_icon_color', [
            'label' => esc_html__('Icon Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-single-item-02 .social-icon li" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'case_study_social_icon_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'wpboilerplate-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_hover_background',
                'label' => esc_html__('Background', 'wpboilerplate-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .case-study-single-item-02 .social-icon li:hover',
            ]
        );
        $this->add_control('social_hover_icon_color', [
            'label' => esc_html__('Icon Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .case-study-single-item-02 .social-icon li:hover" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control('case_study_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_html__('Name Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .case-study-single-item-02 .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'designation_typography',
            'label' => esc_html__('Designation Typography', 'wpboilerplate-core'),
            'selector' => "{{WRAPPER}} .case-study-single-item-02 span"
        ]);
        $this->end_controls_section();
    }


    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        $offset = $settings['offset'];
        //setup query
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'offset' => $offset,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'team-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args); ?>
        <div class="team-grid">
            <?php
            $key = 0;
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'wpboilerplate_classic_team', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $team_single_meta_data = get_post_meta(get_the_ID(), 'wpboilerplate_team_options', true);
                $social_icons = !empty($team_single_meta_data['team_member_social_repeater']) ? $team_single_meta_data['team_member_social_repeater'] : '';
                $contact_list = !empty($team_single_meta_data['team_member_contact_repeater']) ? $team_single_meta_data['team_member_contact_repeater'] : '';

            ?>

                <div class="team-member-popup-content" data-team-id="<?php echo $key; ?>">
                    <div class="team-top-content-wrap">
                        <div class="content">
                            <div class="thumb">
                                <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo $img_alt ?>">
                            </div>
                            <h4 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h4>
                            <p><?php echo $team_single_meta_data['team_member_designation'] ?></p>
                        </div>
                        <div class="team-social-list">
                            <ul class="social-share">
                                <?php
                                if (!empty($social_icons)) {
                                    foreach ($social_icons as $s_info) {
                                        $s_infos = $s_info['team_member_social_image']['url'];
                                        printf('<li><a href="%1$s"><img src="' . $s_infos . '" alt=""></a></li>', $s_info['team_member_social_url']);
                                    }
                                }
                                ?>
                            </ul>
                            <ul class="contact-list">
                                <?php
                                if (!empty($contact_list)) {
                                    foreach ($contact_list as $c_info) {
                                        $c_infos = $c_info['team_member_contact_image']['url'];
                                        printf('<li><img src="' . $c_infos . '" alt="">%1$s</li>', $c_info['team_member_contact_text']);
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="team-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 21.75C5.06294 21.75 0.25 16.9371 0.25 11C0.25 5.06294 5.06294 0.25 11 0.25C16.9371 0.25 21.75 5.06294 21.75 11C21.75 16.9371 16.9371 21.75 11 21.75ZM14.293 6.28906L10.9998 9.58203L7.70714 6.28959L6.29297 7.70385L9.58553 10.9962L6.29297 14.2885L7.70714 15.7028L10.9998 12.4104L14.293 15.7033L15.7071 14.2891L12.414 10.9962L15.7071 7.70332L14.293 6.28906Z"
                                    fill="#6C737F" />
                            </svg>
                        </div>
                    </div>
                    <div class="content-body">
                        <div class="content-title"><?php echo esc_html__('Profile Details', 'wpboilerplate-core') ?></div>
                        <?php the_content() ?>
                    </div>
                </div>

                <div class="single-team-inner team-popup-button" data-team-id="<?php echo $key; ?>">
                    <div class="thumb">
                        <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo $img_alt ?>">
                    </div>
                    <div class="details">
                        <div class="content">
                            <h4 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h4>
                            <p><?php echo $team_single_meta_data['team_member_designation'] ?></p>
                        </div>
                    </div>
                </div>
            <?php $key++;
            endwhile; ?>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Team_List_Widget());
