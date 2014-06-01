<?php
$flexslider2 = new acoc_flexslider2_html(array(
	'animation'        => $animation,
	'direction'        => $direction,
	'smoothHeight'     => $smoothHeight,
	'slideshow'        => $slideshow,
	'animationLoop'    => $animationLoop,
	'slideshowSpeed'   => $slideshowSpeed,
	'animationSpeed'   => $animationSpeed,
	'controlNav'       => $controlNav,
	'directionNav'     => $directionNav,
));
$testimonial_query = new WP_Query( $query );
?>
<div class="tallykit_testimonial_slideshow acoc-flexslider2-skin">
	<?php if( $testimonial_query->have_posts()): ?>
    	<?php $flexslider2->start(); ?>
        	<?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
            	<?php $flexslider2->in_loop_start(); ?>
                	<?php include(tallykit_testimonial_template_path('dri').'content/content-grid.php'); ?>
                <?php $flexslider2->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $flexslider2->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_testimonial'); ?>
    <?php endif; ?>
</div>