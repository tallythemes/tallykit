<?php
/* Make oembed_result HTML5 Validate
-------------------------------------------------*/
add_filter('oembed_result', 'acoc_oembed_result_frameborder_remove', 1, true);
function acoc_oembed_result_frameborder_remove($embed) {
	
	$output = $embed;
	
	if (strstr($embed,'frameborder="0"')) {
		$output = str_replace('frameborder="0"','',$embed);
	}elseif (strstr($embed,'frameborder="no"')) {
		$output = str_replace('frameborder="no"','',$embed);
	}
	
	
	return $output;
}

add_filter('oembed_result', 'acoc_oembed_result_scrolling_remove', 1, true);
function acoc_oembed_result_scrolling_remove($embed) {
	
	$output = $embed;

	if (strstr($embed,'scrolling="no"')) {
		$output = str_replace('scrolling="no"','',$embed);
	}

	return $output;
}

add_filter('oembed_result', 'acoc_oembed_result_soundcloud_fix', 1, true);
function acoc_oembed_result_soundcloud_fix($embed) {
	
	$output = $embed;

	if (strstr($embed,'soundcloud.com/player/')) {
		$output = str_replace('&','&amp;',$embed);
	}

	return $output;
}

add_filter('oembed_result', 'acoc_oembed_result_webkitallowfullscreen_remove', 1, true);
function acoc_oembed_result_webkitallowfullscreen_remove($embed) {
	
	$output = $embed;

	if (strstr($embed,'webkitallowfullscreen')) {
		$output = str_replace('webkitallowfullscreen','',$embed);
	}

	return $output;
}

add_filter('oembed_result', 'acoc_oembed_result_mozallowfullscreen_remove', 1, true);
function acoc_oembed_result_mozallowfullscreen_remove($embed) {
	
	$output = $embed;

	if (strstr($embed,'mozallowfullscreen')) {
		$output = str_replace('mozallowfullscreen','',$embed);
	}

	return $output;
}


add_filter('oembed_result', 'acoc_oembed_result_embed_remove', 1, true);
function acoc_oembed_result_embed_remove($embed) {
	
	$output = $embed;

	if (strstr($embed,'</embed>')) {
		$output = str_replace('</embed>','',$embed);
	}

	return $output;
}

function fjarrett_get_attachment_id_by_url( $url ) {
	// Split the $url into two parts with the wp-content directory as the separator
	$parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

	// Get the host of the current site and the host of the $url, ignoring www
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

	// Return nothing if there aren't any $url parts or if the current host and $url host do not match
	if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
		return;
	}

	// Now we're going to quickly search the DB for any attachment GUID with a partial path match
	// Example: /uploads/2013/05/test-image.jpg
	global $wpdb;

	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );

	// Returns null if no attachment is found
	return $attachment[0];
}


/* Resize image
-------------------------------------------------*/
if(!function_exists('acoc_image_size')):
function acoc_image_size($url, $width = '', $height = '', $crop = true, $align = '', $retina = ACOC_IMAGE_RETINA_SUPPORT){
	global $wpdb;
	$output = $url;
	
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$url'";
   // $id = $wpdb->get_var($query);
	
	$id = fjarrett_get_attachment_id_by_url($url);
	
	if($id == NULL){ 
		$output = 'http://placehold.it/'.$width.'x'.$height;
		return $output; 
	}
	
	if( ACOC_DISABLE_IMAGE_RESIZER == true ){ return $output; }
	
	if(function_exists('mr_image_resize')){
		if($id == false){
			// do nothing
		}else{
			$output = mr_image_resize($url, $width, $height, $crop, $align, $retina);
		}
	}
	
	return $output;
}
endif;


/**
 * Helper function to return encoded strings
 *
 * @return    string
 *
 * @access    public
 * @since     1.0
 */
function acoc_encode( $value ) {

  $func = 'base64' . '_encode';
  return $func( $value );
  
}

/**
 * Helper function to return decoded strings
 *
 * @return    string
 *
 * @access    public
 * @since    1.0
 */
function acoc_decode( $value ) {

  $func = 'base64' . '_decode';
  return $func( $value );
  
}

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
		'crop' => true,
		'placeholder' => NULL,
	);
	$args = array_merge($default, $args);
	
	$output = acoc_image_size('', $args['w'], $args['h'], $args['crop']);
	
	if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $args['id'] ) ){
		$thumb_id = get_post_thumbnail_id($args['id']);
		$thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
		$the_image_url = $thumb_url[0];
		if(strpos($thumb_url[0], 'default.png')){ $the_image_url = ''; }
		$output = acoc_image_size($the_image_url, $args['w'], $args['h'], $args['crop']);
	}elseif($args['placeholder'] != ''){
		$output = $args['placeholder'];
	}
	
	return $output;
}
endif;



/* Category name of the post
--------------------------------------------------------*/
function acoc_post_taxonomys_name($post_id, $taxonomy, $divider = ", "){
	$terms = get_the_terms( $post_id, $taxonomy );
						
	if ( $terms && ! is_wp_error( $terms ) ) : 
		$draught_links = array();
		foreach ( $terms as $term ) {
			$draught_links[] = $term->name;
		}					
		$on_draught = join( $divider, $draught_links );
		return $on_draught;
	else:
		return '&nbsp;';
	endif; 
}

/* Category name of the post
--------------------------------------------------------*/
function acoc_post_taxonomys_link($post_id, $taxonomy, $divider = ", "){
	$terms = get_the_terms( $post_id, $taxonomy );
						
	if ( $terms && ! is_wp_error( $terms ) ) : 
		$draught_links = array();
		foreach ( $terms as $term ) {
			$draught_links[] = '<a href="'.get_term_link($term->slug, $taxonomy).'">'.$term->name.'</a>';
		}					
		$on_draught = join( $divider, $draught_links );
		return $on_draught;
	else:
		return '&nbsp;';
	endif; 
}


/* ACOC post excerpt
--------------------------------------------------------*/
function acoc_max_charlength($charlength, $text = NULL) {
	if ($text) {
		$excerpt = $text;
	} else {
		$excerpt = get_the_excerpt();
	}

	$charlength++;
	if (strlen($excerpt)>$charlength) {
		$subex   = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
		$excut   = -(strlen($exwords[count($exwords)-1]));
		if ($excut<0) {
			return substr($subex,0,$excut);
		} else {
			return $subex;
		}
		return '..';
	} else {
		return $excerpt;
	}
}