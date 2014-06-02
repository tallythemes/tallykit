<?php
$people_query = new WP_Query( $query );
?>
<div class="tallykit_people_single">
	<?php if( $people_query->have_posts()): ?>
		<?php while ( $people_query->have_posts() ) : $people_query->the_post(); ?>
			
            <img src="<?php echo acoc_image_size(get_post_meta(get_the_ID(), 'tallykit_people_single_image', true) , $width = '960', $height = '450', $crop = true); ?>" width="" height="" alt=""  />
			
		<?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No People found.', 'tallykit_people'); ?>
    <?php endif; ?>
</div>