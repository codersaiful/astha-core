<?php

/**
 * Plugin Name: Astha Core
 * Plugin URI: https://codeastrology.com/astha-core
 * Description: Required Functionality for <strong>Astha</strong> Theme. Most of the Functionality Will come from Here.
 * Author: Saiful Islam
 * Author URI: https://profiles.wordpress.org/codersaiful/
 * 
 * Version: 1.0.0
 * Requires at least:    4.0.0
 * Tested up to:         5.5.2
 * Text Domain: astha
 * Domain Path: /languages/
 */


if ( !defined( 'ABSPATH' ) ) {
    die();
}

if ( !defined( 'ASTHA_CORE_VERSION' ) ) {
    define( 'ASTHA_CORE_VERSION', '1.0.0.20');
}
if( !defined( 'ASTHA_CORE_CAPABILITY' ) ){
    $astha_core_capability = apply_filters( 'astha_core_menu_capability', 'astha_theme_options' );
    define( 'ASTHA_CORE_CAPABILITY', $astha_core_capability );
}

if ( !defined( 'ASTHA_CORE_NAME' ) ) {
    define( 'ASTHA_CORE_NAME', 'Astha Core');
}

if ( !defined( 'ASTHA_CORE_BASE_NAME' ) ) {
    define( 'ASTHA_CORE_BASE_NAME', plugin_basename( __FILE__ ) );
}

if ( !defined( 'ASTHA_CORE_MENU_SLUG' ) ) {
    define( 'ASTHA_CORE_MENU_SLUG', 'astha-core' );
}
if ( !defined( 'ASTHA_CORE_META_NAME' ) ) {
    define( 'ASTHA_CORE_META_NAME', 'astha_core_data' );
}


if( !defined( 'ASTHA_CORE_PLUGIN' ) ){
    define( 'ASTHA_CORE_PLUGIN', 'astha-core/init.php' );
}


if ( !defined( 'ASTHA_CORE_BASE_URL' ) ) {
    define( "ASTHA_CORE_BASE_URL", plugins_url() . '/'. plugin_basename( dirname( __FILE__ ) ) . '/' );
}

if ( !defined( 'ASTHA_CORE_BASE_DIR' ) ) {
    define( "ASTHA_CORE_BASE_DIR", str_replace( '\\', '/', dirname( __FILE__ ) ) . '/' );
}

if ( !defined( 'ASTHA_CORE_ELEMENTOR_BASE_URL' ) ) {
    define( "ASTHA_CORE_ELEMENTOR_BASE_URL", ASTHA_CORE_BASE_URL . 'elementor/' );
}

if ( !defined( 'ASTHA_CORE_ELEMENTOR_BASE_DIR' ) ) {
    define( "ASTHA_CORE_ELEMENTOR_BASE_DIR", ASTHA_CORE_BASE_DIR . 'elementor/' );
}


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//include_once ASTHA_CORE_BASE_DIR . '/admin/plugins_loaded.php';
if( is_admin() ){
    //include_once ASTHA_CORE_BASE_DIR . '/admin/meta-box.php';
}

//Including File
//include_once ASTHA_CORE_BASE_DIR . '/includes/load-scripts.php';

/**
 * Main Ultra Elementor Addons Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Astha_Core {
        
	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var UltraElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return UltraElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
                
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'astha' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

                add_action('admin_enqueue_scripts', [$this,'admin_style']);
                //add_action('wp_enqueue_scripts', [$this,'builtin_script_style_loading']);

		// Check if Elementor installed and activated
		if ( did_action( 'elementor/loaded' ) && version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
                    
                    include_once ASTHA_CORE_ELEMENTOR_BASE_DIR . '/header-footer-manage.php';
                    
                    /**
                     * Elementor Widget Loader
                     * 
                     * All widget will load here
                     * 
                     * @since 1.0.0
                     */
                    include_once ASTHA_CORE_ELEMENTOR_BASE_DIR . '/load.php';
                    
                    $widget_folder = ASTHA_CORE_ELEMENTOR_BASE_DIR . '/widgets/';
                    $widgets = scandir( $widget_folder, 1 );
                    $widgetsArray = array();
                    foreach( $widgets as $wid_file_name ){
                        if( is_file( $widget_folder . $wid_file_name ) ){
                            $onl_name = substr( $wid_file_name, 0, -4 );
                            $widgetsArray[$onl_name] = $onl_name;
                        }
                    }
                    new Astha_Elementor( $widgetsArray );
		}
                
                include_once ASTHA_CORE_ELEMENTOR_BASE_DIR . 'assets/css/load-css.php';
                
                
                include_once ASTHA_CORE_BASE_DIR . 'includes/functions.php';
                include_once ASTHA_CORE_BASE_DIR . 'includes/post.php';
                include_once ASTHA_CORE_BASE_DIR . 'includes/enqueue.php';
                include_once ASTHA_CORE_BASE_DIR . 'includes/widgets.php';
                include_once ASTHA_CORE_BASE_DIR . 'includes/template_manager.php';
                

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'astha' ),
			'<strong>' . esc_html__( 'Ultra Elementor Addons', 'astha' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'astha' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'astha' ),
			'<strong>' . esc_html__( 'Ultra Elementor Addons', 'astha' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'astha' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'astha' ),
			'<strong>' . esc_html__( 'Ultra Elementor Addons', 'astha' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'astha' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 
	public function init_controls() {

		

	}   
        */
        
        public function admin_style(){
            wp_register_style( 'astha-admin', ASTHA_CORE_BASE_URL . 'assets/css/admin.css', false, '1.0.0' );
            wp_enqueue_style( 'astha-admin' );
        }
        
        
        public function builtin_script_style_loading(){
            wp_register_script( 'swiper-mins', ASTHA_CORE_BASE_URL . '/assets/vendor/js/swiper-min.js', ['jquery'] );
            wp_enqueue_script( 'swiper-mins' );
        }

}

Astha_Core::instance();
register_activation_hook( __FILE__, 'astha_core_activation' );

if( ! function_exists( 'astha_core_activation' ) ){
    function astha_core_activation(){
        $cpt_support = get_option( 'elementor_cpt_support', [ 'page', 'post' ] );
        if( is_array($cpt_support) ){
            $cpt_support['header_footer'] = 'header_footer';
            //Astha core custom post type
            $cpt_support['astha_department'] = 'astha_department';
            $cpt_support['astha_doctor'] = 'astha_doctor';
            $cpt_support['astha_case'] = 'astha_case';
            update_option( 'elementor_cpt_support', $cpt_support);
        }
    }
}