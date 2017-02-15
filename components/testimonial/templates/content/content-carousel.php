<div class="tallykit_testimonial_item">
	<div class="tallykit_testimonial_item_content"><?php echo get_the_content(); ?></div>
	<div class="tallykit_testimonial_item_info">
    	<div class="tallykit_testimonial_item_arrow_wrap"><div class="tallykit_testimonial_item_arrow"></div></div>
    	<?php 
			if(get_the_post_thumbnail() != ''){
				the_post_thumbnail( 'tallykit_testimonial', array( 'class' => '' ) ); 
			}else{
				echo '<img src="http://placehold.it/'.TALLYKIT_TESTIMONIAL_IMAGE_W.'x'.TALLYKIT_TESTIMONIAL_IMAGE_H.'">';	
			}
		?>
		<span class="tallykit_testimonial_item_author"><?php the_title(); ?></span><br />
		<span class="tallykit_testimonial_item_pogition"><?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_position', true); ?> - <?php echo get_post_meta(get_the_ID(), 'tallykit_testimonial_link', true); ?></span>
	</div>
</div>