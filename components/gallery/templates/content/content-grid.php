<div class="tk_gallery_item">
	<a href="<?php the_permalink(); ?>">
		<?php		
			$image_url = '';
			$thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); // Get post by ID
			if( $thumb_data[0] != '' ){ $image_url = $thumb_data[0]; }
		?>
		<img src="<?php echo acoc_image_size($image_url, TALLYKIT_GALLERY_THUMB_W, TALLYKIT_GALLERY_THUMB_H, true); ?>" width="<?php echo TALLYKIT_GALLERY_THUMB_W; ?>" height="<?php echo TALLYKIT_GALLERY_THUMB_H; ?>" alt="<?php the_title(); ?>"  />
		<div class="tk_gallery_item_details">
			<h3><?php the_title(); ?></h3>			
		</div>
	</a>
</div>