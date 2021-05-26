<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Repeater;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Astha_WC_Products extends Widget_Base{
    
    /**
     * Widget Pricing Table
     *
     * Holds the Repeater counter data. Default is `0`.
     *
     * @since 1.0.0
     * @static
     *
     * @var int Widget Name.
     */
    public function get_name() {
        return 'astha_wc_products';
    }
    
    /**
     * Widget Title.
     *
     * Holds the Repeater counter data. Default is `0`.
     *
     * @since 1.0.0
     * @static
     *
     * @var int Widget Title.
     */
    public function get_title() {
        return __( 'WooCommerce Products', 'astha' );
    }
  
    /**
     * Help URL
     *
     * @since 1.0.0
     *
     * @var int Widget Icon.
     */
    public function get_custom_help_url() {
            return 'https://example.com/Astha_WC_Products';
    }
    
    /**
     * Widget Icon.
     *
     * Holds the Repeater counter data. Default is `0`.
     *
     * @since 1.0.0
     * @static
     *
     * @var int Widget Icon.
     */
    public function get_icon() {
        return 'astha eicon-products';
    }
    
    /**
     * Get your widget name
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string keywords
     */
    public function get_keywords() {
        return [ 'astha', 'wc', 'product', 'woocommerce', 'items', 'price' ];
    }
    /**
     * Widget Category.
     *
     * Holds the Repeater counter data. Default is `0`.
     *
     * @since 1.0.0
     * @static
     *
     * @var int Widget Category.
     */
    public function get_categories() {
        return [ 'basic' ];
    }
    
    /**
     * Retrieve the list of scripts the counter widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0.13
     * @access public
     *
     * @return array Widget scripts dependencies.
     * @by Saiful
     */
    public function get_script_depends() {
            return [ 'jquery' ];
    }
    
    /**
     * Whether the reload preview is required or not.
     *
     * Used to determine whether the reload preview is required.
     *
     * @since 1.0.0
     * @access public
     *
     * @return bool Whether the reload preview is required.
     */
    public function is_reload_preview_required() {
            return true;
    }
    
    /**
     * Render shortcode widget as plain content.
     *
     * Override the default behavior by printing the shortcode instead of rendering it.
     *
     * @since 1.0.0
     * @access public
     */
//    public function render_plain_content() {
//            // In plain mode, render without shortcode
//            echo $this->get_settings( 'shortcode' );
//    }
        
    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {
        

        //For General Section
        $this->content_general_controls();

        //For Design Section Style Tab
        $this->style_design_controls();
        
        //For Typography Section Style Tab
        $this->style_typography_controls();


       
    }
    
    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'mc-products-grid-wrapper' );
        $limit = ! empty( $settings['limit']['size'] ) && is_numeric( $settings['limit']['size'] ) ? $settings['limit']['size'] : 8;
        $col = ! empty( $settings['col']['size'] ) && is_numeric( $settings['col']['size'] ) ? $settings['col']['size'] : 4;
        $cat_ids = is_array( $settings['cat_ids'] ) ? implode( ',', $settings['cat_ids'] ) : '';

        $shortcode = '[products limit="' . $limit . '" columns="' . $col . '" orderby="popularity" category="' . $cat_ids . '" ]';
//        var_dump($shortcode);
        ?>
    <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
        <div class="mc-content-of-products">
            <h2 class="mc-product-section-title"><?php echo esc_html( $settings['title'] ); ?></h2>
        </div>
        <div class="mc-product-ul-wrapper">
            <?php 
            echo do_shortcode( $shortcode ); 
            ?>
        </div>
        
    </div>
        <?php
        
    }
    
    /**
     * Render shortcode widget as plain content.
     *
     * Override the default behavior by printing the shortcode instead of rendering it.
     *
     * @since 1.0.0
     * @access public
     */
    public function render_plain_content() {
            // In plain mode, render without shortcode
            echo 'Saiful Islam';
        
            /*************************
        
            $settings = $this->get_settings_for_display();
            ?>
            <div class="mc-products-grid-wrapper">
                <div class="mc-content-of-products">
                    <h2 class="mc-product-section-title"><?php echo esc_html( $settings['title'] ); ?></h2>
                </div>
                <div class="mc-product-ul-wrapper mc-product-ul-wrapper-preview">
                    <p class="mc-aply-now-message">
                    <?php 
                      echo esc_html( 'Click on Aply button to see changes.', 'astha' );
                    ?>
                    </p>
                </div>

            </div>    
            <?php
            //********************************/
    }
    
    
    protected function _content_template() {}
    
    /**
     * General Section for Content Controls
     * 
     * @since 1.0.0.9
     */
    protected function content_general_controls() {

        $this->start_controls_section(
            'general',
            [
                'label'     => esc_html__( 'Query', 'astha' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        
        $this->add_control(
                'title',
                [
                    'label' => __( 'Sectioin Title', 'astha' ),
                    'type' => Controls_Manager::TEXT,
                    'default'       => __( 'Recent Products', 'astha' ),
                    'label_block'   => true,
                    'dynamic'       => ['active' => true],
                ]
        );
        
        $this->add_control(
                'limit',
                [
                        'label' => __( 'Limit', 'astha' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 100,
                                    'step' => 1,
                            ],
                        ],
                        'default' => [
                                //'unit' => 'px',
                                'size' => 8,
                        ],
                ]
        );
               
        $this->add_control(
                'col',
                [
                        'label' => __( 'Col', 'astha' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                                'px' => [
                                    'min' => 2,
                                    'max' => 5,
                                    'step' => 1,
                            ],
                        ],
                        'default' => [
                                //'unit' => 'px',
                                'size' => 4,
                        ],
                ]
        );
               
        
        $this->add_control(
            'cat_ids',
            [
                'label' => esc_html__( 'Select category', 'astha' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->product_cat_options(),
                'multiple' => 'true'
            ]
        );
        
        $this->end_controls_section();
    }
    
    public function product_cat_options() {
        $taxonomy = 'product_cat';
        $query_args = array(
            'orderby'       => 'ID',
            'order'         => 'DESC',
            'hide_empty'    => false,
            'taxonomy'      => $taxonomy
        );

        $categories = get_categories( $query_args );
        $options = array();
        if(is_array($categories) && count($categories) > 0){
            foreach ($categories as $cat){
                $options[$cat->term_id] = $cat->name;
            }
            return $options;
        }
    }
    
    /**
     * Alignment Section for Style Tab
     * 
     * @since 1.0.0.9
     */
    protected function style_design_controls() {
        $this->start_controls_section(
            'design',
            [
                'label'     => esc_html__( 'Design', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        
        $this->add_control(
            'primary_color',
            [
                'label'     => __( 'Primary Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} ul.products li.product:hover a .woocommerce-loop-product__title,{{WRAPPER}} ul.products li.product a span.price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} span.onsale' => 'background-color: {{VALUE}}',
                ],
                'default'   => '#0fc392',
            ]
        );
        
        $this->add_control(
            'section_title_color',
            [
                'label'     => __( 'Section Title Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} h2.mc-product-section-title' => 'color: {{VALUE}}',
                ],
                'default'   => '#000',
            ]
        );
        
        $this->add_responsive_control(
                'margin',
                [
                        'label' => __( 'Margin', 'astha' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} ul.products li.product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        
        
        
        
        $this->end_controls_section();
    }
    
    /**
     * Typography Section for Style Tab
     * 
     * @since 1.0.0.9
     */
    protected function style_typography_controls() {
        $this->start_controls_section(
            'typography',
            [
                'label'     => esc_html__( 'Typography', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => 'Product Title',
                        'selector' => '{{WRAPPER}} ul.products li.product .woocommerce-loop-product__title',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'price_typography',
                        'label' => 'Price',
                        'selector' => '{{WRAPPER}} span.woocommerce-Price-amount.amount',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'salebadge_typography',
                        'label' => 'Sale Badge',
                        'selector' => '{{WRAPPER}} span.onsale',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'section_title_typography',
                        'label' => 'Section Title',
                        'selector' => '{{WRAPPER}} h2.mc-product-section-title',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        $this->end_controls_section();
    }
    
    
    
    
}