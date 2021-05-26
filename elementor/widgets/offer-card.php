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


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Astha_Offer_Card extends Widget_Base{
    
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
        return 'astha_offer_card';
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
        return __( 'Offer Card', 'astha' );
    }
  
    /**
     * Help URL
     *
     * @since 1.0.0
     *
     * @var int Widget Icon.
     */
    public function get_custom_help_url() {
            return 'https://example.com/Astha_Offer_Card';
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
        return 'astha eicon-form-horizontal';
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
        return [ 'astha', 'product', 'card', 'product card', 'product board', 'buy' ];
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
     * Overriding default function to add custom html class.
     *
     * @return string
     */
    public function get_html_wrapper_class() {
        $html_class = parent::get_html_wrapper_class();
        $html_class .= ' mc-addon';
        $html_class .= ' ' . $this->get_name();
        return rtrim( $html_class );
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
        $this->style_design_controls();
        
        //For Typography Section Style Tab
        //$this->style_typography_controls();

       
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
        
        $this->add_render_attribute( 'wrapper', 'class', 'mc-offer-wrapper' );
        $heading = $settings['heading'];
        $highlighted_title = $settings['highlighted_title'];
        
        if ( ! empty( $settings['link']['url'] ) ) {
                        
                $this->add_link_attributes( 'button', $settings['link'] );
                $this->add_render_attribute( 'button', 'class', 'offer-btn btn v3' );
                $this->add_render_attribute( 'button', 'role', 'button' );

        }
        $button_text = !empty( $settings['text'] ) ? $settings['text'] : false;
        
        $image = !empty( $settings['image']['url'] ) ? $settings['image']['url'] : false;
        $image_position = !empty( $settings['image_align'] ) ? $settings['image_align'] : false;
        $this->add_render_attribute( 'offer-image', 'class', 'mc-offer-img' );
        $this->add_render_attribute( 'offer-image', 'class', $image_position );
         ?>
        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
            <div class="mc-offer-inner">
                <div class="mc-offer-texts">
                    <?php if( ! empty( $highlighted_title ) ) : ?>
                    <p class="offer-subheading"><?php echo esc_html( $highlighted_title ); ?></p>
                    <?php endif; ?>
                    
                    <?php if( ! empty( $heading ) ) : ?>
                    <p class="offer-heading"><?php echo wp_kses_data( $heading ); ?></p>
                    <?php endif; ?>
                    
                    <?php if( ! empty( $settings['link']['url'] ) ) : ?>
                    <a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo esc_html( $button_text ); ?></a>
                    <?php endif; ?>
                </div>
                <?php if( $image ){ ?>
                <div <?php echo $this->get_render_attribute_string( 'offer-image' ); ?>>
                    <img src="<?php echo esc_url( $image ); ?>" alt="">
                </div>
                <?php } ?>
            </div> 
        </div>
        <?php
        
    }
    
    protected function _content_template() {}
    
    /**
     * General Section for Content Controls
     * 
     * @since 1.0.0.9
     */
    protected function content_general_controls() {
        $this->start_controls_section(
            'general_content',
            [
                'label'     => esc_html__( 'General', 'astha' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_responsive_control(
            'orientation',
                [
                    'label'         => esc_html__( 'Orientation', 'astha' ),
                    'type'          => Controls_Manager::SELECT,
                    'options'       => [
                            'portrait' => __( 'Portrait', 'astha' ),
                            'landscape' => __( 'Landscape', 'astha' ),
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'default'       => 'landscape',
                    'prefix_class'  => 'card-orientation-%s-',
                ]
        );
        
        $this->add_control(
            'heading',
                [
                    'label'         => esc_html__( 'Heading', 'astha' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => __( 'Product Biggest Offer', 'astha' ),
                    'label_block'   => TRUE,
                    'dynamic'       => ['active' => true],
                ]
        );
        
        $this->add_control(
            'highlighted_title',
                [
                    'label'         => esc_html__( 'Highlighted Title', 'astha' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => __( 'Hot Offer', 'astha' ),
                    'label_block'   => TRUE,
                    'dynamic'       => ['active' => true],
                ]
        );
        $placeholder_image = ASTHA_CORE_BASE_URL . '/assets/images/no-image.png';
        
        $this->add_control(
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
        
        $this->add_control(
                'button_heading',
                [
                        'label' => __( 'Button', 'astha' ),
                        'type' => Controls_Manager::HEADING,
                        'label_block' => true,
                        'separator' => 'before',
                ]
        );
        
        $this->add_control(
                'text',
                [
                        'label' => __( 'Text', 'astha' ),
                        'type' => Controls_Manager::TEXT,
                        'placeholder' => __( 'Click Here', 'astha' ),
                        'default' => __( 'Click Here', 'astha' ),
                ]
        );
        
        $this->add_control(
                'link',
                [
                        'label' => __( 'Link', 'astha' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => __( 'https://example.com', 'astha' ),
                        'default' => [
                                'url' => '#',
                        ],
                ]
        );
        
        $this->end_controls_section();
    }
    
    /**
     * Alignment Section for Style Tab
     * 
     * @since 1.0.0.9
     */
    protected function style_design_controls() {
        $this->start_controls_section(
            'offer_design_style',
            [
                'label'     => esc_html__( 'General', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'offer_alignment',
                [
                    'label'         => esc_html__( 'Alignment', 'astha' ),
                    'type'          => Controls_Manager::CHOOSE,
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
                    'prefix_class' => 'elementor-align-',
                    'default' => 'left',
                    'toggle' => true,
                ]
        );        
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'offer_title_style',
            [
                'label'     => esc_html__( 'Title', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'offer_heading_color',
            [
                'label'     => __( 'Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-offer-texts p.offer-heading' => 'color: {{VALUE}}',
                ],
                'default'   => '#021429',
            ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'selector' => '{{WRAPPER}} .mc-offer-texts p.offer-heading',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        $this->add_responsive_control(
                'title_margin',
                [
                        'label' => __( 'Margin', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-offer-texts p.offer-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'offer_subtitle_style',
            [
                'label'     => esc_html__( 'Sub Title', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'offer_subheading_color',
            [
                'label'     => __( 'Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-offer-texts p.offer-subheading' => 'color: {{VALUE}}',
                ],
                'default'   => '#fd5a5a',
            ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'sub_title_typography',
                        'selector' => '{{WRAPPER}} .mc-offer-texts p.offer-subheading',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        $this->add_responsive_control(
                'subtitle_margin',
                [
                        'label' => __( 'Margin', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-offer-texts p.offer-subheading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'offer_image_style',
            [
                'label'     => esc_html__( 'Image', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
                'image_align',
                [
                        'label' => __( 'Vertical Position', 'astha' ),
                        'type' => Controls_Manager::CHOOSE,
                        'options' => [
                                'top' => [
                                        'title' => __( 'Top', 'astha' ),
                                        'icon' => 'eicon-v-align-top',
                                ],
                                'middle' => [
                                        'title' => __( 'Middle', 'astha' ),
                                        'icon' => 'eicon-v-align-middle',
                                ],
                                'bottom' => [
                                        'title' => __( 'Bottom', 'astha' ),
                                        'icon' => 'eicon-v-align-bottom',
                                ],
                        ],
                        'default' => 'middle',
                        'prefix_class'  => 'image-location-%s-',
                        'toggle' => true,
                ]
        );
        
        $this->add_responsive_control(
                'image_margin',
                [
                        'label' => __( 'Margin', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-offer-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'offer_button_style',
            [
                'label'     => esc_html__( 'Button', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_responsive_control(
                'button_margin',
                [
                        'label' => __( 'Margin', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-offer-texts .offer-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->start_controls_tabs( 'button_hover_controls' );
        $this->start_controls_tab(
            'tab_button_content_normal',
            [
                'label'  => esc_html__( 'Normal', 'astha' )
            ]
        );
        
        $this->add_control(
            'offer_button_color',
            [
                'label'     => __( 'Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-offer-texts .offer-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'offer_button_bg_color',
            [
                'label'     => __( 'Background', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-offer-texts .offer-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'offer_button_border',
                        'label' => __( 'Border', 'astha' ),
                        'selector' => '{{WRAPPER}} .mc-offer-texts .offer-btn',
                ]
        );
        
        $this->add_control(
                'offer_button_border_radius',
                [
                        'label' => __( 'Border Radius', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-offer-texts .offer-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name' => 'offer_button_box_shadow',
                        'label' => __( 'Box Shadow', 'astha' ),
                        'selector' => '{{WRAPPER}} .mc-offer-texts .offer-btn',
                ]
        );
        
        $this->end_controls_tab();
        $this->start_controls_tab(
            'tab_button_content_hover',
            [
                'label'  => esc_html__( 'Hover', 'astha' )
            ]
        );
        
        $this->add_control(
            'offer_button_color_hover',
            [
                'label'     => __( 'Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-offer-texts .offer-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'offer_button_bg_color_hover',
            [
                'label'     => __( 'Background', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mc-offer-texts .offer-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                        'name' => 'offer_button_border_hover',
                        'label' => __( 'Border', 'astha' ),
                        'selector' => '{{WRAPPER}} .mc-offer-texts .offer-btn:hover',
                ]
        );
        
        $this->add_control(
                'offer_button_border_radius_hover',
                [
                        'label' => __( 'Border Radius', 'astha' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-offer-texts .offer-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        
        $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                        'name' => 'offer_button_box_shadow_hover',
                        'label' => __( 'Box Shadow', 'astha' ),
                        'selector' => '{{WRAPPER}} .mc-offer-texts .offer-btn:hover',
                ]
        );
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->end_controls_section();
    }
    
    /**
     * Typography Section for Style Tab
     * 
     * @since 1.0.0.9
     */
    protected function style_typography_controls() {
        $this->start_controls_section(
            'mc_avd_heading_typography',
            [
                'label'     => esc_html__( 'Typography', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => 'Heading Typography',
                        'selector' => '{{WRAPPER}} .advance-heading-wrapper .heading-tag',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'subhead_typography',
                        'label' => 'Sub Heading Typography',
                        'selector' => '{{WRAPPER}} .advance-heading-wrapper span',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        
        $this->end_controls_section();
    }
    
    /**
     * Register Icon Box General Controls.
     * 
     * @access protected
     * 
     * @since 1.0.0
     */
    protected function register_general_style(){
        $this->start_controls_section(
            'heading_style_settings',
            [
                'label'     => esc_html__( 'General', 'astha' ),
            ]
        );
        $this->add_control(
            'heading_style',
            [
                'label'     => esc_html__( 'Heading Style', 'astha' ),
                'type'      => Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => [
                    '1'         => esc_html__( 'Style 01', 'astha' ),
                    '2'         => esc_html__( 'Style 02', 'astha' ),
                ],
                'default'       => '1',
            ]
        );
        $this->end_controls_section();
    }
    
    /**
     * Register Price Table General Controls.
     * 
     * @access protected
     * 
     * @since 1.0.0
     */
    protected function register_general_controls(){
        $this->start_controls_section(
            'advance_heading_settings',
            [
                'label'     => esc_html__( 'Content', 'astha' ),
            ]
        );
        $this->add_control(
            'advance_sub_heading',
                [
                    'label'     => esc_html__( 'Sub Heading', 'astha' ),
                    'type'          => Controls_Manager::TEXT,
                    'placeholder'   => __( 'Our Services', 'astha' ),
                    'label_block'   => TRUE,
                ]
        );
        $this->add_control(
            'advance_heading',
                [
                    'label'     => esc_html__( 'Heading', 'astha' ),
                    'type'          => Controls_Manager::TEXTAREA,
                    'label_block'   => TRUE,
                    'placeholder'   => __( 'We Provide Best Services sFor Your Health', 'astha' ),
                ]
        );
        $this->end_controls_section();
    }
    
    /**
     * Register heading style
     * 
     * @access protected
     * 
     * @since 1.0.0
     */
    protected function register_heading_align_style(){
	    $this->start_controls_section(
	            'advance_heading_general_setting',
                [
                    'label'    => __( 'General Settings', 'astha' ),
                    'tab'      => Controls_Manager::TAB_STYLE,
                    'show_label' => false,
                ]
        );
        $this->add_responsive_control(
            'heading_general_padding',
            [
                'label'      => __( 'Padding', 'astha' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .content-title.astha-advance-heading, .section-title.v1.astha-advance-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'heading_tag_general_margin',
            [
                'label'      => __( 'Margin', 'astha' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .content-title.astha-advance-heading, .section-title.v1.astha-advance-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_tag_general_text_align',
            [
                'label' => __( 'Alignment', 'astha' ),
                'type' => Controls_Manager::CHOOSE,
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
                'selectors' => [
                    '{{WRAPPER}} .content-title.astha-advance-heading, .section-title.v1.astha-advance-heading' => 'text-align: {{VALUE}}',
                ],
                'default' => '',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Register Sub Heading
     * 
     * @access protected
     * 
     * @since 1.0.0
     */
    protected function register_sub_heading_style_controls(){
	    $this->start_controls_section(
	            'advance_sub_heading_style_setting',
                [
                    'label'    => __( 'Sub Heading', 'astha' ),
                    'tab'      => Controls_Manager::TAB_STYLE,
                    'show_label' => false,
                ]
        );
        $this->add_control(
            'sub_heading_color',
            [
                'label'     => __( 'Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .content-title .astha-sub-heading.elementor-inline-editing, .section-title.v1.astha-advance-heading span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'sub_border_heading_color',
            [
                'label'     => __( 'After Border Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .content-title .astha-sub-heading.elementor-inline-editing:after, .section-title.v1.astha-advance-heading span:before, .section-title.v1.astha-advance-heading span:after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'sub_heading_typography',
                'selector' => '{{WRAPPER}} .content-title .astha-sub-heading.elementor-inline-editing, .section-title.v1.astha-advance-heading span',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );
        $this->add_responsive_control(
            'sub_header_padding',
            [
                'label'      => __( 'Padding', 'astha' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .content-title .astha-sub-heading.elementor-inline-editing, .section-title.v1.astha-advance-heading span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'sub_header_margin',
            [
                'label'      => __( 'Margin', 'astha' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .content-title .astha-sub-heading.elementor-inline-editing, .section-title.v1.astha-advance-heading span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'sub_heading_border',
                'label' => __( 'Border', 'astha' ),
                'selector' => '{{WRAPPER}} .content-title .astha-sub-heading.elementor-inline-editing, .section-title.v1.astha-advance-heading span',
            ]
        );
        $this->end_controls_section();
    }
   

    /**
     * Register heading style
     * 
     * @access protected
     * 
     * @since 1.0.0
     */
    protected function register_heading_style_controls(){
	    $this->start_controls_section(
	            'advance_heading_style_setting',
                [
                    'label'    => __( 'Heading', 'astha' ),
                    'tab'      => Controls_Manager::TAB_STYLE,
                    'show_label' => false,
                ]
        );
        $this->add_control(
            'heading_tag_colors',
            [
                'label'     => __( 'Color', 'astha' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'  => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .content-title span.astha-sub-heading, .section-title.v1.astha-advance-heading h3.astha-heading' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'heading_tag_typography',
                'selector' => '{{WRAPPER}} .pricing-box-item .pricing-icon .astha-price-table-heading, .section-title.v1.astha-advance-heading h3.astha-heading',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );
        $this->add_responsive_control(
            'heading_tag_padding',
            [
                'label'      => __( 'Padding', 'astha' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box-item .pricing-icon .astha-price-table-heading, .section-title.v1.astha-advance-heading h3.astha-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'heading_tag_margin',
            [
                'label'      => __( 'Margin', 'astha' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .pricing-box-item .pricing-icon .astha-price-table-heading, .section-title.v1.astha-advance-heading h3.astha-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'heading_tag_border',
                'label' => __( 'Border', 'astha' ),
                'selector' => '{{WRAPPER}} .pricing-box-item .pricing-icon .astha-price-table-heading, .section-title.v1.astha-advance-heading h3.astha-heading',
            ]
        );
        $this->end_controls_section();
    }
    
    

    /**
     * Get Sub Heading Content.
     * 
     * @access protected
     * 
     * @since 1.0.0
     */
    public function get_sub_heading_content(){
        $settings       = $this->get_settings_for_display();
        $advance_sub_heading        = isset( $settings['advance_sub_heading'] ) ? $settings['advance_sub_heading'] : '';
        if(!empty( $advance_sub_heading )) : ?> 
            <span class="astha-sub-heading elementor-inline-editing"><?php echo esc_html( $advance_sub_heading );?></span>
        <?php endif;
    }
    
    /**
     * Get Heading Content.
     * 
     * @access protected
     * 
     * @since 1.0.0
     */
    public function get_heading_content(){
        $settings       = $this->get_settings_for_display();
        $advance_heading        = isset( $settings['advance_heading'] ) ? $settings['advance_heading'] : '';
        if(!empty( $advance_heading )) : ?> 
            <h3 class="astha-heading elementor-inline-editing"><?php echo esc_html( $advance_heading );?></h3>
        <?php endif;
    }
    
  

    
    
}