<div class="tallykit_logo_carousel_item">
	<a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_logo_external_link', true); ?>">
		<div class="tk-logo-item-content">
        	<div class="tk-logo-item-content-inner">
				<?php
                $thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); // Get post by ID
                $image_url = $thumb_data[0];
                ?>
                <img src="<?php echo acoc_image_size($image_url, $width = '', $height = '', $crop = true); ?>" width="" height="" alt=""  />
            </div>
        </div>
	</a>
</div>