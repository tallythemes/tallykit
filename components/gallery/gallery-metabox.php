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
			'type'        => 'list-item',
			'section'     => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'settings'     => array(
				array(
				 	'id'          => 'custom_thumbnail',
					'label'       => __('Custome Thumbnail', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => 'off',
					'type'        => 'on_off',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				 array(
				 	'id'          => 'thumbnail',
					'label'       => __('Thumbnail Image', 'tallykit_textdomain'),
					'desc'        => 'Best image size is '.TALLYKIT_GALLERY_THUMB_W.'x'.TALLYKIT_GALLERY_THUMB_H,
					'std'         => '',
					'type'        => 'upload',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'custom_thumbnail:is(on)',
					'operator'    => 'or',
				 ),
				 array(
				 	'id'          => 'Image',
					'label'       => __('Image', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'upload',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
					'operator'    => '',
				 ),
				 array(
				 	'id'          => 'link',
					'label'       => __('External link', 'tallykit_textdomain'),
					'desc'        => __('Please include the full URL including <code>http://</code>', 'tallykit_textdomain'),
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
					'operator'    => '',
				 ),
			)
		);
		
		$metabox = array(
			'id'        => 'tallykit_gallery_images',
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