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
add_shortcode('tk_portfolio_grid', 'tallykit_portfolio_sc_grid');
function tallykit_portfolio_sc_grid( $atts, $content = null ) {
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
			'ids'              => '',
			'filter'		   => 'yes',
			'margin'		   => '3'
		), $atts)
	);
	
	
	$query = array(
		'post_type'      => 'tallykit_portfolio',
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

	if ( $tags || $category || $exclude_category || $exclude_tags ) {
		$query['tax_query'] = array(
			'relation'     => $relation
		);

		if ( $tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $tags ),
				'field'    => 'slug'
			);
		}

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}

		if ( $exclude_tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $exclude_tags ),
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
	include(tallykit_portfolio_template_path('dri').'portfolio-grid.php');
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}

/*---------|- carousel -|-------------------------------------*/
add_shortcode('tk_portfolio_carousel', 'tallykit_portfolio_sc_carousel');
function tallykit_portfolio_sc_carousel( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'tags'             => '',
			'exclude_tags'     => '',
			'relation'         => 'AND',
			'limit'            => 10,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			
			'control_nav'       => 'true',
			'direction_nav'     => 'true',
			'item_width'        => '100',
			'item_margin'       => '10',
			'min_items'         => '2',
			'max_items'         => '3',
			'move'             => '0',
		), $atts)
	);
	
	
	$query = array(
		'post_type'      => 'tallykit_portfolio',
		'posts_per_page' => absint( $limit ),
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

	if ( $tags || $category || $exclude_category || $exclude_tags ) {
		$query['tax_query'] = array(
			'relation'     => $relation
		);

		if ( $tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $tags ),
				'field'    => 'slug'
			);
		}

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}

		if ( $exclude_tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $exclude_tags ),
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
	include(tallykit_portfolio_template_path('dri').'portfolio-carousel.php');
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}


/*---------|- Slideshow -|-------------------------------------*/
add_shortcode('tk_portfolio_slideshow', 'tallykit_portfolio_sc_slideshow');
function tallykit_portfolio_sc_slideshow( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'tags'             => '',
			'exclude_tags'     => '',
			'relation'         => 'AND',
			'limit'            => 10,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			
			'animation'        => 'slide',
			'direction'     => '',
			'smooth_height'     => 'false',
			'slideshow'        => 'true',
			'animation_loop'    => 'true',
			'slideshow_speed'   => '7000',
			'animation_speed'   => '600',
			'control_nav'       => 'true',
			'direction_nav'     => 'true',
		), $atts)
	);
	
	$query = array(
		'post_type'      => 'tallykit_portfolio',
		'posts_per_page' => absint( $limit ),
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

	if ( $tags || $category || $exclude_category || $exclude_tags ) {
		$query['tax_query'] = array(
			'relation'     => $relation
		);

		if ( $tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $tags ),
				'field'    => 'slug'
			);
		}

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}

		if ( $exclude_tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $exclude_tags ),
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
	include(tallykit_portfolio_template_path('dri').'portfolio-slideshow.php');
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}


/*---------|- List -|-------------------------------------*/
add_shortcode('tk_portfolio_list', 'tallykit_portfolio_sc_list');
function tallykit_portfolio_sc_list( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'category'         => '',
			'exclude_category' => '',
			'tags'             => '',
			'exclude_tags'     => '',
			'relation'         => 'AND',
			'limit'            => 5,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			'filter'		   => 'yes',
		), $atts)
	);
	
	$query = array(
		'post_type'      => 'tallykit_portfolio',
		'posts_per_page' => absint( $limit ),
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

	if ( $tags || $category || $exclude_category || $exclude_tags ) {
		$query['tax_query'] = array(
			'relation'     => $relation
		);

		if ( $tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $tags ),
				'field'    => 'slug'
			);
		}

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}

		if ( $exclude_tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'tallykit_portfolio_tag',
				'terms'    => explode( ',', $exclude_tags ),
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
	include(tallykit_portfolio_template_path('dri').'portfolio-list.php');
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}


/*---------|- Single -|-------------------------------------*/
add_shortcode('tk_portfolio_single', 'tallykit_portfolio_sc_single');
function tallykit_portfolio_sc_single( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id'	=> '',
	), $atts ) );
	
	$output = '';
	
	$query = array(
		'post_type'      => 'tallykit_portfolio',
		'p'          => $id
	);
	
	ob_start();
	include(tallykit_portfolio_template_path('dri').'portfolio-single.php');
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}
