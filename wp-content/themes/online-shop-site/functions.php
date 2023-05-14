<?php

add_theme_support( 'post-thumbnails' );

add_theme_support( 'title-tag' );


/**
 * Function takes care of handling assets with enqueue
 * @return void
 */
function shop_assets() {
	wp_enqueue_style(
		'online-shop',
		get_stylesheet_directory_uri() . '/assets/css/master.css', array(),
		filemtime( get_template_directory() . '/assets/css/master.css' ) );
}

add_action( 'wp_enqueue_scripts', 'shop_assets' );


/**
 *   Function takes care of custom menu
 *
 * @return void
 */
function shop_register_nav_menu() {
	register_nav_menus( array(
		'primary_menu' => __( 'Primary Menu', 'shop' ),
		'footer_menu'  => __( 'Footer Menu', 'shop' ),
	) );
}

add_action( 'after_setup_theme', 'shop_register_nav_menu', 0 );
