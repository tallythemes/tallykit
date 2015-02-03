<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); $prefix = 'tallykit_people_';

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
$fields[] = array(
	'id' => $prefix.'phone',
	'class' => '',
	'label' => __( 'Phone', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Phone Number to contact.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'email',
	'class' => '',
	'label' => __( 'Email', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Email Address to contact.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => $prefix.'heading_1',
	'class' => '',
	'label' => __( 'Social Icons', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect the social icons of the people', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => $prefix.'twitter',
	'class' => '',
	'label' => __( 'Twitter', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'facebook',
	'class' => '',
	'label' => __( 'Facebook', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'linkedin',
	'class' => '',
	'label' => __( 'LinkedIn', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'google',
	'class' => '',
	'label' => __( 'Google Plus', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'dribbble',
	'class' => '',
	'label' => __( 'Dribbble', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'flickr',
	'class' => '',
	'label' => __( 'Flickr', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'pinterest',
	'class' => '',
	'label' => __( 'Pinterest', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'vimeo',
	'class' => '',
	'label' => __( 'Vimeo', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'youtube',
	'class' => '',
	'label' => __( 'Youtube', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);


/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_people_metabox',
	'title' => __( 'People Settings', 'tallykit_textdomain' ),
	'post_type' => 'tallykit_people',
	'context' => 'advanced', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);