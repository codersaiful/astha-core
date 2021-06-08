<?php

/**
 * Adding Submentu for Customizer 
 * Restore/Backup saving features
 * 
 * @since 1.0.2.0 of theme
 */
function astha_core_menu_control(){
    add_submenu_page('astha_welcome', esc_html__( 'Setting Backup & Update', 'astha' ), esc_html__( 'Setting Backup & Update', 'astha' ), ASTHA_CORE_CAPABILITY, 'astha-settings-backup', 'astha_core_settings_backup' );
}
add_action( 'admin_menu', 'astha_core_menu_control', 99 );

/**
 * Page's file included here for [Setting Backup & Update] Submenu
 * 
 * @since 1.0.2.0 of Theme Version
 */
function astha_core_settings_backup(){
    include __DIR__ . '/pages/settings_backup.php';
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function astha_core_widgets_init() {

    register_sidebar(
		array(
			'name'          => esc_html__( 'Dept. Sidebar', 'astha' ),
			'id'            => 'astha-dept',
			'description'   => esc_html__( 'Add widgets here.', 'astha' ),
			'before_widget' => '<section id="%1$s" class="widget widget-general %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
        
        
}
add_action( 'widgets_init', 'astha_core_widgets_init' );

/**
 * Dynamic Sidebar of Department
 * 
 * *****************************
 * prothome @Filter: astha_custom_sidebar_bool er value true hote hobe.
 * er por custom sidebar er @Action_Hook astha_custom_sidebar e content show 
 * korote hobe. ekhane tai kora hoyeche.
 * ********************************
 * 
 * @global type $post
 * @return type
 */
function astha_core_show_department_sidebar(){
    global $post;
    if( ! $post ){
        return;
    }
    $type = $post->post_type;
    if( $type == 'astha_department' ){
        dynamic_sidebar( 'astha-dept' );
    }
    
    return;
}
add_action( 'astha_custom_sidebar', 'astha_core_show_department_sidebar' );

/**
 * Set Custom Sidebar for Astha Department type post
 * 
 * @global type $post
 * @param type $bool
 * @return boolean
 */
function astha_core_custom_sidebar_bool( $bool ){
    global $post;
    if( ! $post ){
        return $bool;
    }
    $type = $post->post_type;
    if( $type == 'astha_department' ){ // || $type == 'astha_doctor'|| $type == 'astha_case'
        return true;
    }
    return $bool;
}
add_filter( 'astha_custom_sidebar_bool', 'astha_core_custom_sidebar_bool' );


/**
 * Common Sidebar Hide for Department
 * 
 * @global type $post
 * @param type $bool
 * @return boolean
 */
function astha_core_common_sidebar_bool( $bool ){
    global $post;
    if( ! $post ){
        return $bool;
    }
    $type = $post->post_type;
    if( $type == 'astha_department' ){ // || $type == 'astha_doctor'|| $type == 'astha_case'
        return false;
    }
    return $bool;
}
add_filter( 'astha_common_sidebar_bool', 'astha_core_common_sidebar_bool' );



/**
 * Manipulate Astha Option, I mean: Astha Theme Options
 * From Astha.
 * It will work properly for our Theme Astha only
 * 
 * @global type $post
 * @param type $theme_mod
 * @param type $keyword
 * @param type $post_ID
 * @return string
 */
function astha_core_manipulate_astha_option( $theme_mod, $keyword, $post_ID ){
    global $post;
    if( ! $post ){
        return $theme_mod;
    }
    /**
     * Hide Sidebar for Case/ Astha Doctor
     * 
     * @since 1.0.0.19 and Theme's 1.0.0.60
     */
    if( $keyword == 'layout_sidebar' && ( $post->post_type == 'astha_doctor' || $post->post_type == 'astha_case' ) ){
        return 'no-sidebar';
    }
    return $theme_mod;
}
add_filter( 'astha_option', 'astha_core_manipulate_astha_option', 10, 3 );

/**
 * Add custom image size for Astha
 * 
 * @since 1.0.0.19
 */
function astha_core_theme_setup() {
    add_image_size( 'mc-dept-thumb', 870, 500, true );
    add_image_size( 'mc-team-thumb', 370, 370, true );
    add_image_size( 'mc-team-full', 520, 600, true );
    add_image_size( 'mc-case-full', 1170, 600, true );
}
add_action( 'after_setup_theme', 'astha_core_theme_setup' );

if( ! function_exists( 'astha_core_elementor_template_choises' ) ){
    
    /**
     * Doctor Bottom Template has come from Elementor Library 
     * 
     * Doctor Bottom Template will come from Elementor Template
     * Saved Template
     * 
     * @param   Array    $choices
     * @return  Array   found new $choices
     */
    function astha_core_elementor_template_choises(){
        $choices = array( ''=> __( 'None', 'astha' ) );
        $args = array(
            'post_type'     =>  'elementor_library',
            'post_status'   =>  'publish',
            'posts_per_page' => -1,
        );
        $query = get_posts( $args );

        // Check, If post not found , Direct return main choicese
        if( empty( $query ) ){
            return $choices;
        }
        
        //If found post, then itarate
        if( is_array( $query ) && count( $query ) > 0 ){
            foreach( $query as $q_post ){
                $id = (int) $q_post->ID;
                $choices[$id] = $q_post->post_title;
            }
        }

        return $choices;
    }
}
