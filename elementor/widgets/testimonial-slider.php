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

class Astha_Testimonial_Slider extends Widget_Base{
    
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
        return 'astha_testimonial_slider';
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
        return __( 'Testimonial Slider', 'astha' );
    }
  
    /**
     * Help URL
     *
     * @since 1.0.0
     *
     * @var int Widget Icon.
     */
    public function get_custom_help_url() {
            return 'https://example.com/Testimonial_Slider';
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
        return 'astha eicon-testimonial-carousel';
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
        return [ 'astha', 'testimonial', 'review', 'feedback', 'user', 'rating', 'slider' ];
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
        $this->style_general_controls();
        
        //Section in Style Tab
        $this->style_title_controls();
        $this->style_subtitle_controls();
        $this->style_quote_controls();
        $this->style_avatar_controls();
        $this->slider_controls();

       
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

        $this->add_render_attribute( 'wrapper', 'class', 'mc-testimonial-slider-wrapper' );
        $slider_items = $settings['testimonial_items'];
        ?>
        <div class="mc-testimonial-main-wrapper">
            <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
                <?php 
                foreach( $slider_items as $key => $item ){
                    $_id = !empty( $item['_id'] ) ? $item['_id'] : false;

                    $this->add_render_attribute( 'item' . '-' . $_id, 'class', 'mc-testimonial mc-testimonial-' . $_id );
                    $this->add_render_attribute( 'title' . '-' . $_id, 'class', 'mc-testimonial-title mc-testimonial-title-' . $_id );
                    $this->add_render_attribute( 'sub-title' . '-' . $_id, 'class', 'mc-testimonial-subtitle mc-testimonial-subtitle-' . $_id );
                    $this->add_render_attribute( 'quote' . '-' . $_id, 'class', 'mc-testimonial-quote mc-testimonial-quote-' . $_id );

//                    $this->add_inline_editing_attributes( 'title'       . '-' . $_id, 'none' );
//                    $this->add_inline_editing_attributes( 'sub-title'   . '-' . $_id, 'none' );
//                    $this->add_inline_editing_attributes( 'quote'       . '-' . $_id, 'advanced' );

                    $image = !empty( $item['image']['url'] ) ? $item['image']['url'] : false;
                    if( empty( $image ) ){
                        $this->add_render_attribute( 'item' . '-' . $_id, 'class', 'no-profile-image' );
                    }
                ?>
                <div <?php echo $this->get_render_attribute_string( 'item' . '-' . $_id ); ?>>
                    <div class="client-quote-box">
                        <span class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </span>
                        <?php echo '<p ' . $this->get_render_attribute_string( 'quote' . '-' . $_id ) . '>' . $item['quote'] . '</p>'; ?>
                        <div class="client-info">
                            <div class="user-avatar" 
                                <?php if( $image ){ ?>
                                    style="background-image: url(<?php echo esc_attr( $image ); ?>);"
                                <?php } ?> 
                                 ></div>
                            <div class="user-name">
                                <?php echo '<p ' . $this->get_render_attribute_string( 'title' . '-' . $_id ) . '>' . $item['title'] . '</p>'; ?>
                                <?php echo '<span ' . $this->get_render_attribute_string( 'sub-title' . '-' . $_id ) . '>' . $item['sub-title'] . '</span>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>

            </div>
        </div>
        <?php
        
    }
    
    protected function _content_template() {
    }
    
    /**
     * General Section for Content Controls
     * 
     * @since 1.0.0.9
     */
    protected function content_general_controls() {
        
        $placeholder_image = ASTHA_CORE_BASE_URL . 'assets/images/user.png';
        
        $this->start_controls_section(
            'general_content',
            [
                'label'     => esc_html__( 'General', 'astha' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new Repeater();
        $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'astha' ),
                    'type' => Controls_Manager::TEXT,
                    'default'       => __( 'Jonny Robartson', 'astha' ),
                    'label_block'   => TRUE,
                    'dynamic'       => ['active' => true],
                ]
        );
        
        $repeater->add_control(
                'sub-title',
                [
                    'label' => __( 'Position/Designation', 'astha' ),
                    'type' => Controls_Manager::TEXT,
                    'default'       => __( 'UI/UX Designer', 'astha' ),
                    'label_block'   => TRUE,
                    'dynamic'       => ['active' => true],
                ]
        );
        
        $repeater->add_control(
                'quote',
                [
                    'label' => __( 'Quote', 'astha' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default'       => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incdidunt ut labore et dolore magna do aliqua quis ipsum suspendisse ces gravida. Risus commodo viverra maecenas.', 'astha' ),
                    'label_block'   => TRUE,
                    'dynamic'       => ['active' => true],
                    'rows' => 5,
                    'separator' => 'after',
                ]
        );
        
        $repeater->add_control(
                'image',
                [
                        'label' => __( 'Photo', 'astha' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                                'url' => $placeholder_image,//Utils::get_placeholder_image_src(),
                        ],
                        'dynamic' => [
                                'active' => true,
                        ]
                ]
        );
        $default_icon = [
                        'value' => 'far fa-check-square',
                        'library' => 'regular',
                ];
        $this->add_control(
                'testimonial_items',
                [
                        'type' => Controls_Manager::REPEATER,
                        'fields' => $repeater->get_controls(),
                        'default' => [
                                [
                                        'icon' => $default_icon,
                                        'title' => __( 'Saiful Islam', 'astha' ),
                                        'sub-title' => __( 'Web Developer', 'astha' ),
                                        'quote' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incdidunt ut labore et dolore magna do aliqua quis ipsum suspendisse ces gravida. Risus commodo viverra maecenas.', 'astha' ),
                                        'image' => [
                                                'url' => $placeholder_image,
                                        ],
                                ],
                                [
                                        'icon' => $default_icon,
                                        'title' => __( 'Mukul Robartson', 'astha' ),
                                        'sub-title' => __( 'UI/UX Designer', 'astha' ),
                                        'quote' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incdidunt ut labore et dolore magna do aliqua quis ipsum suspendisse ces gravida. Risus commodo viverra maecenas.', 'astha' ),
                                        'image' => [
                                                'url' => $placeholder_image,
                                        ],
                                ],
                                [
                                        'icon' => $default_icon,
                                        'title' => __( 'Jonny Robartson', 'astha' ),
                                        'sub-title' => __( 'UI/UX Designer', 'astha' ),
                                        'quote' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incdidunt ut labore et dolore magna do aliqua quis ipsum suspendisse ces gravida. Risus commodo viverra maecenas.', 'astha' ),
                                        'image' => [
                                                'url' => $placeholder_image,
                                        ],
                                ],
                                [
                                        'icon' => $default_icon,
                                        'title' => __( 'Jonny Robartson', 'astha' ),
                                        'sub-title' => __( 'UI/UX Designer', 'astha' ),
                                        'quote' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incdidunt ut labore et dolore magna do aliqua quis ipsum suspendisse ces gravida. Risus commodo viverra maecenas.', 'astha' ),
                                        'image' => [
                                                'url' => $placeholder_image,
                                        ],
                                ],
                                
                        ],
                        'title_field' => '{{{ title }}}',
                ]
        );
        
               
        
        $this->end_controls_section();
    }
    
    /**
     * Alignment Section for Style Tab
     * 
     * @since 1.0.0.9
     */
    protected function style_general_controls() {
        $this->start_controls_section(
            'style_general',
            [
                'label'     => esc_html__( 'General', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
                'text_align',
                [
                        'label' => __( 'Alignment', 'astha' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                                'left' => [
                                        'title' => __( 'Left', 'astha' ),
                                        'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                        'title' => __( 'Center', 'astha' ),
                                        'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                        'title' => __( 'Right', 'astha' ),
                                        'icon' => 'fa fa-align-right',
                                ],
                        ],
                        'default' => 'center',
                        'toggle' => true,
                        'prefix_class' => 'elementor-align-',
                        'default' => 'left',
                ]
        );
        
        
        
        
        $this->start_controls_tabs('testimonial-style-tabs');
        
        
        $this->start_controls_tab('testimonial-stl-tab-normal', 
                [
                    'label' => __( 'Normal', 'astha' ),
                ]
        );
        
        $this->add_control(
            'bg-color',
            [
                'label'     => __( 'Background Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box' => 'background-color: {{VALUE}}',
                ],
                'default'   => '#F4F9FC',
            ]
        );
        
        
        $this->add_responsive_control(
                'padding',
                [
                        'label' => __( 'Padding', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'default'   => [
                                'top' => 50,
                                'right' => 45,
                                'bottom' => 50,
                                'left' => 45,
                                'unit' => 'px',
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            array(
                'name'        => 'border',
                'label'       => esc_html__( 'Border', 'astha' ),
                'placeholder' => '1px',
                'default'     => '',
                'selector'    => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box',
            )
        );
        
        $this->add_control(
                'quote-icon-size',
                [
                        'label' => __( 'Quote Icon Size', 'astha' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                ],
                                '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                ],
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => 50,
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box span.quote-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->add_control(
                'quote_icon_color',
                [
                        'label' => __( 'Quote Icon Color', 'astha' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#0FC392',
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box span.quote-icon' => 'color: {{VALUE}}',
                        ],
                ]
        );
        
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            array(
                'name'     => 'testimonial-shadow',
                'selector' => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box',
            )
        );
        
        
        $this->end_controls_tab();
        
        
        
        
        
        $this->start_controls_tab('testimonial-stl-tab-hover', 
                [
                    'label' => __( 'Hover', 'astha' ),
                ]
        );
        
        $this->add_control(
            'bg-color-hover',
            [
                'label'     => __( 'Background Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        
        $this->add_responsive_control(
                'padding-hover',
                [
                        'label' => __( 'Padding', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            array(
                'name'        => 'border-hover',
                'label'       => esc_html__( 'Border', 'astha' ),
                'placeholder' => '1px',
                'default'     => '',
                'selector'    => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box:hover',
            )
        );
        
        $this->add_control(
                'quote-icon-size-hover',
                [
                        'label' => __( 'Quote Icon Size', 'astha' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                ],
                                '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                ],
                        ],

                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box:hover span.quote-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->add_control(
                'quote_icon_color-hover',
                [
                        'label' => __( 'Quote Icon Color', 'astha' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box:hover span.quote-icon' => 'color: {{VALUE}}',
                        ],
                ]
        );
        
        
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            array(
                'name'     => 'testimonial-shadow-hover',
                'selector' => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box:hover',
            )
        );
        
        $this->end_controls_tab();
        
        
        
        
        
        
        
        
        
        
        $this->end_controls_tabs();
        
        
        
        
        
        $this->add_control(
                'navigation_icon_color',
                [
                        'label' => __( 'Navigation Icon Color', 'astha' ),
                        'type' => Controls_Manager::COLOR,
//                        'default' => '#0FC392',
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .owl-dots button.owl-dot' => 'background-color: {{VALUE}}',
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .owl-dots button.owl-dot.active' => 'border-color: {{VALUE}}; background-color: #FFF',
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper button.owl-prev' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper button.owl-next' => 'color: {{VALUE}}'
                        ],
                ]
        );
       
        $this->add_control(
                'navigation_bg_color',
                [
                        'label' => __( 'Navigation BG Color', 'astha' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-main-wrapper .owl-nav button.owl-next' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                        ],
                ]
        );
       
        $this->end_controls_section();
    }
    
    /**
     * Section for Title in Style Tab
     * 
     * @since 1.0.0.15
     */
    protected function style_title_controls() {
        $this->start_controls_section(
            'title-typography',
            [
                'label'     => esc_html__( 'Title', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => 'Title Typography',
                        'selector' => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box .mc-testimonial-title',
                ]
        );
        
        $this->add_control(
                'title_color',
                [
                        'label' => __( 'Color', 'astha' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#5C6B79',
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box .mc-testimonial-title' => 'color: {{VALUE}}',
                        ],
                ]
        );
        
        
        $this->end_controls_section();
    }
    
    /**
     * Section for Sub Title in Style Tab
     * 
     * @since 1.0.0.15
     */
    protected function style_subtitle_controls() {
        $this->start_controls_section(
            'subtitle-typography',
            [
                'label'     => esc_html__( 'Designation', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'position_typography',
                        'label' => 'Designation Typography',
                        'selector' => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box .mc-testimonial-subtitle',
                ]
        );
        
        $this->add_control(
                'subtitle_color',
                [
                        'label' => __( 'Color', 'astha' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#5C6B79',
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box .mc-testimonial-subtitle' => 'color: {{VALUE}}',
                        ],
                ]
        );
        
        
        $this->end_controls_section();
    }
    
    /**
     * Section for Quote in Style Tab
     * 
     * @since 1.0.0.15
     */
    protected function style_quote_controls() {
        $this->start_controls_section(
            'quote-typography',
            [
                'label'     => esc_html__( 'Quote', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'quote_typography',
                        'label' => 'Quote Typography',
                        'selector' => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box .mc-testimonial-quote',
                ]
        );
        
        $this->add_control(
                'quote_color',
                [
                        'label' => __( 'Color', 'astha' ),
                        'type' => Controls_Manager::COLOR,
                        'default' => '#54595F',
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-quote-box .mc-testimonial-quote' => 'color: {{VALUE}}',
                        ],
                ]
        );
        
        
        $this->end_controls_section();
    }
    
    /**
     * Section for Quote in Style Tab
     * 
     * @since 1.0.0.15
     */
    protected function style_avatar_controls() {
        $this->start_controls_section(
            'avatar',
            [
                'label'     => esc_html__( 'Avatar', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            array(
                'name'        => 'avatar-border',
                'label'       => esc_html__( 'Border', 'astha' ),
                'fields_options' => [
			'border' => [
				'default' => 'solid',
			],
			'width' => [
				'default' => [
					'top' => '1',
					'right' => '1',
					'bottom' => '1',
					'left' => '1',
					'isLinked' => false,
				],
			],
			'color' => [
				'default' => '#1C9792',
			],
		],
                'selector'    => '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-info .user-avatar',
            )
        );
        
        $this->add_control(
                'avatar-size',
                [
                        'label' => __( 'Size', 'astha' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                ],
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => 50,
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-testimonial-slider-wrapper .client-info .user-avatar' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        
        
        $this->end_controls_section();
    }
    
    /**
     * 
     * @since 1.0.0.15
     */
    protected function slider_controls(){
        $this->start_controls_section(
            'slider-settings',
            [
                'label'     => esc_html__( 'Slider Settings', 'astha' ),
            ]
        );
        
        $this->add_control(
                'autoplay',
                [
                        'label' => __( 'Autoplay?', 'astha' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'astha' ),
                        'label_off' => __( 'No', 'astha' ),
                        'default' => 'yes',
                        'return_value' => 'yes',
                        'frontend_available' => true,
                ]
        );

        $this->add_control(
                'pause_on_hover',
                [
                        'label' => __( 'Pause on Hover', 'astha' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'astha' ),
                        'label_off' => __( 'No', 'astha' ),
                        'default' => 'yes',
                        'return_value' => 'yes',
                        'condition' => [
                                'autoplay' => 'yes',
                        ],
                        'frontend_available' => true,
                ]
        );

        $this->add_control(
                'autoplay_speed',
                [
                        'label' => __( 'Autoplay Speed', 'astha' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 100,
                        'step' => 100,
                        'max' => 10000,
                        'default' => 3000,
                        'description' => __( 'Autoplay speed in milliseconds', 'astha' ),
                        'condition' => [
                                'autoplay' => 'yes',
                        ],
                        'frontend_available' => true,
                ]
        );

        // Loop requires a re-render so no 'render_type = none'
        $this->add_control(
                'loop',
                [
                        'label' => __( 'Infinite Loop?', 'astha' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'astha' ),
                        'label_off' => __( 'No', 'astha' ),
                        'default' => 'yes',
                        'return_value' => 'yes',
                        'frontend_available' => true,
                ]
        );

        $this->add_control(
                'autoplayTimeout',
                [
                        'label' => __( 'Autoplay Delay', 'astha' ),
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1000,
                        'step' => 1000,
                        'max' => 10000,
                        'default' => 3000,
                        'description' => __( 'Autoplay delay in milliseconds', 'astha' ),
                        'frontend_available' => true,
                ]
        );
        
        $this->add_control(
                'navigation',
                [
                        'label' => __( 'Navigation', 'astha' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                                'none' => __( 'None', 'astha' ),
                                'arrow' => __( 'Arrow', 'astha' ),
                                'dots' => __( 'Dots', 'astha' ),
                                'both' => __( 'Arrow & Dots', 'astha' ),
                        ],
                        'default' => 'arrow',
                        'frontend_available' => true,
                        'style_transfer' => true,
                ]
        );
        
        
        
                
        $this->add_control(
                'navigation_arrow_position',
                [
                        'label' => __( 'Arrow Position', 'ultraaddons' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                                'top-right'      => __( 'Top Right', 'ultraaddons' ),
                                'top-left'      => __( 'Top Left', 'ultraaddons' ),
//                                'center'    => __( 'Center', 'ultraaddons' ),
                                'bottom-right'    => __( 'Bottom Right', 'ultraaddons' ),
                                'bottom-left'    => __( 'Bottom Left', 'ultraaddons' ),
                        ],
                        'condition' => [
                                'navigation' => ['arrow','both'],
                                //'navigation_type' => ['arrow'],
                        ],
                        'default' => 'top-right',
                        'prefix_class' => 'navigation-arrow-position-',
                ]
        );
           
        $this->add_control(
                'next_prev_spacing',
                [
                        'label' => __( 'Navigation Button Spacing', 'elementor' ),
                        'type' => Controls_Manager::SLIDER,
                        'default' => [
                                'size' => 70,
                        ],
                        'range' => [
                                'px' => [
                                        'min' => 1,
                                        'max' => 250,
                                        'step' => 1,
                                ],
                        ],
                        'condition' => [
                                'navigation_arrow_position' => ['center','top-right','top-left','bottom-right','bottom-left'],
                                'navigation' => ['arrow','both'],
                        ],
                        'selectors' => [
                                '{{WRAPPER}}.navigation-arrow-position-bottom-right .mc-testimonial-main-wrapper .owl-nav,{{WRAPPER}}.navigation-arrow-position-bottom-left .mc-testimonial-main-wrapper .owl-nav' => 'bottom: -{{SIZE}}{{UNIT}};',
                                '{{WRAPPER}}.navigation-arrow-position-top-left .mc-testimonial-main-wrapper .owl-nav,{{WRAPPER}}.navigation-arrow-position-top-right .mc-testimonial-main-wrapper .owl-nav' => 'top: -{{SIZE}}{{UNIT}};',
//                                '{{WRAPPER}}.navigation-arrow-position-center .mc-testimonial-main-wrapper .owl-nav' => 'top: {{SIZE}}%;',
                        ],

                ]
        );
        
//        $this->add_control(
//                'next_prev_center_spacing',
//                [
//                        'label' => __( 'Navigation Spacing', 'elementor' ),
//                        'type' => Controls_Manager::SLIDER,
////                                'size_units' => [ 'px' ],
//                        'default' => [
////                                        'unit' => '%',
//                                'size' => 96,
//                        ],
//                        'range' => [
//                                'px' => [
//                                        'min' => 1,
//                                        'max' => 100,
//                                        'step' => 1,
//                                ],
//                        ],
//                        'condition' => [
//                                'navigation_arrow_position' => ['center'],
//
//                        ],
//                        'selectors' => [
////                                        '{{WRAPPER}}.navigation-arrow-position-center .ua-slider-wrapper .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
//                                '{{WRAPPER}}.navigation-arrow-position-center .mc-testimonial-main-wrapper .owl-nav' => 'width: {{SIZE}}%;margin-left: calc((100% - {{SIZE}}%)/2);',
//                        ],
//
//                ]
//        );        

        
        $this->add_responsive_control(
                'slides_to_show',
                [
                        'label' => __( 'Slides To Show', 'astha' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                                1 => __( '1 Slide', 'astha' ),
                                2 => __( '2 Slides', 'astha' ),
                                3 => __( '3 Slides', 'astha' ),
                                4 => __( '4 Slides', 'astha' ),
                                5 => __( '5 Slides', 'astha' ),
                                6 => __( '6 Slides', 'astha' ),
                        ],
                        'desktop_default' => 3,
                        'tablet_default' => 2,
                        'mobile_default' => 1,
                        'frontend_available' => true,
                        'style_transfer' => true,
                ]
        );
        
        $this->end_controls_section();
    }
       
    
}