<?php

/**
 * Enqueue scripts and styles.
 */
function astha_core_enqueue() {
    
    /**
     * Different Type Layout
     * Such: Header One Two Style
     * Footer One Two Style
     * Basically for different type style, We have used this layout.css file
     * 
     * @since 1.0.0.14
     */
    wp_enqueue_style( 'astha-core-style', ASTHA_CORE_BASE_URL . 'assets/css/style.css', array(), ASTHA_CORE_VERSION );
    
    
    
    
    //owl-carousel js
    //wp_enqueue_script( 'astha-plugin', ASTHA_CORE_BASE_URL . 'assets/js/script.js', array('jquery'), ASTHA_CORE_VERSION, true );
    
    
    //astha-core js
    wp_enqueue_script( 'astha-plugin', ASTHA_CORE_BASE_URL . 'assets/js/script.js', array('jquery'), ASTHA_CORE_VERSION, true );
    
}
add_action( 'wp_enqueue_scripts', 'astha_core_enqueue' );