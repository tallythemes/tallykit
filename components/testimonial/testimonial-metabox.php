<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); $prefix = 'tallykit_testimonial_';

$fields[] = array(
	'id' => $prefix.'image',
	'class' => '',
	'label' => __( 'User Image (300x300)', 'tallykit_textdomain' ),
	'type' => 'image_upload',
	'std' => '',
	'des' => __( '<strong>Image Size 300x300 px</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'position',
	'class' => '',
	'label' => __( 'Position Title', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Example: Funder of Google Inc', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'link',
	'class' => '',
	'label' => __( 'Website Link', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);


/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_testimonial_metabox',
	'title' => __( 'Portfolio Settings', 'tallykit_textdomain' ),
	'post_type' => 'tallykit_testimonial',
	'context' => 'advanced', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);