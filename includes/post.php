<?php
function astha_register_department_post_type() {

        $icon = ASTHA_CORE_BASE_URL . 'assets/icons/department.svg';
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
        $icon = ASTHA_CORE_BASE_URL . 'assets/icons/team.svg';
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
        $icon = ASTHA_CORE_BASE_URL . 'assets/icons/case.svg';
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