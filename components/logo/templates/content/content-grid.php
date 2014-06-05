<div class="tallykit_logo_item">
	<a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_logo_external_link'); ?>">
    	<div class="tallykit_logo_item-d"><img src="<?php echo TALLYKIT_COMPONENTS_URL; ?>logo/assets/images/bg.png" draggable="false"></div>
		<div class="tallykit_logo_item_image">
        	<div class="tk-item-content">
				<?php
                $image_url = get_post_meta(get_the_ID(), 'tallykit_logo_image', true);
                ?>
                <img src="<?php echo acoc_image_size($image_url, $width = '', $height = '', $crop = true); ?>" width="" height="" alt=""  />
            </div>
        </div>
	</a>
</div>