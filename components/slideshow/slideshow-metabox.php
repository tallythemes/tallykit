<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); $prefix = 'tallykit_slideshow_';

$fields[] = array(
	'id' => 'tallykit_slideshow_sliders',
	'class' => '',
	'label' => __( 'Slider Items', 'tallykit_textdomain' ),
	'type' => 'slideshow2',
	'std' => '',
	'des' => __( 'Click on Add New to add new slideshow', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
	'fields' => array(
		array(
			'id' => 'title',
			'class' => '',
			'label' => __( 'Slider Items', 'tallykit_textdomain' ),
			'type' => 'text',
			'std' => '',
			'des' => __( 'Click on Add New to add new slideshow', 'tallykit_textdomain' ),
			'filter' => '', //sanitize_text_field, esc_attr
		),
		array(
			'id' => 'titles',
			'class' => '',
			'label' => __( 'Slider Items', 'tallykit_textdomain' ),
			'type' => 'text',
			'std' => '',
			'des' => __( 'Click on Add New to add new slideshow', 'tallykit_textdomain' ),
			'filter' => '', //sanitize_text_field, esc_attr
		)
	),
);


/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_slideshow_metabox',
	'title' => __( 'Slideshow Settings', 'tallykit_textdomain' ),
	'post_type' => 'tallykit_slideshow',
	'context' => 'advanced', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);