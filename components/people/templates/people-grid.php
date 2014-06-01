<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$margin));
$people_query = new WP_Query( $query );
?>
<div class="tallykit_people">
	<?php if( $people_query->have_posts()): ?>
    	<?php if($filter == 'yes'){ $isotope->filter('tallykit_people_category'); } ?>
    	<?php $isotope->start(); ?>
        	<?php while ( $people_query->have_posts() ) : $people_query->the_post(); ?>
            	<?php $isotope->in_loop_start( $isotope->post_tax_class(get_the_ID(), 'tallykit_people_category')); ?>
                	<?php include(tallykit_people_template_path('dri').'content/content-grid.php'); ?>
                <?php $isotope->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $isotope->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
        <?php echo acoc_paginate($people_query); ?>
    <?php else: ?>
    	<?php _e('No Portfolio found.', 'tallykit_people'); ?>
    <?php endif; ?>
</div>