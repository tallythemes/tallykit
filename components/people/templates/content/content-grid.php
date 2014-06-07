<div class="tallykit_people_item">
		<div class="tk_people_item_image">
        	<a href="<?php the_permalink(); ?>">
        	<?php
			$image_url = get_post_meta(get_the_ID(), 'tallykit_people_archive_image', true);
			?>
			<img src="<?php echo acoc_image_size($image_url, $width = '600', $height = '400', $crop = true); ?>" width="" height="" alt=""  />
            </a>
        </div>
		<div class="tk_people_item_details">
			<h3 class="tk_people_item_heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<span class="tk_people_item_subheading"><?php echo get_post_meta(get_the_ID(), 'tallykit_people_position', true); ?></span>
			<div class="tk_people_item_social">
            	<?php
					$meta1 = get_post_meta(get_the_ID(),'tallykit_people_twitter', true);
					$meta2 = get_post_meta(get_the_ID(),'tallykit_people_facebook', true);
					$meta3 = get_post_meta(get_the_ID(),'tallykit_people_linkedin', true);
					$meta4 = get_post_meta(get_the_ID(),'tallykit_people_google', true);
					$meta5 = get_post_meta(get_the_ID(),'tallykit_people_dribbble', true);
					$meta6 = get_post_meta(get_the_ID(),'tallykit_people_flickr', true);
					$meta7 = get_post_meta(get_the_ID(),'tallykit_people_pinterest', true);
					$meta8 = get_post_meta(get_the_ID(),'tallykit_people_vimeo', true);
					$meta9 = get_post_meta(get_the_ID(),'tallykit_people_youtube', true);
					
					
					if(isset($meta1) && $meta1){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta1.'" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a>'; }
						
					if(isset($meta2) && $meta2){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta2.'" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a>'; }
						
					if(isset($meta3) && $meta3){ 
						echo '<a class="tallykit-people-soicalIcon" href="'.$meta3.'" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a>'; }
						
					if(isset($meta4) && $meta4){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta4.'" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a>'; }
						
					if(isset($meta5) && $meta5){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta5.'" target="_blank" title="dribbble"><i class="fa fa-dribbble"></i></a>'; }
						
					if(isset($meta6) && $meta6){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta6.'" target="_blank" title="flickr"><i class="fa fa-flickr"></i></a>'; }
					
					if(isset($meta7) && $meta7){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta7.'" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a>'; }
						
					if(isset($meta8) && $meta8){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta8.'" target="_blank" title="vimeo"><i class="fa fa-vimeo-square"></i></a>'; }
						
					if(isset($meta9) && $meta9){ 
						echo '<a class="tallykit-people-soicalIcon"  href="'.$meta9.'" target="_blank" title="youtube"><i class="fa fa-youtube"></i></a>'; }
				?>
            </div>
		</div>
</div>