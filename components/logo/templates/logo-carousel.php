<?php
$flexslider2 = new acoc_flexslider2_html(array(
	'controlNav'       => $control_nav,
	'directionNav'     => $direction_nav,
	'itemWidth'        => $item_width,
	'itemMargin'       => $item_margin,
	'minItems'         => $min_items,
	'maxItems'         => $max_items,
	'move'             => $move,
));
$logo_query = new WP_Query( $query );
?>
<div class="tallykit_logo_slideshow acoc-flexslider2-skin">
	<?php if( $logo_query->have_posts()): ?>
    	<?php $flexslider2->start(); ?>
        	<?php while ( $logo_query->have_posts() ) : $logo_query->the_post(); ?>
            	<?php $flexslider2->in_loop_start(); ?>
                	<?php include(tallykit_logo_template_path('dri').'content/content-grid.php'); ?>
                <?php $flexslider2->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $flexslider2->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_logo'); ?>
    <?php endif; ?>
</div>