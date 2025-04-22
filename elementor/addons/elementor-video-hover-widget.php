<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class Video_Hover extends Widget_Base
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

        return 'wpboilerplate-video-hover-widget';
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

        return esc_html__('Video Player', 'wpboilerplate-core');
    }


    public function get_keywords()
    {

        return ['Animation', 'Circle', 'Effect', "ThemeIM", 'WPBoilerplate'];
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

        return 'eicon-circle-o';
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
            'video_settings_section',
            [
                'label' => esc_html__('General Settings', 'wpboilerplate-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(

            'link',
            [
                'label' => esc_html__('Link', 'wpboilerplate-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter url.', 'wpboilerplate-core'),
                'default' => [
                    'url' => ''
                ]
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

?>
        <div class="video-wrapper">
            <video id="bVideo">
                <source src="<?php echo esc_url($settings['link']['url']); ?>" type="video/mp4">
            </video>
            <div id="playButton" class="playButton" onclick="playPause()"></div>
            <div id="pauseButton" class="pauseButton" onclick="playPause()" style="visibility: hidden;"></div>
            <div class="replayButton" id="replayButton" onclick="playPause()" style="visibility: hidden;"></div>
        </div>

<?php

    }
}


Plugin::instance()->widgets_manager->register_widget_type(new Video_Hover());
