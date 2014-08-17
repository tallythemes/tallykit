<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.6)
 *
 * @uses class acoc_metabox_register  
**/
add_action( 'admin_init', 'tallykit_gallery_images_metabox_register' );
function tallykit_gallery_images_metabox_register() {
	
	if(function_exists('ot_register_meta_box')):
		$settings[] = array(
			'id'          => 'tallykit_gallery_images',
			'label'       => __('Images', 'tallykit_textdomain'),
			'desc'        => '',
			'std'         => '',
			'type'        => 'gallery',
			'section'     => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
		);
		
		$metabox = array(
			'id'        => 'tallykit_gallery_1',
			'title'     => 'Gallery Images',
			'desc'      => '',
			'pages'     => array( 'tallykit_gallery'),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields'    => $settings,
		);
		ot_register_meta_box( $metabox );
	endif;
}