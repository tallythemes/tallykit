<div class="tallykit_logo_item">
	<a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_logo_external_link', true); ?>">
    	<div class="tallykit_logo_item-d"><img src="<?php echo TALLYKIT_COMPONENTS_URL; ?>logo/assets/images/bg.png" alt=""></div>
		<div class="tallykit_logo_item_image">
        	<div class="tk-item-content">
				<?php
				$thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); // Get post by ID
                $image_url = $thumb_data[0];
                ?>
                <img src="<?php echo acoc_image_size($image_url, $image_size[0], $image_size[1], false); ?>" alt="<?php the_title(); ?>" height="<?php echo $image_size[0]; ?>" width="<?php echo $image_size[1]; ?>" />
            </div>
        </div>
	</a>
</div>