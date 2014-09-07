<?php
$isotope = new acoc_isotope_html(array('column'=>$columns, 'margin'=>$margin));

$the_query = new WP_Query( array('post_type' => "tallykit_gallery", 'p' => $id, 'post_status' => 'publish', 'posts_per_page' => 1 ) );

if ( $the_query->have_posts() ) {
$attachments = explode( ',', get_post_meta($id, 'tallykit_gallery_images', true) );
echo '<div class="tallykit_single_gallery">';
	if(is_array($attachments) && !empty($attachments)){
		$isotope->start();
			foreach($attachments as $attachment){
				$isotope->in_loop_start();
					include(tallykit_gallery_template_path('dri', 'content/single-image.php'));
				$isotope->in_loop_end();
			}
		$isotope->end();
	}else{
		_e('Sorry no images found in this gallery', 'tallykit_textdomain');
	}
}else{
	_e('Invalid Gallery ID', 'tallykit_textdomain');
}
echo '</div>';