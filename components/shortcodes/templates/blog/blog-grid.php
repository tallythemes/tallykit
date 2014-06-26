<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$margin));
$blog_query = new WP_Query( $query );
?>
<div class="tallykit-shortcode-blog tallykit-shortcode-blog-grid">
	<?php if( $blog_query->have_posts()): ?>
    	<?php if($filter == 'yes'){ $isotope->filter('category'); } ?>
    	<?php $isotope->start(); ?>
        	<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
            	<?php $isotope->in_loop_start( $isotope->post_tax_class(get_the_ID(), 'category')); ?>
                	<?php include(tallykit_shortcodes_template_path('dri').'blog/content/content-grid.php'); ?>
                <?php $isotope->in_loop_end(); ?>
            <?php endwhile; ?>
        <?php $isotope->end(); ?>
        <div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
        <?php if($pagination == 'yes'){ echo acoc_paginate($blog_query); } ?>
    <?php else: ?>
    	<?php _e('No Posts found.', 'tallykit_portfolio'); ?>
    <?php endif; ?>
</div>