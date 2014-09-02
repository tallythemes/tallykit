<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$column_margin));
?>
<div class="tallykit-buddypress-members">
	<?php if ( bp_has_members( $members_args ) ) : ?>        
        <?php $isotope->start(); ?>
			<?php while ( bp_members() ) : bp_the_member(); ?>
               	<?php $isotope->in_loop_start(); ?>
                	<?php include(tallykit_buddypress_template_path('dri', 'content-members.php')); ?>
				<?php $isotope->in_loop_end(); ?>
			<?php endwhile; ?>
		<?php $isotope->end(); ?>
    <?php else: ?>
    	<?php _e('No one has signed up yet!', 'tallykit_textdomain') ?>
    <?php endif; ?>
</div>