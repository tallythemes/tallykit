<?php
/*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_tinymce_register  
**/
$tinymce_fields = array();

/*---------|- Doc Grid -|----------*/
$tinymce_fields[] = array(
	'title' => 'Doc Archive',
	'shortcode' => 'tk_doc_archive',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_doc_category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_doc_category'
		),
		array(
			'id' => 'limit',
			'class' => '',
			'label' => 'Limit',
			'type' => 'text',
			'std' => '12',
			'des' => __( 'How many Doc item you want to display?', 'tallykit_textdomain' ),
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
			'label' => 'Doc IDs',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_doc'
		),
	)
);

/*---------|- Doc Single -|----------*/
$tinymce_fields[] = array(
	'title' => 'Doc Single',
	'shortcode' => 'tk_doc_single',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'id',
			'class' => '',
			'label' => 'Doc ID',
			'type' => 'post_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_doc'
		),
	)
);


$settings = array(
	'uid' => 'tallykit_doc_tinymce',
	'button_title' => '<div class="dashicons dashicons-welcome-learn-more" style="line-height:24px;"></div>',
	'button_url' => '',
	'title' => 'Doc Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_shortcode_tinymce = new acoc_tinymce_register($settings);