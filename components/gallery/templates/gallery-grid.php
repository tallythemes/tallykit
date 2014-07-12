<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$margin));
$gallery_query = new WP_Query( $query );
?>
<div class="tallykit_gallery_archive">
	<?php if( $gallery_query->have_posts()): ?>
    	<?php if($filter == 'yes'){ $isotope->filter('tallykit_gallery_category'); } ?>
    	<?php $isotope->start(); ?>
        	<?php while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); ?>
            	<?php $isotope->in_loop_start( $isotope->post_tax_class(get_the_ID(), 'tallykit_gallery_category')); ?>
                	<?php include(tallykit_gallery_template_path('dri').'content/content-grid.php'); ?>
                <?php $isotope->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $isotope->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
        <?php echo acoc_paginate($gallery_query); ?>
    <?php else: ?>
    	<?php _e('No Gallery found.', 'tallykit_textdomain'); ?>
    <?php endif; ?>
</div>