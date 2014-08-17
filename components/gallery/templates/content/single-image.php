<div class="tk_single_gallery_image">
	<?php
	$image_data = get_post( $attachment ); // Get post by ID
	$link = $image_data->guid;
	$link_class = 'magnificPopup-child';
	$link_icon_class = 'fa-search-plus"';
	$image_url = $image_data->guid;
	$image_caption = $image_data->post_excerpt;
	?>
	<a href="<?php echo $link; ?>" title="<?php echo $image_caption; ?>" class="<?php echo $link_class; ?>">
		<img src="<?php echo acoc_image_size($image_url, TALLYKIT_GALLERY_THUMB_W, TALLYKIT_GALLERY_THUMB_H, true); ?>" width="<?php echo TALLYKIT_GALLERY_THUMB_W; ?>" height="<?php echo TALLYKIT_GALLERY_THUMB_H; ?>" alt="<?php echo $image_caption; ?>"  />
        
     <span><i class="fa <?php echo $link_icon_class; ?>"></i></span>
	</a>
</div>