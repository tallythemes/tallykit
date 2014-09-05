<div class="tk-bp-group">

	<div class="tk-bp-avatar">
		<a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_avatar_thumb() ?></a>
	</div>
    
	<div class="tk-bp-info">
		<div class="tk-bp-title">
        	<a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a>
		</div>
        <div class="tk-bp-count"><strong><?php bp_group_total_members(); ?></strong> <span><?php _e(' Members', 'tallykit_textdomain'); ?></span></div>
        <div class="tk-bp-desc"><?php bp_group_description_excerpt(); ?></div>
		<div class="tk-bp-meta">
			<span class="tk-bp-activity">
				<?php
					if ( 'newest' == $type )
						printf( __( 'created %s', 'tallykit_textdomain' ), bp_get_group_date_created() );
					if ( 'active' == $type )
						printf( __( 'active %s', 'tallykit_textdomain' ), bp_get_group_last_active() );
					else if ( 'popular' == $type )
						bp_group_member_count();
				?>
			</span>
		</div>
        <div class="tk-bp-more"><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php _e(' View Group', 'tallykit_textdomain'); ?></a></div>
	</div>
    
</div><!--tk-bp-member-->