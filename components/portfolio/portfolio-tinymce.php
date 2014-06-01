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

/*---------|- Portfolio Grid -|----------*/
$tinymce_fields[] = array(
	'title' => 'Portfolio Grid',
	'shortcode' => 'tk_portfolio_grid',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_portfolio_category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_portfolio_category'
		),
		array(
			'id' => 'tags',
			'class' => '',
			'label' => 'Tags',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more Tag to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_portfolio_tag'
		),
		array(
			'id' => 'exclude_tags',
			'class' => '',
			'label' => 'Exclude Tags',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more Tag to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_portfolio_tag'
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
			'des' => __( 'How many Portfolio item you want to display?', 'tallykit_textdomain' ),
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
	)
);


$settings = array(
	'uid' => 'tallykit_portfolio_tinymce',
	'button_title' => 'Portfolio',
	'button_url' => '',
	'title' => 'Portfolio Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_shortcode_tinymce = new acoc_tinymce_register($settings);