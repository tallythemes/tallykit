<div class="tk_gallery_item">
	<a href="<?php the_permalink(); ?>">
        <?php 
			if(get_the_post_thumbnail() != ''){
				the_post_thumbnail( 'tallykit_gallery_album', array( 'class' => '' ) ); 
			}else{
				echo '<img src="http://placehold.it/'.TALLYKIT_GALLERY_ALBUM_WIDTH.'x'.TALLYKIT_GALLERY_ALBUM_HEIGHT.'">';	
			}
		?>
		<div class="tk_gallery_item_details">
			<h3><?php the_title(); ?></h3>			
		</div>
	</a>
</div>