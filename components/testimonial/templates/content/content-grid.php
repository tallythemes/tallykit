<div class="tk_testimonial_item">
	<div class="tk_testimonial_item_content"><?php echo get_the_content(); ?></div>
	<div class="tk_testimonial_item_info">
    	<div class="tk_testimonial_arrow_wrap"><div class="tk_testimonial_arrow"></div></div>
            <?php 
				if(get_the_post_thumbnail() != ''){
					the_post_thumbnail( 'tallykit_testimonial', array( 'class' => '' ) );
				}else{
					echo '<img src="http://placehold.it/'.TALLYKIT_TESTIMONIAL_IMAGE_W.'x'.TALLYKIT_TESTIMONIAL_IMAGE_H.'">';	
				}
			?>
            
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