<?php
$options = array();

/* Component List
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'theme_name',
	'class'		=> '',
	'label'		=> 'Theme Name',
	'type'		=> 'text',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'heading_1',
	'class'		=> '',
	'label'		=> 'Component List',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'buddypress',
	'class'		=> 'component-list-item',
	'label'		=> 'Buddypress',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'doc',
	'class'		=> 'component-list-item',
	'label'		=> 'Doc',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'FrontPage',
	'class'		=> 'component-list-item',
	'label'		=> 'FrontPage',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'gallery',
	'class'		=> 'component-list-item',
	'label'		=> 'Gallery',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'logo',
	'class'		=> 'component-list-item',
	'label'		=> 'Logo',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'parallax',
	'class'		=> 'component-list-item',
	'label'		=> 'Parallax',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'people',
	'class'		=> 'component-list-item',
	'label'		=> 'People',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'portfolio',
	'class'		=> 'component-list-item',
	'label'		=> 'Portfolio',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'shortcodes',
	'class'		=> 'component-list-item',
	'label'		=> 'Shortcodes',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'slideshow',
	'class'		=> 'component-list-item',
	'label'		=> 'Slideshow',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'testimonial',
	'class'		=> 'component-list-item',
	'label'		=> 'Testimonial',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);


/* Shortcode List ::: buddypress
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_buddypress',
	'class'		=> '',
	'label'		=> 'Buddypress Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_buddypress_members',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_buddypress_members',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_buddypress_groups',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_buddypress_groups',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);


/* Shortcode List ::: Doc
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_doc',
	'class'		=> '',
	'label'		=> 'Doc Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_doc_archive',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_doc_archive',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_doc_single',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_doc_single',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);


/* Shortcode List ::: Gellery
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_gallery',
	'class'		=> '',
	'label'		=> 'Gallery Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_album',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_album',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_gallery',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_gallery',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);


/* Shortcode List ::: Logo
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_logo',
	'class'		=> '',
	'label'		=> 'Logo Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_logo_grid',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_logo_grid',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_logo_carousel',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_logo_carousel',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_logo_slideshow',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_logo_slideshow',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);



/* Shortcode List ::: people
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_people',
	'class'		=> '',
	'label'		=> 'People Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_people_grid',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_people_grid',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_people_carousel',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_people_carousel',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_people_slideshow',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_people_slideshow',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);



/* Shortcode List ::: portfolio
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_portfolio',
	'class'		=> '',
	'label'		=> 'Portfolio Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_portfolio_grid',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_portfolio_grid',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_portfolio_carousel',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_portfolio_carousel',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_portfolio_slideshow',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_portfolio_slideshow',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);


/* Shortcode List ::: testimonial
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_testimonial',
	'class'		=> '',
	'label'		=> 'Testimonial Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_testimonial_grid',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_testimonial_grid',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_testimonial_carousel',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_testimonial_carousel',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_testimonial_slideshow',
	'class'		=> 'component-list-item-2',
	'label'		=> 'tk_testimonial_slideshow',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);


/* Shortcode List ::: Shortcode
---------------------------------------------------*/
$options[] = array(
	'id'		=> 'heading_Shortcodes',
	'class'		=> '',
	'label'		=> 'Shortcodes Shortcodes',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
);
$options[] = array(
	'id'		=> 'tk_row',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_row',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_accordion',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_accordion',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_alert',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_alert',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_button',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_button',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_checklist',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_checklist',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_column',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_column',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_divider',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_divider',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_dropcap',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_dropcap',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_icon',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_icon',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_highlight',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_highlight',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_lightbox',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_lightbox',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_map',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_map',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_blog_grid',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_blog_grid',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_progress_bar',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_progress_bar',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_counter_box',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_counter_box',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_counter_circle',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_counter_circle',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_tab',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_tab',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_callout',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_callout',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_toggle',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_toggle',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_tooltip',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_tooltip',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_video',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_video',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_audio',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_audio',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_blog_timeline',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_blog_timeline',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);
$options[] = array(
	'id'		=> 'tk_heading',
	'class'		=> 'component-list-item-1',
	'label'		=> 'tk_heading',
	'type'		=> 'select',
	'std'		=> '',
	'des'		=> '',
	'filter'	=> '', //sanitize_text_field, esc_attr
	'options'	=> array(
		array('value' => 'no', 'label' => 'No'),
		array('value' => 'yes', 'label' => 'Yes'),
	)
);

$options[] = array(
	'id'		=> 'get_the_code',
	'class'		=> '',
	'label'		=> 'Get the Code',
	'type'		=> 'heading',
	'std'		=> '',
	'des'		=> '<textarea rows="20"style="width:100%;" onclick="this.focus();this.select()" readonly="readonly">'.tallykit_encode( serialize(get_option('tk_dav_settings') )).'</textarea>',
	'filter'	=> '', //sanitize_text_field, esc_attr
);



/*--------------------------------------------------
	Setup the Settings
---------------------------------------------------*/
$settings = array(
	'id'			=> 'tk_dav_settings',
	'option_name'	=> 'tk_dav_settings',
	'page_title'	=> "TallyKit Dev",
	'menu_title'	=> "TallyKit Dev",
	'capability'	=> 'manage_options',
	'menu_slug'		=> 'tk_dav_settings',
	'parent_slug'	=> NULL,
	'icon_url'		=> NULL,
	'position'		=> NULL,
	'fields'		=> $options
);
if(defined('TALLYKIT_DEV_SETTINGS')){ new acoc_setting_api_class($settings); }