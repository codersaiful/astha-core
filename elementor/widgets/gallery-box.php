<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Astha_Gallery_Box extends Widget_Base{
    
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
        return 'astha_gallery_box';
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
        return __( 'Gallery Box', 'astha' );
    }
  
    /**
     * Help URL
     *
     * @since 1.0.0
     *
     * @var int Widget Icon.
     */
    public function get_custom_help_url() {
            return 'https://example.com/Astha_Gallery_Box';
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
        return 'astha far fa-images';
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
        return [ 'astha', 'product', 'gallery', 'image', 'gallery image' ];
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
        
        $settings           = $this->get_settings_for_display();
        $this->add_render_attribute( 'wrapper', 'class', [
            'mc-gallery-box-wrapper',
            //'mc-gallery-box-template-' . $settings['style'],
        ] );
        $image = !empty( $settings['image']['url'] ) ? $settings['image']['url'] : false;
        
//        $this->add_render_attribute( 'gallery_item', 'class', 'mc-gallery-item' );
//        if( $image ){
//            $this->add_render_attribute( 'gallery_item', 'src', $image );
//        }
        
        $heading = $settings['heading'];
        $box_sub_title = $settings['box_sub_title'];
        $has_button_link = ! empty( $settings['gallery_btn_link']['url'] );
            
        if( $has_button_link ) {
            $this->add_link_attributes( 'gallery_btn_link', $settings['gallery_btn_link'] );
        }
        $this->add_render_attribute( 'gallery_btn_link', 'role', 'button' );
        
        $add_icon   = !empty( $settings['add_icon']['value'] ) && is_string( $settings['add_icon']['value'] ) ? $settings['add_icon']['value'] : false;
        $svg        = !empty( $settings['add_icon']['value']['url'] ) && is_string( $settings['add_icon']['value']['url'] ) ? $settings['add_icon']['value']['url'] : false;
        if( $add_icon ){
            $icon_html = '<i class="' . esc_attr( $add_icon ) . '"></i>';
        }elseif( $svg ){
            $icon_html = '<img class="" src="' . esc_url( $svg ) . '" alt="' . esc_attr__( 'Follow Me', 'astha' ) .'">';
        }
        ?>
        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>            
            <div class="mc-gallery-item" <?php if( $image ){ echo "style='background-image:url({$image})'"; } ?>>
<!--                <img src="<?php echo esc_url( $image ); ?>" alt="Image">-->
                <div class="mc-gallery-item-info">
                    <div class="mc-gallery-info-title">
                        <span><?php echo wp_kses_data( $box_sub_title ); ?></span>
                        <p><?php echo wp_kses_data( $heading ); ?></p>
                    </div>
                    <?php if( $add_icon && ! empty( $settings['gallery_btn_link']['url'] ) ) : ?>
                    <div class="mc-gallery-info-link">
                        <a <?php echo $this->get_render_attribute_string( 'gallery_btn_link' ); ?>><?php echo $icon_html; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>   
        </div>
        <?php
        
    }
    
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
        
        $this->add_control(
                'style',
                [
                        'label' => __( 'Template', 'astha' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => '1',
                        'options' => [
                                '1' => __( 'Style 1', 'astha' ),
                                '2' => __( 'Style 2', 'astha' ),
                        ],
                        'prefix_class' => 'mc-gallery-style-',
                ]
        );
        
        
        $this->add_control(
                'image',
                [
                        'label' => __( 'Photo', 'astha' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                                'url' => Utils::get_placeholder_image_src(),
                        ],
                        'dynamic' => [
                                'active' => true,
                        ]
                ]
        );
        
        $this->add_control(
            'heading',
                [
                    'label'         => esc_html__( 'Heading', 'astha' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => __( 'Gallery Image Title', 'astha' ),
                    'label_block'   => TRUE,
                    'dynamic'       => ['active' => true],
                ]
        );
        
        $this->add_control(
            'box_sub_title',
                [
                    'label'         => esc_html__( 'Sub Title', 'astha' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => __( 'Sub Title', 'astha' ),
                    'label_block'   => TRUE,
                    'dynamic'       => ['active' => true],
                ]
        );

        $this->add_control(
            'gallery_btn_link',
            [
                'label'     => esc_html__( 'Link', 'astha' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'astha' ),
                'show_external' => true,
                'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                ],
            ]
        );
        
        $this->add_control(
            'add_icon',
                [
                        'label'     => __( 'Icon', 'astha' ),
                        'type'      => Controls_Manager::ICONS,
                        'default'   => [
                                'value' => 'fas fa-plus',
                                'library' => 'solid',
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
            'avd_heading_design_style',
            [
                'label'     => esc_html__( 'Design', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        
        
        
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'gradient',
                        'label' => __( 'Gradient', 'astha' ),
                        'types' => [ 'gradient' ],
                        'selector' => '{{WRAPPER}} .mc-gallery-box-wrapper .mc-gallery-item-info',
                ]
        );
        
        $this->add_control(
                'title_color', [
                        'label' => __( 'Title Color', 'astha' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .mc-gallery-info-title p' => 'color: {{VALUE}};',
                        ],
                ]
        );
        
        $this->add_control(
                'sub_title_color', [
                        'label' => __( 'Sub Title Color', 'astha' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .mc-gallery-info-title span' => 'color: {{VALUE}};',
                        ],
                ]
        );
        
        $this->add_control(
                'icon_color', [
                        'label' => __( 'Icon Color', 'astha' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .mc-gallery-info-link a' => 'color: {{VALUE}}; border-color: {{VALUE}};',
                                '{{WRAPPER}} .mc-gallery-box-wrapper .mc-gallery-item .mc-gallery-info-link a:hover' => 'color:white;background-color: {{VALUE}};',
//                                '{{WRAPPER}}.mc-gallery-style-2 .mc-gallery-box-wrapper .mc-gallery-item .mc-gallery-info-link a:hover' => 'color:white;background-color: {{VALUE}};',
                        ],
                ]
        );
        
        $this->add_control(
                'gb_box_height',
                [
                        'label' => __( 'Box Height', 'astha' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                                'px' => [
                                        'min' => 100,
                                        'max' => 500,
                                        'step' => 1,
                                ],
                        ],
                        'default' => [
                                'unit' => 'px',
                                'size' => 250,
                        ],
                        'selectors' => [
                                '{{WRAPPER}} .mc-gallery-box-wrapper .mc-gallery-item' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        
        
        
        
        $this->end_controls_section();
    
        $this->start_controls_section(
            'mc_style_typography',
            [
                'label'     => esc_html__( 'Typography', 'astha' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => 'Title Typography',
                        'selector' => '{{WRAPPER}} .mc-gallery-info-title p',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'sub_title_typography',
                        'label' => 'Sub Title Typography',
                        'selector' => '{{WRAPPER}} .mc-gallery-info-title span',
                        'global' => [
                                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
                        ],

                ]
        );
    
        $this->end_controls_section();
    
    }
}