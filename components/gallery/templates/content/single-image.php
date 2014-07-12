<div class="tk_single_gallery_image">
	<?php
	$link = $image_item['Image'];
	$link_class = 'magnificPopup-child';
	$link_icon_class = 'fa-search-plus"';
	if($image_item['link'] != ''){ $link = $image_item['link']; $link_class = ''; $link_icon_class = 'fa-link'; }
	
	$image_url = $image_item['Image'];
	if(($image_item['custom_thumbnail'] == 'on') && ($image_item['thumbnail'] != '')){ $image_url = $image_item['thumbnail']; }
	?>
	<a href="<?php echo $link; ?>" title="<?php echo $image_item['title']; ?>" class="<?php echo $link_class; ?>">
		<img src="<?php echo acoc_image_size($image_url, TALLYKIT_GALLERY_THUMB_W, TALLYKIT_GALLERY_THUMB_H, true); ?>" width="<?php echo TALLYKIT_GALLERY_THUMB_W; ?>" height="<?php echo TALLYKIT_GALLERY_THUMB_H; ?>" alt="<?php echo $image_item['title']; ?>"  />
        
     <span><i class="fa <?php echo $link_icon_class; ?>"></i></span>
	</a>
</div>