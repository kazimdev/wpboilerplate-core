<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Product_Category_Item_Widget extends Widget_Base
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
        return 'wpboilerplate-product-category-item-widget';
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
        return esc_html__('Product Categories', 'wpboilerplate-core');
    }

    public function get_keywords()
    {
        return ['category', 'wpboilerplate', 'products', 'categories'];
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
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .product-category-item .content .title" => "color: {{VALUE}}"
            ]
        ]);


        $this->add_control('hover_styling_settings', [
            'type' => Controls_Manager::DIVIDER
        ]);

        $this->add_control('background_color', [
            'label' => esc_html__('Background Hover Color', 'wpboilerplate-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .product-category-item .content .title:hover" => "background-color: {{VALUE}}"
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
            'selector' => "{{WRAPPER}} .product-category-item .content .title"
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

        // Get all parent product categories (exclude sub-categories)
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
            'parent' => 0, // Ensure only parent categories are retrieved
        ));

?>
        <div class="product-category-wrap">
            <?php
            $counter = 0;
            // Loop through each parent category
            foreach ($terms as $key => $p_category) :
                $counter++;
                if ($counter > 5) {
                    break;
                }

                $thumbnail_id = get_term_meta($p_category->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_url($thumbnail_id);

                // Check if the category has subcategories
                $subcategories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'parent' => $p_category->term_id,
                    'hide_empty' => true,
                ));

                // Determine the link based on whether there are subcategories
                if (!empty($subcategories)) {
                    // If there are subcategories, link to the parent category
                    $category_link = get_category_link($p_category->term_id);
                } else {
                    // If no subcategories, link to the category page itself
                    $category_link = get_category_link($p_category->term_id);
                }
            ?>
                <div class="product-category-item margin-bottom-30">
                    <?php if (!empty($image)): ?>
                        <div class="thumb">
                            <img src="<?php echo esc_url($image); ?>">
                        </div>
                    <?php endif ?>
                    <div class="content">
                        <a class="title" href="<?php echo esc_url($category_link); ?>">
                            <?php echo esc_html($p_category->name); ?>
                        </a>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Product_Category_Item_Widget());
