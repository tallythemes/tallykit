<?php
$flexslider2 = new acoc_flexslider2_html(array(
	'animation'        => $animation,
	'direction'        => $direction,
	'smoothHeight'     => $smooth_height,
	'slideshow'        => $slideshow,
	'animationLoop'    => $animation_loop,
	'slideshowSpeed'   => $slideshow_speed,
	'animationSpeed'   => $animation_speed,
	'controlNav'       => $control_nav,
	'directionNav'     => $direction_nav,
	
	'prevText' => '',
	'nextText' => '',
));
$people_query = new WP_Query( $query );
?>
<div class="tallykit_people_slideshow acoc-fx-nav-align-both acoc-fx-nav-valign-center acoc-fx-nav-style-fill acoc-fx-cnav-style-border acoc-fx-cnav-align-center acoc-fx-cnav-valign-top">
	<?php if( $people_query->have_posts()): ?>
    	<?php $flexslider2->start(); ?>
        	<?php while ( $people_query->have_posts() ) : $people_query->the_post(); ?>
            	<?php $flexslider2->in_loop_start(); ?>
                	<?php include(tallykit_people_template_path('dri').'content/content-grid.php'); ?>
                <?php $flexslider2->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $flexslider2->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_people'); ?>
    <?php endif; ?>
</div>