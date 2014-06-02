<?php
$portfolio_query = new WP_Query( $query );
?>
<div class="tallykit_portfolio_single">
	<?php if( $portfolio_query->have_posts()): ?>
		<?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
			
            <img src="<?php echo acoc_image_size(get_post_meta(get_the_ID(), 'tallykit_portfolio_single_image', true) , $width = '960', $height = '450', $crop = true); ?>" width="" height="" alt=""  />
			
		<?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_portfolio'); ?>
    <?php endif; ?>
</div>