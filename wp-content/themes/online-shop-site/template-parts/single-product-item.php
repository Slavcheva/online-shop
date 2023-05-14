<div class="product-single">
    <main class="product-main">
        <div class="product-card">
            <div class="product-primary">
                <header class="product-header">
                    <h2 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="product-meta">
                        <a class="meta-shockcode"
                           href="<?php the_permalink(); ?>">Code: <?php echo shop_display_single_term( get_the_ID(), 'code' ); ?></a>
                        <span class="meta-price">$<?php echo shop_display_single_term( get_the_ID(), 'price' ); ?></span>
                    </div>
                    <div class="product-details product-details-table">
                        <span>Type</span><span><?php echo shop_display_single_term( get_the_ID(), 'appliance' ); ?></span>
                        <span>Brand</span><span><?php echo shop_display_single_term( get_the_ID(), 'brand' ); ?></span>
                        <span>Model</span><span><?php echo shop_display_single_term( get_the_ID(), 'model' ); ?></span>
                    </div>

                    <div class="product-details product-details-tags">
                        <div class="product-details-label">Tags</div>
                        <span>Laundry</span>
                        <span>Washing</span>
                    </div>
                </header>

                <div class="product-body">
					<?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>
    <aside class="product-secondary">
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
        <a href="#" class="button button-wide">Buy now</a>
    </aside>
</div>

<h2 class="section-heading">Other related products:</h2>
<?php echo shop_display_others_similar_products( get_the_ID() ); ?>

