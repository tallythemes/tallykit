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

/*---------|- People Grid -|----------*/
$tinymce_fields[] = array(
	'title' => 'People Grid',
	'shortcode' => 'tk_people_grid',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_category'
		),
		array(
			'id' => 'tags',
			'class' => '',
			'label' => 'Tags',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more Tag to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_tag'
		),
		array(
			'id' => 'exclude_tags',
			'class' => '',
			'label' => 'Exclude Tags',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more Tag to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_tag'
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
			'des' => __( 'How many People item you want to display?', 'tallykit_textdomain' ),
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
			'label' => 'People IDs',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_people'
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
	)
);



/*---------|- People carousel -|----------*/
$tinymce_fields[] = array(
	'title' => 'People Carousel',
	'shortcode' => 'tk_people_carousel',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_category'
		),
		array(
			'id' => 'tags',
			'class' => '',
			'label' => 'Tags',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more Tag to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_tag'
		),
		array(
			'id' => 'exclude_tags',
			'class' => '',
			'label' => 'Exclude Tags',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more Tag to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_tag'
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
			'des' => __( 'How many People item you want to display?', 'tallykit_textdomain' ),
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
			'label' => 'People IDs',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_people'
		),
		array(
			'id' => 'control_nav',
			'class' => '',
			'label' => 'controlNav',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		),
		array(
			'id' => 'direction_nav',
			'class' => '',
			'label' => 'directionNav',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		),
		array(
			'id' => 'item_width',
			'class' => '',
			'label' => 'itemWidth',
			'type' => 'text',
			'std' => '100',
			'des' => '',
		),
		array(
			'id' => 'item_margin',
			'class' => '',
			'label' => 'itemMargin',
			'type' => 'text',
			'std' => '10',
			'des' => '',
		),
		array(
			'id' => 'min_items',
			'class' => '',
			'label' => 'minItems',
			'type' => 'text',
			'std' => '2',
			'des' => '',
		),
		array(
			'id' => 'max_items',
			'class' => '',
			'label' => 'maxItems',
			'type' => 'text',
			'std' => '4',
			'des' => '',
		),
		array(
			'id' => 'move',
			'class' => '',
			'label' => 'move',
			'type' => 'text',
			'std' => '0',
			'des' => '',
		),
	)
);



/*---------|- People Slideshow -|----------*/
$tinymce_fields[] = array(
	'title' => 'People Slideshow',
	'shortcode' => 'tk_people_slideshow',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'tallykit_people_category'
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
			'des' => __( 'How many People item you want to display?', 'tallykit_textdomain' ),
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
			'label' => 'People IDs',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_people'
		),
		
		
		array(
			'id' => 'animation',
			'class' => '',
			'label' => 'Animation',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'slide', 'value' => 'slide'),
				array('label' => 'fade', 'value' => 'fade'),
			)
		),         
		array(
			'id' => 'direction',
			'class' => '',
			'label' => 'Direction',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'horizontal', 'value' => 'horizontal'),
				array('label' => 'vertical', 'value' => 'vertical'),
			)
		), 
		array(
			'id' => 'smooth_height',
			'class' => '',
			'label' => 'SmoothHeight',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'false', 'value' => 'false'),
				array('label' => 'true', 'value' => 'true'),
			)
		), 
		array(
			'id' => 'slideshow',
			'class' => '',
			'label' => 'Slideshow',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		),
		array(
			'id' => 'animation_loop',
			'class' => '',
			'label' => 'AnimationLoop',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		),
		array(
			'id' => 'slideshow_speed',
			'class' => '',
			'label' => 'slideshowspeed',
			'type' => 'text',
			'std' => '7000',
			'des' => '',
		),
		array(
			'id' => 'animation_speed',
			'class' => '',
			'label' => 'animationspeed',
			'type' => 'text',
			'std' => '600',
			'des' => '',
		),
		array(
			'id' => 'control_nav',
			'class' => '',
			'label' => 'controlNav',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		),
		array(
			'id' => 'direction_nav',
			'class' => '',
			'label' => 'directionNav',
			'type' => 'select',
			'std' => 'true',
			'des' => '',
			'options' => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		),
	)
);



/*---------|- People Single -|----------*/
$tinymce_fields[] = array(
	'title' => 'People Single',
	'shortcode' => 'tk_people_single',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'id',
			'class' => '',
			'label' => 'People ID',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_people'
		),
	)
);


$settings = array(
	'uid' => 'tallykit_people_tinymce',
	'button_title' => '<div class="dashicons dashicons-groups" style="line-height:24px;"></div>',
	'button_url' => '',
	'title' => 'People Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_shortcode_tinymce = new acoc_tinymce_register($settings);