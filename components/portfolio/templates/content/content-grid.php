<div class="tallykit_portfolio_item">
	<a href="<?php the_permalink(); ?>">
		<div class="tallykit_portfolio_item_image">
            <?php 
				if(get_the_post_thumbnail() != ''){
					the_post_thumbnail( 'tallykit_portfolio', array( 'class' => '' ) ); 
				}else{
					echo '<img src="http://placehold.it/'.TALLYKIT_PORTFOLIO_ARCHIVE_W.'x'.TALLYKIT_PORTFOLIO_ARCHIVE_H.'">';	
				}
			?>
        </div>
		<div class="tallykit_portfolio_item_details">
			<h3 class="tallykit_portfolio_item_heading"><?php the_title(); ?></h3>
			<span class="tallykit_portfolio_item_subheading"><?php echo acoc_post_taxonomys_name(get_the_ID(), 'tallykit_portfolio_category'); ?></span>
			
		</div>
	</a>
</div>