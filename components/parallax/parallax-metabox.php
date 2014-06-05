<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); 

$fields[] = array(
	'id' => 'tallykit_parallax_sections',
	'class' => '',
	'label' => __( 'Archive Page Image (600x400)', 'tallykit_textdomain' ),
	'type' => 'parallax',
	'std' => '',
	'des' => __( 'Click on "Add Section" to add new sections', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
	'size' => '',
);

/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_parallax_metabox',
	'title' => __( 'Parallax Sections', 'tallykit_textdomain' ),
	'post_type' => 'page',
	'context' => 'advanced', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);