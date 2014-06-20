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
$testimonial_query = new WP_Query( $query );
?>
<div class="tallykit_testimonial_slideshow acoc-fx-nav-align-center acoc-fx-nav-valign-bottom acoc-fx-nav-style-border acoc-fx-cnav-style-border acoc-fx-cnav-align-center acoc-fx-cnav-valign-top">
	<?php if( $testimonial_query->have_posts()): ?>
    	<?php $flexslider2->start(); ?>
        	<?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
            	<?php $flexslider2->in_loop_start(); ?>
                	<?php include(tallykit_testimonial_template_path('dri').'content/content-slidehow.php'); ?>
                <?php $flexslider2->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $flexslider2->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Testimonial found.', 'tallykit_testimonial'); ?>
    <?php endif; ?>
</div>