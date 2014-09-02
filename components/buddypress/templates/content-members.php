<div class="tk-bp-member">

	<div class="tk-bp-avatar">
		<a href="<?php bp_member_permalink() ?>" title="<?php bp_member_name() ?>"><?php bp_member_avatar() ?></a>
	</div>
    
	<div class="tk-bp-info">
		<div class="tk-bp-title">
        	<a href="<?php bp_member_permalink() ?>" title="<?php bp_member_name() ?>"><?php bp_member_name() ?></a>
		</div>
		<div class="tk-bp-meta">
			<span class="tk-bp-activity">
				<?php
				if ( 'newest' == $type )
					bp_member_registered();
				if ( 'active' == $type )
					bp_member_last_active();
				if ( 'popular' == $type )
					bp_member_total_friend_count();
				?>
			</span>
		</div>
	</div>
    
</div><!--tk-bp-member-->