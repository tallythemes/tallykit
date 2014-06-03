<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$margin));
$portfolio_query = new WP_Query( $query );
?>
<div class="tallykit_portfolio th_grid_skin">
	<?php if( $portfolio_query->have_posts()): ?>
    	<?php if($filter == 'yes'){ $isotope->filter('tallykit_portfolio_category'); } ?>
    	<?php $isotope->start(); ?>
        	<?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); ?>
            	<?php $isotope->in_loop_start( $isotope->post_tax_class(get_the_ID(), 'tallykit_portfolio_category')); ?>
                	<?php include(tallykit_portfolio_template_path('dri').'content/content-grid.php'); ?>
                <?php $isotope->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $isotope->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
        <?php echo acoc_paginate($portfolio_query); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_portfolio'); ?>
    <?php endif; ?>
</div>