<?php
/*************************** POST TYPE **************************
 *
 * Register Post type
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_type_register  
**/
$labels = array(
	'name'               => _x( 'Slideshows', 'post type general name', 'tallykit_textdomain' ),
	'singular_name'      => _x( 'Slideshow', 'post type singular name', 'tallykit_textdomain' ),
	'menu_name'          => _x( 'Slideshows', 'admin menu', 'tallykit_textdomain' ),
	'name_admin_bar'     => _x( 'Slideshow', 'add new on admin bar', 'tallykit_textdomain' ),
	'add_new'            => _x( 'Add New', 'Slideshow', 'tallykit_textdomain' ),
	'add_new_item'       => __( 'Add New Slideshow', 'tallykit_textdomain' ),
	'new_item'           => __( 'New Slideshow', 'tallykit_textdomain' ),
	'edit_item'          => __( 'Edit Slideshow', 'tallykit_textdomain' ),
	'view_item'          => __( 'View Slideshow', 'tallykit_textdomain' ),
	'all_items'          => __( 'All Slideshows', 'tallykit_textdomain' ),
	'search_items'       => __( 'Search Slideshows', 'tallykit_textdomain' ),
	'parent_item_colon'  => __( 'Parent Slideshows:', 'tallykit_textdomain' ),
	'not_found'          => __( 'No Slideshows found.', 'tallykit_textdomain' ),
	'not_found_in_trash' => __( 'No Slideshows found in Trash.', 'tallykit_textdomain' ),
);

$settings = array(
	'post_type_name'     => 'tallykit_slideshow',
	'args'               => array(),
	'labels'             => $labels,
	'rewrite'            => array( 'slug' => 'slideshow-item' ),
	'supports'           => array( 'title' ),
	'menu_icon'          => 'dashicons-format-gallery',
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
$post_columns = new acoc_post_column_editor('tallykit_slideshow');

 //add native column
$post_columns->add_column('title',
  array(
		'label'    => __('Title', 'tallykit_textdomain'),
		'type'     => 'native',
		'sortable' => true
	)
);
//add thumbnail column
$post_columns->add_column('post_thumb_slideshow',
  array(
		'label' => __('Thumb', 'tallykit_textdomain'),
		'type'  => 'text',
		'text'  => ''
	)
);
add_filter('cpt_columns_text_post_thumb_slideshow', 'tallykit_slideshow_cpt_column_Thumb_filter');
function tallykit_slideshow_cpt_column_Thumb_filter(){
	$meta = get_post_meta(get_the_ID(), 'tallykit_slideshow_image', true);
	$post_columns_image = ( $meta == "" ) ? 'http://placehold.it/70x70' : $meta;
	return '<img src="'. $post_columns_image .'" style="max-height:100px; max-width:100px;">';
}