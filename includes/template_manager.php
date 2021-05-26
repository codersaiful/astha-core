<?php
/**
 * All the form related functions definitions are here
 *
 * @package Astha_core
 * @author codersailful
 */
defined( 'ABSPATH' ) || die();

/**
 * 
 * @param type $template_file
 * @return type Manage Template Function
 */
function astha_core_template_manger($template_file){
    if( ! is_singular() ){
        return $template_file;
    }
    $type = get_post_type();
    if( $type == 'service' || $type == 'team' || $type == 'portfolio' ){
        $template = ASTHA_CORE_BASE_DIR . 'templates/' . $type . '.php';
        return is_file( $template ) ? $template : $template_file;
    }
   
    return $template_file;
}
//add_filter( 'template_include', 'astha_core_template_manger' );

if( !function_exists( 'astha_is_cf7_activated' ) ){
    /**
    * Check if contact form 7 is activated
    *
    * @return bool
    */
   function astha_is_cf7_activated() {
           return class_exists( '\WPCF7' );
   }
}

if( !function_exists( 'astha_get_cf7_forms' ) ){   
    /**
     * Get a list of all CF7 forms
     *
     * @return array
     */
    function astha_get_cf7_forms() {
            $forms = [];

            if ( astha_is_cf7_activated() ) {
                    $_forms = get_posts( [
                            'post_type'      => 'wpcf7_contact_form',
                            'post_status'    => 'publish',
                            'posts_per_page' => -1,
                            'orderby'        => 'title',
                            'order'          => 'ASC',
                    ] );

                    if ( ! empty( $_forms ) ) {
                            $forms = wp_list_pluck( $_forms, 'post_title', 'ID' );
                    }
            }

            return $forms;
    }
}

if( !function_exists( 'astha_get_current_user_display_name' ) ){
    /**
     * Get user name
     * @return type
     */
    function astha_get_current_user_display_name() {
            $user = wp_get_current_user();
            $name = 'user';
            if ( $user->exists() && $user->display_name ) {
                    $name = $user->display_name;
            }
            return $name;
    }
}

if( !function_exists( 'astha_do_shortcode' ) ){
    /**
     * Call a shortcode function by tag name.
     *
     * @since  1.0.0
     *
     * @param string $tag     The shortcode whose function to call.
     * @param array  $atts    The attributes to pass to the shortcode function. Optional.
     * @param array  $content The shortcode's content. Default is null (none).
     *
     * @return string|bool False on failure, the result of the shortcode on success.
     */
    function astha_do_shortcode( $tag, array $atts = array(), $content = null ) {
            global $shortcode_tags;
            if ( ! isset( $shortcode_tags[ $tag ] ) ) {
                    return false;
            }
            return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
    }
}

if( !function_exists( 'astha_sanitize_html_class_param' ) ){
    /**
     * Sanitize html class string
     *
     * @param $class
     * @return string
     */
    function astha_sanitize_html_class_param( $class ) {
            $classes = ! empty( $class ) ? explode( ' ', $class ) : [];
            $sanitized = [];
            if ( ! empty( $classes ) ) {
                    $sanitized = array_map( function( $cls ) {
                            return sanitize_html_class( $cls );
                    }, $classes );
            }
            return implode( ' ', $sanitized );
    }
}

if( !function_exists( 'astha_get_help_url' ) ){
    /**
     * Set help url
     *
     * @param string
     * @return string
     */
    function astha_get_help_url( $widget_name ) {
            $site_url = 'https://codeastrology.com';
            return $site_url . '/widget/' . $widget_name;
    }
}

function astha_get_placeholder_image_src( $image = '' ) {
        $placeholder_image = ASTHA_CORE_ELEMENTOR_BASE_URL . 'assets/images/' . $image;

        /**
         * Get placeholder image source.
         * 
         *
         * Filters the source of the default placeholder image used by Elementor.
         *
         * @since 1.0.0
         *
         * @param string $placeholder_image The source of the default placeholder image.
         */
        $placeholder_image = apply_filters( 'astha_get_placeholder_image_src', $placeholder_image );

        return $placeholder_image;
}

/**
* Checks a control value for being empty, including a string of '0' not covered by PHP's empty().
*
* @param mixed $source
* @param bool|string $key
*
* @return bool
*/
function astha_is_empty( $source, $key = false ) {
       if ( is_array( $source ) ) {
               if ( ! isset( $source[ $key ] ) ) {
                       return true;
               }

               $source = $source[ $key ];
       }

       return '0' !== $source && empty( $source );
}