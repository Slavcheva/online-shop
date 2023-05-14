<?php get_header(); ?>

<?php if ( have_posts() ): ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/single-product', 'item' ) ?>

		<?php shop_update_product_views_count( get_the_ID() ); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
