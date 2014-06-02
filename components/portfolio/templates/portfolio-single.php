<?php
$portfolio_query = new WP_Query( $query );
?>
<div class="tallykit_portfolio_single">
	<?php if( $portfolio_query->have_posts()): ?>
		<?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
			
            <img src="<?php echo acoc_image_size(get_post_meta(get_the_ID(), 'tallykit_portfolio_single_image', true) , $width = '960', $height = '450', $crop = true); ?>" width="" height="" alt=""  />
			<div class="tk_portfolio_single_content">
            	<h3><?php _e('Project Description', 'tallykit_portfolio'); ?></h3>
                <?php the_content(); ?>
            </div>
            <div class="tk_portfolio_single_info">
            	<h3><?php _e('Project Details', 'tallykit_portfolio'); ?></h3>
    			<ul>
                    <li>
                        <strong><?php _e('Skills Needed', 'tallykit_portfolio'); ?></strong>: 
                        <div class="project_tk">
                            <?php echo get_post_meta(get_the_ID(), 'tallykit_portfolio_project_url_label', true); ?>
                        </div>
                    </li>
                    <li>
                        <strong><?php _e('Categories Needed', 'tallykit_portfolio'); ?></strong>: 
                        <div class="project_tk">
                            
                        </div>
                    </li>
                    <li>
                        <strong><?php _e('Project URL', 'tallykit_portfolio'); ?></strong>: 
                         <div class="project_tk">
                            <a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_portfolio_project_url', true); ?>" target="_blank"><?php _e('View Project', 'well_textdomain'); ?></a>
                         </div>
                     </li>
                    <li>
                        <strong><?php _e('Copyright', 'tallykit_portfolio'); ?></strong>: 
                        <div class="project_tk">
                            <a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_portfolio_client_url', true); ?>" target="_blank">
                                <?php echo get_post_meta(get_the_ID(), 'tallykit_portfolio_client_url_label', true); ?>
                            </a>
                        </div>
                    </li>
        		</ul>
            </div>
            <div class="clear"></div>
		<?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_portfolio'); ?>
    <?php endif; ?>
</div>