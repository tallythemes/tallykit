<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$column_margin));
?>
<div class="tallykit-buddypress-groups">
	<?php if ( bp_has_groups( 'user_id=0&type=' . $type . '&max=' . $limit ) ) : ?>        
        <?php $isotope->start(); ?>
			<?php while ( bp_groups() ) : bp_the_group(); ?>
               	<?php $isotope->in_loop_start(); ?>
                	<?php include(tallykit_buddypress_template_path('dri', 'content-groups.php')); ?>
				<?php $isotope->in_loop_end(); ?>
			<?php endwhile; ?>
		<?php $isotope->end(); ?>
    <?php else: ?>
    	<?php _e('There are no groups to display.', 'tallykit_textdomain') ?>
    <?php endif; ?>
</div>