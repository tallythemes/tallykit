<?php
$people_query = new WP_Query( $query );
?>
<div class="tallykit_people_single">
	<?php if( $people_query->have_posts() ): ?>
		<?php while ( $people_query->have_posts() ) : $people_query->the_post(); ?>
            <div class="tk_people_single_content">
               <?php echo apply_filters('tallykit_people_content', get_the_content()); ?>
            </div>
            <div class="tk_people_single_info">
                <div class="tk_people_image">
            		<?php 
						if(get_the_post_thumbnail() != ''){
							the_post_thumbnail( 'tallykit_people', array( 'class' => '' ) ); 
						}else{
							echo '<img src="http://placehold.it/'.TALLYKIT_PEOPLE_IMAGE_ARCHIVE_W.'x'.TALLYKIT_PEOPLE_IMAGE_ARCHIVE_H.'">';	
						}
					?>
                    <h3><?php the_title(); ?></h3>
                </div>
            	
                <ul>
                
                	<li>
                    	<strong><?php _e('Position', 'tallykit_textdomain'); ?></strong>: 
                    	<div class="people_tk">
                            <?php echo get_post_meta(get_the_ID(), 'tallykit_people_position', true); ?>
                        </div>
                    </li>
                    <li>
                    	<strong><?php _e('Sub Title', 'tallykit_textdomain'); ?></strong>: 
                    	<div class="people_tk">
                            <?php echo get_post_meta(get_the_ID(), 'tallykit_people_subtitle', true); ?>
                        </div>
                    </li>
                    <li>
                    	<strong><?php _e('Personal Website', 'tallykit_textdomain'); ?></strong>: 
                    	<div class="people_tk">
                            <a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_people_link', true); ?>" target="_blank"><?php _e('View Website', 'tallykit_textdomain'); ?></a>
                        </div>
                    </li>
                    <li>
                    	<strong><?php _e('Email Address', 'tallykit_textdomain'); ?></strong>: 
                    	<div class="people_tk">
                            <a href="mailto:<?php echo get_post_meta(get_the_ID(), 'tallykit_people_email', true); ?>"><?php echo get_post_meta(get_the_ID(), 'tallykit_people_email', true); ?></a>
                        </div>
                    </li>
                    <li>
                    	<strong><?php _e('Phone Number', 'tallykit_textdomain'); ?></strong>: 
                    	<div class="people_tk">
                            <a href="tel:<?php echo get_post_meta(get_the_ID(), 'tallykit_people_phone', true); ?>"><?php echo get_post_meta(get_the_ID(), 'tallykit_people_phone', true); ?></a>
                        </div>
                    </li>
                    
                    <li>
                    	<strong><?php _e('Social Profiles', 'tallykit_textdomain'); ?></strong>:
                    	<div class="people_tk">
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
									echo '<a class="tk-people-icon"  href="'.$meta1.'" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>'; }
									
								if(isset($meta2) && $meta2){ 
									echo '<a class="tk-people-icon"  href="'.$meta2.'" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a>'; }
									
								if(isset($meta3) && $meta3){ 
									echo '<a class="tk-people-icon" href="'.$meta3.'" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a>'; }
									
								if(isset($meta4) && $meta4){ 
									echo '<a class="tk-people-icon"  href="'.$meta4.'" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a>'; }
									
								if(isset($meta5) && $meta5){ 
									echo '<a class="tk-people-icon"  href="'.$meta5.'" target="_blank" title="dribbble"><i class="fa fa-dribbble"></i></a>'; }
									
								if(isset($meta6) && $meta6){ 
									echo '<a class="tk-people-icon"  href="'.$meta6.'" target="_blank" title="flickr"><i class="fa fa-flickr"></i></a>'; }
								
								if(isset($meta7) && $meta7){ 
									echo '<a class="tk-people-icon"  href="'.$meta7.'" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a>'; }
									
								if(isset($meta8) && $meta8){ 
									echo '<a class="tk-people-icon"  href="'.$meta8.'" target="_blank" title="vimeo"><i class="fa fa-vimeo-square"></i></a>'; }
									
								if(isset($meta9) && $meta9){ 
									echo '<a class="tk-people-icon"  href="'.$meta9.'" target="_blank" title="youtube"><i class="fa fa-youtube"></i></a>'; }
						   ?>
                        </div>
                    </li>
                </ul> 
            </div>
            <div class="clear"></div>
		<?php endwhile; ?>
        
    <?php else: ?>
    	<?php _e('No People found.', 'tallykit_textdomain'); ?>
    <?php endif; ?>
    wp_reset_postdata();
</div>