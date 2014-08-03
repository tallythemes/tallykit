<?php
$doc_query = new WP_Query( $query );
?>
<div class="tallykit_doc_archive" id="tallykit_doc_archive">
	<?php if( $doc_query->have_posts()): ?>
    	<?php while ( $doc_query->have_posts() ) : $doc_query->the_post(); ?>
        	<?php include(tallykit_doc_template_path('dri', '_content-archive.php')); ?>
        <?php endwhile; ?>
    	<div style="clear:both;"></div>
        <?php wp_reset_postdata(); ?>
        <?php echo acoc_paginate($doc_query); ?>
    <?php else: ?>
    	<?php _e('No Docs found.', 'tallykit_textdomain'); ?>
    <?php endif; ?>
</div>