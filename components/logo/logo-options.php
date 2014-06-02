<?php
/*************************** Options **************************
 *
 * Register Options
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_setting_api_class  
**/
$fields = array();

$fields[] = array(
	'id' => 'heading_2',
	'class' => '',
	'label' => __( 'Logo PostType Options', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect Logo PostType\'s <strong>slug</strong> and  <strong>label</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'singuler_post_label',
	'class' => '',
	'label' => __( 'Singuler Post Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'plural_post_label',
	'class' => '',
	'label' => __( 'Plural Post Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'post_slug',
	'class' => '',
	'label' => __( 'Post Slug', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => 'logo-item',
	'des' => __( 'This is the base slug of the portfoio', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'heading_3',
	'class' => '',
	'label' => __( 'Logo Category Options', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect Logo Category\'s <strong>slug</strong> and  <strong>label</strong>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'singuler_cat_label',
	'class' => '',
	'label' => __( 'Singuler Category Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'plural_cat_label',
	'class' => '',
	'label' => __( 'Plural Category Label', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'This will affect on the backend only.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'cat_slug',
	'class' => '',
	'label' => __( 'Category Slug', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => 'logo_category',
	'des' => __( 'This is the base slug of the Category', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

/*~ Registering the Options ~*/
$settings = array(
	'id' => 'tallykit_logo_options',
	'option_name' => 'tallykit_logo',
	'page_title' => "Logo Settings",
	'menu_title' => "Settings",
	'capability' => 'manage_options',
	'menu_slug' => 'tallykit_logo_options',
	'parent_slug' => 'edit.php?post_type=tallykit_logo',
	'icon_url' => NULL,
	'position' => NULL,
	'fields' => $fields,
);

new acoc_setting_api_class($settings);