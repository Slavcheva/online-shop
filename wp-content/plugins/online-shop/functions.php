<?php

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
                            <a class="meta-shockcode" href="#">
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
                                <img src="<?php echo home_url(); ?>/wp-content/themes/online-shop-site/assets/images/washing-machine.jpg"
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