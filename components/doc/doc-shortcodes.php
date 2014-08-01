<?php
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/

/*---------|- Grid -|-------------------------------------*/
add_shortcode('tk_doc_archive', 'tallykit_doc_sc_archive');
function tallykit_doc_sc_archive( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'limit'            => 12,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
		), $atts)
	);
	
	
	$query = array(
		'post_type'      => 'tallykit_doc',
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

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_doc_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_doc_category',
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

	
	ob_start();
	include(tallykit_doc_template_path('dri', 'doc-archive.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}


/*---------|- Single -|-------------------------------------*/
add_shortcode('tk_doc_single', 'tallykit_doc_sc_single');
function tallykit_doc_sc_single( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id'		=> '',
		'top_nav'	=> 'no',
		'side_nav'	=> 'yes',
	), $atts ) );
	
	$output = '';
	
	$query = array(
		'post_type'      => 'tallykit_doc',
		'p'          => $id
	);
	
	ob_start();
	include(tallykit_doc_template_path('dri', 'doc-single.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}