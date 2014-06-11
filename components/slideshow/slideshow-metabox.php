<?php
add_action( 'admin_init', 'tallykit_slideshow_metabox_register' );
function tallykit_slideshow_metabox_register() {
	
	if(function_exists('ot_register_meta_box')):
		$settings[] = array(
			'id'          => 'tallykit_slideshow_slider_items',
			'label'       => __('Slider Items', 'tally_taxdomain'),
			'desc'        => '',
			'std'         => '',
			'type'        => 'list-item',
			'section'     => 'branding',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'settings'     => array(
				 array(
				 	'id'          => 'type',
					'label'       => __('Type', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'select',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'choices'     => array(
						 array( 'label' => 'Caption Style', 'value' => 'caption' ),
						 array( 'label' => 'Image Only', 'value' => 'image-only' ),
						 array( 'label' => 'Content Only', 'value' => 'content-only' ),
						 array( 'label' => 'Video Only', 'value' => 'video-only' ),
						 array( 'label' => 'Image - Content', 'value' => 'image-content' ),
						 array( 'label' => 'Content - Image', 'value' => 'content-image'),
						 array( 'label' => 'Video - Content', 'value' => 'video-content' ),
						 array( 'label' => 'Content - Video', 'value' => 'content-video'),
					)
				 ),
				 array(
				 	'id'          => 'image',
					'label'       => __('Image', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'upload',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'type:is(image-only),type:is(image-content),type:is(caption),type:is(content-image)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'content',
					'label'       => __('Content', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'textarea-simple',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'type:is(caption),type:is(content-only),type:is(image-content),type:is(content-image),type:is(video-content),type:is(content-video)',
					'operator'    => 'or'
				 ),
				  array(
				 	'id'          => 'video',
					'label'       => __('Video oEmbed', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'textarea-simple',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'type:is(video-only),type:is(video-content),type:is(content-video)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'active_content_color',
					'label'       => __('Enable Text Color Options', 'tally_taxdomain'),
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
					'label'       => __('Heading Color', 'tally_taxdomain'),
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
				 	'id'          => 'text_color',
					'label'       => __('Text Color', 'tally_taxdomain'),
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
					'label'       => __('Link Color', 'tally_taxdomain'),
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
					'label'       => __('Link Hover Color', 'tally_taxdomain'),
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
				 	'id'          => 'active_readmore',
					'label'       => __('Enable Readmore', 'tally_taxdomain'),
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
				 	'id'          => 'readmore_text',
					'label'       => __('Readmore Text', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_readmore:is(on)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'readmore_link',
					'label'       => __('Readmore Link', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_readmore:is(on)',
					'operator'    => 'or'
				 ),
				 array(
				 	'id'          => 'readmore_color',
					'label'       => __('Readmore Button Color', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'   => 'active_readmore:is(on)',
					'operator'    => 'or'
				 ),
				 
				 array(
				 	'id'          => 'active_padding',
					'label'       => __('Enable Padding', 'tally_taxdomain'),
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
					'label'       => __('Padding Top', 'tally_taxdomain'),
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
					'label'       => __('Padding Bottom', 'tally_taxdomain'),
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
				 	'id'          => 'content_width',
					'label'       => __('Content Width', 'tally_taxdomain'),
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
				 	'id'          => 'bg',
					'label'       => __('Background', 'tally_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'background',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
				 ),
				 
			)
		);
		
		$metabox = array(
			'id'        => 'tallykit_slideshow_metabox',
			'title'     => 'Slider Items',
			'desc'      => '',
			'pages'     => array( 'tallykit_slideshow'),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields'    => $settings,
		);
		ot_register_meta_box( $metabox );
	endif;
}


$prefix = 'tallykit_slideshow_';
$seeings = array(
	'id' => 'well_slideshow_slider_setting',
	'title' => 'Slider Settings',
	'post_type' => 'tallykit_slideshow',
	'context' => 'side', //'normal', 'advanced', or 'side'
	'priority' => 'default', //'high', 'core', 'default' or 'low'
	'callback_args' => NULL,
	'fields' => array(
		array(
			'id' => $prefix.'h',
			'class' => '',
			'label' => 'Slider Height',
			'type' => 'text',
			'std' => '400px',
			'des' => 'For Example <code>96px</code>',
			'filter' => '',
			'options' => '',
		),
		array(
			'id' => $prefix.'animation',
			'class' => '',
			'label' => 'Animation',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'filter' => '',
			'options' => array(
				array('label'=>'Fade', 'value'=>'fade'),
				array('label'=>'Slide', 'value'=>'slide'),
			)
		),
		/*array(
			'id' => $prefix.'smoothHeight',
			'class' => '',
			'label' => 'Smooth Height',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'filter' => '',
			'options' => array(
				array('label'=>'false', 'value'=>'false'),
				array('label'=>'true', 'value'=>'true'),
			)
		),*/
		array(
			'id' => $prefix.'slideshowSpeed',
			'class' => '',
			'label' => 'Slideshow Speed',
			'type' => 'text',
			'std' => '7000',
			'des' => '',
			'filter' => '',
			'options' => ''
		),
		array(
			'id' => $prefix.'animationSpeed',
			'class' => '',
			'label' => 'Animation Speed',
			'type' => 'text',
			'std' => '600',
			'des' => '',
			'filter' => '',
			'options' => ''
		),
		array(
			'id' => $prefix.'controlNav',
			'class' => '',
			'label' => 'Control Nav',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'filter' => '',
			'options' => array(
				array('label'=>'true', 'value'=>'true'),
				array('label'=>'false', 'value'=>'false'),
			)
		),
		array(
			'id' => $prefix.'directionNav',
			'class' => '',
			'label' => 'Direction Nav',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'filter' => '',
			'options' => array(
				array('label'=>'true', 'value'=>'true'),
				array('label'=>'false', 'value'=>'false'),
			)
		),
	),
);
new acoc_metabox_register($seeings);