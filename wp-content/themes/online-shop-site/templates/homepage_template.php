<?php
/**
 * Template Name: Homepage from the theme
 */
?>

<?php get_header(); ?>

<ul class="posts-listing">

	<?php
	$query = new WP_Query( array( 'post_type' => 'product' ) );
	query_posts( $query );

	while ( $query->have_posts() ) : $query->the_post();

		get_template_part( 'template-parts/product', 'item' );

	endwhile;

	wp_reset_query();
	?>
</ul>

<?php get_footer(); ?>
