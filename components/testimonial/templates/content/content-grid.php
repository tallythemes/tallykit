<div class="tallykit_testimonial_item">
	<div class="tk_item_content"><?php echo get_the_content(); ?></div>
	<div class="tk_item_info">
    	<div class="tk_arrow_wrap"><div class="tk_arrow"></div></div>
    	<?php $image_url = get_post_meta(get_the_ID(), 'tallykit_testimonial_image', true); ?>
		<img src="<?php echo acoc_image_size($image_url, $width = '300', $height = '300', $crop = true); ?>" width="" height="" alt=""  />
		<span class="tk_author_name">
        	<?php $link = get_post_meta(get_the_ID(), 'tallykit_testimonial_link', true);  ?>
        	<?php if($link): ?><a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_link', true); ?>" target="_blank"><?php endif; ?>
				<?php the_title(); ?>
			<?php if($link): ?></a><?php endif; ?>
        </span><br />
		<span class="tk_author_position"><?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_position', true); ?></span>
	</div>
</div>