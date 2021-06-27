<?php
function astha_register_department_post_type() {

        $icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMy4wLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiM5RUEzQTg7fQ0KPC9zdHlsZT4NCjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xOS45NCw4Ljg5Yy0wLjAzLTAuMjgtMC4zNi0wLjQ5LTAuNjQtMC40OWMtMC45MiwwLTEuNzMtMC41NC0yLjA3LTEuMzdjLTAuMzUtMC44NS0wLjEyLTEuODUsMC41Ni0yLjQ3DQoJYzAuMjItMC4yLDAuMjQtMC41MywwLjA2LTAuNzVjLTAuNDctMC42LTEtMS4xMy0xLjU4LTEuNmMtMC4yMy0wLjE4LTAuNTYtMC4xNi0wLjc2LDAuMDZjLTAuNiwwLjY2LTEuNjcsMC45MS0yLjQ5LDAuNTYNCgljLTAuODYtMC4zNi0xLjQtMS4yMy0xLjM1LTIuMTdjMC4wMi0wLjI5LTAuMi0wLjU1LTAuNDktMC41OGMtMC43NS0wLjA5LTEuNS0wLjA5LTIuMjUtMC4wMWMtMC4yOSwwLjAzLTAuNSwwLjI4LTAuNDksMC41Nw0KCUM4LjQ1LDEuNTYsNy45LDIuNDIsNy4wNSwyLjc3QzYuMjMsMy4xLDUuMTcsMi44Niw0LjU3LDIuMmMtMC4yLTAuMjItMC41My0wLjI0LTAuNzUtMC4wNmMtMC42LDAuNDctMS4xNCwxLjAxLTEuNjIsMS42DQoJQzIuMDIsMy45NywyLjA0LDQuMywyLjI2LDQuNWMwLjcsMC42MywwLjkyLDEuNjMsMC41NiwyLjVjLTAuMzUsMC44Mi0xLjIsMS4zNS0yLjE4LDEuMzVDMC4zMyw4LjM0LDAuMSw4LjU1LDAuMDcsOC44NA0KCWMtMC4wOSwwLjc1LTAuMDksMS41MiwwLDIuMjdjMC4wMywwLjI4LDAuMzcsMC40OSwwLjY2LDAuNDljMC44Ny0wLjAyLDEuNzEsMC41MiwyLjA2LDEuMzdjMC4zNSwwLjg1LDAuMTIsMS44NS0wLjU2LDIuNDcNCglDMiwxNS42NCwxLjk4LDE1Ljk3LDIuMTYsMTYuMmMwLjQ2LDAuNTksMSwxLjEzLDEuNTgsMS42YzAuMjMsMC4xOCwwLjU2LDAuMTYsMC43Ni0wLjA2YzAuNi0wLjY2LDEuNjctMC45MSwyLjQ5LTAuNTYNCgljMC44NiwwLjM2LDEuNDEsMS4yMywxLjM1LDIuMTdjLTAuMDIsMC4yOSwwLjIsMC41NSwwLjQ5LDAuNThDOS4yMiwxOS45OCw5LjYsMjAsOS45OSwyMGMwLjM3LDAsMC43My0wLjAyLDEuMS0wLjA2DQoJYzAuMjktMC4wMywwLjUtMC4yOCwwLjQ5LTAuNTdjLTAuMDMtMC45MywwLjUyLTEuNzgsMS4zNy0yLjEzYzAuODItMC4zNCwxLjg4LTAuMDksMi40OCwwLjU2YzAuMiwwLjIyLDAuNTIsMC4yNCwwLjc1LDAuMDYNCgljMC42LTAuNDcsMS4xNC0xLjAxLDEuNjItMS42YzAuMTgtMC4yMywwLjE2LTAuNTYtMC4wNi0wLjc2Yy0wLjctMC42My0wLjkyLTEuNjMtMC41Ni0yLjQ5YzAuMzQtMC44MSwxLjE2LTEuMzYsMi4wNS0xLjM2bDAuMTIsMA0KCWMwLjI5LDAuMDIsMC41NS0wLjIsMC41OS0wLjQ5QzIwLjAyLDEwLjQxLDIwLjAyLDkuNjUsMTkuOTQsOC44OXogTTEwLDE1Ljc3Yy0zLjE4LDAtNS43Ny0yLjU4LTUuNzctNS43N1M2LjgyLDQuMjQsMTAsNC4yNA0KCXM1Ljc3LDIuNTgsNS43Nyw1Ljc3YzAsMS4wOC0wLjMsMi4wOS0wLjgyLDIuOTZsLTIuNTItMi41MmMwLjE4LTAuNDMsMC4yOC0wLjksMC4yOC0xLjM4YzAtMC45NC0wLjM3LTEuODMtMS4wNC0yLjUNCglDMTEsNS44OCwxMC4xMSw1LjUyLDkuMTcsNS41MmMtMC4zMiwwLTAuNjMsMC4wNC0wLjkzLDAuMTJDOC4xMSw1LjY4LDgsNS43OSw3Ljk2LDUuOTJjLTAuMDQsMC4xNCwwLDAuMjgsMC4xMSwwLjM4DQoJYzAsMCwxLjI1LDEuMjYsMS42NiwxLjY3YzAuMDQsMC4wNCwwLjA0LDAuMTUsMC4wNCwwLjE5bDAsMC4wM0M5LjczLDguNjUsOS42NSw5LjIsOS41OCw5LjQxQzkuNTcsOS40Miw5LjU2LDkuNDMsOS41NSw5LjQzDQoJQzkuNTQsOS40NCw5LjUzLDkuNDUsOS41Myw5LjQ2QzkuMzEsOS41Myw4Ljc1LDkuNjEsOC4yOSw5LjY2bDAsMEw4LjI3LDkuNjZjMCwwLTAuMDEsMC0wLjAyLDBjLTAuMDUsMC0wLjEyLTAuMDEtMC4xOS0wLjA4DQoJQzcuNjIsOS4xNCw2LjQyLDcuOTUsNi40Miw3Ljk1QzYuMzIsNy44NSw2LjIsNy44Miw2LjEzLDcuODJjLTAuMTcsMC0wLjMyLDAuMTItMC4zNywwLjNjLTAuMzMsMS4yMiwwLjAyLDIuNTMsMC45MSwzLjQyDQoJYzAuNjcsMC42NywxLjU2LDEuMDQsMi41LDEuMDRjMC40OCwwLDAuOTUtMC4xLDEuMzgtMC4yOGwyLjU1LDIuNTVDMTIuMjEsMTUuNDMsMTEuMTQsMTUuNzcsMTAsMTUuNzd6Ii8+DQo8L3N2Zz4NCg==';
	/**
	 * Post Type: Departments.
	 */

	$labels = [
		"name" => __( "Departments", "astha" ),
		"singular_name" => __( "Department", "astha" ),
		"menu_name" => __( "Departments", "astha" ),
		"all_items" => __( "All Departments", "astha" ),
		"add_new" => __( "Add new", "astha" ),
		"add_new_item" => __( "Add new Department", "astha" ),
		"edit_item" => __( "Edit Department", "astha" ),
		"new_item" => __( "New Department", "astha" ),
		"view_item" => __( "View Department", "astha" ),
		"view_items" => __( "View Departments", "astha" ),
		"search_items" => __( "Search Departments", "astha" ),
		"not_found" => __( "No Departments found", "astha" ),
		"not_found_in_trash" => __( "No Departments found in trash", "astha" ),
		"parent" => __( "Parent Department:", "astha" ),
		"featured_image" => __( "Featured image for this Department", "astha" ),
		"set_featured_image" => __( "Set featured image for this Department", "astha" ),
		"remove_featured_image" => __( "Remove featured image for this Department", "astha" ),
		"use_featured_image" => __( "Use as featured image for this Department", "astha" ),
		"archives" => __( "Department archives", "astha" ),
		"insert_into_item" => __( "Insert into Department", "astha" ),
		"uploaded_to_this_item" => __( "Upload to this Department", "astha" ),
		"filter_items_list" => __( "Filter Departments list", "astha" ),
		"items_list_navigation" => __( "Departments list navigation", "astha" ),
		"items_list" => __( "Departments list", "astha" ),
		"attributes" => __( "Departments attributes", "astha" ),
		"name_admin_bar" => __( "Department", "astha" ),
		"item_published" => __( "Department published", "astha" ),
		"item_published_privately" => __( "Department published privately.", "astha" ),
		"item_reverted_to_draft" => __( "Department reverted to draft.", "astha" ),
		"item_scheduled" => __( "Department scheduled", "astha" ),
		"item_updated" => __( "Department updated.", "astha" ),
		"parent_item_colon" => __( "Parent Department:", "astha" ),
	];

	$args = [
		"label" => __( "Departments", "astha" ),
		"labels" => $labels,
		"description" => __( "This post type is for department custom post type.", "astha" ),
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "department", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => $icon,//"dashicons-hammer",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
	];

	register_post_type( "astha_department", $args );
}

add_action( 'init', 'astha_register_department_post_type' );

function astha_register_astha_doctor_post_type() {
        $icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMy4wLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiM5RUEzQTg7fQ0KPC9zdHlsZT4NCjxnPg0KCTxnPg0KCQk8Zz4NCgkJCTxnPg0KCQkJCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNy4xMSwxMC42OGgtMS41NWMwLjE2LDAuNDMsMC4yNCwwLjksMC4yNCwxLjM4djUuODVjMCwwLjItMC4wNCwwLjQtMC4xLDAuNThoMi41Ng0KCQkJCQljMC45NiwwLDEuNzMtMC43OCwxLjczLTEuNzN2LTMuMTlDMjAsMTEuOTcsMTguNzEsMTAuNjgsMTcuMTEsMTAuNjh6Ii8+DQoJCQk8L2c+DQoJCTwvZz4NCgk8L2c+DQoJPGc+DQoJCTxnPg0KCQkJPGc+DQoJCQkJPHBhdGggY2xhc3M9InN0MCIgZD0iTTQuMTksMTIuMDZjMC0wLjQ5LDAuMDktMC45NSwwLjI0LTEuMzhIMi44OWMtMS41OSwwLTIuODksMS4zLTIuODksMi44OXYzLjE5YzAsMC45NiwwLjc4LDEuNzMsMS43MywxLjczDQoJCQkJCWgyLjU2Yy0wLjA2LTAuMTgtMC4xLTAuMzgtMC4xLTAuNThWMTIuMDZ6Ii8+DQoJCQk8L2c+DQoJCTwvZz4NCgk8L2c+DQoJPGc+DQoJCTxnPg0KCQkJPGc+DQoJCQkJPHBhdGggY2xhc3M9InN0MCIgZD0iTTExLjc3LDkuMTdIOC4yM2MtMS41OSwwLTIuODksMS4zLTIuODksMi44OXY1Ljg1YzAsMC4zMiwwLjI2LDAuNTgsMC41OCwwLjU4aDguMTYNCgkJCQkJYzAuMzIsMCwwLjU4LTAuMjYsMC41OC0wLjU4di01Ljg1QzE0LjY2LDEwLjQ3LDEzLjM2LDkuMTcsMTEuNzcsOS4xN3oiLz4NCgkJCTwvZz4NCgkJPC9nPg0KCTwvZz4NCgk8Zz4NCgkJPGc+DQoJCQk8Zz4NCgkJCQk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTAsMS41MmMtMS45MSwwLTMuNDcsMS41Ni0zLjQ3LDMuNDdjMCwxLjMsMC43MiwyLjQzLDEuNzgsMy4wM0M4LjgxLDguMyw5LjM4LDguNDYsMTAsOC40Ng0KCQkJCQlzMS4xOS0wLjE2LDEuNy0wLjQ0YzEuMDYtMC42LDEuNzgtMS43MywxLjc4LTMuMDNDMTMuNDcsMy4wNywxMS45MSwxLjUyLDEwLDEuNTJ6Ii8+DQoJCQk8L2c+DQoJCTwvZz4NCgk8L2c+DQoJPGc+DQoJCTxnPg0KCQkJPGc+DQoJCQkJPHBhdGggY2xhc3M9InN0MCIgZD0iTTMuOSw0Ljc1Yy0xLjQzLDAtMi42LDEuMTYtMi42LDIuNnMxLjE2LDIuNiwyLjYsMi42YzAuMzYsMCwwLjcxLTAuMDgsMS4wMi0wLjIxDQoJCQkJCUM1LjQ3LDkuNSw1LjkyLDkuMDksNi4xOSw4LjU3QzYuMzksOC4yMSw2LjUsNy43OSw2LjUsNy4zNUM2LjUsNS45Miw1LjMzLDQuNzUsMy45LDQuNzV6Ii8+DQoJCQk8L2c+DQoJCTwvZz4NCgk8L2c+DQoJPGc+DQoJCTxnPg0KCQkJPGc+DQoJCQkJPHBhdGggY2xhc3M9InN0MCIgZD0iTTE2LjEsNC43NWMtMS40MywwLTIuNiwxLjE2LTIuNiwyLjZjMCwwLjQ0LDAuMTEsMC44NiwwLjMxLDEuMjJjMC4yOCwwLjUyLDAuNzMsMC45MywxLjI3LDEuMTcNCgkJCQkJYzAuMzEsMC4xNCwwLjY2LDAuMjEsMS4wMiwwLjIxYzEuNDMsMCwyLjYtMS4xNiwyLjYtMi42UzE3LjUzLDQuNzUsMTYuMSw0Ljc1eiIvPg0KCQkJPC9nPg0KCQk8L2c+DQoJPC9nPg0KPC9nPg0KPC9zdmc+DQo=';
	/**
	 * Post Type: Doctors.
	 */

	$labels = [
		"name" => __( "Doctors", "astha" ),
		"singular_name" => __( "Doctor", "astha" ),
		"menu_name" => __( "Our Doctors", "astha" ),
		"all_items" => __( "All Doctors", "astha" ),
		"add_new" => __( "Add new", "astha" ),
		"add_new_item" => __( "Add new Doctor", "astha" ),
		"edit_item" => __( "Edit Doctor", "astha" ),
		"new_item" => __( "New Doctor", "astha" ),
		"view_item" => __( "View Doctor", "astha" ),
		"view_items" => __( "View Doctors", "astha" ),
		"search_items" => __( "Search Doctors", "astha" ),
		"not_found" => __( "No Doctors found", "astha" ),
		"not_found_in_trash" => __( "No Doctors found in trash", "astha" ),
		"parent" => __( "Parent Doctor:", "astha" ),
		"featured_image" => __( "Featured image for this Doctor", "astha" ),
		"set_featured_image" => __( "Set featured image for this Doctor", "astha" ),
		"remove_featured_image" => __( "Remove featured image for this Doctor", "astha" ),
		"use_featured_image" => __( "Use as featured image for this Doctor", "astha" ),
		"archives" => __( "Doctor archives", "astha" ),
		"insert_into_item" => __( "Insert into Doctor", "astha" ),
		"uploaded_to_this_item" => __( "Upload to this Doctor", "astha" ),
		"filter_items_list" => __( "Filter Doctors list", "astha" ),
		"items_list_navigation" => __( "Doctors list navigation", "astha" ),
		"items_list" => __( "Doctors list", "astha" ),
		"attributes" => __( "Doctors attributes", "astha" ),
		"name_admin_bar" => __( "Doctor", "astha" ),
		"item_published" => __( "Doctor published", "astha" ),
		"item_published_privately" => __( "Doctor published privately.", "astha" ),
		"item_reverted_to_draft" => __( "Doctor reverted to draft.", "astha" ),
		"item_scheduled" => __( "Doctor scheduled", "astha" ),
		"item_updated" => __( "Doctor updated.", "astha" ),
		"parent_item_colon" => __( "Parent Doctor:", "astha" ),
	];

	$args = [
		"label" => __( "Doctors", "astha" ),
		"labels" => $labels,
		"description" => __( "Use this custom post type for create your shining doctor doctors.", "astha" ),
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "doctor", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => $icon,//"dashicons-groups",
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "astha_doctor", $args );
}

add_action( 'init', 'astha_register_astha_doctor_post_type' );

function astha_register_astha_case_post_type() {
        $icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMy4wLjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjAgMjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsOiM5RUEzQTg7fQ0KPC9zdHlsZT4NCjxnPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xOS43OCwxNy4zMWwtMy4xMy0yLjA5YzAuMjgtMC42MywwLjM3LTEuMzcsMC4xMi0yLjE2Yy0wLjMyLTEuMDItMS4yLTEuOC0yLjI0LTIuMDENCgkJYy0yLjA2LTAuNDEtMy44NSwxLjMtMy41OSwzLjM1YzAuMTcsMS4zNCwxLjI4LDIuNDIsMi42MiwyLjU4YzEsMC4xMiwxLjkyLTAuMjcsMi41NC0wLjkzbDMuMTMsMi4wOQ0KCQljMC4yMywwLjE1LDAuNTQsMC4wOSwwLjY5LTAuMTRoMEMyMC4wNywxNy43OCwyMC4wMSwxNy40NywxOS43OCwxNy4zMXoiLz4NCgk8cG9seWdvbiBjbGFzcz0ic3QwIiBwb2ludHM9IjExLjUxLDAuMzcgMTEuNTEsMi4zNCAxMy4zNywyLjM0IAkiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNi4yMiw0LjVIMy41OWMtMC4xLDAtMC4xOSwwLjA4LTAuMTksMC4xOXYyLjYzYzAsMC4xLDAuMDgsMC4xOSwwLjE5LDAuMTloMi42M2MwLjEsMCwwLjE5LTAuMDgsMC4xOS0wLjE5DQoJCVY0LjY4QzYuNCw0LjU4LDYuMzIsNC41LDYuMjIsNC41eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xMy43OCwxOC41MWMtMi40Mi0wLjA3LTQuMzctMi4wNi00LjM3LTQuNWMwLTIuNDQsMS45NS00LjQzLDQuMzctNC41YzAuMDcsMCwwLjEzLTAuMDYsMC4xMy0wLjEzVjMuNTkNCgkJYzAtMC4wOC0wLjA2LTAuMTQtMC4xNC0wLjE0aC0yLjZjLTAuMzUsMC0wLjYzLTAuMjgtMC42My0wLjYzdi0yLjdjMC0wLjA4LTAuMDYtMC4xNC0wLjE0LTAuMTRIMS4zN0MwLjYxLTAuMDEsMCwwLjYsMCwxLjM2djE3LjI4DQoJCWMwLDAuNzYsMC42MSwxLjM3LDEuMzcsMS4zN2gxMS4xN2MwLjc2LDAsMS4zNy0wLjYxLDEuMzctMS4zN0MxMy45MSwxOC41NywxMy44NSwxOC41MSwxMy43OCwxOC41MXogTTYuNCwxOC4wMWgtNA0KCQljLTAuMjgsMC0wLjUtMC4yMi0wLjUtMC41czAuMjItMC41LDAuNS0wLjVoNGMwLjI4LDAsMC41LDAuMjIsMC41LDAuNVM2LjY4LDE4LjAxLDYuNCwxOC4wMXogTTYuOSwxNC41YzAsMC4yOC0wLjIyLDAuNS0wLjUsMC41DQoJCWgtNGMtMC4yOCwwLTAuNS0wLjIyLTAuNS0wLjV2MGMwLTAuMjgsMC4yMi0wLjUsMC41LTAuNWg0QzYuNjgsMTQsNi45LDE0LjIzLDYuOSwxNC41TDYuOSwxNC41eiBNNi40LDEyaC00DQoJCWMtMC4yOCwwLTAuNS0wLjIyLTAuNS0wLjVTMi4xMiwxMSwyLjQsMTFoNGMwLjI4LDAsMC41LDAuMjIsMC41LDAuNVM2LjY4LDEyLDYuNCwxMnogTTcuOTEsNy42QzcuOTEsOC4zNyw3LjI4LDksNi41LDlIMy4zDQoJCUMyLjUzLDksMS45LDguMzcsMS45LDcuNlY0LjRjMC0wLjc4LDAuNjMtMS40LDEuNC0xLjRoMy4yYzAuNzgsMCwxLjQsMC42MywxLjQsMS40VjcuNnoiLz4NCjwvZz4NCjwvc3ZnPg0K';
	/**
	 * Post Type: Case.
	 */

	$labels = [
		"name" => __( "Cases", "astha" ),
		"singular_name" => __( "Case", "astha" ),
		"menu_name" => __( "Case", "astha" ),
		"all_items" => __( "All Cases", "astha" ),
		"add_new" => __( "Add new", "astha" ),
		"add_new_item" => __( "Add new Case", "astha" ),
		"edit_item" => __( "Edit Case", "astha" ),
		"new_item" => __( "New Case", "astha" ),
		"view_item" => __( "View Case", "astha" ),
		"view_items" => __( "View Cases", "astha" ),
		"search_items" => __( "Search Cases", "astha" ),
		"not_found" => __( "No Case found", "astha" ),
		"not_found_in_trash" => __( "No Case found in trash", "astha" ),
		"parent" => __( "Parent Case:", "astha" ),
		"featured_image" => __( "Featured image for this Case", "astha" ),
		"set_featured_image" => __( "Set featured image for this Case", "astha" ),
		"remove_featured_image" => __( "Remove featured image for this Case", "astha" ),
		"use_featured_image" => __( "Use as featured image for this Case", "astha" ),
		"archives" => __( "Case archives", "astha" ),
		"insert_into_item" => __( "Insert into Case", "astha" ),
		"uploaded_to_this_item" => __( "Upload to this Case", "astha" ),
		"filter_items_list" => __( "Filter Case list", "astha" ),
		"items_list_navigation" => __( "Case list navigation", "astha" ),
		"items_list" => __( "Cases list", "astha" ),
		"attributes" => __( "Cases attributes", "astha" ),
		"name_admin_bar" => __( "Case", "astha" ),
		"item_published" => __( "Case published", "astha" ),
		"item_published_privately" => __( "Case published privately.", "astha" ),
		"item_reverted_to_draft" => __( "Case reverted to draft.", "astha" ),
		"item_scheduled" => __( "Case scheduled", "astha" ),
		"item_updated" => __( "Case updated.", "astha" ),
		"parent_item_colon" => __( "Parent Case:", "astha" ),
	];

	$args = [
		"label" => __( "Case", "astha" ),
		"labels" => $labels,
		"description" => __( "Use this custom post type to tell the world about your cases.", "astha" ),
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "case", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => $icon,//"dashicons-images-alt",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
	];

	register_post_type( "astha_case", $args );
}

add_action( 'init', 'astha_register_astha_case_post_type' );

/**
 * Add Custom Meta Boxes for Department Post Type
 *  
 *
 * @link https://github.com/CMB2/CMB2/wiki/Basic-Usage
 *
 * @package Astha-core
 * @since 1.0.0.2
 */
add_action( 'cmb2_admin_init', 'astha_core_departments_cmb2' );

if( !function_exists( 'astha_core_departments_cmb2' ) ){
    function astha_core_departments_cmb2(){
        
        /**
         * Department Information
         */
        $cmb = new_cmb2_box( array(
                'id'            => 'astha_core_department_info',
                'title'         => __( 'Department Information', 'astha' ),
                'object_types'  => array( 'astha_department' ), // Post type
                'context'       => 'normal',
                'priority'      => 'high',
                'show_names'    => true, // Show field names on the left
                'closed'     => true, // Keep the metabox closed by default
        ) );
        
        $cmb->add_field( array(
                    'name'       => __( 'Sub Heading', 'astha' ),
                    'desc'       => __( 'Type sub heading for this department', 'astha' ),
                    'id'         => 'sub_heading',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                    
            ) );
        
        $department_faq = $cmb->add_field( array(
                'name'        => __( 'Add FAQs', 'astha' ),
		'id'          => 'department_faq_group',
		'type'        => 'group',
		'options'     => array(
			'group_title'    => esc_html__( 'FAQ {#}', 'astha' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Add Another FAQ', 'astha' ),
			'remove_button'  => esc_html__( 'Remove FAQ', 'astha' ),
			'sortable'       => true,
		),
	) );
        
        $cmb->add_group_field( $department_faq, array(
		'name'       => esc_html__( 'FAQ Title', 'astha' ),
		'id'         => 'title',
		'type'       => 'text',
	) );

	$cmb->add_group_field( $department_faq, array(
		'name'        => esc_html__( 'FAQ Answer', 'astha' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );
            
    }
}

/**
 * Added Custom Meta Boxes for astha_doctor Post Type
 *  
 *
 * @link https://github.com/CMB2/CMB2/wiki/Basic-Usage
 *
 * @package Astha-core
 * @since 1.0.0.2
 */
add_action( 'cmb2_admin_init', 'astha_core_doctors_cmb2' );

if( !function_exists( 'astha_core_doctors_cmb2' ) ){
    function astha_core_doctors_cmb2(){
        
        /**
         * Doctor Information
         */
        $cmb = new_cmb2_box( array(
                'id'            => 'astha_core_doctor_info',
                'title'         => __( 'Doctor Information', 'astha' ),
                'object_types'  => array( 'astha_doctor' ), // Post type
                'context'       => 'normal',
                'priority'      => 'high',
                'show_names'    => true, // Show field names on the left
                'closed'     => false, // Keep the metabox closed by default
        ) );
        
        $elementor_templates = astha_core_elementor_template_choises();
        $cmb->add_field( array(
                'name'       => __( 'Bottom Part Template', 'astha' ),
                'desc'       => __( 'Elementor is required. Select Footer part from Elementor Template. If not created, Create first.', 'astha' ),
                'id'         => 'doctor_bottom_template',
                'type'       => 'select',
                'default'    => '',
                'sanitization_cb' => 'sanitize_text_field',
                'options'    => $elementor_templates,

        ) );
        
        $cmb->add_field( array(
                    'name'       => __( 'Sub Heading', 'astha' ),
                    'desc'       => __( 'Type sub heading for this doctor', 'astha' ),
                    'id'         => 'sub_heading',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
            ) );
        
        $cmb->add_field( array(
                    'name'       => __( 'Doctor Details', 'astha' ),
                    'id'         => 'doctor_details',
                    'type'       => 'textarea_small',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field', 
            ) );
        
        $cmb->add_field( array(
                    'name'       => __( 'Appointment Button Text', 'astha' ),
                    'id'         => 'doctor_appoint_text',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                
                    
            ) );
        $cmb->add_field( array(
                    'name'       => __( 'Appointment Link', 'astha' ),
                    'id'         => 'doctor_appoint_link',
                    'type'       => 'text_url',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                
                    
            ) );
        
        $cmb->add_field( array(
                    'name'       => __( 'Phone Number', 'astha' ),
                    'id'         => 'doctor_phone',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                
                    
            ) );
        
        $cmb->add_field( array(
                    'name'       => __( 'Email', 'astha' ),
                    'id'         => 'doctor_email',
                    'type'       => 'text_email',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_email',
                
                    
            ) );
        $cmb->add_field( array(
                    'name'       => __( 'Address', 'astha' ),
                    'id'         => 'doctor_address',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                
                    
            ) );
        
        $social_links = $cmb->add_field( array(
                'name'        => __( 'Social Links', 'astha' ),
		'id'          => 'doctor_social_profile',
		'type'        => 'group',
		'options'     => array(
			'group_title'    => esc_html__( 'Link {#}', 'astha' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Add Another', 'astha' ),
			'remove_button'  => esc_html__( 'Remove', 'astha' ),
			'sortable'       => true,
		),
	) );
        
        $cmb->add_group_field( $social_links, array(
		'name'       => __( 'Select one', 'astha' ),
		'id'         => 'social_icon',
		'type'       => 'select',
                'show_option_none' => true,
                'default'          => 'la-facebook-f',
                'options'          => array(
                        'fa-facebook-f'     => __( 'Facebook', 'astha' ),
                        'fa-twitter'        => __( 'Twitter', 'astha' ),
                        'fa-linkedin-in'    => __( 'LinkenIn', 'astha' ),
                        'fa-pinterest-p'    => __( 'Pinterest', 'astha' ),
                ),  
	) );

	$cmb->add_group_field( $social_links, array(
		'name'        => __( 'Profile Link', 'astha' ),
		'id'          => 'profile_link',
                'desc'        => __( 'Paste your social link here', 'astha' ),
		'type'        => 'text_url',
	) );
                
        /**
         * Doctor Skills
         */
        $cmb2 = new_cmb2_box( array(
                'id'            => 'astha_core_doctor_skill',
                'title'         => __( 'Doctor Skills', 'astha' ),
                'object_types'  => array( 'astha_doctor' ), // Post type
                'context'       => 'normal',
                'priority'      => 'high',
                'show_names'    => true, // Show field names on the left
                'closed'     => true, // Keep the metabox closed by default
        ) );
        
        $cmb2->add_field( array(
                    'name'       => __( 'Skill Sub Heading', 'astha' ),
                    'id'         => 'skill_sub_heading',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                
                    
            ) );
        
        $cmb2->add_field( array(
                    'name'       => __( 'Skill Heading', 'astha' ),
                    'id'         => 'skill_heading',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
                
                    
            ) );
        
        $cmb2_skills = $cmb2->add_field( array(
                'name'        => __( 'Doctor Skills', 'astha' ),
		'id'          => 'doctor_skills',
		'type'        => 'group',
		'options'     => array(
			'group_title'    => esc_html__( 'Skill {#}', 'astha' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Add Another', 'astha' ),
			'remove_button'  => esc_html__( 'Remove', 'astha' ),
			'sortable'       => true,
		),
	) );
        
        $cmb2->add_group_field( $cmb2_skills, array(
		'name'        => __( 'Skill Name', 'astha' ),
		'id'          => 'skill_name',
		'type'        => 'text',
                'sanitization_cb' => 'sanitize_text_field',
	) );
        
        $cmb2->add_group_field( $cmb2_skills, array(
		'name'        => __( 'Skill Level', 'astha' ),
		'id'          => 'skill_level',
		'desc'        => __( 'Type skill level (in percent 0 to 100)', 'astha' ),
		'type'        => 'text',
                'sanitization_cb' => 'sanitize_text_field',
	) );
        
        $cmb2->add_group_field( $cmb2_skills, array(
		'name'        => __( 'Skill Color', 'astha' ),
		'id'          => 'skill_color',
		'desc'        => __( 'Select skill color to highlight', 'astha' ),
		'type'        => 'colorpicker',
                'options' => array(
                    'alpha' => true, // Make this a rgba color picker.
                ),
	) );
            
    }
}

/**
 * Added Custom Meta Boxes for astha_case Post Type
 *  
 *
 * @link https://github.com/CMB2/CMB2/wiki/Basic-Usage
 *
 * @package Astha-core
 * @since 1.0.0.2
 */
add_action( 'cmb2_admin_init', 'astha_core_case_cmb2' );

if( !function_exists( 'astha_core_case_cmb2' ) ){
    function astha_core_case_cmb2(){
        /**
         * Doctor Skills
         */
        $cmb2 = new_cmb2_box( array(
                'id'            => 'astha_core_case_info',
                'title'         => __( 'Case Information', 'astha' ),
                'object_types'  => array( 'astha_case' ), // Post type
                'context'       => 'normal',
                'priority'      => 'high',
                'show_names'    => true, // Show field names on the left
                'closed'     => true, // Keep the metabox closed by default
        ) );
        
        $elementor_templates = astha_core_elementor_template_choises();
        $cmb2->add_field( array(
                'name'       => __( 'Bottom Part Template', 'astha' ),
                'desc'       => __( 'Elementor is required. Select Footer part from Elementor Template. If not created, Create first.', 'astha' ),
                'id'         => 'case_bottom_template',
                'type'       => 'select',
                'default'    => '',
                'sanitization_cb' => 'sanitize_text_field',
                'options'    => $elementor_templates,

        ) );
        
        $cmb2->add_field( array(
                    'name'       => __( 'Case Name', 'astha' ),
                    'id'         => 'case_name',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
        ) );
        
        $cmb2->add_field( array(
                    'name'       => __( 'Patient\'s Name', 'astha' ),
                    'id'         => 'patient_name',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
        ) );
        
        $cmb2->add_field( array(
                    'name'       => __( 'Date', 'astha' ),
                    'id'         => 'admission_date',
                    'type'       => 'text_date',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
        ) );
        
        $cmb2->add_field( array(
                    'name'       => __( 'Address', 'astha' ),
                    'id'         => 'patient_address',
                    'type'       => 'text',
                    'default'    => '',
                    'sanitization_cb' => 'sanitize_text_field',
        ) );
        
        $cmb2->add_field( array(
                    'name'       => __( 'Case Details', 'astha' ),
                    'id'         => 'case_details',
                    'type'       => 'wysiwyg',
                    'default'    => '',
                    'sanitization_cb' => 'wp_kses_post',
        ) );
    }
}