<?php
/**
 * TallyKit Portfolio
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package Sample
 * @subpackage Portfolio
 */
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


/*************************** POST TYPE **************************
 *
 * Register Post type
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_type_register  
**/
$labels = array(
	'name'               => _x( 'Portfolios', 'post type general name', 'tallykit_textdomain' ),
	'singular_name'      => _x( 'Portfolio', 'post type singular name', 'tallykit_textdomain' ),
	'menu_name'          => _x( 'Portfolios', 'admin menu', 'tallykit_textdomain' ),
	'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'tallykit_textdomain' ),
	'add_new'            => _x( 'Add New', 'Portfolio', 'tallykit_textdomain' ),
	'add_new_item'       => __( 'Add New Portfolio', 'tallykit_textdomain' ),
	'new_item'           => __( 'New Portfolio', 'tallykit_textdomain' ),
	'edit_item'          => __( 'Edit Portfolio', 'tallykit_textdomain' ),
	'view_item'          => __( 'View Portfolio', 'tallykit_textdomain' ),
	'all_items'          => __( 'All Portfolios', 'tallykit_textdomain' ),
	'search_items'       => __( 'Search Portfolios', 'tallykit_textdomain' ),
	'parent_item_colon'  => __( 'Parent Portfolios:', 'tallykit_textdomain' ),
	'not_found'          => __( 'No Portfolios found.', 'tallykit_textdomain' ),
	'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'tallykit_textdomain' ),
);

$settings = array(
	'post_type_name'     => 'tallykit_portfolio',
	'args'               => array(),
	'labels'             => $labels,
	'rewrite'            => array( 'slug' => 'portfolio-item' ),
	'supports'           => array( 'title', 'editor' ),
	'menu_icon'          => 'dashicons-portfolio',
);
new acoc_post_type_register($settings);
 
 
 
 
 
/*************************** Post Column **************************
 *
 * Editing the post column and adding our own content
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_column_editor  
**/
$post_columns = new acoc_post_column_editor('tallykit_portfolio');

 //add native column
$post_columns->add_column('title',
  array(
		'label'    => __('Title', 'tallykit_textdomain'),
		'type'     => 'native',
		'sortable' => true
	)
);
//add thumbnail column
$post_columns->add_column('post_thumb',
  array(
		'label' => __('Thumb', 'tallykit_textdomain'),
		'type'  => 'text',
		'text'  => ''
	)
);
add_filter('cpt_columns_text_post_thumb', 'tallykit_portfolio_cpt_column_Thumb_filter');
function tallykit_portfolio_cpt_column_Thumb_filter(){
	$meta = get_post_meta(get_the_ID(), 'tallykit_portfolio_archive_image', true);
	$post_columns_image = ( $meta == "" ) ? 'http://placehold.it/70x70' : $meta;
	return '<img src="'. $post_columns_image .'" style="max-height:100px; max-width:100px;">';
}
 
 
 
 
 
/*************************** Post Taxonomy Filter **************************
 *
 * Add Taxonomy filter for the admin post list.
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_taxonomy_filter
**/
new acoc_post_taxonomy_filter(array('tallykit_portfolio' => array('tallykit_portfolio_category')));

 
 
 
 
/**************************** Taxonomy Register *************************
 *
 * Register Taxonomy
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_taxonomy_register  
**/
$labels = array(
	'name'                       => _x( 'Categories', 'taxonomy general name', 'tallykit_textdomain' ),
	'singular_name'              => _x( 'Category', 'taxonomy singular name', 'tallykit_textdomain' ),
	'search_items'               => __( 'Search Categories', 'tallykit_textdomain' ),
	'popular_items'              => __( 'Popular Categories', 'tallykit_textdomain' ),
	'all_items'                  => __( 'All Categories', 'tallykit_textdomain' ),
	'parent_item'                => null,
	'parent_item_colon'          => null,
	'edit_item'                  => __( 'Edit Category', 'tallykit_textdomain' ),
	'update_item'                => __( 'Update Category', 'tallykit_textdomain' ),
	'add_new_item'               => __( 'Add New Category', 'tallykit_textdomain' ),
	'new_item_name'              => __( 'New Category Name', 'tallykit_textdomain' ),
	'separate_items_with_commas' => __( 'Separate Categories with commas', 'tallykit_textdomain' ),
	'add_or_remove_items'        => __( 'Add or remove Categories', 'tallykit_textdomain' ),
	'choose_from_most_used'      => __( 'Choose from the most used Categories', 'tallykit_textdomain' ),
	'not_found'                  => __( 'No Categories found.', 'tallykit_textdomain' ),
	'menu_name'                  => __( 'Categories', 'tallykit_textdomain' ),
);
$settings = array(
	'taxonomy'  => 'tallykit_portfolio_category',
	'post_type' => 'tallykit_portfolio',
	'args'      => array(),
	'labels'    => $labels,
	'rewrite'   => array( 'slug' => 'portfolio_category' ),
	'hierarchical' => true,
);
new acoc_taxonomy_register($settings);


$labels = array(
	'name'                       => _x( 'Tags', 'taxonomy general name', 'tallykit_textdomain' ),
	'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'tallykit_textdomain' ),
	'search_items'               => __( 'Search Tags', 'tallykit_textdomain' ),
	'popular_items'              => __( 'Popular Tags', 'tallykit_textdomain' ),
	'all_items'                  => __( 'All Tags', 'tallykit_textdomain' ),
	'parent_item'                => null,
	'parent_item_colon'          => null,
	'edit_item'                  => __( 'Edit Tag', 'tallykit_textdomain' ),
	'update_item'                => __( 'Update Tag', 'tallykit_textdomain' ),
	'add_new_item'               => __( 'Add New Tag', 'tallykit_textdomain' ),
	'new_item_name'              => __( 'New Tag Name', 'tallykit_textdomain' ),
	'separate_items_with_commas' => __( 'Separate Tags with commas', 'tallykit_textdomain' ),
	'add_or_remove_items'        => __( 'Add or remove Tags', 'tallykit_textdomain' ),
	'choose_from_most_used'      => __( 'Choose from the most used Tags', 'tallykit_textdomain' ),
	'not_found'                  => __( 'No Tags found.', 'tallykit_textdomain' ),
	'menu_name'                  => __( 'Tags', 'tallykit_textdomain' ),
);
$settings = array(
	'taxonomy'  => 'tallykit_portfolio_tag',
	'post_type' => 'tallykit_portfolio',
	'args'      => array(),
	'labels'    => $labels,
	'rewrite'   => array( 'slug' => 'portfolio_tag' ),
	'hierarchical' => false,
);
new acoc_taxonomy_register($settings);

 
 
 
 
 
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); $prefix = 'tallykit_portfolio_';

$fields[] = array(
	'id' => $prefix.'archive_image',
	'class' => '',
	'label' => __( 'Archive Page Image (600x400)', 'tallykit_textdomain' ),
	'type' => 'image_upload',
	'std' => '',
	'des' => __( 'This image will display on the archivbe page of the portfolio. <strong>Image Size 600x400 px</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'single_image',
	'class' => '',
	'label' => __( 'Single Page Image (960x400)', 'tallykit_textdomain' ),
	'type' => 'image_upload',
	'std' => '',
	'des' => __( 'This image will display on the single page of the portfolio. <strong>Image Size 960x400 px</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'project_url',
	'class' => '',
	'label' => __( 'Project URL', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'project_url_label',
	'class' => '',
	'label' => __( 'Project URL Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This is the Label of the project URL', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'video',
	'class' => '',
	'label' => __( 'Video oEmbed', 'tallykit_textdomain' ),
	'type' => 'textarea',
	'std' => '',
	'des' => __( 'Use this field to add video to the portfolio. Example: https://www.youtube.com/watch?v=b9OIIqG2UE8', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'client_url',
	'class' => '',
	'label' => __( 'Client URL', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'client_url_label',
	'class' => '',
	'label' => __( 'Client URL Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This is the Label of the Client URL', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_portfolio_metabox',
	'title' => __( 'Portfolio Settings', 'tallykit_textdomain' ),
	'post_type' => 'tallykit_portfolio',
	'context' => 'advanced', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);
 
 
 
 
 
/*************************** Options **************************
 *
 * Register Options
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_setting_api_class  
**/
$fields = array();


$fields[] = array(
	'id' => 'heading_1',
	'class' => '',
	'label' => __( 'Image Size', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect image size on the frontend.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'archive_image_w',
	'class' => '',
	'label' => __( 'Archive Image Width', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Width of the archive image. Leave it blank if you want to use the default. Example: <code>300</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'archive_image_h',
	'class' => '',
	'label' => __( 'Archive Image Height', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Height of the archive image. Leave it blank if you want to use the default. Example: <code>300</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'single_image_w',
	'class' => '',
	'label' => __( 'Single Page Image Width', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Width of the Single Page image. Leave it blank if you want to use the default. Example: <code>960</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'single_image_h',
	'class' => '',
	'label' => __( 'Single Page Image Height', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Height of the Single Page image. Leave it blank if you want to use the default. Example: <code>300</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'heading_2',
	'class' => '',
	'label' => __( 'Portfolio PostType Options', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect Portfolio PostType\'s <strong>slug</strong> and  <strong>label</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'singuler_post_label',
	'class' => '',
	'label' => __( 'Singuler Post Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'plural_post_label',
	'class' => '',
	'label' => __( 'Plural Post Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'post_slug',
	'class' => '',
	'label' => __( 'Post Slug', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => 'portfolio-item',
	'des' => __( 'This is the base slug of the portfoio', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'heading_3',
	'class' => '',
	'label' => __( 'Portfolio Category Options', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect Portfolio Category\'s <strong>slug</strong> and  <strong>label</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'singuler_cat_label',
	'class' => '',
	'label' => __( 'Singuler Category Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'plural_cat_label',
	'class' => '',
	'label' => __( 'Plural Category Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'cat_slug',
	'class' => '',
	'label' => __( 'Category Slug', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => 'portfolio_category',
	'des' => __( 'This is the base slug of the Category', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'heading_3',
	'class' => '',
	'label' => __( 'Portfolio Tags Options', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect Portfolio Category\'s <strong>slug</strong> and  <strong>label</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'singuler_tag_label',
	'class' => '',
	'label' => __( 'Singuler Tag Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'plural_tag_label',
	'class' => '',
	'label' => __( 'Plural Tag Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'tag_slug',
	'class' => '',
	'label' => __( 'Tags Slug', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => 'portfolio_tag',
	'des' => __( 'This is the base slug of the Tag', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

/*~ Registering the Options ~*/
$settings = array(
	'id' => 'tallykit_portfolio_options',
	'option_name' => 'tallykit_portfolio',
	'page_title' => "Portfolio Settings",
	'menu_title' => "Settings",
	'capability' => 'manage_options',
	'menu_slug' => 'tallykit_portfolio_options',
	'parent_slug' => 'edit.php?post_type=tallykit_portfolio',
	'icon_url' => NULL,
	'position' => NULL,
	'fields' => $fields,
);

new acoc_setting_api_class($settings);
 
 
 
 
 
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
function tallykit_portfolio_template_path($type='url'){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'portfolio/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'portfolio/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'portfolio/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'portfolio/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'portfolio/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'portfolio/templates/',
	);
	$template = new acoc_template_file_loader($settings);
	
	if($type == 'url'){
		return $template->url();
	}else{
		return $template->dri();
	}
}
 
 
 
 
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_portfolio_script_loader');
function tallykit_portfolio_script_loader(){
	wp_enqueue_script( 'jquery-easing');
	wp_enqueue_script( 'jquery-flexslider');
	wp_enqueue_script( 'jquery-prettyPhoto');
	wp_enqueue_script( 'jquery-imagesloaded');
	wp_enqueue_script( 'jquery-isotope');
	
	wp_enqueue_style( 'acoc-flexslider');
	wp_enqueue_style( 'jquery-prettyPhoto');
	wp_enqueue_style( 'font-awesome');
	
	wp_enqueue_script( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'portfolio/assets/js/portfolio.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'portfolio/assets/css/portfolio.css', '', '1.0' );
}
 
 
 
 
 
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
			'limit'           => 10,
			'columns'          => 3,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			'filter'		   => 'yes',
			'margin'		   => '1'
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
			
			'controlNav'       => 'true',
			'directionNav'     => 'true',
			'itemWidth'        => '0',
			'itemMargin'       => '0',
			'minItems'         => '0',
			'maxItems'         => '0',
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
			'direction'        => 'horizontal',
			'smoothHeight'     => 'false',
			'slideshow'        => 'true',
			'animationLoop'    => 'true',
			'slideshowSpeed'   => '7000',
			'animationSpeed'   => '600',
			'controlNav'       => 'true',
			'directionNav'     => 'true',
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
		'title'	=> 'Title',
		'class'	=> '',
	), $atts ) );
	$output = '';
	
	return $output; 
}
  
 
 
 
 
 
 
/*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_tinymce_register  
**/
   
 
 
 
 
 
 
/*************************** Widgets *****************************
 *
 * Register Widgets
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_widget_register  
**/
    
 
 
 
 
 
 
/*************************** Theme Compat *****************************
 *
 * Making the Component compatible with any theme
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_theme_compat
**/