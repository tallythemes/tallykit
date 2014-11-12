<?php
 /*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_tinymce_register  
 */
$tinymce_fields = array();

/*---------|- Row -|----------*/
$tinymce_fields[] = array(
	'title' => 'Row',
	'shortcode' => 'tk_row',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'textarea',
			'std' => '........',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'color_mood',
			'class' => '',
			'label' => 'Color Mood',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'dark', 'label' => 'dark'),
				array('value' => 'light', 'label' => 'light'),
			)
		),
		array(
			'id' => 'width',
			'class' => '',
			'label' => 'Content Width',
			'type' => 'text',
			'std' => '960px',
			'des' => '',
		),
		array(
			'id' => 'menu_anchor',
			'class' => '',
			'label' => 'Menu Anchor',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'bg_color',
			'class' => '',
			'label' => 'Background Color',
			'type' => 'color',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'bg_image',
			'class' => '',
			'label' => 'Background Image',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'bg_repeat',
			'class' => '',
			'label' => 'Background Repeat',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'repeat', 'label' => 'repeat'),
				array('value' => 'no-repeat', 'label' => 'no-repeat'),
				array('value' => 'repeat-x', 'label' => 'repeat-x'),
				array('value' => 'repeat-y', 'label' => 'repeat-y'),
				array('value' => 'inherit', 'label' => 'inherit'),
			)
		),
		array(
			'id' => 'bg_attachment',
			'class' => '',
			'label' => 'Background Attachment',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'fixed', 'label' => 'fixed'),
				array('value' => 'scroll', 'label' => 'scroll'),
				array('value' => 'inherit', 'label' => 'inherit'),
			)
		),
		array(
			'id' => 'bg_position',
			'class' => '',
			'label' => 'Background Position',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'left top', 'label' => 'left top'),
				array('value' => 'left center', 'label' => 'left center'),
				array('value' => 'left bottom', 'label' => 'left bottom'),
				array('value' => 'center top', 'label' => 'center top'),
				array('value' => 'center center', 'label' => 'center center'),
				array('value' => 'center bottom', 'label' => 'center bottom'),
				array('value' => 'right top', 'label' => 'right top'),
				array('value' => 'right center', 'label' => 'right center'),
				array('value' => 'right bottom', 'label' => 'right bottom'),
			)
		),
		array(
			'id' => 'bg_size',
			'class' => '',
			'label' => 'Background Size',
			'type' => 'text',
			'std' => 'cover',
			'des' => '',
		),
		array(
			'id' => 'border_size',
			'class' => '',
			'label' => 'Border Size',
			'type' => 'text',
			'std' => '0px',
			'des' => '',
		),
		array(
			'id' => 'border_color',
			'class' => '',
			'label' => 'Border Color',
			'type' => 'color',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'border_style',
			'class' => '',
			'label' => 'Border style',
			'type' => 'text',
			'std' => 'solid',
			'des' => '',
		),
		array(
			'id' => 'padding_top',
			'class' => '',
			'label' => 'padding_top',
			'type' => 'text',
			'std' => '20px',
			'des' => '',
		),
		array(
			'id' => 'padding_bottom',
			'class' => '',
			'label' => 'padding_bottom',
			'type' => 'text',
			'std' => '20px',
			'des' => '',
		),
		array(
			'id' => 'text_align',
			'class' => '',
			'label' => 'Text Align',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => '', 'label' => ''),
				array('value' => 'left', 'label' => 'left'),
				array('value' => 'right', 'label' => 'right'),
				array('value' => 'center', 'label' => 'center'),
				array('value' => 'inherit', 'label' => 'inherit'),
			)
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'Class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'id',
			'class' => '',
			'label' => 'ID',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'text_color',
			'class' => '',
			'label' => 'Text Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'default', 'label' => 'default'),
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'white2', 'label' => 'white2'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'black2', 'label' => 'black2'),
			)
		),
		array(
			'id' => 'heading_color',
			'class' => '',
			'label' => 'Heading Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'default', 'label' => 'default'),
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'white2', 'label' => 'white2'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'black2', 'label' => 'black2'),
			)
		),
		array(
			'id' => 'inner_border_color',
			'class' => '',
			'label' => 'Inner Border Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'default', 'label' => 'default'),
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'white2', 'label' => 'white2'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'black2', 'label' => 'black2'),
			)
		),
	)
);


/*---------|- Accordion -|----------*/
$tinymce_fields[] = array(
	'title' => 'Accordion',
	'shortcode' => 'tk_accordion',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Child Items',
			'type' => 'textarea',
			'std' => '[tk_accordion_item title="title one"].........Sample Text is here.......[/tk_accordion_item]
			[tk_accordion_item title="title one"].........Sample Text is here.......[/tk_accordion_item]
			[tk_accordion_item title="title one"].........Sample Text is here.......[/tk_accordion_item]',
			'des' => '',
			'content' => 'yes',//yes, no
		),
	)
);

/*---------|- alert -|----------*/
$tinymce_fields[] = array(
	'title' => 'Alert',
	'shortcode' => 'tk_alert',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'title',
			'class' => '',
			'label' => 'Title',
			'type' => 'text',
			'std' => 'Alart Sample Title',
			'des' => '',
		),
		array(
			'id' => 'type',
			'class' => '',
			'label' => 'Type',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'info', 'label' => 'info'),
				array('value' => 'danger', 'label' => 'danger'),
				array('value' => 'success', 'label' => 'success'),
				array('value' => 'error', 'label' => 'error'),
			)
		),
		array(
			'id' => 'close',
			'class' => '',
			'label' => 'Close',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'yes', 'label' => 'yes'),
				array('value' => 'no', 'label' => 'no'),
			)
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content Text',
			'type' => 'textarea',
			'std' => 'Sample content for the Alart box.',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


/*---------|- Button -|----------*/
$tinymce_fields[] = array(
	'title' => 'Button',
	'shortcode' => 'tk_button',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'text',
			'class' => '',
			'label' => 'Button Text',
			'type' => 'text',
			'std' => 'Button',
			'des' => '',
		),
		array(
			'id' => 'link',
			'class' => '',
			'label' => 'Button Link',
			'type' => 'text',
			'std' => '#',
			'des' => '',
		),
		array(
			'id' => 'target',
			'class' => '',
			'label' => 'Link Target',
			'type' => 'text',
			'std' => '_self',
			'des' => '',
			'options' => array(
				array('value' => '_self', 'label' => '_self'),
				array('value' => '_blank', 'label' => '_blank'),
			)
		),
		array(
			'id' => 'color',
			'class' => '',
			'label' => 'Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'default', 'label' => 'default'),
				array('value' => 'accent', 'label' => 'accent'),
			)
		),
		array(
			'id' => 'size',
			'class' => '',
			'label' => 'Size',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => '1x', 'label' => '1x'),
				array('value' => '2x', 'label' => '2x'),
				array('value' => '3x', 'label' => '3x'),
				array('value' => '4x', 'label' => '4x'),
				array('value' => '5x', 'label' => '5x'),
			)
		),
		array(
			'id' => 'style',
			'class' => '',
			'label' => 'Style',
			'type' => 'select',
			'std' => 'fill',
			'des' => '',
			'options' => array(
				array('value' => 'fill', 'label' => 'fill'),
				array('value' => 'border', 'label' => 'border'),
			)
		),
		array(
			'id' => 'rel',
			'class' => '',
			'label' => 'Rel',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'Class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'icon_left',
			'class' => '',
			'label' => 'Icon left',
			'type' => 'text',
			'std' => '',
			'des' => 'Add Icon class from here http://fontawesome.io/cheatsheet/',
		),
		array(
			'id' => 'icon_right',
			'class' => '',
			'label' => 'Icon right',
			'type' => 'text',
			'std' => '',
			'des' => 'Add Icon class from here http://fontawesome.io/cheatsheet/',
		),
		array(
			'id' => 'full_width',
			'class' => '',
			'label' => 'Full Width',
			'type' => 'select',
			'std' => 'no',
			'des' => '',
			'options' => array(
				array('value' => 'no', 'label' => 'no'),
				array('value' => 'yes', 'label' => 'yes'),
			)
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


/*---------|- checklist -|----------*/
$tinymce_fields[] = array(
	'title' => 'Checklist',
	'shortcode' => 'tk_checklist',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'icon',
			'class' => '',
			'label' => 'Icon',
			'type' => 'select',
			'std' => 'arrow',
			'des' => '',
			'options' => array(
				array('value' => 'arrow', 'label' => 'arrow'),
				array('value' => 'check', 'label' => 'check'),
				array('value' => 'asterik', 'label' => 'asterik'),
				array('value' => 'cross', 'label' => 'cross'),
				array('value' => 'plus', 'label' => 'plus'),
			)
		),
		array(
			'id' => 'iconcolor',
			'class' => '',
			'label' => 'Icon color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => '', 'label' => ''),
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'red', 'label' => 'red'),
				array('value' => 'green', 'label' => 'green'),
				array('value' => 'blue', 'label' => 'blue'),
				array('value' => 'yellow', 'label' => 'yellow'),
				array('value' => 'purple', 'label' => 'purple'),
				array('value' => 'maroon', 'label' => 'maroon'),
				array('value' => 'silver', 'label' => 'silver'),
				array('value' => 'orange', 'label' => 'orange'),
			)
		),
		array(
			'id' => 'iconbg',
			'class' => '',
			'label' => 'Icon Background Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'red', 'label' => 'red'),
				array('value' => 'green', 'label' => 'green'),
				array('value' => 'blue', 'label' => 'blue'),
				array('value' => 'yellow', 'label' => 'yellow'),
				array('value' => 'purple', 'label' => 'purple'),
				array('value' => 'maroon', 'label' => 'maroon'),
				array('value' => 'silver', 'label' => 'silver'),
				array('value' => 'orange', 'label' => 'orange'),
			)
		),
		array(
			'id' => 'iconsize',
			'class' => '',
			'label' => 'Icon Size',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => '1x', 'label' => '1x'),
				array('value' => '2x', 'label' => '2x'),
				array('value' => '3x', 'label' => '3x'),
				array('value' => '4x', 'label' => '4x'),
				array('value' => '5x', 'label' => '5x'),
				array('value' => '6x', 'label' => '6x'),
				array('value' => '7x', 'label' => '7x'),
				array('value' => '8x', 'label' => '8x'),
			)
		),
		array(
			'id' => 'circle',
			'class' => '',
			'label' => 'Icon Circle',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'yes', 'label' => 'yes'),
				array('value' => 'no', 'label' => 'no'),
			)
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'textarea',
			'std' => '<ul>
	<li>This is a list item.</li>
	<li>Another list item.</li>
	<li>Oops! another list item</li>
	<li>Ok it is the last item</li>
</ul>',
			'des' => '',
			'content' => 'yes',
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


/*---------|- column -|----------*/
$tinymce_fields[] = array(
	'title' => 'Column',
	'shortcode' => 'tk_column',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'size',
			'class' => '',
			'label' => 'Size',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'one-half', 'label' => 'one-half'),
				array('value' => 'one-third', 'label' => 'one-third'),
				array('value' => 'one-fourth', 'label' => 'one-fourth'),
				array('value' => 'three-fourth', 'label' => 'three-fourth'),
				array('value' => 'one-fifth', 'label' => 'one-fifth'),
				array('value' => 'two-fifth', 'label' => 'two-fifth'),
				array('value' => 'three-fifth', 'label' => 'three-fifth'),
				array('value' => 'four-fifth', 'label' => 'four-fifth'),
				array('value' => 'one-sixth', 'label' => 'one-sixth'),
				array('value' => 'five-sixth', 'label' => 'five-sixth'),
			)
		),
		array(
			'id' => 'position',
			'class' => '',
			'label' => 'Position',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'first', 'label' => 'first'),
				array('value' => 'last', 'label' => 'last'),
			)
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'textarea',
			'std' => '.......Sample column content.........',
			'des' => '',
			'content' => 'yes',
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'Class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'bg_color',
			'class' => '',
			'label' => 'Background Color',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #000000',
		),
		array(
			'id' => 'text_color',
			'class' => '',
			'label' => 'Text Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'default', 'label' => 'default'),
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'white2', 'label' => 'white2'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'black2', 'label' => 'black2'),
			)
		),
		array(
			'id' => 'heading_color',
			'class' => '',
			'label' => 'Heading Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'default', 'label' => 'default'),
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'white2', 'label' => 'white2'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'black2', 'label' => 'black2'),
			)
		),
		array(
			'id' => 'border_color',
			'class' => '',
			'label' => 'Inner Border Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'default', 'label' => 'default'),
				array('value' => 'white', 'label' => 'white'),
				array('value' => 'white2', 'label' => 'white2'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'black2', 'label' => 'black2'),
			)
		),
		array(
			'id' => 'padding',
			'class' => '',
			'label' => 'Padding',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: 30px',
		),
		array(
			'id' => 'text_align',
			'class' => '',
			'label' => 'Text align',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'left', 'label' => 'left'),
				array('value' => 'right', 'label' => 'right'),
				array('value' => 'center', 'label' => 'center'),
			)
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		
	)
);

/*---------|- divider -|----------*/
$tinymce_fields[] = array(
	'title' => 'Divider',
	'shortcode' => 'tk_divider',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'style',
			'class' => '',
			'label' => 'Style',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'none', 'label' => 'none'),
				array('value' => 'single', 'label' => 'single'),
				array('value' => 'double', 'label' => 'double'),
				array('value' => 'dotted', 'label' => 'dotted'),
				array('value' => 'dashed', 'label' => 'dashed'),
				array('value' => 'shadow', 'label' => 'shadow'),
			)
		),
		array(
			'id' => 'margin_top',
			'class' => '',
			'label' => 'Top Margin',
			'type' => 'text',
			'std' => '20px',
			'des' => 'Example: 30px',
		),
		array(
			'id' => 'margin_bottom',
			'class' => '',
			'label' => 'Bottom Margin',
			'type' => 'text',
			'std' => '20px',
			'des' => 'Example: 30px',
		),		
	)
);

/*---------|- dropcap -|----------*/
$tinymce_fields[] = array(
	'title' => 'Dropcap',
	'shortcode' => 'tk_dropcap',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'style',
			'class' => '',
			'label' => 'Style',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'none', 'label' => 'none'),
				array('value' => 'circle', 'label' => 'circle'),
				array('value' => 'box', 'label' => 'box'),
				array('value' => 'round', 'label' => 'round'),
			)
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'text',
			'std' => 'A',
			'des' => '',
			'content' => 'yes',//yes, no
		),		
	)
);

/*---------|- icon -|----------*/
$tinymce_fields[] = array(
	'title' => 'Icon',
	'shortcode' => 'tk_icon',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'icon',
			'class' => '',
			'label' => 'Icon',
			'type' => 'text',
			'std' => 'fa-arrows',
			'des' => 'Please enter the class name of icon. You can copy and past the icon class from this URL <a href="http://fontawesome.io/cheatsheet/" target="_blank">http://fontawesome.io/cheatsheet/</a>',
		),
		array(
			'id' => 'shape',
			'class' => '',
			'label' => 'Shape',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'content' => 'no',//yes, no
			'options' => array(
				array('value' => 'none', 'label' => 'none'),
				array('value' => 'circle', 'label' => 'circle'),
				array('value' => 'round', 'label' => 'round'),
			)
		),
		array(
			'id' => 'style',
			'class' => '',
			'label' => 'Style',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'content' => 'no',//yes, no
			'options' => array(
				array('value' => 'none', 'label' => 'none'),
				array('value' => 'background', 'label' => 'background'),
				array('value' => 'border', 'label' => 'border'),
			)
		),
		array(
			'id' => 'color',
			'class' => '',
			'label' => 'Color',
			'type' => 'text',
			'std' => '#666',
			'des' => 'Example: <strong>#666</strong>',
			'content' => 'no',//yes, no
		),	
		array(
			'id' => 'size',
			'class' => '',
			'label' => 'Size',
			'type' => 'select',
			'std' => '2x',
			'des' => '',
			'content' => 'no',//yes, no
			'options' => array(
				array('value' => '1x', 'label' => '1x'),
				array('value' => '2x', 'label' => '2x'),
				array('value' => '3x', 'label' => '3x'),
				array('value' => '4x', 'label' => '4x'),
				array('value' => '5x', 'label' => '5x'),
				array('value' => '6x', 'label' => '6x'),
			)
		),
		array(
			'id' => 'effect',
			'class' => '',
			'label' => 'Effect',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'content' => 'no',//yes, no
			'options' => array(
				array('value' => 'none', 'label' => 'none'),
				array('value' => 'rotate', 'label' => 'rotate'),
				array('value' => 'fade', 'label' => 'fade'),
			)
		),
		array(
			'id' => 'align',
			'class' => '',
			'label' => 'Align',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'content' => 'no',//yes, no
			'options' => array(
				array('value' => 'none', 'label' => 'none'),
				array('value' => 'left', 'label' => 'left'),
				array('value' => 'right', 'label' => 'right'),
				array('value' => 'center', 'label' => 'center'),
			)
		),
		array(
			'id' => 'link',
			'class' => '',
			'label' => 'Link',
			'type' => 'text',
			'std' => '',
			'des' => '',
			'content' => 'no',//yes, no
		),	
		array(
			'id' => 'link_target',
			'class' => '',
			'label' => 'Link Target',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'content' => 'no',//yes, no
			'options' => array(
				array('value' => '_self', 'label' => '_self'),
				array('value' => '_blank', 'label' => '_blank'),
			)
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);

/*---------|- highlight -|----------*/
$tinymce_fields[] = array(
	'title' => 'Highlight',
	'shortcode' => 'tk_highlight',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'color',
			'class' => '',
			'label' => 'Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'yellow', 'label' => 'yellow'),
				array('value' => 'black', 'label' => 'black'),
			)
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'text',
			'std' => 'Welcome to WordPress. This is your first post.',
			'des' => '',
			'content' => 'yes',//yes, no
		),		
	)
);

/*---------|- lightbox -|----------*/
$tinymce_fields[] = array(
	'title' => 'Lightbox',
	'shortcode' => 'tk_lightbox',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'src',
			'class' => '',
			'label' => 'SRC',
			'type' => 'text',
			'std' => '',
			'des' => 'Enter the full URL including <code>http://</code>',
		),
		array(
			'id' => 'title',
			'class' => '',
			'label' => 'Title',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'Class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'text',
			'std' => 'lightbox content will be here.',
			'des' => '',
			'content' => 'yes',//yes, no
		),		
	)
);


/*---------|- map -|----------*/
$tinymce_fields[] = array(
	'title' => 'Map',
	'shortcode' => 'tk_map',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'address',
			'class' => '',
			'label' => 'Address',
			'type' => 'textarea',
			'std' => 'Gold ST, New York, USA',
			'des' => 'use "|" to add multiple address',
		),
		array(
			'id' => 'type',
			'class' => '',
			'label' => 'Type',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'ROADMAP', 'label' => 'ROADMAP'),
				array('value' => 'SATELLITE', 'label' => 'SATELLITE'),
				array('value' => 'HYBRID', 'label' => 'HYBRID'),
				array('value' => 'TERRAIN', 'label' => 'TERRAIN'),
			)
		),
		array(
			'id' => 'width',
			'class' => '',
			'label' => 'Width',
			'type' => 'text',
			'std' => '100%',
			'des' => '',
		),
		array(
			'id' => 'height',
			'class' => '',
			'label' => 'Height',
			'type' => 'text',
			'std' => '300px',
			'des' => '',
		),
		array(
			'id' => 'zoom',
			'class' => '',
			'label' => 'Zoom',
			'type' => 'text',
			'std' => '15',
			'des' => '',
		),	
		array(
			'id' => 'scrollwheel',
			'class' => '',
			'label' => 'Scroll Wheel',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'true', 'label' => 'true'),
				array('value' => 'false', 'label' => 'false'),
			)
		),	
		array(
			'id' => 'scale',
			'class' => '',
			'label' => 'Scale',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'true', 'label' => 'true'),
				array('value' => 'false', 'label' => 'false'),
			)
		),
		array(
			'id' => 'popup',
			'class' => '',
			'label' => 'Popup',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'true', 'label' => 'true'),
				array('value' => 'false', 'label' => 'false'),
			)
		),
		array(
			'id' => 'zoom_pancontrol',
			'class' => '',
			'label' => 'Zoom Pancontrol',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'true', 'label' => 'true'),
				array('value' => 'false', 'label' => 'false'),
			)
		),
		array(
			'id' => 'icon',
			'class' => '',
			'label' => 'Icon Image URL',
			'type' => 'text',
			'std' => NULL,
			'des' => 'Enter the full URL including <code>http://</code>',
		),
	)
);

/*---------|- Blog Grid -|----------*/
$tinymce_fields[] = array(
	'title' => 'Blog Grid',
	'shortcode' => 'tk_blog_grid',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'category'
		),
		array(
			'id' => 'tags',
			'class' => '',
			'label' => 'Tags',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more Tag to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'post_tag'
		),
		array(
			'id' => 'exclude_tags',
			'class' => '',
			'label' => 'Exclude Tags',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more Tag to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'post_tag'
		),
		array(
			'id' => 'relation',
			'class' => '',
			'label' => 'Relation',
			'type' => 'select',
			'std' => '',
			'des' => __( 'Query Relation with tags and Category', 'tallykit_textdomain' ),
			'options' => array(
				array('label' => 'AND', 'value' => 'AND'),
				array('label' => 'OR', 'value' => 'OR'),
			)
		),
		array(
			'id' => 'limit',
			'class' => '',
			'label' => 'Limit',
			'type' => 'text',
			'std' => '12',
			'des' => __( 'How many Post item you want to display?', 'tallykit_textdomain' ),
		),
		array(
			'id' => 'columns',
			'class' => '',
			'label' => 'Columns',
			'type' => 'select',
			'std' => '3',
			'des' => '',
			'options' => array(
				array('label' => '2', 'value' => '2'),
				array('label' => '3', 'value' => '3'),
				array('label' => '4', 'value' => '4'),
				array('label' => '5', 'value' => '5'),
			)
		),
		array(
			'id' => 'orderby',
			'class' => '',
			'label' => 'Orderby',
			'type' => 'select',
			'std' => 'post_date',
			'des' => '',
			'options' => array(
				array('label' => 'post_date', 'value' => 'post_date'),
				array('label' => 'none', 'value' => 'none'),
				array('label' => 'ID', 'value' => 'ID'),
				array('label' => 'title', 'value' => 'title'),
				array('label' => 'name', 'value' => 'name'),
				array('label' => 'date', 'value' => 'date'),
				array('label' => 'menu_order', 'value' => 'menu_order'),
			)
		),
		array(
			'id' => 'order',
			'class' => '',
			'label' => 'Order',
			'type' => 'select',
			'std' => 'DESC',
			'des' => '',
			'options' => array(
				array('label' => 'DESC', 'value' => 'DESC'),
				array('label' => 'ASC', 'value' => 'ASC'),
			)
		),
		array(
			'id' => 'ids',
			'class' => '',
			'label' => 'Post IDs',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'post'
		),
		array(
			'id' => 'filter',
			'class' => '',
			'label' => 'Filter',
			'type' => 'select',
			'std' => 'yes',
			'des' => '',
			'options' => array(
				array('label' => 'yes', 'value' => 'yes'),
				array('label' => 'no', 'value' => 'no'),
			)
		),
		array(
			'id' => 'pagination',
			'class' => '',
			'label' => 'Pagination',
			'type' => 'select',
			'std' => 'yes',
			'des' => '',
			'options' => array(
				array('label' => 'yes', 'value' => 'yes'),
				array('label' => 'no', 'value' => 'no'),
			)
		),
		array(
			'id' => 'margin',
			'class' => '',
			'label' => 'Column Margin',
			'type' => 'text',
			'std' => '3',
			'des' => '',
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'image_size',
			'class' => '',
			'label' => 'Image Size',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


/*---------|- Blog Timeline -|----------*/
$tinymce_fields[] = array(
	'title' => 'Blog Timeline',
	'shortcode' => 'tk_blog_timeline',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'category',
			'class' => '',
			'label' => 'Category',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more category to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'category'
		),
		array(
			'id' => 'exclude_category',
			'class' => '',
			'label' => 'Exclude Category',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more category to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'category'
		),
		array(
			'id' => 'tags',
			'class' => '',
			'label' => 'Tags',
			'type' => 'taxonomy_multi_select',
			'std' => 'no',
			'des' => __( 'Select one or more Tag to filter your query', 'tallykit_textdomain' ),
			'taxonomy' => 'post_tag'
		),
		array(
			'id' => 'exclude_tags',
			'class' => '',
			'label' => 'Exclude Tags',
			'type' => 'taxonomy_multi_select',
			'std' => '',
			'des' => __( 'Select one or more Tag to Exclude from your query', 'tallykit_textdomain' ),
			'taxonomy' => 'post_tag'
		),
		array(
			'id' => 'relation',
			'class' => '',
			'label' => 'Relation',
			'type' => 'select',
			'std' => '',
			'des' => __( 'Query Relation with tags and Category', 'tallykit_textdomain' ),
			'options' => array(
				array('label' => 'AND', 'value' => 'AND'),
				array('label' => 'OR', 'value' => 'OR'),
			)
		),
		array(
			'id' => 'limit',
			'class' => '',
			'label' => 'Limit',
			'type' => 'text',
			'std' => '12',
			'des' => __( 'How many Post item you want to display?', 'tallykit_textdomain' ),
		),
		array(
			'id' => 'orderby',
			'class' => '',
			'label' => 'Orderby',
			'type' => 'select',
			'std' => 'post_date',
			'des' => '',
			'options' => array(
				array('label' => 'post_date', 'value' => 'post_date'),
				array('label' => 'none', 'value' => 'none'),
				array('label' => 'ID', 'value' => 'ID'),
				array('label' => 'title', 'value' => 'title'),
				array('label' => 'name', 'value' => 'name'),
				array('label' => 'date', 'value' => 'date'),
				array('label' => 'menu_order', 'value' => 'menu_order'),
			)
		),
		array(
			'id' => 'order',
			'class' => '',
			'label' => 'Order',
			'type' => 'select',
			'std' => 'DESC',
			'des' => '',
			'options' => array(
				array('label' => 'DESC', 'value' => 'DESC'),
				array('label' => 'ASC', 'value' => 'ASC'),
			)
		),
		array(
			'id' => 'ids',
			'class' => '',
			'label' => 'Portfolio IDs',
			'type' => 'post_multi_select',
			'std' => '',
			'des' => '',
			'post_type' => 'post'
		),
	)
);


/*---------|- Progress Bar -|----------*/
$tinymce_fields[] = array(
	'title' => 'Progress Bar',
	'shortcode' => 'tk_progress_bar',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'value',
			'class' => '',
			'label' => 'Bar value',
			'type' => 'text',
			'std' => '70',
			'des' => 'Example: 70 (1 to 100)',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Text',
			'type' => 'text',
			'std' => 'Web Development - 70%',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'filled_color',
			'class' => '',
			'label' => 'Filled Color',
			'type' => 'text',
			'std' => '#45b900',
			'des' => '',
		),
		array(
			'id' => 'unfilled_color',
			'class' => '',
			'label' => 'Unfilled Color',
			'type' => 'text',
			'std' => '#f0f0f0',
			'des' => '',
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);

/*---------|- Counter Box -|----------*/
$tinymce_fields[] = array(
	'title' => 'Counter Box',
	'shortcode' => 'tk_counter_box',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'value',
			'class' => '',
			'label' => 'Bar value',
			'type' => 'text',
			'std' => '70',
			'des' => 'Example: 70 (1 to 100)',
		),
		array(
			'id' => 'prefix',
			'class' => '',
			'label' => 'Prefix',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'suffix',
			'class' => '',
			'label' => 'Suffix',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Text',
			'type' => 'text',
			'std' => 'Web Development - 70%',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);

/*---------|- Counter (circle) -|----------*/
$tinymce_fields[] = array(
	'title' => 'Counter (circle)',
	'shortcode' => 'tk_counter_circle',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'value',
			'class' => '',
			'label' => 'Bar value',
			'type' => 'text',
			'std' => '70',
			'des' => 'Example: 70 (1 to 100)',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Text',
			'type' => 'text',
			'std' => 'Skill - 70%',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'filled_color',
			'class' => '',
			'label' => 'Filled Color',
			'type' => 'text',
			'std' => '#45b900',
			'des' => '',
		),
		array(
			'id' => 'unfilled_color',
			'class' => '',
			'label' => 'Unfilled Color',
			'type' => 'text',
			'std' => '#f0f0f0',
			'des' => '',
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);

/*---------|- tab -|----------*/
$tinymce_fields[] = array(
	'title' => 'Tab',
	'shortcode' => 'tk_tab',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Child Items',
			'type' => 'textarea',
			'std' => '[tk_tab_item title="title one"]......One...Sample Text is here.......[/tk_tab_item]
			[tk_tab_item title="title Two"]......Two...Sample Text is here.......[/tk_tab_item]
			[tk_tab_item title="title Three"]......Three...Sample Text is here.......[/tk_tab_item]',
			'des' => '',
			'content' => 'yes',//yes, no
		),
	)
);

/*---------|- callout -|----------*/
$tinymce_fields[] = array(
	'title' => 'Callout',
	'shortcode' => 'tk_callout',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'title',
			'class' => '',
			'label' => 'Title',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Text',
			'type' => 'textarea',
			'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget varius neque. Mauris egestas tellus eu libero viverra, quis faucibus nisi bibendum. ',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'button_text',
			'class' => '',
			'label' => 'Button Text',
			'type' => 'text',
			'std' => 'Button Text',
			'des' => '',
		),
		array(
			'id' => 'button_link',
			'class' => '',
			'label' => 'Button Link',
			'type' => 'text',
			'std' => '#',
			'des' => '',
		),
		array(
			'id' => 'button_link_target',
			'class' => '',
			'label' => 'Button Link Target',
			'type' => 'select',
			'std' => '_self',
			'des' => '',
			'options' => array(
				array('value' => '_self', 'label' => '_self'),
				array('value' => '_blank', 'label' => '_blank'),
			)
		),
		array(
			'id' => 'button_size',
			'class' => '',
			'label' => 'Button Size',
			'type' => 'select',
			'std' => '3x',
			'des' => '',
			'options' => array(
				array('value' => '1x', 'label' => '1x'),
				array('value' => '2x', 'label' => '2x'),
				array('value' => '3x', 'label' => '3x'),
				array('value' => '4x', 'label' => '4x'),
				array('value' => '5x', 'label' => '5x'),
			)
		),
		array(
			'id' => 'style',
			'class' => '',
			'label' => 'Style',
			'type' => 'select',
			'std' => 'center',
			'des' => '',
			'options' => array(
				array('value' => 'center', 'label' => 'center'),
				array('value' => 'center-border', 'label' => 'center-border'),
				array('value' => 'center-border-bg', 'label' => 'center-border-bg'),
				array('value' => 'left', 'label' => 'left'),
				array('value' => 'left-border', 'label' => 'left-border'),
				array('value' => 'left-border-bg', 'label' => 'left-border-bg'),
			)
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'Class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'content_width',
			'class' => '',
			'label' => 'Content Width',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: <strong>70%</strong>',
		),
	)
);


/*---------|- toggle -|----------*/
$tinymce_fields[] = array(
	'title' => 'Toggle',
	'shortcode' => 'tk_toggle',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'title',
			'class' => '',
			'label' => 'Title',
			'type' => 'text',
			'std' => 'Toggle Title',
			'des' => '',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'textarea',
			'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget varius neque. Mauris egestas tellus eu libero viverra, quis faucibus nisi bibendum. ',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'Class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);

/*---------|- tooltip -|----------*/
$tinymce_fields[] = array(
	'title' => 'Tooltip',
	'shortcode' => 'tk_tooltip',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'title',
			'class' => '',
			'label' => 'Title',
			'type' => 'text',
			'std' => 'Tooltip Title',
			'des' => '',
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'textarea',
			'std' => 'This is a Tooltip',
			'des' => '',
			'content' => 'yes',//yes, no
		),
	)
);

/*---------|- video -|----------*/
$tinymce_fields[] = array(
	'title' => 'Video',
	'shortcode' => 'tk_video',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'html5',
			'class' => '',
			'label' => 'Video Type',
			'type' => 'select',
			'std' => 'no',
			'des' => '',
			'options' => array(
				array('value' => 'no', 'label' => 'oembed'),
				array('value' => 'yes', 'label' => 'HTML5'),
			)
		),
		array(
			'id' => 'src',
			'class' => '',
			'label' => 'Src',
			'type' => 'text',
			'std' => 'https://www.youtube.com/watch?v=_YbVJoMYwJ0',
			'des' => 'If you select html5 video you have to enter a .mp4 video with full URL. Or if you select oembed, just copy and past the video url like youtube, vimeo',
		),
		array(
			'id' => 'w',
			'class' => '',
			'label' => 'Width Of the video',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'h',
			'class' => '',
			'label' => 'Height of the video',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'poster',
			'class' => '',
			'label' => 'Poster',
			'type' => 'text',
			'std' => '',
			'des' => 'Enter a Poster Image for the html5 video',
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


/*---------|- audio -|----------*/
$tinymce_fields[] = array(
	'title' => 'Audio',
	'shortcode' => 'tk_audio',
	'content' => 'no',//yes, no
	'fields' => array(
		array(
			'id' => 'html5',
			'class' => '',
			'label' => 'Audio Type',
			'type' => 'select',
			'std' => 'no',
			'des' => '',
			'options' => array(
				array('value' => 'no', 'label' => 'oembed'),
				array('value' => 'yes', 'label' => 'html5'),
			)
		),
		array(
			'id' => 'src',
			'class' => '',
			'label' => 'Src',
			'type' => 'text',
			'std' => 'https://soundcloud.com/lmpradio/dj-danny-s-memorial-day-weekend-mix-2014-lmp',
			'des' => 'If you select html5 audio you have to enter a .mp3 audio with full URL. Or if you select oembed, just copy and past the audio url like soundcloud',
		),
		array(
			'id' => 'w',
			'class' => '',
			'label' => 'Width Of the Audio',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'h',
			'class' => '',
			'label' => 'Height of the Audio',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'poster',
			'class' => '',
			'label' => 'Poster',
			'type' => 'text',
			'std' => '',
			'des' => 'Enter a Poster Image for the html5 Audio',
		),
		array(
			'id' => 'class',
			'class' => '',
			'label' => 'class',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


/*---------|- Heading -|----------*/
$tinymce_fields[] = array(
	'title' => 'Heading',
	'shortcode' => 'tk_heading',
	'content' => 'yes',//yes, no
	'fields' => array(
		array(
			'id' => 'tag',
			'class' => '',
			'label' => 'Tag',
			'type' => 'select',
			'std' => 'h2',
			'des' => '',
			'options' => array(
				array('value' => 'h1', 'label' => 'H1'),
				array('value' => 'h2', 'label' => 'H2'),
				array('value' => 'h3', 'label' => 'H3'),
				array('value' => 'h4', 'label' => 'H4'),
				array('value' => 'h5', 'label' => 'H5'),
				array('value' => 'h6', 'label' => 'H6'),
			)
		),
		array(
			'id' => 'content',
			'class' => '',
			'label' => 'Content',
			'type' => 'textarea',
			'std' => 'Sample Heading is Here.',
			'des' => '',
			'content' => 'yes',//yes, no
		),
		array(
			'id' => 'animation_type',
			'class' => '',
			'label' => 'Animation Type',
			'type' => 'animate_css_select',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'animation_duration',
			'class' => '',
			'label' => 'Animation Duration',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
		array(
			'id' => 'id',
			'class' => '',
			'label' => 'ID',
			'type' => 'text',
			'std' => '',
			'des' => '',
		),
	)
);


$settings = array(
	'uid' => 'tallykit_shortcode_tinymce',
	'button_title' => '<div class="dashicons dashicons-editor-code" style="line-height:27px;"></div>',
	'button_url' => '',
	'title' => 'Insert Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_shortcode_tinymce = new acoc_tinymce_register($settings);