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

