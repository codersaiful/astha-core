<?php

/**
 * Register Custom Post Type Header_Footer
 * Actually We want to make Custom Header Footer
 * for our Astha Theme.
 */
function astha_core_register_header_footer_post() {

	/**
	 * Post Type: Header & Footer.
	 */

	$labels = [
		"name" => __( "Header & Footer", "astha" ),
		"singular_name" => __( "Header & Footer", "astha" ),
		"menu_name" => __( "Header & Footer", "astha" ),
		"all_items" => __( "All Header & Footer", "astha" ),
		"add_new" => __( "Add new", "astha" ),
		"add_new_item" => __( "Add new Header & Footer", "astha" ),
		"edit_item" => __( "Edit Header & Footer", "astha" ),
		"new_item" => __( "New Header & Footer", "astha" ),
		"view_item" => __( "View Header & Footer", "astha" ),
		"view_items" => __( "View Header & Footer", "astha" ),
		"search_items" => __( "Search Header & Footer", "astha" ),
		"not_found" => __( "No Header & Footer found", "astha" ),
		"not_found_in_trash" => __( "No Header & Footer found in trash", "astha" ),
		"parent" => __( "Parent Header & Footer:", "astha" ),
		"featured_image" => __( "Featured image for this Header & Footer", "astha" ),
		"set_featured_image" => __( "Set featured image for this Header & Footer", "astha" ),
		"remove_featured_image" => __( "Remove featured image for this Header & Footer", "astha" ),
		"use_featured_image" => __( "Use as featured image for this Header & Footer", "astha" ),
		"archives" => __( "Header & Footer archives", "astha" ),
		"insert_into_item" => __( "Insert into Header & Footer", "astha" ),
		"uploaded_to_this_item" => __( "Upload to this Header & Footer", "astha" ),
		"filter_items_list" => __( "Filter Header & Footer list", "astha" ),
		"items_list_navigation" => __( "Header & Footer list navigation", "astha" ),
		"items_list" => __( "Header & Footer list", "astha" ),
		"attributes" => __( "Header & Footer attributes", "astha" ),
		"name_admin_bar" => __( "Header & Footer", "astha" ),
		"item_published" => __( "Header & Footer published", "astha" ),
		"item_published_privately" => __( "Header & Footer published privately.", "astha" ),
		"item_reverted_to_draft" => __( "Header & Footer reverted to draft.", "astha" ),
		"item_scheduled" => __( "Header & Footer scheduled", "astha" ),
		"item_updated" => __( "Header & Footer updated.", "astha" ),
		"parent_item_colon" => __( "Parent Header & Footer:", "astha" ),
	];

	$args = [
		"label" => __( "Header & Footer", "astha" ),
		"labels" => $labels,
		"description" => __( "This post is for Astha Header and Footer", "astha" ),
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => false,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "header-footer", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-hammer",
		"supports" => [ "title", "editor" ],
	];

	register_post_type( "header_footer", $args );
}

add_action( 'init', 'astha_core_register_header_footer_post' );

/**
 * Add Submenu Under Theme's astha
 * Menu name: Header and Footer
 * 
 * We also add this menu Feature to our Plugin UltraAddons
 * and post type will also same: 'header_footer'
 */
function astha_core_add_submenu(){
    $page_title = $menu_title = esc_html__( 'Header & Footer', 'astha' );
    $capability = 'edit_themes';
    $menu_slug = admin_url( 'edit.php?post_type=header_footer' );
    add_submenu_page('astha_welcome', $page_title, $menu_title, $capability, $menu_slug, '', 3 );
//    add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function, $position);
}
add_action( 'admin_menu', 'astha_core_add_submenu' );

function astha_core_template_header_footer( $template_file ){

    if( ! is_singular() ){
        return $template_file;
    }
    $type = get_post_type();
    if( $type == 'header_footer' ){
        $template = ASTHA_CORE_BASE_DIR . 'templates/header-footer.php';
        return is_file( $template ) ? $template : $template_file;
    }
   
    return $template_file;
}
add_filter( 'template_include', 'astha_core_template_header_footer' );