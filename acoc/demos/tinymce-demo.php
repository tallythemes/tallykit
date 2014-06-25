<?php
$tinymce_fields[] = array(
	'title' => 'Button',
	'shortcode' => 'button',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'kala',
			'class' => '',
			'label' => 'Okala',
			'type' => 'text',
			'std' => '512',
			'des' => 'Welcome to Fields for Jewellery',
			'filter' => '', //sanitize_text_field, esc_attr
		),
		array(
			'id' => 'okk',
			'class' => '',
			'label' => 'Okala',
			'type' => 'textarea',
			'std' => '300',
			'des' => 'Welcome to Fields for Jewellery',
			'filter' => '', //sanitize_text_field, esc_attr
		),
	)
);
$tinymce_fields[] = array(
	'title' => 'Button2',
	'shortcode' => 'button2',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'kala',
			'class' => '',
			'label' => 'Okala',
			'type' => 'text',
			'std' => '512',
			'des' => 'Welcome to Fields for Jewellery',
			'filter' => '', //sanitize_text_field, esc_attr
		),
		array(
			'id' => 'okk',
			'class' => '',
			'label' => 'Okala',
			'type' => 'textarea',
			'std' => '300',
			'des' => 'Welcome to Fields for Jewellery',
			'filter' => '', //sanitize_text_field, esc_attr
			'content' => 'yes',
		),
	)
);
$settings = array(
	'uid' => 'sample_tinymce_editor',
	'button_title' => 'Sample',
	'button_url' => '',
	'title' => 'Sample Shortcodes',
	'options' => $tinymce_fields,
);
$tinymce = new acoc_tinymce_register($settings);