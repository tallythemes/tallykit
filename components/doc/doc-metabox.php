<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (2.0)
 *
 * @uses class acoc_metabox_register  
**/

add_action( 'admin_init', 'tallykit_doc_content_metabox_register' );
function tallykit_doc_content_metabox_register() {
	
	if(function_exists('ot_register_meta_box')):
		$settings[] = array(
			'id'          => 'tallykit_doc_contents',
			'label'       => __('Contents', 'tallykit_textdomain'),
			'desc'        => '',
			'std'         => '',
			'type'        => 'list-item',
			'section'     => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'settings'     => array(
				array(
				 	'id'          => 'content',
					'label'       => __('Content', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'textarea',
					'section'     => '',
					'rows'        => '20',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				array(
				 	'id'          => 'menu_title',
					'label'       => __('Menu Title', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '8',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				 
			)
		);
		
		$metabox = array(
			'id'        => 'tallykit_doc_contents',
			'title'     => 'Doc Contents',
			'desc'      => '',
			'pages'     => array( 'tallykit_doc'),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields'    => $settings,
		);
		ot_register_meta_box( $metabox );
	endif;
}