<?php
$flexslider2 = new acoc_flexslider2_html(array(
	'controlNav'       => $control_nav,
	'directionNav'     => $direction_nav,
	'itemWidth'        => $item_width,
	'itemMargin'       => $item_margin,
	'minItems'         => $min_items,
	'maxItems'         => $max_items,
	'move'             => $move,
	'prevText' => '',
	'nextText' => '',
));
$portfolio_query = new WP_Query( $query );
?>
<div class="tallykit_portfolio_carousel acoc-fx-nav-align-right acoc-fx-nav-valign-top acoc-fx-nav-style-border acoc-fx-cnav-style-border acoc-fx-cnav-align-left acoc-fx-cnav-valign-top">
	<?php if( $portfolio_query->have_posts()): ?>
    	<?php $flexslider2->start(); ?>
        	<?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
            	<?php $flexslider2->in_loop_start(); ?>
                	<?php include(tallykit_portfolio_template_path('dri', 'content/content-grid.php')); ?>
                <?php $flexslider2->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $flexslider2->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_portfolio'); ?>
    <?php endif; ?>
</div>