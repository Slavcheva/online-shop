<?php get_header(); ?>
<h1 class="site-title">Our blog</h1>
<ul class="post-listing">
	<?php if ( have_posts() ): ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/post', 'item' ) ?>

		<?php endwhile; ?>

		<?php posts_nav_link(); ?>

	<?php endif; ?>
</ul>

<?php get_footer(); ?>
