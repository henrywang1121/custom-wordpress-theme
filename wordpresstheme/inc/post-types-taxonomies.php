<?php
/**
 * custom Post Type and Taxonomy Definitions.
 *
 * @package Custom_Theme
 */

function cptui_register_my_cpts() {

	/**
	 * Post Type: Vehicles.
	 */

	$labels = [
		"name" => __( "Vehicles", "custom" ),
		"singular_name" => __( "Vehicle", "custom" ),
		"menu_name" => __( "Inventory", "custom" ),
		"all_items" => __( "All Vehicles", "custom" ),
		"add_new" => __( "Add new", "custom" ),
		"add_new_item" => __( "Add new Vehicle", "custom" ),
		"edit_item" => __( "Edit Vehicle", "custom" ),
		"new_item" => __( "New Vehicle", "custom" ),
		"view_item" => __( "View Vehicle", "custom" ),
		"view_items" => __( "View Vehicles", "custom" ),
		"search_items" => __( "Search Vehicles", "custom" ),
		"not_found" => __( "No Vehicles found", "custom" ),
		"not_found_in_trash" => __( "No Vehicles found in trash", "custom" ),
		"parent" => __( "Parent Vehicle:", "custom" ),
		"featured_image" => __( "Featured image for this Vehicle", "custom" ),
		"set_featured_image" => __( "Set featured image for this Vehicle", "custom" ),
		"remove_featured_image" => __( "Remove featured image for this Vehicle", "custom" ),
		"use_featured_image" => __( "Use as featured image for this Vehicle", "custom" ),
		"archives" => __( "Vehicle archives", "custom" ),
		"insert_into_item" => __( "Insert into Vehicle", "custom" ),
		"uploaded_to_this_item" => __( "Upload to this Vehicle", "custom" ),
		"filter_items_list" => __( "Filter Vehicles list", "custom" ),
		"items_list_navigation" => __( "Vehicles list navigation", "custom" ),
		"items_list" => __( "Vehicles list", "custom" ),
		"attributes" => __( "Vehicles attributes", "custom" ),
		"name_admin_bar" => __( "Vehicle", "custom" ),
		"item_published" => __( "Vehicle published", "custom" ),
		"item_published_privately" => __( "Vehicle published privately.", "custom" ),
		"item_reverted_to_draft" => __( "Vehicle reverted to draft.", "custom" ),
		"item_scheduled" => __( "Vehicle scheduled", "custom" ),
		"item_updated" => __( "Vehicle updated.", "custom" ),
		"parent_item_colon" => __( "Parent Vehicle:", "custom" ),
	];

	$args = [
		"label" => __( "Vehicles", "custom" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "inventory",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "vehicle", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-car",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vehicle", $args );

	/**
	 * Post Type: Service Specials.
	 */

	$labels = [
		"name" => __( "Service Specials", "custom" ),
		"singular_name" => __( "Service Special", "custom" ),
		"menu_name" => __( "Service Specials", "custom" ),
		"all_items" => __( "All Service Specials", "custom" ),
		"add_new" => __( "Add new", "custom" ),
		"add_new_item" => __( "Add new Service Special", "custom" ),
		"edit_item" => __( "Edit Service Special", "custom" ),
		"new_item" => __( "New Service Special", "custom" ),
		"view_item" => __( "View Service Special", "custom" ),
		"view_items" => __( "View Service Specials", "custom" ),
		"search_items" => __( "Search Service Specials", "custom" ),
		"not_found" => __( "No Service Specials found", "custom" ),
		"not_found_in_trash" => __( "No Service Specials found in trash", "custom" ),
		"parent" => __( "Parent Service Special:", "custom" ),
		"featured_image" => __( "Featured image for this Service Special", "custom" ),
		"set_featured_image" => __( "Set featured image for this Service Special", "custom" ),
		"remove_featured_image" => __( "Remove featured image for this Service Special", "custom" ),
		"use_featured_image" => __( "Use as featured image for this Service Special", "custom" ),
		"archives" => __( "Service Special archives", "custom" ),
		"insert_into_item" => __( "Insert into Service Special", "custom" ),
		"uploaded_to_this_item" => __( "Upload to this Service Special", "custom" ),
		"filter_items_list" => __( "Filter Service Specials list", "custom" ),
		"items_list_navigation" => __( "Service Specials list navigation", "custom" ),
		"items_list" => __( "Service Specials list", "custom" ),
		"attributes" => __( "Service Specials attributes", "custom" ),
		"name_admin_bar" => __( "Service Special", "custom" ),
		"item_published" => __( "Service Special published", "custom" ),
		"item_published_privately" => __( "Service Special published privately.", "custom" ),
		"item_reverted_to_draft" => __( "Service Special reverted to draft.", "custom" ),
		"item_scheduled" => __( "Service Special scheduled", "custom" ),
		"item_updated" => __( "Service Special updated.", "custom" ),
		"parent_item_colon" => __( "Parent Service Special:", "custom" ),
	];

	$args = [
		"label" => __( "Service Specials", "custom" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "service-specials",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "service-specials", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-tools",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "service_special", $args );

	/**
	 * Post Type: Special Offers.
	 */

	$labels = [
		"name" => __( "Special Offers", "custom" ),
		"singular_name" => __( "Special Offer", "custom" ),
		"menu_name" => __( "Special Offers", "custom" ),
		"all_items" => __( "All Special Offers", "custom" ),
		"add_new" => __( "Add new", "custom" ),
		"add_new_item" => __( "Add new Special Offer", "custom" ),
		"edit_item" => __( "Edit Special Offer", "custom" ),
		"new_item" => __( "New Special Offer", "custom" ),
		"view_item" => __( "View Special Offer", "custom" ),
		"view_items" => __( "View Special Offers", "custom" ),
		"search_items" => __( "Search Special Offers", "custom" ),
		"not_found" => __( "No Special Offers found", "custom" ),
		"not_found_in_trash" => __( "No Special Offers found in trash", "custom" ),
		"parent" => __( "Parent Special Offer:", "custom" ),
		"featured_image" => __( "Featured image for this Special Offer", "custom" ),
		"set_featured_image" => __( "Set featured image for this Special Offer", "custom" ),
		"remove_featured_image" => __( "Remove featured image for this Special Offer", "custom" ),
		"use_featured_image" => __( "Use as featured image for this Special Offer", "custom" ),
		"archives" => __( "Special Offer archives", "custom" ),
		"insert_into_item" => __( "Insert into Special Offer", "custom" ),
		"uploaded_to_this_item" => __( "Upload to this Special Offer", "custom" ),
		"filter_items_list" => __( "Filter Special Offers list", "custom" ),
		"items_list_navigation" => __( "Special Offers list navigation", "custom" ),
		"items_list" => __( "Special Offers list", "custom" ),
		"attributes" => __( "Special Offers attributes", "custom" ),
		"name_admin_bar" => __( "Special Offer", "custom" ),
		"item_published" => __( "Special Offer published", "custom" ),
		"item_published_privately" => __( "Special Offer published privately.", "custom" ),
		"item_reverted_to_draft" => __( "Special Offer reverted to draft.", "custom" ),
		"item_scheduled" => __( "Special Offer scheduled", "custom" ),
		"item_updated" => __( "Special Offer updated.", "custom" ),
		"parent_item_colon" => __( "Parent Special Offer:", "custom" ),
	];

	$args = [
		"label" => __( "Special Offers", "custom" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "special-offers",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "special-offers", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-tag",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "special_offer", $args );

	/**
	 * Post Type: Videos.
	 */

	$labels = [
		"name" => __( "Videos", "custom" ),
		"singular_name" => __( "Video", "custom" ),
		"menu_name" => __( "Videos", "custom" ),
		"all_items" => __( "All Videos", "custom" ),
		"add_new" => __( "Add new", "custom" ),
		"add_new_item" => __( "Add new Video", "custom" ),
		"edit_item" => __( "Edit Video", "custom" ),
		"new_item" => __( "New Video", "custom" ),
		"view_item" => __( "View Video", "custom" ),
		"view_items" => __( "View Videos", "custom" ),
		"search_items" => __( "Search Videos", "custom" ),
		"not_found" => __( "No Videos found", "custom" ),
		"not_found_in_trash" => __( "No Videos found in trash", "custom" ),
		"parent" => __( "Parent Video:", "custom" ),
		"featured_image" => __( "Featured image for this Video", "custom" ),
		"set_featured_image" => __( "Set featured image for this Video", "custom" ),
		"remove_featured_image" => __( "Remove featured image for this Video", "custom" ),
		"use_featured_image" => __( "Use as featured image for this Video", "custom" ),
		"archives" => __( "Video archives", "custom" ),
		"insert_into_item" => __( "Insert into Video", "custom" ),
		"uploaded_to_this_item" => __( "Upload to this Video", "custom" ),
		"filter_items_list" => __( "Filter Videos list", "custom" ),
		"items_list_navigation" => __( "Videos list navigation", "custom" ),
		"items_list" => __( "Videos list", "custom" ),
		"attributes" => __( "Videos attributes", "custom" ),
		"name_admin_bar" => __( "Video", "custom" ),
		"item_published" => __( "Video published", "custom" ),
		"item_published_privately" => __( "Video published privately.", "custom" ),
		"item_reverted_to_draft" => __( "Video reverted to draft.", "custom" ),
		"item_scheduled" => __( "Video scheduled", "custom" ),
		"item_updated" => __( "Video updated.", "custom" ),
		"parent_item_colon" => __( "Parent Video:", "custom" ),
	];

	$args = [
		"label" => __( "Videos", "custom" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "videos",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "videos", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-video-alt3",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "video", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Inventory Categories.
	 */

	$labels = [
		"name" => __( "Inventory Categories", "custom" ),
		"singular_name" => __( "Inventory Category", "custom" ),
		"menu_name" => __( "Inventory Categories", "custom" ),
		"all_items" => __( "All Inventory Categories", "custom" ),
		"edit_item" => __( "Edit Inventory Category", "custom" ),
		"view_item" => __( "View Inventory Category", "custom" ),
		"update_item" => __( "Update Inventory Category name", "custom" ),
		"add_new_item" => __( "Add new Inventory Category", "custom" ),
		"new_item_name" => __( "New Inventory Category name", "custom" ),
		"parent_item" => __( "Parent Inventory Category", "custom" ),
		"parent_item_colon" => __( "Parent Inventory Category:", "custom" ),
		"search_items" => __( "Search Inventory Categories", "custom" ),
		"popular_items" => __( "Popular Inventory Categories", "custom" ),
		"separate_items_with_commas" => __( "Separate Inventory Categories with commas", "custom" ),
		"add_or_remove_items" => __( "Add or remove Inventory Categories", "custom" ),
		"choose_from_most_used" => __( "Choose from the most used Inventory Categories", "custom" ),
		"not_found" => __( "No Inventory Categories found", "custom" ),
		"no_terms" => __( "No Inventory Categories", "custom" ),
		"items_list_navigation" => __( "Inventory Categories list navigation", "custom" ),
		"items_list" => __( "Inventory Categories list", "custom" ),
		"back_to_items" => __( "Back to Inventory Categories", "custom" ),
	];


	$args = [
		"label" => __( "Inventory Categories", "custom" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'inventory', 'with_front' => false,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "inventory",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "inventory", [ "vehicle" ], $args );

	/**
	 * Taxonomy: Service Special Categories.
	 */

	$labels = [
		"name" => __( "Service Special Categories", "custom" ),
		"singular_name" => __( "Service Special Category", "custom" ),
		"menu_name" => __( "Service Special Categories", "custom" ),
		"all_items" => __( "All Service Special Categories", "custom" ),
		"edit_item" => __( "Edit Service Special Category", "custom" ),
		"view_item" => __( "View Service Special Category", "custom" ),
		"update_item" => __( "Update Service Special Category name", "custom" ),
		"add_new_item" => __( "Add new Service Special Category", "custom" ),
		"new_item_name" => __( "New Service Special Category name", "custom" ),
		"parent_item" => __( "Parent Service Special Category", "custom" ),
		"parent_item_colon" => __( "Parent Service Special Category:", "custom" ),
		"search_items" => __( "Search Service Special Categories", "custom" ),
		"popular_items" => __( "Popular Service Special Categories", "custom" ),
		"separate_items_with_commas" => __( "Separate Service Special Categories with commas", "custom" ),
		"add_or_remove_items" => __( "Add or remove Service Special Categories", "custom" ),
		"choose_from_most_used" => __( "Choose from the most used Service Special Categories", "custom" ),
		"not_found" => __( "No Service Special Categories found", "custom" ),
		"no_terms" => __( "No Service Special Categories", "custom" ),
		"items_list_navigation" => __( "Service Special Categories list navigation", "custom" ),
		"items_list" => __( "Service Special Categories list", "custom" ),
		"back_to_items" => __( "Back to Service Special Categories", "custom" ),
	];


	$args = [
		"label" => __( "Service Special Categories", "custom" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'service_special_category', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "service_special_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "service_special_category", [ "service_special" ], $args );

	/**
	 * Taxonomy: Special Offer Categories.
	 */

	$labels = [
		"name" => __( "Special Offer Categories", "custom" ),
		"singular_name" => __( "Special Offer Category", "custom" ),
		"menu_name" => __( "Special Offer Categories", "custom" ),
		"all_items" => __( "All Special Offer Categories", "custom" ),
		"edit_item" => __( "Edit Special Offer Category", "custom" ),
		"view_item" => __( "View Special Offer Category", "custom" ),
		"update_item" => __( "Update Special Offer Category name", "custom" ),
		"add_new_item" => __( "Add new Special Offer Category", "custom" ),
		"new_item_name" => __( "New Special Offer Category name", "custom" ),
		"parent_item" => __( "Parent Special Offer Category", "custom" ),
		"parent_item_colon" => __( "Parent Special Offer Category:", "custom" ),
		"search_items" => __( "Search Special Offer Categories", "custom" ),
		"popular_items" => __( "Popular Special Offer Categories", "custom" ),
		"separate_items_with_commas" => __( "Separate Special Offer Categories with commas", "custom" ),
		"add_or_remove_items" => __( "Add or remove Special Offer Categories", "custom" ),
		"choose_from_most_used" => __( "Choose from the most used Special Offer Categories", "custom" ),
		"not_found" => __( "No Special Offer Categories found", "custom" ),
		"no_terms" => __( "No Special Offer Categories", "custom" ),
		"items_list_navigation" => __( "Special Offer Categories list navigation", "custom" ),
		"items_list" => __( "Special Offer Categories list", "custom" ),
		"back_to_items" => __( "Back to Special Offer Categories", "custom" ),
	];


	$args = [
		"label" => __( "Special Offer Categories", "custom" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'special_offer_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "special_offer_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "special_offer_category", [ "special_offer" ], $args );

	/**
	 * Taxonomy: Video Categories.
	 */

	$labels = [
		"name" => __( "Video Categories", "custom" ),
		"singular_name" => __( "Video Category", "custom" ),
		"menu_name" => __( "Video Categories", "custom" ),
		"all_items" => __( "All Video Categories", "custom" ),
		"edit_item" => __( "Edit Video Category", "custom" ),
		"view_item" => __( "View Video Category", "custom" ),
		"update_item" => __( "Update Video Category name", "custom" ),
		"add_new_item" => __( "Add new Video Category", "custom" ),
		"new_item_name" => __( "New Video Category name", "custom" ),
		"parent_item" => __( "Parent Video Category", "custom" ),
		"parent_item_colon" => __( "Parent Video Category:", "custom" ),
		"search_items" => __( "Search Video Categories", "custom" ),
		"popular_items" => __( "Popular Video Categories", "custom" ),
		"separate_items_with_commas" => __( "Separate Video Categories with commas", "custom" ),
		"add_or_remove_items" => __( "Add or remove Video Categories", "custom" ),
		"choose_from_most_used" => __( "Choose from the most used Video Categories", "custom" ),
		"not_found" => __( "No Video Categories found", "custom" ),
		"no_terms" => __( "No Video Categories", "custom" ),
		"items_list_navigation" => __( "Video Categories list navigation", "custom" ),
		"items_list" => __( "Video Categories list", "custom" ),
		"back_to_items" => __( "Back to Video Categories", "custom" ),
	];


	$args = [
		"label" => __( "Video Categories", "custom" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video_category', 'with_front' => false,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "video_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "video_category", [ "video" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


