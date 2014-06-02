<div class="tallykit_portfolio_item">
	<a href="<?php the_permalink(); ?>">
		<div class="tallykit_portfolio_item_image">
        	<?php
			$image_url = get_post_meta(get_the_ID(), 'tallykit_portfolio_archive_image', true);
			?>
			<img src="<?php echo acoc_image_size($image_url, $width = '600', $height = '450', $crop = true); ?>" width="" height="" alt=""  />
        </div>
		<div class="tallykit_portfolio_item_details">
			<h3 class="tallykit_portfolio_item_heading"><?php the_title(); ?></h3>
			<span class="tallykit_portfolio_item_subheading"><?php echo acoc_post_taxonomys_name(get_the_ID(), 'tallykit_portfolio_category'); ?></span>
			
		</div>
	</a>
</div>