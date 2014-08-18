<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); $prefix = 'tallykit_portfolio_';

$fields[] = array(
	'id' => $prefix.'project_url',
	'class' => '',
	'label' => __( 'Project URL', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'project_url_label',
	'class' => '',
	'label' => __( 'Project URL Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This is the Label of the project URL', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'video',
	'class' => '',
	'label' => __( 'Video oEmbed', 'tallykit_textdomain' ),
	'type' => 'textarea',
	'std' => '',
	'des' => __( 'Use this field to add video to the portfolio. Example: https://www.youtube.com/watch?v=b9OIIqG2UE8', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'client_url',
	'class' => '',
	'label' => __( 'Client URL', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'Enter the full URL including http://', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => $prefix.'client_url_label',
	'class' => '',
	'label' => __( 'Client URL Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This is the Label of the Client URL', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_portfolio_metabox',
	'title' => __( 'Portfolio Settings', 'tallykit_textdomain' ),
	'post_type' => 'tallykit_portfolio',
	'context' => 'advanced', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);