<div class="tk_single_gallery_image">
	<?php
		$link_class = 'magnificPopup-child';
		$link_icon_class = 'fa-search-plus';
		$link = NULL;
		$image_url = '';
		$image_caption = NULL;
		
		$attachment_query = new WP_Query(array('post_type'=>'attachment', 'posts_per_page'=>1, 'p'=>$attachment));
		if ( $attachment_query->have_posts() ) {
			while ( $attachment_query->have_posts() ) { $attachment_query->the_post();
				$link = $attachment_query->post->guid;
				$image_url = $attachment_query->post->guid;
				$image_caption = $attachment_query->post->post_excerpt;
			}
		}
		
	?>
	<a href="<?php echo $link; ?>" title="<?php echo $image_caption; ?>" class="<?php echo $link_class; ?>">
		<img src="<?php echo acoc_image_size($image_url, $image_size[0], $image_size[1], true); ?>" width="<?php echo $image_size[0]; ?>" height="<?php echo $image_size[1]; ?>" alt="<?php echo $image_caption; ?>"  />
        
     <span><i class="fa <?php echo $link_icon_class; ?>"></i></span>
	</a>
</div>