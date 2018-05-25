<?php
/**
 * Add Custom Post Types here
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/**
 *
 * Register Resource Post Type
 */
function custom_post_type_resource() {

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'leasepilot' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'leasepilot' ),
		'menu_name'             => __( 'Resources', 'leasepilot' ),
		'name_admin_bar'        => __( 'Post Type', 'leasepilot' ),
		'archives'              => __( 'Resources Archives', 'leasepilot' ),
		'attributes'            => __( 'Resource Attributes', 'leasepilot' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'leasepilot' ),
		'all_items'             => __( 'All Resources', 'leasepilot' ),
		'add_new_item'          => __( 'Add New Resource', 'leasepilot' ),
		'add_new'               => __( 'Add New', 'leasepilot' ),
		'new_item'              => __( 'New Resource', 'leasepilot' ),
		'edit_item'             => __( 'Edit Resource', 'leasepilot' ),
		'update_item'           => __( 'Update Resource', 'leasepilot' ),
		'view_item'             => __( 'View Resource', 'leasepilot' ),
		'view_items'            => __( 'View Resources', 'leasepilot' ),
		'search_items'          => __( 'Search Resources', 'leasepilot' ),
		'not_found'             => __( 'Not found', 'leasepilot' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'leasepilot' ),
		'featured_image'        => __( 'Featured Image', 'leasepilot' ),
		'set_featured_image'    => __( 'Set featured image', 'leasepilot' ),
		'remove_featured_image' => __( 'Remove featured image', 'leasepilot' ),
		'use_featured_image'    => __( 'Use as featured image', 'leasepilot' ),
		'insert_into_item'      => __( 'Insert into resource', 'leasepilot' ),
		'uploaded_to_this_item' => __( 'Uploaded to this resource', 'leasepilot' ),
		'items_list'            => __( 'Resources list', 'leasepilot' ),
		'items_list_navigation' => __( 'Resources list navigation', 'leasepilot' ),
		'filter_items_list'     => __( 'Filter Resources list', 'leasepilot' ),
	);
	$args   = array(
		'label'               => __( 'Resource', 'leasepilot' ),
		'description'         => __( 'Resource Description', 'leasepilot' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'             => array( 'with_front' => false ), // This needs to be false so that custom Permalinks settings won't effect this permalink.
	);
	register_post_type( 'resources', $args );
}
add_action( 'init', 'custom_post_type_resource', 0 );

/**
 *
 * Register Resource Category Custom Taxonomy
 */
function resource_taxonomy() {
	register_taxonomy(
		'resource-category',
		'resources',
		array(
			'label'             => __( 'Categories' ),
			'hierarchical'      => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'resource', 'with_front' => false ),
		)
	);
}

add_action( 'init', 'resource_taxonomy' );
