<?php
/*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_tinymce_register  
**/
$tinymce_fields = array();

/*---------|- Slideshow Single -|----------*/
$tinymce_fields[] = array(
	'title' => 'Slideshow',
	'shortcode' => 'tk_slideshow',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'id',
			'class' => '',
			'label' => 'Slideshow ID',
			'type' => 'post_select',
			'std' => '',
			'des' => '',
			'post_type' => 'tallykit_slideshow'
		),
	)
);


$settings = array(
	'uid' => 'tallykit_slideshow_tinymce',
	'button_title' => '<div class="dashicons dashicons-format-gallery" style="line-height:24px;"></div>',
	'button_url' => '',
	'title' => 'Slideshow Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_shortcode_tinymce = new acoc_tinymce_register($settings);