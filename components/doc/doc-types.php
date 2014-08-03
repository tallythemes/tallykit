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
	'name'               => _x( 'Docs', 'post type general name', 'tallykit_textdomain' ),
	'singular_name'      => _x( 'Doc', 'post type singular name', 'tallykit_textdomain' ),
	'menu_name'          => _x( 'Docs', 'admin menu', 'tallykit_textdomain' ),
	'name_admin_bar'     => _x( 'Doc', 'add new on admin bar', 'tallykit_textdomain' ),
	'add_new'            => _x( 'Add New', 'Doc', 'tallykit_textdomain' ),
	'add_new_item'       => __( 'Add New Doc', 'tallykit_textdomain' ),
	'new_item'           => __( 'New Doc', 'tallykit_textdomain' ),
	'edit_item'          => __( 'Edit Doc', 'tallykit_textdomain' ),
	'view_item'          => __( 'View Doc', 'tallykit_textdomain' ),
	'all_items'          => __( 'All Docs', 'tallykit_textdomain' ),
	'search_items'       => __( 'Search Docs', 'tallykit_textdomain' ),
	'parent_item_colon'  => __( 'Parent Docs:', 'tallykit_textdomain' ),
	'not_found'          => __( 'No Docs found.', 'tallykit_textdomain' ),
	'not_found_in_trash' => __( 'No Docs found in Trash.', 'tallykit_textdomain' ),
);

$settings = array(
	'post_type_name'     => 'tallykit_doc',
	'args'               => array(),
	'labels'             => $labels,
	'rewrite'            => array( 'slug' => 'doc-item' ),
	'supports'           => array( 'title', 'editor' ),
	'menu_icon'          => 'dashicons-welcome-learn-more',
);
new acoc_post_type_register($settings);





 /*************************** Post Taxonomy Filter **************************
 *
 * Add Taxonomy filter for the admin post list.
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_post_taxonomy_filter
**/
new acoc_post_taxonomy_filter(array('tallykit_doc' => array('tallykit_doc_category')));







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
	'taxonomy'  => 'tallykit_doc_category',
	'post_type' => 'tallykit_doc',
	'args'      => array(),
	'labels'    => $labels,
	'rewrite'   => array( 'slug' => 'doc_category' ),
	'hierarchical' => true,
);
new acoc_taxonomy_register($settings);