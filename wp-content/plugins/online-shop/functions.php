<?php

/**
 * Property Enqueue
 */
function shop_enqueue_scripts() {
	wp_enqueue_script( 'shop-script', plugins_url( 'assets/scripts/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'shop-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'shop_enqueue_scripts' );


/**
 * Display a single post term
 *
 * @param  $product_id
 * @param $taxonomy
 *
 * @return string|void
 */
function shop_display_single_term( $product_id, $taxonomy ) {
	if ( empty( $product_id ) || empty( $taxonomy ) ) {
		return;
	}

	$terms  = get_the_terms( $product_id, $taxonomy );
	$output = '';

	if ( ! empty( $terms ) && is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			$output .= $term->name;
		}
	}


	return $output;
}
function shop_display_single_tag( $product_id) {
	if ( empty( $product_id ) ) {
		return;
	}

	$terms  = get_the_terms( $product_id, 'tag' );
	$output = '';

	if ( ! empty( $terms ) && is_array( $terms ) ) {


		foreach ( $terms as $term ) {
			$output .= $term->name . ',';;
		}
	}


	return $output;
}


/**
 *  This function gives two others product from similar type
 *
 * @param $product_id
 *
 * @return void
 */
function shop_display_others_similar_products( $product_id ) {
	if ( empty( $product_id ) ) {
		return;
	}
	$appliance      = shop_display_single_term( $product_id, 'appliance' );
	$products_args  = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'orderby'        => 'name',
		'posts_per_page' => 2,
		'appliance'      => $appliance,

	);
	$products_query = new WP_Query( $products_args );

	if ( ! empty( $products_query ) ) {
		?>
        <ul class="products-listing">
			<?php foreach ( $products_query->posts as $product ) { ?>

                <li class="product-card">
                    <div class="product-primary">
                        <h2 class="product-title"><a
                                    href=""><?php echo $product->post_title; ?></a>
                        </h2>
                        <div class="product-meta">
                            <a class="meta-shockcode" href="<?php get_permalink(); ?>">
								<?php echo 'Code: ' . shop_display_single_term( $product->ID, 'code' ); ?>
                            </a>
                            <span class="meta-price">
                                <?php echo '$' . shop_display_single_term( $product->ID, 'price' ); ?>
                            </span>
                        </div>
                        <div class="product-details product-details-table">
                            <span>Type: </span>
                            <span><?php echo shop_display_single_term( $product->ID, 'appliance' ); ?></span>

                            <span>Brand: </span>
                            <span><?php echo shop_display_single_term( $product->ID, 'brand' ); ?></span>

                            <span>Model: </span>
                            <span><?php echo shop_display_single_term( $product->ID, 'model' ); ?></span>

                        </div>
                    </div>
                    <div class="product-logo">
                        <div class="product-logo-box">
							<?php if ( has_post_thumbnail() ): ?>
								<?php the_post_thumbnail(); ?>
							<?php else : ?>
                                <img src="<?php echo home_url(); ?>/wp-content/themes/online-shop-site/assets/images/default-img.png"
                                     alt="default image">
							<?php endif; ?>
                        </div>
                    </div>
                </li>

			<?php } ?>
        </ul>
		<?php
	}
}

/**
 * This function update the product post meta for the views count
 *
 * @param [type] $post_id
 *
 * @return void
 */

function shop_update_product_views_count( $post_id = 0 ) {
	if ( empty( $post_id ) ) {
		return;
	}

	$view_count = get_post_meta( $post_id, 'views_count', true );

	if ( ! empty( $view_count ) ) {
		$view_count = $view_count + 1;
	} else {
		$view_count = 1;
	}
	update_post_meta( $post_id, 'views_count', $view_count );

}


/**
 * Functions takes care of the upvote of the product
 *
 * @return void
 */
function shop_product_upvote() {
	$product_id = esc_attr( $_POST['product_id'] );

	$upvote_number = get_post_meta( $product_id, 'upvotes', true );

	if ( empty( $upvote_number ) ) {
		update_post_meta( $product_id, 'upvotes', 1 );
	} else {
		$upvote_number = $upvote_number + 1;
		update_post_meta( $product_id, 'upvotes', $upvote_number );
	}

	wp_die();
}

add_action( 'wp_ajax_nopriv_shop_product_upvote', 'shop_product_upvote' );
add_action( 'wp_ajax_shop_product_upvote', 'shop_product_upvote' );
