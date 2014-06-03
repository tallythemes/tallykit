<div class="tallykit_logo_item">
	<a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_logo_external_link'); ?>">
		<div class="tallykit_logo_item_image">
        	<?php
			$image_url = get_post_meta(get_the_ID(), 'tallykit_logo_image', true);
			?>
			<img src="<?php echo acoc_image_size($image_url, $width = '600', $height = '450', $crop = true); ?>" width="" height="" alt=""  />
        </div>
	</a>
</div>