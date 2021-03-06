<?php
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.6)
 *
 * @uses filter add_shortcode  
**/

/*---------|- Grid -|-------------------------------------*/
add_shortcode('tk_album', 'tallykit_gallery_album_sc_grid');
function tallykit_gallery_album_sc_grid( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'tags'             => '',
			'exclude_tags'     => '',
			'relation'         => 'AND',
			'limit'            => 12,
			'columns'          => 3,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'				=> '',
			'filter'			=> 'yes',
			'margin'			=> '3',
			'pagination'		=> 'yes',
			'image_size'		=> ''
		), $atts)
	);
	
	if(tallykit_get_settings('tk_album') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'tallykit_gallery',
		'posts_per_page' => $limit,
		'orderby'        => $orderby,
		'order'          => $order
	);

	switch ( $orderby ) {
		case 'title':
			$query['orderby'] = 'title';
		break;

		case 'id':
			$query['orderby'] = 'ID';
		break;

		case 'random':
			$query['orderby'] = 'rand';
		break;

		default:
			$query['orderby'] = 'post_date';
		break;
	}

	if ( $category || $exclude_category) {
		$query['tax_query'] = array(
			'relation'     => $relation
		);

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_gallery_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_gallery_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}
	}

	if( ! empty( $ids ) )
		$query['post__in'] = explode( ',', $ids );

	if ( get_query_var( 'paged' ) )
		$query['paged'] = get_query_var('paged');
	else if ( get_query_var( 'page' ) )
		$query['paged'] = get_query_var( 'page' );
	else
		$query['paged'] = 1;
		
		
	if($image_size != ''){
		$image_size = explode("x", $image_size);
	}else{
		$image_size = array(TALLYKIT_GALLERY_ALBUM_WIDTH, TALLYKIT_GALLERY_ALBUM_HEIGHT);
	}

	
	ob_start();
	include(tallykit_gallery_template_path('dri', 'gallery-grid.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}



/*---------|- Single -|-------------------------------------*/
add_shortcode('tk_gallery', 'tallykit_gallery_sc_single');
function tallykit_gallery_sc_single( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id'		=> '',
		'slug'		=> '',
		'columns'	=> '3',
		'margin'	=> '3',
		'image_size'	=> ''
	), $atts ) );
	
	if(tallykit_get_settings('tk_gallery') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	if($id == ''){
		$get_id = get_posts(array(
			'name' => $slug,
			'post_type' => 'tallykit_gallery',
			'post_status' => 'publish',
			'posts_per_page' => 1
		));
		if( $get_id ) {
			$id = $get_id[0]->ID;
		}
	}
	
	if($image_size != ''){
		$image_size = explode("x", $image_size);
	}else{
		$image_size = array(TALLYKIT_GALLERY_SINGLE_WIDTH, TALLYKIT_GALLERY_SINGLE_HEIGHT);
	}
	
	$output = '';
	
	ob_start();
	include(tallykit_gallery_template_path('dri', 'gallery-single.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}
