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
	'name'               => _x( 'Logos', 'post type general name', 'tallykit_textdomain' ),
	'singular_name'      => _x( 'Logo', 'post type singular name', 'tallykit_textdomain' ),
	'menu_name'          => _x( 'Logos', 'admin menu', 'tallykit_textdomain' ),
	'name_admin_bar'     => _x( 'Logo', 'add new on admin bar', 'tallykit_textdomain' ),
	'add_new'            => _x( 'Add New', 'Logo', 'tallykit_textdomain' ),
	'add_new_item'       => __( 'Add New Logo', 'tallykit_textdomain' ),
	'new_item'           => __( 'New Logo', 'tallykit_textdomain' ),
	'edit_item'          => __( 'Edit Logo', 'tallykit_textdomain' ),
	'view_item'          => __( 'View Logo', 'tallykit_textdomain' ),
	'all_items'          => __( 'All Logos', 'tallykit_textdomain' ),
	'search_items'       => __( 'Search Logos', 'tallykit_textdomain' ),
	'parent_item_colon'  => __( 'Parent Logos:', 'tallykit_textdomain' ),
	'not_found'          => __( 'No Logos found.', 'tallykit_textdomain' ),
	'not_found_in_trash' => __( 'No Logos found in Trash.', 'tallykit_textdomain' ),
);

$settings = array(
	'post_type_name'     => 'tallykit_logo',
	'args'               => array(),
	'labels'             => $labels,
	'rewrite'            => array( 'slug' => 'logo-item' ),
	'supports'           => array( 'title'),
	'menu_icon'          => 'dashicons-forms',
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
$post_columns = new acoc_post_column_editor('tallykit_logo');

 //add native column
$post_columns->add_column('title',
  array(
		'label'    => __('Title', 'tallykit_textdomain'),
		'type'     => 'native',
		'sortable' => true
	)
);
//add thumbnail column
$post_columns->add_column('post_thumb_logo',
  array(
		'label' => __('Thumb', 'tallykit_textdomain'),
		'type'  => 'text',
		'text'  => ''
	)
);
add_filter('cpt_columns_text_post_thumb_logo', 'tallykit_logo_cpt_column_Thumb_filter');
function tallykit_logo_cpt_column_Thumb_filter(){
	$meta = get_post_meta(get_the_ID(), 'tallykit_logo_image', true);
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
new acoc_post_taxonomy_filter(array('tallykit_logo' => array('tallykit_logo_category')));







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
	'taxonomy'  => 'tallykit_logo_category',
	'post_type' => 'tallykit_logo',
	'args'      => array(),
	'labels'    => $labels,
	'rewrite'   => array( 'slug' => 'logo_category' ),
	'hierarchical' => true,
);
new acoc_taxonomy_register($settings);