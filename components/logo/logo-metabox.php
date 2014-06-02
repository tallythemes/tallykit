<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); $prefix = 'tallykit_logo_';

$fields[] = array(
	'id' => $prefix.'image',
	'class' => '',
	'label' => __( 'Logo Image', 'tallykit_textdomain' ),
	'type' => 'image_upload',
	'std' => '',
	'des' => __( 'Upload the logo image.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
	'size' => '400x400',
);
$fields[] = array(
	'id' => $prefix.'external_link',
	'class' => '',
	'label' => __( 'External link', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full path including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);


/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_logo_metabox',
	'title' => __( 'Logo Settings', 'tallykit_textdomain' ),
	'post_type' => 'tallykit_logo',
	'context' => 'advanced', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);