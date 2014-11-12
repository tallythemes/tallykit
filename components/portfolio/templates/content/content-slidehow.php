<div class="tallykit_portfolio_item">
	<a href="<?php the_permalink(); ?>">
		<div class="tallykit_portfolio_item_image">
        	<?php
			$thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); // Get post by ID
                $image_url = $thumb_data[0];
			?>
			<img src="<?php echo acoc_image_size($image_url, $image_size[0], $image_size[1], true); ?>" alt="<?php the_title(); ?>" height="<?php echo $image_size[0]; ?>" width="<?php echo $image_size[1]; ?>" />
        </div>
		<div class="tallykit_portfolio_item_details">
			<h3 class="tallykit_portfolio_item_heading"><?php the_title(); ?></h3>
			<span class="tallykit_portfolio_item_subheading"><?php echo acoc_post_taxonomys_name(get_the_ID(), 'tallykit_portfolio_category'); ?></span>
			
		</div>
	</a>
</div>