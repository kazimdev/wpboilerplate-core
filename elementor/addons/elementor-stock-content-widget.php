<?php

/**
 * Elementor Widget
 * @package WPBoilerplate
 * @since 1.0.0
 */

namespace Elementor;

class WPBoilerplate_Stock_Content_Widget extends Widget_Base
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
        return 'wpboilerplate-stock-content-widget';
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
        return esc_html__('Stock Content', 'wpboilerplate-core');
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
    protected function _register_controls() {}

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
        $apiKey = 'GKLNIZ2WELFBF0ZA'; // Your premium API key
        $symbols = [
            'SPY' => 'S&P 500',
            'QQQ' => 'NASDAQ-100',
            'DIA' => 'Dow Jones Industrial',
            'IWM' => 'Russell 2000 Index'
        ]; // Associative array of symbols to fetch with full names
?>
        <div class="stock-market-content-wrap">
            <?php
            foreach ($symbols as $symbol => $fullName) {
                // Alpha Vantage API URL for real-time stock data
                $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";

                // Initialize cURL
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);

                // Check for errors
                if ($response === false) {
                    echo "Error: " . curl_error($ch) . "<br>";
                }

                curl_close($ch);

                if ($response) {
                    $data = json_decode($response, true);

                    if (json_last_error() === JSON_ERROR_NONE && isset($data['Global Quote'])) {
                        $quote = $data['Global Quote'];
                        $changePercent = $quote['10. change percent'];
                        $isPositive = strpos($changePercent, '-') === false; // Check if change is positive

                        echo '
                <div class="stock-market-item">
                    <div class="stock-current-price">' . htmlspecialchars($quote['05. price']) . '</div>
                    <div class="stock-name">' . htmlspecialchars($fullName) . '</div>
                    <div class="prev-price-wrap"> 
                        <div class="prev-content-wrap">                       
                            <p class="prev-price">Prev close</p>
                            <div class="prev-price-value">' . htmlspecialchars($quote['08. previous close']) . '</div>
                        </div>
                        <div class="price-button">
                            ' . ($isPositive ?
                            '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                                    <path d="M13 7.5L7.70711 2.20711C7.37377 1.87377 7.20711 1.70711 7 1.70711C6.79289 1.70711 6.62623 1.87377 6.29289 2.20711L1 7.5" stroke="#761214" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>' :
                            '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9" fill="none">
                                    <path d="M1 1.5L6.29289 6.79289C6.62623 7.12623 6.79289 7.29289 7 7.29289C7.20711 7.29289 7.37377 7.12623 7.70711 6.79289L13 1.5" stroke="#761214" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>'
                        ) . '
                            ' . htmlspecialchars($changePercent) . '
                        </div>
                    </div>
                </div>
                ';
                    } else {
                        echo "Data not available for symbol: $symbol<br>";
                    }
                } else {
                    echo "Failed to fetch data for symbol: $symbol<br>";
                }
            }
            ?>
        </div>


<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new WPBoilerplate_Stock_Content_Widget());
