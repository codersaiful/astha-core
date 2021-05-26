<?php
/**
 * Adding Custom Widget for Astha Theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astha
 */

/**
 * Including Widgets File
 * 
 * All Widget will come from Here
 */
include_once ASTHA_CORE_BASE_DIR . 'includes/widgets/widgets_recent_post.php'; 
include_once ASTHA_CORE_BASE_DIR . 'includes/widgets/widgets_footer_branding.php';
include_once ASTHA_CORE_BASE_DIR . 'includes/widgets/widgets_newsletter.php';
include_once ASTHA_CORE_BASE_DIR . 'includes/widgets/widgets_feedback.php';

/**
 * Register Widget All
 * 
 * @package Astha
 */
function astha_register_widget() {
    register_widget( 'Astha_Recent_Post' );
    register_widget( 'Astha_Newsletter_Wid' );
    register_widget( 'Astha_Footer_Branding' );
    register_widget( 'Astha_Feedback' );
}
add_action( 'widgets_init', 'astha_register_widget' );
