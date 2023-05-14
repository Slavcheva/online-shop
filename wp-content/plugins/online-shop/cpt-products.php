<?php
/**
 * Register a custom post type called "product".
 *
 * @see get_post_type_labels() for label keys.
 */
function shop_products_cpt() {
	$labels = array(
		'name'           => _x( 'Products', 'Post type general name', 'shop' ),
		'singular_name'  => _x( 'Product', 'Post type singular name', 'shop' ),
		'menu_name'      => _x( 'Products', 'Admin Menu text', 'shop' ),
		'name_admin_bar' => _x( 'Product', 'Add New on Toolbar', 'shop' ),
		'add_new'        => __( 'Add New', 'shop' ),
		'add_new_item'   => __( 'Add New Product', 'shop' ),
		'new_item'       => __( 'New Product', 'shop' ),
		'edit_item'      => __( 'Edit Product', 'shop' ),
		'view_item'      => __( 'View Product', 'shop' ),
		'all_items'      => __( 'All Products', 'shop' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'product' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
		'show_in_rest'       => true
	);

	register_post_type( 'product', $args );

	flush_rewrite_rules();
}

add_action( 'init', 'shop_products_cpt' );


/**
 * Register a 'code' taxonomy for post type 'product', with a rewrite to match product CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function shop_code_taxonomy() {
	$labels = array(
		'name'              => _x( 'Codes', 'taxonomy general name', 'shop' ),
		'singular_name'     => _x( 'Code', 'taxonomy singular name', 'shop' ),
		'search_items'      => __( 'Search Codes', 'shop' ),
		'all_items'         => __( 'All Codes', 'shop' ),
		'parent_item'       => __( 'Parent Code', 'shop' ),
		'parent_item_colon' => __( 'Parent Code:', 'shop' ),
		'edit_item'         => __( 'Edit Code', 'shop' ),
		'update_item'       => __( 'Update Code', 'shop' ),
		'add_new_item'      => __( 'Add New Code', 'shop' ),
		'new_item_name'     => __( 'New Code Name', 'shop' ),
		'menu_name'         => __( 'Code', 'shop' ),
	);
	$args   = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);

	register_taxonomy( 'code', 'product', $args );
}

add_action( 'init', 'shop_code_taxonomy' );



/**
 * Register a 'price' taxonomy for post type 'product', with a rewrite to match product CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function shop_price_taxonomy() {
	$labels = array(
		'name'              => _x( 'Prices', 'taxonomy general name', 'shop' ),
		'singular_name'     => _x( 'Price', 'taxonomy singular name', 'shop' ),
		'search_items'      => __( 'Search Prices', 'shop' ),
		'all_items'         => __( 'All Prices', 'shop' ),
		'parent_item'       => __( 'Parent Price', 'shop' ),
		'parent_item_colon' => __( 'Parent Price:', 'shop' ),
		'edit_item'         => __( 'Edit Price', 'shop' ),
		'update_item'       => __( 'Update Price', 'shop' ),
		'add_new_item'      => __( 'Add New Price', 'shop' ),
		'new_item_name'     => __( 'New Price Name', 'shop' ),
		'menu_name'         => __( 'Price', 'shop' ),
	);
	$args   = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);

	register_taxonomy( 'price', 'product', $args );
}

add_action( 'init', 'shop_price_taxonomy' );


/**
 * Register a 'appliance' taxonomy for post type 'product', with a rewrite to match product CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function shop_appliance_taxonomy() {
	$labels = array(
		'name'              => _x( 'Appliances', 'taxonomy general name', 'shop' ),
		'singular_name'     => _x( 'Appliance', 'taxonomy singular name', 'shop' ),
		'search_items'      => __( 'Search Appliances', 'shop' ),
		'all_items'         => __( 'All Appliances', 'shop' ),
		'parent_item'       => __( 'Parent Appliance', 'shop' ),
		'parent_item_colon' => __( 'Parent Appliance:', 'shop' ),
		'edit_item'         => __( 'Edit Appliance', 'shop' ),
		'update_item'       => __( 'Update Appliance', 'shop' ),
		'add_new_item'      => __( 'Add New Appliance', 'shop' ),
		'new_item_name'     => __( 'New Appliance Name', 'shop' ),
		'menu_name'         => __( 'Appliance', 'shop' ),
	);
	$args   = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);

	register_taxonomy( 'appliance', 'product', $args );
}

add_action( 'init', 'shop_appliance_taxonomy' );

/**
 * Register a 'brand' taxonomy for post type 'product', with a rewrite to match product CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function shop_brand_taxonomy() {
	$labels = array(
		'name'              => _x( 'Brands', 'taxonomy general name', 'shop' ),
		'singular_name'     => _x( 'Brand', 'taxonomy singular name', 'shop' ),
		'search_items'      => __( 'Search Brands', 'shop' ),
		'all_items'         => __( 'All Brands', 'shop' ),
		'parent_item'       => __( 'Parent Brand', 'shop' ),
		'parent_item_colon' => __( 'Parent Brand:', 'shop' ),
		'edit_item'         => __( 'Edit Brand', 'shop' ),
		'update_item'       => __( 'Update Brand', 'shop' ),
		'add_new_item'      => __( 'Add New Brand', 'shop' ),
		'new_item_name'     => __( 'New Brand Name', 'shop' ),
		'menu_name'         => __( 'Brand', 'shop' ),
	);
	$args   = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);

	register_taxonomy( 'brand', 'product', $args );
}

add_action( 'init', 'shop_brand_taxonomy' );

/**
 * Register a 'model' taxonomy for post type 'product', with a rewrite to match product CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function shop_model_taxonomy() {
	$labels = array(
		'name'              => _x( 'Models', 'taxonomy general name', 'shop' ),
		'singular_name'     => _x( 'Model', 'taxonomy singular name', 'shop' ),
		'search_items'      => __( 'Search Models', 'shop' ),
		'all_items'         => __( 'All Models', 'shop' ),
		'parent_item'       => __( 'Parent Model', 'shop' ),
		'parent_item_colon' => __( 'Parent Model:', 'shop' ),
		'edit_item'         => __( 'Edit Model', 'shop' ),
		'update_item'       => __( 'Update Model', 'shop' ),
		'add_new_item'      => __( 'Add New Model', 'shop' ),
		'new_item_name'     => __( 'New Model Name', 'shop' ),
		'menu_name'         => __( 'Model', 'shop' ),
	);
	$args   = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);

	register_taxonomy( 'model', 'product', $args );
}

add_action( 'init', 'shop_model_taxonomy' );
