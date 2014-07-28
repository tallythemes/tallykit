<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$margin));
$testimonial_query = new WP_Query( $query );
?>
<div class="tallykit_testimonial tk_testimonial_grid">
	<?php if( $testimonial_query->have_posts()): ?>
    	<?php if($filter == 'yes'){ $isotope->filter('tallykit_testimonial_category'); } ?>
    	<?php $isotope->start(); ?>
        	<?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
            	<?php $isotope->in_loop_start( $isotope->post_tax_class(get_the_ID(), 'tallykit_testimonial_category')); ?>
                	<?php include(tallykit_testimonial_template_path('dri', 'content/content-grid.php')); ?>
                <?php $isotope->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $isotope->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
        <?php echo acoc_paginate($testimonial_query); ?>
    <?php else: ?>
    	<?php _e('No testimonial found.', 'tallykit_testimonial'); ?>
    <?php endif; ?>
</div>