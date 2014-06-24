<div class="tallykit_logo_carousel_item">
	<a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_logo_external_link', true); ?>">
		<div class="tk-logo-item-content">
        	<div class="tk-logo-item-content-inner">
				<?php
                $image_url = get_post_meta(get_the_ID(), 'tallykit_logo_image', true);
                ?>
                <img src="<?php echo acoc_image_size($image_url, $width = '', $height = '', $crop = true); ?>" width="" height="" alt=""  />
            </div>
        </div>
	</a>
</div>