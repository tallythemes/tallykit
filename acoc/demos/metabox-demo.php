<?php
/**
 * Calls the class on the post edit screen.
 */
function call_someClass() {
    new acoc_metabox_register(
		array(
			'fields' => array(
				array(
					'id' => 'kala',
					'class' => '',
					'label' => 'Okala',
					'type' => 'slideshow',
					'std' => '',
					'des' => '',
					'filter' => '', //sanitize_text_field, esc_attr
				),
				array(
					'id' => 'bkala',
					'class' => '',
					'label' => 'oooOkala',
					'type' => 'slideshow',
					'std' => '',
					'des' => '',
					'filter' => '', //sanitize_text_field, esc_attr
				),
				array(
					'id' => 'text_field',
					'class' => '',
					'label' => 'Text Fielde',
					'type' => 'text',
					'std' => '',
					'des' => '',
					'filter' => '', //sanitize_text_field, esc_attr
				),
			)
		)
	);
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'call_someClass' );
    add_action( 'load-post-new.php', 'call_someClass' );
}