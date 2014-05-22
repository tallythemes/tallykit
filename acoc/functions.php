<?php
/* Resize image
-------------------------------------------------*/
if(!function_exists('acoc_image_size')):
function acoc_image_size($url, $width = '', $height = '', $crop = true, $align = '', $retina = ACOC_IMAGE_RETINA_SUPPORT){
	if(function_exists('mr_image_resize')){
		return mr_image_resize($url, $width, $height, $crop, $align, $retina);
	}
}
endif;

/* Output Content Nav
-------------------------------------------------*/
if(!function_exists('acoc_paginate')):
function acoc_paginate($query = ''){
	$output = NULL;
	if ($query->max_num_pages > 1) {
		$output .= '<div class="pagenav-acoc">';
			$big = 999999999; // need an unlikely integer		
			$output .= paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $query->max_num_pages
			));
		$output .= '</div>';
	}
	return $output;
}
endif;


/* Display  post_thumbnail
-------------------------------------------------*/
if(!function_exists('acoc_post_thumbnail')):
function acoc_post_thumbnail($args = array()){
	$default = array(			
		'id' => get_the_ID(),		
		'w' => '100',
		'h' => '100',
		'src' => NULL,
		'crop' => true,
		'placeholder' => NULL,
	);
	$args = array_merge($default, $args);
	
	if($args['src'] != ''){
		return acoc_image_size($args['src'], $args['w'], $args['h'], $args['crop']);
	}elseif ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( get_the_ID() ) ){
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
		return acoc_image_size($thumb_url[0], $args['w'], $args['h'], $args['crop']);
	}elseif($args['placeholder'] != ''){
		return $args['placeholder'];
	}
}
endif;