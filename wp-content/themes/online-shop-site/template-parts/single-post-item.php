<li class="product-card">
    <div class="product-primary">
        <h2 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="product-meta">
            <span class="meta-category"><?php the_category(); ?></span>
            <span class="meta-content"><?php the_content(); ?></span>
            <span class="meta-author">Author: <?php the_author(); ?></span>
            <span class="product-date">Posted on <?php the_date(); ?></span>
        </div>
</li>