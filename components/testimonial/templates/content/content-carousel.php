<div class="tallykit_testimonial_item">
	<div class="tallykit_testimonial_item_content"><?php echo get_the_content(); ?></div>
	<div class="tallykit_testimonial_item_info">
    	<div class="tallykit_testimonial_item_arrow_wrap"><div class="tallykit_testimonial_item_arrow"></div></div>
    	<?php
			$image_url = get_post_meta(get_the_ID(), 'tallykit_testimonial_image', true);
		?>
		<img src="<?php echo acoc_image_size($image_url, $width = '300', $height = '300', $crop = true); ?>" width="" height="" alt=""  />
		<span class="tallykit_testimonial_item_author"><?php the_title(); ?></span><br />
		<span class="tallykit_testimonial_item_pogition"><?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_position', true); ?> - <?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_link', true); ?></span>
	</div>
</div>