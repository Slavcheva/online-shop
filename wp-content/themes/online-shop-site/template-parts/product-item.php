<li class="product-card">
    <div class="product-primary">
        <h2 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="product-meta">
            <a class="meta-shockcode" href="<?php the_permalink(); ?>">Code: <?php echo shop_display_single_term( get_the_ID(), 'code' ); ?></a>
            <span class="meta-price">$<?php echo shop_display_single_term( get_the_ID(), 'price' ); ?></span>
        </div>
        <div class="product-details product-details-table">
            <span>Type</span><span><?php echo shop_display_single_term( get_the_ID(), 'appliance' ); ?></span>
            <span>Brand</span><span><?php echo shop_display_single_term( get_the_ID(), 'brand' ); ?></span>
            <span>Model</span><span><?php echo shop_display_single_term( get_the_ID(), 'model' ); ?></span>
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
