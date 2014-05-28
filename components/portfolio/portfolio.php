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
		'text'  => '<img src="http://placehold.it/100x100">'
	)
);
//remove date column
$post_columns->remove_column('date');
 
 
 
 
 
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

/*$fields[] = array(
	'id' => $prefix.'images',
	'class' => '',
	'label' => __( 'Additioanal Images', 'tallykit_textdomain' ),
	'type' => 'list_item',
	'std' => '',
	'des' => __( 'Add Additioanal images to display as gallery', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
	'settings' => array(
		array(
			'id' => 'image',
			'class' => '',
			'label' => __( 'image', 'tallykit_textdomain' ),
			'type' => 'text',
			'std' => '',
			'des' => '',
			'filter' => '', //sanitize_text_field, esc_attr
		)
	),
);*/

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
 
 
 
 
 
 
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
 
 
 
 
 
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
 
 
 
 
 
 
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/
  
 
 
 
 
 
 
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