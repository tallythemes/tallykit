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
	'id' => 'heading_1',
	'class' => '',
	'label' => __( 'Image Size', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect image size on the frontend.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'archive_image_w',
	'class' => '',
	'label' => __( 'Archive Image Width', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Width of the archive image. Leave it blank if you want to use the default. Example: <code>300</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'archive_image_h',
	'class' => '',
	'label' => __( 'Archive Image Height', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Height of the archive image. Leave it blank if you want to use the default. Example: <code>300</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'single_image_w',
	'class' => '',
	'label' => __( 'Single Page Image Width', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Width of the Single Page image. Leave it blank if you want to use the default. Example: <code>960</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);
$fields[] = array(
	'id' => 'single_image_h',
	'class' => '',
	'label' => __( 'Single Page Image Height', 'tallykit_textdomain' ),
	'type' => 'text',
	'std' => '',
	'des' => __( 'You can change the Height of the Single Page image. Leave it blank if you want to use the default. Example: <code>300</code>', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'heading_2',
	'class' => '',
	'label' => __( 'People PostType Options', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect People PostType\'s <strong>slug</strong> and  <strong>label</strong>', 'tallykit_textdomain' ),
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
	'std' => 'people-item',
	'des' => __( 'This is the base slug of the portfoio', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

$fields[] = array(
	'id' => 'heading_3',
	'class' => '',
	'label' => __( 'People Category Options', 'tallykit_textdomain' ),
	'type' => 'heading',
	'std' => '',
	'des' => __( 'The following options affect People Category\'s <strong>slug</strong> and  <strong>label</strong>', 'tallykit_textdomain' ),
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
	'std' => 'people_category',
	'des' => __( 'This is the base slug of the Category', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
);

/*~ Registering the Options ~*/
$settings = array(
	'id' => 'tallykit_people_options',
	'option_name' => 'tallykit_people',
	'page_title' => "People Settings",
	'menu_title' => "Settings",
	'capability' => 'manage_options',
	'menu_slug' => 'tallykit_people_options',
	'parent_slug' => 'edit.php?post_type=tallykit_people',
	'icon_url' => NULL,
	'position' => NULL,
	'fields' => $fields,
);

new acoc_setting_api_class($settings);