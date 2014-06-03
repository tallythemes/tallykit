<?php
$people_query = new WP_Query( $query );
?>
<div class="tallykit_people_single">
	<?php if( $people_query->have_posts()): ?>
		<?php while ( $people_query->have_posts() ) : $people_query->the_post(); ?>
            <div class="tk_people_single_content">
            	<img src="<?php echo acoc_image_size(get_post_meta(get_the_ID(), 'tallykit_people_single_image', true) , $width = '960', $height = '450', $crop = true); ?>" width="" height="" alt=""  />
                <?php the_content(); ?>
            </div>
            <div class="tk_people_single_info">
            	
            	<h3><?php _e('Contact With', 'tallykit_people'); ?> <?php the_title(); ?></h3>
                <ul>
                	<li>
                    	<strong><?php _e('Position', 'tallykit_people'); ?></strong>: 
                    	<div class="people_tk">
                            <?php echo get_post_meta(get_the_ID(), 'tallykit_people_position', true); ?>
                        </div>
                    </li>
                    <li>
                    	<strong><?php _e('Personal Website', 'tallykit_people'); ?></strong>: 
                    	<div class="people_tk">
                            <a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_people_link', true); ?>" target="_blank"><?php _e('View Website', 'tallykit_people'); ?></a>
                        </div>
                    </li>
                </ul>
                <div class="tk_people_item_social">
                	<ul>
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
                            echo '<li>
							<a class="tallykit-people-soicalIcon"  href="'.$meta1.'" target="_blank" title="twitter"><i class="fa fa-twitter"></i> Twitter</a>
							</li>'; }
                            
                        if(isset($meta2) && $meta2){ 
                            echo '<li>
							<a class="tallykit-people-soicalIcon"  href="'.$meta2.'" target="_blank" title="facebook"><i class="fa fa-facebook"></i> Facebook</a>
							</li>'; }
                            
                        if(isset($meta3) && $meta3){ 
                            echo '<li>
							<a class="tallykit-people-soicalIcon" href="'.$meta3.'" target="_blank" title="linkedin"><i class="fa fa-linkedin"></i> Linkedin</a>
							</li>'; }
                            
                        if(isset($meta4) && $meta4){ 
                            echo '<li>
							<a class="tallykit-people-soicalIcon"  href="'.$meta4.'" target="_blank" title="Google+"><i class="fa fa-google-plus"></i> Google Plus</a>
							</li>'; }
                            
                        if(isset($meta5) && $meta5){ 
                            echo '<li>
							<a class="tallykit-people-soicalIcon"  href="'.$meta5.'" target="_blank" title="dribbble"><i class="fa fa-dribbble"></i> Dribbble</a>
							</li>'; }
                            
                        if(isset($meta6) && $meta6){ 
                            echo '<li>
							<a class="tallykit-people-soicalIcon"  href="'.$meta6.'" target="_blank" title="flickr"><i class="fa fa-flickr"></i> Flickr</a>
							</li>'; }
                        
                        if(isset($meta7) && $meta7){ 
                            echo '<li><a class="tallykit-people-soicalIcon"  href="'.$meta7.'" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i> Pinterest</a></li>'; }
                            
                        if(isset($meta8) && $meta8){ 
                            echo '<li><a class="tallykit-people-soicalIcon"  href="'.$meta8.'" target="_blank" title="vimeo"><i class="fa fa-vimeo-square"></i> Vimeo</a></li>'; }
                            
                        if(isset($meta9) && $meta9){ 
                            echo '<li><a class="tallykit-people-soicalIcon"  href="'.$meta9.'" target="_blank" title="youtube"><i class="fa fa-youtube"></i> Youtube</a></li>'; }
                    ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
		<?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No People found.', 'tallykit_people'); ?>
    <?php endif; ?>
</div>