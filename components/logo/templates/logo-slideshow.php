<?php
$flexslider2 = new acoc_flexslider2_html(array(
	'animation'        => $animation,
	'direction'        => $direction,
	'smoothheight'     => $smooth_height,
	'slideshow'        => $slideshow,
	'animationloop'    => $animation_loop,
	'slideshowspeed'   => $slideshow_speed,
	'animationspeed'   => $animation_speed,
	'controlnav'       => $control_nav,
	'directionnav'     => $direction_nav,
	'prevText' => '',
	'nextText' => '',
));
$logo_query = new WP_Query( $query );
?>
<div class="tallykit_logo_slideshow  acoc-fx-nav-align-both acoc-fx-nav-valign-center acoc-fx-nav-style-fill acoc-fx-cnav-style-border acoc-fx-cnav-align-center acoc-fx-cnav-valign-top">
	<?php if( $logo_query->have_posts()): ?>
    	<?php $flexslider2->start(); ?>
        	<?php while ( $logo_query->have_posts() ) : $logo_query->the_post(); ?>
            	<?php $flexslider2->in_loop_start(); ?>
                	<?php include(tallykit_logo_template_path('dri', 'content/content-grid.php')); ?>
                <?php $flexslider2->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $flexslider2->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_logo'); ?>
    <?php endif; ?>
</div>