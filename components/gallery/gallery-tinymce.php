<?php
/*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (1.6)
 *
 * @uses class acoc_tinymce_register  
**/
$tinymce_fields = array();

/*---------|- Gallery Grid -|----------*/
$tinymce_fields[] = array(
	'title' => 'Album',
	'shortcode' => 'tk_album',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_gallery_category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_gallery_category'
		),
		array(
			'id' => 'relation',
			'class' => '',
			'label' => 'Relation',
			'type' => 'select',
			'std' => '',
			'des' => __( 'Query Relation with tags and Category', 'tallykit_textdomain' ),
			'options' => array(
				array('label' => 'AND', 'value' => 'AND'),
				array('label' => 'OR', 'value' => 'OR'),
			)
		),
		array(
			'id' => 'limit',
			'class' => '',
			'label' => 'Limit',
			'type' => 'text',
			'std' => '12',
			'des' => __( 'How many Gallery item you want to display?', 'tallykit_textdomain' ),
		),
		array(
			'id' => 'columns',
			'class' => '',
			'label' => 'Columns',
			'type' => 'select',
			'std' => '3',
			'des' => '',
			'options' => array(
				array('label' => '2', 'value' => '2'),
				array('label' => '3', 'value' => '3'),
				array('label' => '4', 'value' => '4'),
				array('label' => '5', 'value' => '5'),
			)
		),
		array(
			'id' => 'orderby',
			'class' => '',
			'label' => 'Orderby',
			'type' => 'select',
			'std' => 'post_date',
			'des' => '',
			'options' => array(
				array('label' => 'post_date', 'value' => 'post_date'),
				array('label' => 'none', 'value' => 'none'),
				array('label' => 'ID', 'value' => 'ID'),
				array('label' => 'title', 'value' => 'title'),
				array('label' => 'name', 'value' => 'name'),
				array('label' => 'date', 'value' => 'date'),
				array('label' => 'menu_order', 'value' => 'menu_order'),
			)
		),
		array(
			'id' => 'order',
			'class' => '',
			'label' => 'Order',
			'type' => 'select',
			'std' => 'DESC',
			'des' => '',
			'options' => array(
				array('label' => 'DESC', 'value' => 'DESC'),
				array('label' => 'ASC', 'value' => 'ASC'),
			)
		),
		array(
			'id' => 'ids',
			'class' => '',
			'label' => 'Gallery IDs',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_gallery'
		),
		array(
			'id' => 'filter',
			'class' => '',
			'label' => 'Filter',
			'type' => 'select',
			'std' => 'yes',
			'des' => '',
			'options' => array(
				array('label' => 'yes', 'value' => 'yes'),
				array('label' => 'no', 'value' => 'no'),
			)
		),
		array(
			'id' => 'margin',
			'class' => '',
			'label' => 'Column Margin',
			'type' => 'text',
			'std' => '3',
			'des' => '',
		),
		array(
			'id' => 'pagination',
			'class' => '',
			'label' => 'Pagination',
			'type' => 'select',
			'std' => 'yes',
			'des' => '',
			'options' => array(
				array('label' => 'yes', 'value' => 'yes'),
				array('label' => 'no', 'value' => 'no'),
			)
		),
		array(
			'id' => 'image_size',
			'class' => '',
			'label' => 'Image Size',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);

/*---------|- Gallery Single -|----------*/
$tinymce_fields[] = array(
	'title' => 'Gallery',
	'shortcode' => 'tk_gallery',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'slug',
			'class' => '',
			'label' => 'Select A Gallery',
			'type' => 'post_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_gallery',
			'output' => 'slug',
		),
		array(
			'id' => 'columns',
			'class' => '',
			'label' => 'Columns',
			'type' => 'select',
			'std' => '3',
			'des' => '',
			'options' => array(
				array('label' => '2', 'value' => '2'),
				array('label' => '3', 'value' => '3'),
				array('label' => '4', 'value' => '4'),
				array('label' => '5', 'value' => '5'),
			)
		),
		array(
			'id' => 'margin',
			'class' => '',
			'label' => 'Column Margin',
			'type' => 'text',
			'std' => '3',
			'des' => '',
		),
		array(
			'id' => 'image_size',
			'class' => '',
			'label' => 'Image Size',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


$settings = array(
	'uid' => 'tallykit_gallery_tinymce',
	'button_title' => '<div class="dashicons dashicons-images-alt" style="line-height:24px;"></div>',
	'button_url' => '',
	'title' => 'Gallery Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_shortcode_tinymce = new acoc_tinymce_register($settings);