<div class="tk_testimonial_item">
	<div class="tk_testimonial_item_content"><?php echo get_the_content(); ?></div>
	<div class="tk_testimonial_item_info">
    	<div class="tk_testimonial_arrow_wrap"><div class="tk_testimonial_arrow"></div></div>
    	<?php 
			$thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); // Get post by ID
            $image_url = $thumb_data[0];
		?>
		<img src="<?php echo acoc_image_size($image_url, '150', '150'); ?>" alt="<?php the_title(); ?>"  />
		<span class="tk_testimonial_author_name">
        	<?php $link = get_post_meta(get_the_ID(), 'tallykit_testimonial_link', true);  ?>
        	<?php if($link): ?><a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_link', true); ?>" target="_blank"><?php endif; ?>
				<?php the_title(); ?>
			<?php if($link): ?></a><?php endif; ?>
            <br />
            <span class="tk_testimonial_author_position"><?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_position', true); ?></span>
        </span>
	</div>
</div>