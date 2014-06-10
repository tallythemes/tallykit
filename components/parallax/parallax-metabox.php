<?php
/**************************** Metabox *************************
 *
 * Register Metabox
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_metabox_register  
**/
$fields = array(); 

$fields[] = array(
	'id' => 'tallykit_parallax_active',
	'class' => '',
	'label' => __( 'Active', 'tallykit_textdomain' ),
	'type' => 'select',
	'std' => '',
	'des' => __( 'Select "yes" to active parallax sections on this page.', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
	'size' => '',
	'options' => array(
		array('label'=>'No', 'value'=>'no'),
		array('label'=>'Yes', 'value'=>'yes'),
	),
);
/*$fields[] = array(
	'id' => 'tallykit_parallax_sections',
	'class' => '',
	'label' => __( 'Parallax Sections', 'tallykit_textdomain' ),
	'type' => 'parallax',
	'std' => '',
	'des' => __( 'Click on "Add Section" to add new sections', 'tallykit_textdomain' ),
	'filter' => '', //sanitize_text_field, esc_attr
	'size' => '',
);*/

/*~ Registering the Metabox ~*/
$settings = array(
	'id' => 'tallykit_parallax_active',
	'title' => __( 'Parallax', 'tallykit_textdomain' ),
	'post_type' => 'page',
	'context' => 'side', //'normal', 'advanced', or 'side'
	'priority' => 'high', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => $fields,
);

new acoc_metabox_register($settings);


add_action( 'admin_init', 'tallykit_parallax_sections_metabox_register' );
function tallykit_parallax_sections_metabox_register() {
	
	if(function_exists('ot_register_meta_box')):
		$settings[] = array(
			'id'          => 'tallykit_parallax_sections',
			'label'       => __('Parallax Sections', 'tallykit_textdomain'),
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
				 	'id'          => 'active_title',
					'label'       => __('Enable Title Area', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => 'on',
					'type'        => 'on_off',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				array(
				 	'id'          => 'title_align',
					'label'       => __('Title Align', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => 'left',
					'type'        => 'select',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_title:is(on)',
					'operator'    => 'or',
					'choices'     => array(
						 array( 'label' => 'left', 'value' => 'left'),
						 array( 'label' => 'right', 'value' => 'right'),
						 array( 'label' => 'center', 'value' => 'center'),
						 array( 'label' => 'none', 'value' => 'none'),
					)
				 ),
				 array(
				 	'id'          => 'subtitle',
					'label'       => __('Sub Title', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_title:is(on)',
					'operator'    => 'or',
				 ),
				 array(
				 	'id'          => 'title_color',
					'label'       => __('Title Color', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_title:is(on)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'content',
					'label'       => __('Content', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'textarea',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'content_align',
					'label'       => __('Content Align', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => 'left',
					'type'        => 'select',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => '',
					'operator'    => 'or',
					'choices'     => array(
						 array( 'label' => 'left', 'value' => 'left'),
						 array( 'label' => 'right', 'value' => 'right'),
						 array( 'label' => 'center', 'value' => 'center'),
						 array( 'label' => 'none', 'value' => 'none'),
					)
				 ),
				 array(
				 	'id'          => 'content_width',
					'label'       => __('Content Width', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '960px',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				 array(
				 	'id'          => 'section_id',
					'label'       => __('Section ID', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				 array(
				 	'id'          => 'active_content_color',
					'label'       => __('Enable Text Color Options', 'tallykit_textdomain'),
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
				 	'id'          => 'heading_color',
					'label'       => __('Heading Color', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '20',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_content_color:is(on)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'text_color',
					'label'       => __('Text Color', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_content_color:is(on)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'link_color',
					'label'       => __('Link Color', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_content_color:is(on)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'link_hover_color',
					'label'       => __('Link Hover Color', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_content_color:is(on)',
					'operator'    => 'or'
				 ),
				 			 
				 array(
				 	'id'          => 'active_padding',
					'label'       => __('Enable Padding', 'tallykit_textdomain'),
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
				 	'id'          => 'padding_top',
					'label'       => __('Padding Top', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_padding:is(on)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'padding_bottom',
					'label'       => __('Padding Bottom', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_padding:is(on)',
					'operator'    => 'or'
				 ),
				  array(
				 	'id'          => 'active_border',
					'label'       => __('Enable Border', 'tallykit_textdomain'),
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
				 	'id'          => 'border_top',
					'label'       => __('Border Top', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '0',
					'type'        => 'select',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_border:is(on)',
					'operator'    => 'or',
					'choices'     => array(
						 array( 'label' => '0px', 'value' => '0'),
						 array( 'label' => '1px', 'value' => '1'),
						 array( 'label' => '2px', 'value' => '2'),
						 array( 'label' => '3px', 'value' => '3'),
						 array( 'label' => '4px', 'value' => '4'),
						 array( 'label' => '5px', 'value' => '5'),
						 array( 'label' => '6px', 'value' => '6'),
						 array( 'label' => '7px', 'value' => '7'),
						 array( 'label' => '8px', 'value' => '8'),
						 array( 'label' => '9px', 'value' => '9'),
						 array( 'label' => '10px', 'value' => '10'),
					)
				 ),
				 array(
				 	'id'          => 'border_bottom',
					'label'       => __('Border Bottom', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '0',
					'type'        => 'select',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_border:is(on)',
					'operator'    => 'or',
					'choices'     => array(
						 array( 'label' => '0px', 'value' => '0'),
						 array( 'label' => '1px', 'value' => '1'),
						 array( 'label' => '2px', 'value' => '2'),
						 array( 'label' => '3px', 'value' => '3'),
						 array( 'label' => '4px', 'value' => '4'),
						 array( 'label' => '5px', 'value' => '5'),
						 array( 'label' => '6px', 'value' => '6'),
						 array( 'label' => '7px', 'value' => '7'),
						 array( 'label' => '8px', 'value' => '8'),
						 array( 'label' => '9px', 'value' => '9'),
						 array( 'label' => '10px', 'value' => '10'),
					)
				 ),
				 array(
				 	'id'          => 'border_color_top',
					'label'       => __('Top Border Color', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_border:is(on)',
					'operator'    => 'or',
				 ),
				 array(
				 	'id'          => 'border_color_bottom',
					'label'       => __('Bottom Border Color', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_border:is(on)',
					'operator'    => 'or',
				 ),
				 
				 
				 array(
				 	'id'          => 'bg',
					'label'       => __('Background', 'tallykit_textdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'background',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				 
				 
				 array(
				 	'id'          => 'video_bg',
					'label'       => __('Background Video', 'tallykit_textdomain'),
					'desc'        => __('Upload a MP4 video here', 'tallykit_textdomain'),
					'std'         => '',
					'type'        => 'upload',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				 
			)
		);
		
		$metabox = array(
			'id'        => 'tallykit_parallax_sections',
			'title'     => 'Parallax Sections',
			'desc'      => '',
			'pages'     => array( 'page'),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields'    => $settings,
		);
		ot_register_meta_box( $metabox );
	endif;
}