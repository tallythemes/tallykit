<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$margin));
$logo_query = new WP_Query( $query );
?>
<div class="tallykit_logo">
	<?php if( $logo_query->have_posts()): ?>
    	<?php if($filter == 'yes'){ $isotope->filter('tallykit_logo_category'); } ?>
    	<?php $isotope->start(); ?>
        	<?php while ( $logo_query->have_posts() ) : $logo_query->the_post(); ?>
            	<?php $isotope->in_loop_start( $isotope->post_tax_class(get_the_ID(), 'tallykit_logo_category')); ?>
                	<?php include(tallykit_logo_template_path('dri').'content/content-grid.php'); ?>
                <?php $isotope->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $isotope->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
        <?php echo acoc_paginate($logo_query); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_logo'); ?>
    <?php endif; ?>
</div>