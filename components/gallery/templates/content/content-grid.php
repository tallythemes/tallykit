<div class="tk_gallery_item">
	<a href="<?php the_permalink(); ?>">
		<?php
			$all_images = get_post_meta(get_the_ID(), 'tallykit_gallery_images', true);
			if(is_array($all_images) && !empty($all_images)){ $the_image = $all_images[0]; }
			
			$image_url = $the_image['Image'];
			if(($the_image['custom_thumbnail'] == 'on') && ($the_image['thumbnail'] != '')){ $image_url = $the_image['thumbnail']; }
		?>
		<img src="<?php echo acoc_image_size($image_url, TALLYKIT_GALLERY_THUMB_W, TALLYKIT_GALLERY_THUMB_H, true); ?>" width="<?php echo TALLYKIT_GALLERY_THUMB_W; ?>" height="<?php echo TALLYKIT_GALLERY_THUMB_H; ?>" alt="<?php the_title(); ?>"  />
		<div class="tk_gallery_item_details">
			<h3><?php the_title(); ?></h3>			
		</div>
	</a>
</div>