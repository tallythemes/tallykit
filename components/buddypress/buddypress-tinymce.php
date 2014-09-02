<?php
/*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (3.0)
 *
 * @uses class acoc_tinymce_register  
**/
$tinymce_fields = array();

/*---------|- BuddyPress Members -|----------*/
$tinymce_fields[] = array(
	'title' => 'Members',
	'shortcode' => 'tk_buddypress_members',
	'content' => 'no',//yes, no
	'fields' => array(
	
		array(
			'id' => 'limit',
			'class' => '',
			'label' => 'Limit',
			'type' => 'text',
			'std' => '12',
			'des' => __( 'How many Members you want to display?', 'tallykit_textdomain' ),
		),
		array(
			'id' => 'columns',
			'class' => '',
			'label' => 'Columns',
			'type' => 'select',
			'std' => '4',
			'des' => '',
			'options' => array(
				array('label' => '1', 'value' => '1'),
				array('label' => '2', 'value' => '2'),
				array('label' => '3', 'value' => '3'),
				array('label' => '4', 'value' => '4'),
				array('label' => '5', 'value' => '5'),
				array('label' => '6', 'value' => '6'),
				array('label' => '7', 'value' => '7'),
				array('label' => '8', 'value' => '8'),
			)
		),
		array(
			'id' => 'column_margin',
			'class' => '',
			'label' => 'Column Margin',
			'type' => 'text',
			'std' => '2',
			'des' => '',
		),
		array(
			'id' => 'type',
			'class' => '',
			'label' => 'Default members to show',
			'type' => 'select',
			'std' => 'active',
			'des' => '',
			'options' => array(
				array('label' => 'newest', 'value' => 'newest'),
				array('label' => 'active', 'value' => 'active'),
				array('label' => 'popular', 'value' => 'popular'),
			)
		),
		array(
			'id' => 'pagination',
			'class' => '',
			'label' => 'Pagination',
			'type' => 'select',
			'std' => 'no',
			'des' => '',
			'options' => array(
				array('label' => 'Yes', 'value' => 'yes'),
				array('label' => 'No', 'value' => 'no'),
			)
		),
	)
);


/*---------|- BuddyPress Groups -|----------*/
$tinymce_fields[] = array(
	'title' => 'Groups',
	'shortcode' => 'tk_buddypress_groups',
	'content' => 'no',//yes, no
	'fields' => array(
	
		array(
			'id' => 'limit',
			'class' => '',
			'label' => 'Limit',
			'type' => 'text',
			'std' => '12',
			'des' => __( 'How many groups you want to display?', 'tallykit_textdomain' ),
		),
		array(
			'id' => 'columns',
			'class' => '',
			'label' => 'Columns',
			'type' => 'select',
			'std' => '4',
			'des' => '',
			'options' => array(
				array('label' => '1', 'value' => '1'),
				array('label' => '2', 'value' => '2'),
				array('label' => '3', 'value' => '3'),
				array('label' => '4', 'value' => '4'),
				array('label' => '5', 'value' => '5'),
				array('label' => '6', 'value' => '6'),
				array('label' => '7', 'value' => '7'),
				array('label' => '8', 'value' => '8'),
			)
		),
		array(
			'id' => 'column_margin',
			'class' => '',
			'label' => 'Column Margin',
			'type' => 'text',
			'std' => '2',
			'des' => '',
		),
		array(
			'id' => 'type',
			'class' => '',
			'label' => 'Default members to show',
			'type' => 'select',
			'std' => 'active',
			'des' => '',
			'options' => array(
				array('label' => 'newest', 'value' => 'newest'),
				array('label' => 'active', 'value' => 'active'),
				array('label' => 'popular', 'value' => 'popular'),
			)
		),
		array(
			'id' => 'pagination',
			'class' => '',
			'label' => 'Pagination',
			'type' => 'select',
			'std' => 'no',
			'des' => '',
			'options' => array(
				array('label' => 'Yes', 'value' => 'yes'),
				array('label' => 'No', 'value' => 'no'),
			)
		),
	)
);

$settings = array(
	'uid' => 'tallykit_buddypress_tinymce',
	'button_title' => '<img src="'.TALLYKIT_URL.'components/buddypress/assets/images/buddypress-shortcode-icon.png" style="width: 20px;padding: 0;margin-top: -3px;" />',
	'button_url' => '',
	'title' => 'BuddyPress Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_buddypress_tinymce = new acoc_tinymce_register($settings);