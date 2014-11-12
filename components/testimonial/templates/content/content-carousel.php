<div class="tallykit_testimonial_item">
	<div class="tallykit_testimonial_item_content"><?php echo get_the_content(); ?></div>
	<div class="tallykit_testimonial_item_info">
    	<div class="tallykit_testimonial_item_arrow_wrap"><div class="tallykit_testimonial_item_arrow"></div></div>
    	<?php
			$thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); // Get post by ID
            $image_url = $thumb_data[0];
		?>
		<img src="<?php echo acoc_image_size($image_url, $image_size[0], $image_size[1], true); ?>" alt="<?php the_title(); ?>" height="<?php echo $image_size[0]; ?>" width="<?php echo $image_size[1]; ?>" />
		<span class="tallykit_testimonial_item_author"><?php the_title(); ?></span><br />
		<span class="tallykit_testimonial_item_pogition"><?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_position', true); ?> - <?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_link', true); ?></span>
	</div>
</div>