<div class="tallykit_logo_carousel_item">
	<a href="<?php echo get_post_meta(get_the_ID(), 'tallykit_logo_external_link', true); ?>">
		<div class="tk-logo-item-content">
        	<div class="tk-logo-item-content-inner">
				 <?php 
					if(get_the_post_thumbnail() != ''){
						the_post_thumbnail( 'tallykit_logo', array( 'class' => '' ) ); 
					}else{
						echo '<img src="http://placehold.it/'.TALLYKIT_LOGO_IMAGE_WIDTH.'x'.TALLYKIT_LOGO_IMAGE_HEIGHT.'">';	
					}
				?>
            </div>
        </div>
	</a>
</div>