<?php

final class Astha_Elementor {
    public $errors = array();
    public $widgetsArray = array();


    public function __construct( $widgetsArray = false ) {
        
        /**
         * YOUR CUSTOM CODE START HERE
         */









        
        /**
         * YOUR CUSTOM CODE START HERE
         */
        
        
        
        
        
        $this->widgetsArray = $widgetsArray;
        
        if( $this->widgetsArray && is_array( $this->widgetsArray ) ){
            
            add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
            //add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
            add_action( 'elementor/elements/categories_registered', [ $this, 'add_categories' ] );

            //Add Style for Widgets
            add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_enqueue' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ] );
            
            //For Editor Screen
            add_action('elementor/editor/before_enqueue_scripts', [$this,'elementor_screen_style']);
        }else{
            $this->widgetsArray = array();
        }
        //var_dump($this->widgetsArray);
        
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_widgets() {

        foreach( $this->widgetsArray as $widget ){
            $name = str_replace('','', $widget);
            $name = str_replace('_','-', $name);
            
            $class_name = str_replace( '-','_', $name );
            $class_name = "Astha_" . ucwords( $class_name, '_' );
            
            $file = ASTHA_CORE_ELEMENTOR_BASE_DIR . 'widgets/'. $name . '.php';
            
            if( file_exists( $file ) ){
                require_once $file;
            }else{
                $this->errors[] = $file . ' File is not founded.';
                $class_name = false;
            }
            
            if( $class_name && class_exists( $class_name ) ){
                /**
                 * For Development perpose,
                 * All Widget will show under basic Category
                 * That's why, I just extending
                 * our created class and Trigger after that
                 *
                $saiful = 'class_name' . $class_name;
                $saiful = new $class_name();
                var_dump($saiful);
                //********************Here Will Complete Triggering *****************************/
                
                \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $class_name() );
            }
        }

    }
    
    /**
     * Style for Elementor Load Screen
     */
    public function elementor_screen_style() {
        /**
         * Load at elementor editing screen 
         * 
         * Mainly I have added an icon for our Elementor Widget
         * over this CSS file
         */
        wp_register_style( 'astha-screen-style', ASTHA_CORE_ELEMENTOR_BASE_URL . 'assets/css/elementor-style.css' );
        wp_enqueue_style( 'astha-screen-style' );
        
    }
    
    /**
     * FrontEnd File for Elementor Widget
     * All script will stay here
     * 
     * Actually First time, we though, All Element Widget's js Code will stay for different file
     * with same name of Widget 
     * and inside Widget folder of js folder
     * 
     * But finally we decided to keep one file only
     * and which name will be frontend.js
     * 
     * @since 1.0.0.15
     * @by Saiful
     * @date Fri 15.1.2021 at Home
     */
    public function wp_enqueue_scripts(){
        //Naming of Args
        $name           = 'astha-core-elementor-frontend';
        $js_file_url    = apply_filters( 'astha_elementor_frontend_js', ASTHA_CORE_ELEMENTOR_BASE_URL . 'assets/js/frontend.js' );
        $dependency     =  apply_filters( 'astha_elementor_frontend_js_dependency', ['jquery'] );//['jquery'];
        $version        = ASTHA_CORE_VERSION;
        $in_footer  = true;
        
        wp_register_script( $name, $js_file_url, $dependency, $version, $in_footer );
        wp_enqueue_script( $name );
        
        
        
        //Naming of Args for Slick
        $name           = 'slick';
        $js_file_url    = apply_filters( 'astha_elementor_slick_js', ASTHA_CORE_BASE_URL . 'assets/vendor/js/frontend.js' );
        $dependency     =  apply_filters( 'astha_elementor_slick_js_dependency', ['jquery'] );//['jquery'];
        $version        = ASTHA_CORE_VERSION;
        $in_footer  = true;
        
        //wp_register_script( $name, $js_file_url, $dependency, $version, $in_footer );
        //wp_enqueue_script( $name );
        
        
        
        //Naming of Args for owlCarousel
        $name           = 'owlCarousel';
        $js_file_url    = apply_filters( 'astha_elementor_slick_js', ASTHA_CORE_BASE_URL . 'assets/vendor/js/owl.carousel.min.js' );
        $dependency     =  apply_filters( 'astha_elementor_slick_js_dependency', ['jquery'] );//['jquery'];
        $version        = ASTHA_CORE_VERSION;
        $in_footer  = true;
        
        wp_register_script( $name, $js_file_url, $dependency, $version, $in_footer );
        wp_enqueue_script( $name );
        
        //Naming of Barfiller
        $name           = 'mc-barfiller';
        $js_file_url    = apply_filters( 'astha_elementor_barfiller', ASTHA_CORE_BASE_URL . 'assets/vendor/js/barfiller.js' );
        $dependency     =  apply_filters( 'astha_elementor_barfiller_dependency', ['jquery'] );//['jquery'];
        $version        = ASTHA_CORE_VERSION;
        $in_footer  = true;
        
        wp_register_script( $name, $js_file_url, $dependency, $version, $in_footer );
        wp_enqueue_script( $name );
        wp_enqueue_style('mc-barfiller', ASTHA_CORE_BASE_URL . 'assets/vendor/css/barfiller.css' );
        
        //Animate CSS Load
        wp_enqueue_style('mc-animate', ASTHA_CORE_BASE_URL . 'assets/vendor/css/animate.min.css' );
        
        //CSS file for Slider Script Slick Slider
        //wp_enqueue_style('slick', ASTHA_CORE_BASE_URL . 'assets/vendor/css/owl.carousel.css' );
        
        
        //CSS file for Slider Script Owl Carousel Slider
        wp_enqueue_style('owlCarousel', ASTHA_CORE_BASE_URL . 'assets/vendor/css/owl.carousel.css' );
        wp_enqueue_style('owlCarousel-theme', ASTHA_CORE_BASE_URL . 'assets/vendor/css/owl/owl.theme.default.css' );
        
        
    }
    
    public function widget_enqueue() {
        
        /**
         * Load at elementor editing screen 
         * 
         * Mainly I have added an icon for our Elementor Widget
         * over this CSS file
         */
        wp_register_style( 'astha-elementor-style', ASTHA_CORE_ELEMENTOR_BASE_URL . 'assets/css/elementor-style.css' );
        wp_enqueue_style( 'astha-elementor-style' );
        
        foreach( $this->widgetsArray as $widget ){
            $name = str_replace(' ','', $widget);
            $name = str_replace('_','-', $name);
            
            $class_name = str_replace( '-','_', $name );
            $class_name = "Astha_" . ucwords( $class_name, '_' );
            
            $file = ASTHA_CORE_ELEMENTOR_BASE_DIR . 'widgets/'. $name . '.php';
            
            if( file_exists( $file ) ){
                require_once $file;
            }else{
                return;
            }
            
            if( ! class_exists( $class_name ) ){
                return;
            }
            
            
            /**
             * CSS file load based on Element/Widget
             * 
             * we will load CSS file,
             * If only Available JS file
             * 
             * @since 1.0.0.12
             */
            $css_file_url = ASTHA_CORE_ELEMENTOR_BASE_URL . 'assets/css/widgets/' . $name . '.css';
            $css_file_dir = ASTHA_CORE_ELEMENTOR_BASE_DIR . 'assets/css/widgets/' . $name . '.css';
            
            if( is_file( $css_file_dir ) ){
                 wp_register_style( $name, $css_file_url );
                 wp_enqueue_style( $name );
            }
            
            
            /**
             * JS file load based on Element/Widget
             * 
             * we will load js file,
             * If only Available JS file
             * 
             * @since 1.0.0.12
             */
            $js_file_url = ASTHA_CORE_ELEMENTOR_BASE_URL . 'assets/js/widgets/' . $name . '.js';
            $js_file_dir = ASTHA_CORE_ELEMENTOR_BASE_DIR . 'assets/js/widgets/' . $name . '.js';
            if( is_file( $js_file_dir ) ){
                
                $elementObj = new $class_name();
                $settings = [];
                if( method_exists( $elementObj , 'astha_settings') ){
                    $settings = $elementObj->astha_settings();
                }
                
                if( isset( $settings['additional_scripts'] ) && is_array( $settings['additional_scripts'] ) ){
                    foreach( $settings['additional_scripts'] as $script_name => $script ){
                        
                        $_url = isset( $script['url'] ) ? $script['url'] : null;
                        $_dependency = isset( $script['dependency'] ) ? $script['dependency'] : [];
                        $_version = isset( $script['version'] ) ? $script['version'] : null;
                        $_in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
                        wp_register_script( $script_name, $_url, $_dependency, $_version, $_in_footer );
                        wp_enqueue_script( $script_name );
                    }
                }

                
                $dependency = isset( $settings['dependency'] ) ? $settings['dependency'] : null;
                $version = isset( $settings['version'] ) ? $settings['version'] : ASTHA_CORE_VERSION;
                $in_footer = isset( $settings['in_footer'] ) ? $settings['in_footer'] : false;
                wp_register_script( $name, $js_file_url, $dependency, $version, $in_footer );

                wp_enqueue_script( $name );
                 
                //wp_enqueue_script( 'astha-counter', ASTHA_CORE_ELEMENTOR_BASE_URL . 'assets/js/widgets/counter.js', ['jquery'], '', true );
        
            }
            
            
        }

    }
    
    /**
     * Init Controls
     *
     * Include controls files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_controls() {

        // Include Control files
        //require_once( __DIR__ . '/assets/controls/test-control.php' );

        // Register control
        //\Elementor\Plugin::$instance->controls_manager->register_control('control-type-', new \Test_Control());
    }

    /**
     * Adding new categories
     * for custom cat
     * 
     * @since 1.0
     */
    public function add_categories($elements_manager) {
        $elements_manager->add_category('astha', ['title' => 'Astha', 'icon' => 'fa fa-chat']);
//        $elements_manager->add_category('other_test', ['title' => 'Testing Cat', 'icon' => 'fa fa-facebook']);
    }


}
