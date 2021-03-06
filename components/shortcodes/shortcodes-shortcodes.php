<?php
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/


/*---------|- Row -|-------------------------------------*/
add_shortcode('tk_row', 'tallykit_shortcodes_sc_row');
function tallykit_shortcodes_sc_row( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'color_mood' => '',
		'width' => '',
		'menu_anchor' => '',
		'heading_color' => '',
		'text_color' => '',
		'inner_border_color' => '',
		'bg_color' => '',
		'bg_image' => '',
		'bg_repeat' => '',
		'bg_attachment' => '',
		'bg_position' => '',
		'bg_size' => '',
		'border_size' => '',
		'border_color' => '',
		'border_style' => '',
		'padding_top' => '',
		'padding_bottom' => '',
		'class' => '',
		'id' => '',
		'text_align' => '',
	), $atts ) );
	
	if(tallykit_get_settings('tk_row') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '';
	$rand = 'tallykit-shortcode-row-'.rand();
	
	$style = '';
	if($bg_color){ $style .= 'background-color:'.$bg_color.'; '; }
	if($bg_image){ $style .= 'background-image:url('.$bg_image.'); '; }
	if($bg_repeat){ $style .= 'background-repeat:'.$bg_repeat.'; '; }
	if($bg_attachment){ $style .= 'background-attachment:'.$bg_attachment.'; '; }
	if($bg_position){ $style .= 'background-position:'.$bg_position.'; '; }
	if($bg_size){ $style .= 'background-size:'.$bg_size.'; '; }
	if($border_size){ $style .= 'border-top:'.$border_size.'; border-bottom:'.$border_size.'; '; }
	if($border_color){ $style .= 'border-color:'.$border_color.'; '; }
	if($border_style){ $style .= 'border-style:'.$border_style.'; '; }
	if($padding_top){ $style .= 'padding-top:'.$padding_top.'; '; }
	if($padding_bottom){ $style .= 'padding-bottom:'.$padding_bottom.'; '; }
	if($text_align){ $style .= 'text-align:'.$text_align.'; '; }
	
	$the_width = '';
	if( $width == '100%' ){ $the_width = 'width:100%;'; }
		
	$child_element_colors = '';
	if($text_color)			{ $child_element_colors .= 'data-tk-shortcode-row-text-color="'.$text_color.'" '; } //
	if($inner_border_color)	{ $child_element_colors .= 'data-tk-shortcode-row-border-color="'.$inner_border_color.'" '; }
	if($heading_color)		{ $child_element_colors .= 'data-tk-shortcode-row-h-color="'.$heading_color.'" '; }
	
	if($id){ $output .= '<div id="'.$id.'"></div>'; }
	$output .= '<div class="tallykit-shortcode-row '.$class.' color_mood_'.$color_mood.'" style="'.$style.' " id="'.$rand.'" '.$child_element_colors.'>';
		$output .= '<div class="tk-shortcode-row-inner" style="max-width:'.$width.'; '.$the_width.'">';
			$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}

/*---------|- admin only -|-------------------------------------*/
add_shortcode('ato', 'tallykit_shortcodes_sc_admin_only');
function tallykit_shortcodes_sc_admin_only( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		't'	=> ''
	), $atts ) );
	
	return '<!--'.$t.'-->';
}


/*---------|- accordion -|-------------------------------------*/
add_shortcode('tk_accordion', 'tallykit_shortcodes_sc_accordion');
function tallykit_shortcodes_sc_accordion( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'class'	=> ''
	), $atts ) );
	
	if(tallykit_get_settings('tk_accordion') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	return '<div class="tallykit-shortcode-accordion '. $class .'">' . do_shortcode($content) . '<span class="acoc-clear"></span></div>';
}

add_shortcode('tk_accordion_item', 'tallykit_shortcodes_sc_accordion_item');
function tallykit_shortcodes_sc_accordion_item( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'title'	=> 'Title',
		'class'	=> '',
	), $atts ) );
	$output = '';
	
	$output .= '<h3 class="tallykit-shortcode-accordion-trigger '. $class .'">';
		$output .= '<a href="#">'. $title .'</a>';
	$output .= '</h3>';
	$output .= '<div>';
		$output .= do_shortcode($content);
		$output .= '<div class="acoc-clear"></div>';
	$output .= '</div>';
	
	return $output; 
}



/*---------|- alert -|-------------------------------------*/
add_shortcode('tk_alert', 'tallykit_shortcodes_sc_alert');
function tallykit_shortcodes_sc_alert( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'title' => '',
		'type' => 'info', //danger, success, error, info, 
		'close' => 'yes',
		
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts ) );
	
	if(tallykit_get_settings('tk_alert') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '';
	
	$output .= '<div class="tallykit-shortcode-alert tallykit-shortcode-alert-block tallykit-shortcode-alert-'.$type.' wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0">';
		if( $close == 'yes'){ $output .= '<div class="tallykit-shortcode-alert-close">×</div>'; }
		if( $title != ''){ $output .= '<h4 class="tallykit-shortcode-alert-heading">'.$title.'</h4>'; }
		$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;
}



/*---------|- button -|-------------------------------------*/
add_shortcode('tk_button', 'tallykit_shortcodes_sc_button');
function tallykit_shortcodes_sc_button( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'color'			=> 'default', //accent, default
		'style'			=> 'fill', //fill, border
		'size'			=> '3x', //1x, 2x, 3x, 4x, 5x
		'link'			=> '#',
		'text'			=> 'Button',
		'target'		=> '',
		'rel'			=> '',
		'class'			=> '',
		'icon_left'		=> '',
		'icon_right'	=> '',
		'id'	        => '',
		'full_width'    => 'no', //yes, no
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts ) );
	
	if(tallykit_get_settings('tk_button') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '';
		
	//icon
	$icon_left = ($icon_left) ? '<i class="fa '. $icon_left .'"></i>' : NULL;
	$icon_right = ($icon_right) ? '<i class="fa '. $icon_right .'"></i>' : NULL;
	
	//attribute
	$rel = ($rel) ? 'rel="'.$rel.'" ':NULL;
	$target = ($target) ? 'target="'.$target.'" ':NULL;
	$id = ($id) ? 'id="'.$id.'" ':NULL;
		
	//class
	$icon_left_class = ($icon_left) ? 'icon-left' : NULL;
	$icon_right_class = ($icon_right) ? 'icon-right' : NULL;
	$button_class = 'class="tallykit-shortcode-button '.$class.' style-'.$style.' size-'.$size.' color-'.$color.' full-width-'.$full_width.' '.$icon_left_class.' '.$icon_right_class.' wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0"  ';
		
	$output .= '<a href="'.$link.'" '.$button_class.$rel.$target.$id.'>'.$icon_left.$text.$icon_right.'</a>';
	
	return $output;
}



/*---------|- checklist -|-------------------------------------*/
add_shortcode('tk_checklist', 'tallykit_shortcodes_sc_checklist');
function tallykit_shortcodes_sc_checklist( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'icon' => 'arrow', //check, star, arrow, asterik, cross, plus
		'iconcolor' => 'initial',
		'iconbg' => '',
		'iconsize' => '1x',
		'circle' => 'yes',
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts));
	
	if(tallykit_get_settings('tk_checklist') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$rand = rand();
	$output = '';
	
	$color_settings = '';
	if($iconcolor){ $color_settings .= 'data-tk-shortcode-checklist-iconcolor="'.$iconcolor.'" '; }
	if($iconcolor){ $color_settings .= 'data-tk-shortcode-checklist-iconbg="'.$iconbg.'" '; }
	if($iconcolor){ $color_settings .= 'data-tk-shortcode-checklist-iconsize="'.$iconsize.'" '; }
	
	$output .= '<div class="tallykit-shortcode-checklist tallykit-shortcode-checklist-circle-'.$circle.' tallykit-shortcode-checklist-icon-'.$icon.' wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0" id="tallykit-shortcode-checklist-'.$rand.'" '.$color_settings.'>';
		$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;	
}



/*---------|- column -|-------------------------------------*/
add_shortcode('tk_column', 'tallykit_shortcodes_sc_column');
function tallykit_shortcodes_sc_column( $atts, $content = null ){
	extract( shortcode_atts( array(
		'size'		=> 'one-third', //one-half, one-third, two-third, 
		'position'	=>'first',
		'class'		=> '',
		'bg_color' => '',
		'text_align' => '',
		'text_color' => '',
		'heading_color' => '',
		'border_color' => '',
		'padding' => '',
		
		'animation_type' => '',
		'animation_duration' => '0.5s',
	  ), $atts ) );
	  
	  if(tallykit_get_settings('tk_column') == 'no'){ return tallykit_shortcode_alt_notice(); }
		  
	  $output = '';
	  $uid = 'tallykit-shortcode-column'.rand();
	  $bg_color = ($bg_color) ? 'background-color:'.$bg_color.'; ' : '';
	  $padding = ($padding) ? 'padding:'.$padding.';' : '';
	  $text_align = ($text_align) ? 'text-align:'.$text_align.'; ' : '';
		  
	$child_element_colors = '';
	if($text_color)			{ $child_element_colors .= 'data-tk-text-color="'.$text_color.'"'; } //
	if($border_color)	{ $child_element_colors .= 'data-tk-border-color="'.$border_color.'"'; }
	if($heading_color)		{ $child_element_colors .= 'data-tk-h-color="'.$heading_color.'"'; }
		  
	$output .= '<div id="'.$uid.'" class="tallykit-shortcode-column tallykit-shortcode-' . $size . ' tallykit-shortcode-column-'.$position.' '. $class .' wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0" style="'.$bg_color.$text_align.'" '.$child_element_colors.'>';
		$output .= '<div class="tallykit-shortcode-column-inner" style="'.$padding.'">' . do_shortcode($content) . '</div>';
	$output .= '</div>';
	if($position == 'last'){$output .= '<div class="acoc-clear"></div><div class="tallykit-shortcode-clear"></div><div class="acoc-clear"></div>';}
	
	return $output;
}



/*---------|- divider -|-------------------------------------*/
add_shortcode('tk_divider', 'tallykit_shortcodes_sc_divider');
function tallykit_shortcodes_sc_divider($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => 'none', //single, double, dotted, dashed, shadow
		'margin_top' => '20px',
		'margin_bottom' => '2px',
	), $atts));
	
	if(tallykit_get_settings('tk_divider') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '';
	$rand = rand();
	$css = 'margin-bottom:'.$margin_bottom.'; margin-top:'.$margin_top.';';
	
	$output .= '<div class="acoc-clear"></div>';
	$output .= '<div class="tallykit-shortcode-divider tallykit-shortcode-divider-style-'.$style.'" id="tallykit-shortcode-divider-'.$rand.'" style="'.$css.'"></div>';
	$output .= '<div class="acoc-clear"></div>';
	
	return $output;
}



/*---------|- dropcap -|-------------------------------------*/
add_shortcode('tk_dropcap', 'tallykit_shortcodes_sc_dropcap');
function tallykit_shortcodes_sc_dropcap( $atts, $content = null ) {  
	extract(shortcode_atts(array(
		'style' => 'none', //circle, box, round
	), $atts));
	
	if(tallykit_get_settings('tk_dropcap') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '';
	$rand = rand();
	$output .= '<span class="tallykit-shortcode-dropcap tallykit-shortcode-dropcap-style-'.$style.'" id="tallykit-shortcode-dropcap-'.$rand.'">'.do_shortcode($content).'</span>';
	return $output;
}



/*---------|- icon -|-------------------------------------*/
add_shortcode('tk_icon', 'tallykit_shortcodes_sc_icon');
function tallykit_shortcodes_sc_icon( $atts, $content = null ) {  
	extract(shortcode_atts(array(
		'icon' => 'fa-arrows',
		'shape' => '', //circle, round,
		'style' => 'none', //background, border
		'color' => '#666',
		'size' => '2x', // 1x, 2x, 3x, 4x, 5x, 6x
		'effect' => '', //rotate, fade
		'align' => '', //none, left, right, center
		'link' => '',
		'link_target' => '_self', //_blank, _self
		
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts));
	
	if(tallykit_get_settings('tk_icon') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '';
	$rand = rand();
	
	$css = 'color:'.$color.'; ';
	if($style == 'background'){ $css .= 'background-color:'.$color.'; color:#ffffff !important; '; }
	if($style == 'border'){ $css .= 'border-color:'.$color.'; '; }
	
	if(!empty($link)){ $output .= '<a href="'.$link.'" target="'.$link_target.'">'; }
	$output .= '<i class="tallykit-shortcode-icon  tallykit-shortcode-icon-shape-'.$shape.'  tallykit-shortcode-icon-size-'.$size.' tallykit-shortcode-icon-effect-'.$effect.' tallykit-shortcode-icon-align-'.$align.' tallykit-shortcode-icon-style-'.$style.' fa '.$icon.' wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0" id="tallykit-shortcode-icon-'.$rand.'" style="'.$css.'"></i>';
	if(!empty($link)){ $output .= '</a>'; }
	
	return $output;	
}



/*---------|- highlight -|-------------------------------------*/
add_shortcode('tk_highlight', 'tallykit_shortcodes_sc_highlight');
function tallykit_shortcodes_sc_highlight($atts, $content = null) {
	$atts = shortcode_atts(array(
		'color' => 'yellow',
	), $atts);
	
	if(tallykit_get_settings('tk_highlight') == 'no'){ return tallykit_shortcode_alt_notice(); }
			
	if($atts['color'] == 'black') {
		return '<span class="tallykit-shortcode-highlight2" style="background-color:'.$atts['color'].'; color:#fff;">' .do_shortcode($content). '</span>';
	} else {
		return '<span class="tallykit-shortcode-highlight1" style="background-color:'.$atts['color'].';">' .do_shortcode($content). '</span>';
	}
}



/*---------|- lightbox -|-------------------------------------*/
add_shortcode('tk_lightbox', 'tallykit_shortcodes_sc_lightbox');
function tallykit_shortcodes_sc_lightbox($atts, $content = null) {
	extract( shortcode_atts( array(
		'class' => '',
		'src' => '',
		'title' => '',
		'type' => 'image', //iframe, image
	), $atts ) );
	
	if(tallykit_get_settings('tk_lightbox') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$magnificPopup = 'acoc-magnificPopup-image';
	
	
	$output = '';
	$output .= '<a href="'.$src.'" title="'.$title.'" class="acoc-magnificPopup-'.$type.' '.$class.'">';
		$output .= do_shortcode($content);
	$output .= '</a>'; 

	return $output;
}



/*---------|- map -|-------------------------------------*/
add_shortcode('tk_map', 'tallykit_shortcodes_sc_map');
function tallykit_shortcodes_sc_map($atts, $content = null) {

	extract(shortcode_atts(array(
		'address' => '',
		'type' => 'satellite', // ROADMAP, SATELLITE, HYBRID, TERRAIN
		'width' => '100%',
		'height' => '300px',
		'zoom' => '15',
		'scrollwheel' => 'true',
		'scale' => 'true',
		'popup' => 'true',
		'zoom_pancontrol' => 'true',
		'icon' => NULL,
	), $atts));
	
	if(tallykit_get_settings('tk_map') == 'no'){ return tallykit_shortcode_alt_notice(); }

	$uid = 'tallykit-shortcode-map'.rand();

	if($scrollwheel == 'yes') {
		$scrollwheel = 'true';
	} elseif($scrollwheel == 'no') {
		$scrollwheel = 'false';
	}

	if($scale == 'yes') {
		$scale = 'true';
	} elseif($scale == 'no') {
		$scale = 'false';
	}

	if($zoom_pancontrol == 'yes') {
		$zoom_pancontrol = 'true';
	} elseif($zoom_pancontrol == 'no') {
		$zoom_pancontrol = 'false';
	}

	$addresses = explode('|', $address);
	if($icon){ $icon = "icon: '".$icon."', "; }

	$markers = '';
	foreach($addresses as $address_string) {
		$markers .= "{
			address: '{$address_string}',
			".$icon."
			html: {
				content: '{$address_string}',
				popup: {$popup}
			} 
		},";	
	}

	$html = "<script type='text/javascript'>
	jQuery(document).ready(function($) {
		jQuery('#".$uid."').goMap({
			address: '{$addresses[0]}',
			zoom: {$zoom},
			scrollwheel: {$scrollwheel},
			scaleControl: {$scale},
			navigationControl: {$zoom_pancontrol},
			maptype: '{$type}',
	        markers: [{$markers}]
		});
	});
	</script>";

	$html .= '<div class="tallykit-shortcode-map" id="'.$uid.'" style="width:'.$width.';height:'.$height.';">';
	$html .= '</div>';

	return $html;
}



/*---------|- Blog Grid -|-------------------------------------*/
add_shortcode('tk_blog_grid', 'tallykit_shortcodes_sc_blog_grid');
function tallykit_shortcodes_sc_blog_grid( $atts, $content = null ) {
	extract( shortcode_atts( array(
			/*query*/
			'category'         => '',
			'exclude_category' => '',
			'tags'             => '',
			'exclude_tags'     => '',
			'relation'         => 'AND',
			'limit'            => 12,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'ids'              => '',
			
			/*grid*/
			'filter'		   => 'yes',
			'margin'		   => '3',
			'columns'          => '3',
			'pagination'		=> 'yes',
			
			'animation_type' => '',
			'animation_duration' => '0.5s',
			
			'image_size'	=> ''
		), $atts)
	);
	
	if(tallykit_get_settings('tk_blog_grid') == 'no'){ return tallykit_shortcode_alt_notice(); }	
	
	$query = array(
		'post_type'      => 'post',
		'posts_per_page' => $limit,
		'orderby'        => $orderby,
		'order'          => $order
	);

	switch ( $orderby ) {
		case 'title':
			$query['orderby'] = 'title';
		break;

		case 'id':
			$query['orderby'] = 'ID';
		break;

		case 'random':
			$query['orderby'] = 'rand';
		break;

		default:
			$query['orderby'] = 'post_date';
		break;
	}

	if ( $tags || $category || $exclude_category || $exclude_tags ) {
		$query['tax_query'] = array(
			'relation'     => $relation
		);

		if ( $tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'terms'    => explode( ',', $tags ),
				'field'    => 'slug'
			);
		}

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}

		if ( $exclude_tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'terms'    => explode( ',', $exclude_tags ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}
	}

	if( ! empty( $ids ) )
		$query['post__in'] = explode( ',', $ids );

	if ( get_query_var( 'paged' ) )
		$query['paged'] = get_query_var('paged');
	else if ( get_query_var( 'page' ) )
		$query['paged'] = get_query_var( 'page' );
	else
		$query['paged'] = 1;

	
	if($image_size != ''){
		$image_size = explode("x", $image_size);
	}else{
		$image_size = array(600, 500);
	}
	
	
	ob_start();
	include(tallykit_shortcodes_template_path('dri', 'blog/blog-grid.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
	
}



/*---------|- progress-bar -|-------------------------------------*/
add_shortcode('tk_progress_bar', 'tallykit_shortcodes_sc_tk_progress_bar');
function tallykit_shortcodes_sc_tk_progress_bar($atts, $content = null) {
	extract(shortcode_atts(array(
		'filled_color' => '#45b900',
		'unfilled_color' => '#f0f0f0',
		'value' => '70',
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts));
	
	if(tallykit_get_settings('tk_progress_bar') == 'no'){ return tallykit_shortcode_alt_notice(); }

	$output = '';
	$output .= '<div class="tallykit-shortcode-progressBar wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0" style="background-color:'.$unfilled_color.' !important;border-color:'.$unfilled_color.' !important;">';
		$output .= '<div class="tallykit-shortcode-progressBar-content" data-percentage="'.$value.'" style="width: ' . $value . '%;background-color:'.$filled_color.' !important;border-color:'.$filled_color.' !important;">';
		$output .= '</div>';
		$output .= '<span class="tallykit-shortcode-progressBar-title">' . $content .'</span>';
	$output .= '</div>';

	return $output;
}



/*---------|- Counter Box -|-------------------------------------*/
add_shortcode('tk_counter_box', 'tallykit_shortcodes_sc_tk_counter_box');
function tallykit_shortcodes_sc_tk_counter_box($atts, $content = null) {
	extract(shortcode_atts(array(
		'value' => '70',
		'prefix' => '', 
		'suffix' => '',
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts));
	
	if(tallykit_get_settings('tk_counter_box') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	if($prefix){ $prefix = '<span class="prefix">'.$prefix.'</span>'; }
	if($suffix){ $suffix = '<span class="suffix">'.$suffix.'</span>'; }

	$output = '';
	$output .= '<div class="tallykit-shortcode-counterBox-wrapper wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0">';
		$output .= '<div class="tallykit-shortcode-counterBox-percentage">';
			$output .= $prefix.'<span class="display-percentage" data-percentage="'.$value.'">0</span>'.$suffix;
		$output .= '</div>';
		$output .= '<div class="tallykit-shortcode-counterBox-content">';
			$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}



/*---------|- Counter (circle) -|-------------------------------------*/
add_shortcode('tk_counter_circle', 'tallykit_shortcodes_sc_tk_counter_circle');
function tallykit_shortcodes_sc_tk_counter_circle($atts, $content = null) {
	extract(shortcode_atts(array(
		'filled_color' => '#45b900',
		'unfilled_color' => '#f1f1f1',
		'value' => '70',
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts));
	
	if(tallykit_get_settings('tk_counter_circle') == 'no'){ return tallykit_shortcode_alt_notice(); }

	$uid = 'tallykit_shortcode_CounterCircle'.rand();

	$output = "<script type='text/javascript'>
	jQuery(document).ready(function() {
		var opts = {
		  lines: 12, // The number of lines to draw
		  angle: 0.5, // The length of each line
		  lineWidth: 0.05, // The line thickness
		  colorStart: '".$filled_color."',   // Colors
		  colorStop: '".$filled_color."',    // just experiment with them
		  strokeColor: '".$unfilled_color."',   // to see which ones work best for you
		  generateGradient: false
		};
		var gauge_".$uid." = new Donut(document.getElementById('".$uid."')).setOptions(opts);
		gauge_".$uid.".maxValue = 100; // set max gauge value
		gauge_".$uid.".animationSpeed = 128; // set animation speed (32 is default value)
		gauge_".$uid.".set(".$value."); // set actual value
	});
	</script>";


	$output .= '<div class="tallykit-shortcode-CounterCircle-wrapper wow '.$animation_type.'" data-wow-duration="'.$animation_duration.'" data-wow-offset="0">';
		$output .= '<canvas width="220" height="220" class="tallykit-shortcode-CounterCircle" id="'.$uid.'">';
		$output .= '</canvas>';
		$output .= '<div class="tallykit-shortcode-CounterCircle-content">';
			$output .= do_shortcode($content);
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}



/*---------|- tab -|-------------------------------------*/
add_shortcode('tk_tab', 'tallykit_shortcodes_sc_tab');
function tallykit_shortcodes_sc_tab( $atts, $content = null ) {
	$defaults = array();
	extract( shortcode_atts( $defaults, $atts ) );
	
	if(tallykit_get_settings('tk_tab') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	preg_match_all( '/tab_item title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	$tab_titles = array();
	if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
	$output = '';
	if( count($tab_titles) ){
	    $output .= '<div id="tallykit-shortcode-tab-'. rand(1, 100) .'" class="tallykit-shortcode-tabs">';
		$output .= '<ul class="ui-tabs-nav ">';
		foreach( $tab_titles as $tab ){
			$output .= '<li><a href="#tallykit-shortcode-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
		}
	    $output .= '</ul><div class="acoc-clear"></div>';
	    $output .= do_shortcode( $content );
	    $output .= '</div>';
	} else {
		$output .= do_shortcode( $content );
	}
	return $output;
}

add_shortcode('tk_tab_item', 'tallykit_shortcodes_sc_tab_item');
function tallykit_shortcodes_sc_tab_item( $atts, $content = null ) {
	$defaults = array(
			'title'	=> 'Tab',
			'class'	=> ''
	);
	extract( shortcode_atts( $defaults, $atts ) );
	return '<div id="tallykit-shortcode-tab-'. sanitize_title( $title ) .'" class="tab-content '. $class .'">'. do_shortcode( $content ) .'</div>';
}



/*---------|- callout -|-------------------------------------*/
add_shortcode('tk_callout', 'tallykit_shortcodes_sc_callout');
function tallykit_shortcodes_sc_callout( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title'	=> 'This is a Simple Callout Title',
		'class'	=> '',
		'button_size'	=> '3x',
		'button_text'	=> 'Button Text',
		'button_link'	=> '#',
		'button_link_target'	=> '_self', // _blank, _self
		'style'	=> 'center-border', /* center, center-border, center-border-bg, left, left-border, left-border-bg*/
		'content_width'	=> '',
	), $atts ) );
	
	if(tallykit_get_settings('tk_callout') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '';
	
	if(($content_width != '') && (($style == 'left') || ($style == 'left-border') || ($style == 'left-border-bg') )){ $content_width = 'width:'.$content_width.';'; }
	
	$output .= '<div class="tallykit-shortcode-callout style-'.$style.' '.$class.'">';
		$output .= '<div class="tk-shortcode-callout-inner">';
			if($title){ $output .= '<h3 class="tk-shortcode-callout-title" style="'.$content_width.'">'.$title.'</h3>'; }
			if($content){ $output .= '<div class="tk-shortcode-callout-content" style="'.$content_width.'">'.do_shortcode($content).'</div>'; }
			if($button_link){ $output .= do_shortcode('[tk_button text="'.$button_text.'" link="'.$button_link.'" target="'.$button_link_target.'" color="default" size="'.$button_size.'" style="border" rel="" class="" icon_left="" icon_right="" full_width="no" /]'); }
		$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}



/*---------|- toggle -|-------------------------------------*/
add_shortcode('tk_toggle', 'tallykit_shortcodes_sc_toggle');
function tallykit_shortcodes_sc_toggle( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title'	=> 'Toggle Title',
		'class'	=> '',
	), $atts ) );
	
	if(tallykit_get_settings('tk_toggle') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	// Display the Toggle
	return '<div class="tallykit-shortcode-toggle '. $class .'"><h3 class="tallykit-shortcode-toggle-trigger">'. $title .'</h3><div class="tallykit-shortcode-toggle-container">' . do_shortcode($content) . '</div></div>';
}



/*---------|- tooltip -|-------------------------------------*/
add_shortcode('tk_tooltip', 'tallykit_shortcodes_sc_tooltip');
function tallykit_shortcodes_sc_tooltip($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => 'none',
	), $atts));
	
	if(tallykit_get_settings('tk_tooltip') == 'no'){ return tallykit_shortcode_alt_notice(); }

	$html = '<span class="tallykit-shortcode-tooltip" title="'.$title.'">';
		$html .= do_shortcode($content);
	$html .= '</span>';

	return $html;
}



/*---------|- video -|-------------------------------------*/
add_shortcode('tk_video', 'tallykit_shortcodes_sc_video');
function tallykit_shortcodes_sc_video($atts, $content = null) {
	extract(shortcode_atts(array(
		'w' => '',
		'h' => '',
		'src' => '',
		'class' => '',
		'html5' => 'no',
		'poster' => '',
	), $atts));
	
	if(tallykit_get_settings('tk_video') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '<div class="tallykit-shortcode-video '.$class.' tallykit-shortcode-video-html5-'.$html5.'">';
		if($html5 == 'yes'){
			$output .= do_shortcode('[video src="'.$src.'" poster="'.$poster.'"]');
		}else{
			$output .= wp_oembed_get($src, array('width'=>$w, 'height'=>$h));
		}
	$output .= '</div>';
	
	if($src != ''){ return $output; }
}



/*---------|- audio -|-------------------------------------*/
add_shortcode('tk_audio', 'tallykit_shortcodes_sc_audio');
function tallykit_shortcodes_sc_audio($atts, $content = null) {
	extract(shortcode_atts(array(
		'w' => '',
		'h' => '',
		'src' => '',
		'class' => '',
		'html5' => 'no',
		'poster' => '',
	), $atts));
	
	if(tallykit_get_settings('tk_audio') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$output = '<div class="tallykit-shortcode-audio '.$class.' tallykit-shortcode-audio-html5-'.$html5.'">';
		if($html5 == 'yes'){
			if($poster != ''){$output .= '<img src="'.$poster.'" alt="'.$src.'">';}
			$output .= do_shortcode('[audio src="'.$src.'"]');
		}else{
			$output .= wp_oembed_get($src, array('width'=>$w, 'height'=>$h));
		}
	$output .= '</div>';
	
	if($src != ''){ return $output; }
}



/*---------|- Blog Timeline -|-------------------------------------*/
add_shortcode('tk_blog_timeline', 'tallykit_shortcodes_sc_blog_timeline');
function tallykit_shortcodes_sc_blog_timeline($atts, $content = null) {
	extract(shortcode_atts(array(
		/*query*/
		'category'         => '',
		'exclude_category' => '',
		'tags'             => '',
		'exclude_tags'     => '',
		'relation'         => 'AND',
		'limit'            => '-1',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'ids'              => '',
	), $atts));
	
	if(tallykit_get_settings('tk_blog_timeline') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$query = array(
		'post_type'      => 'post',
		'posts_per_page' => $limit,
		'orderby'        => $orderby,
		'order'          => $order
	);

	switch ( $orderby ) {
		case 'title':
			$query['orderby'] = 'title';
		break;

		case 'id':
			$query['orderby'] = 'ID';
		break;

		case 'random':
			$query['orderby'] = 'rand';
		break;

		default:
			$query['orderby'] = 'post_date';
		break;
	}

	if ( $tags || $category || $exclude_category || $exclude_tags ) {
		$query['tax_query'] = array(
			'relation'     => $relation
		);

		if ( $tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'terms'    => explode( ',', $tags ),
				'field'    => 'slug'
			);
		}

		if ( $category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'category',
				'terms'    => explode( ',', $category ),
				'field'    => 'slug'
			);
		}

		if ( $exclude_category ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'category',
				'terms'    => explode( ',', $exclude_category ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}

		if ( $exclude_tags ) {
			$query['tax_query'][] = array(
				'taxonomy' => 'post_tag',
				'terms'    => explode( ',', $exclude_tags ),
				'field'    => 'slug',
				'operator' => 'NOT IN',
			);
		}
	}

	if( ! empty( $ids ) )
		$query['post__in'] = explode( ',', $ids );

	if ( get_query_var( 'paged' ) )
		$query['paged'] = get_query_var('paged');
	else if ( get_query_var( 'page' ) )
		$query['paged'] = get_query_var( 'page' );
	else
		$query['paged'] = 1;

	
	ob_start();
	include(tallykit_shortcodes_template_path('dri', 'blog/blog-timeline.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}



/*---------|- Heading -|-------------------------------------*/
add_shortcode('tk_heading', 'tallykit_shortcodes_sc_heading');
function tallykit_shortcodes_sc_heading($atts, $content = null) {
	extract(shortcode_atts(array(
		'tag' => 'h2',
		'class' => '',
		'id' => '',
		'animation_type' => '',
		'animation_duration' => '0.5s',
	), $atts));
	
	if(tallykit_get_settings('tk_heading') == 'no'){ return tallykit_shortcode_alt_notice(); }
	if( !empty($id) ){ $id = 'id="'.$id.'"'; }else{ $id = ''; }
	
	$output = '<'.$tag.' class="'.$class.' wow '.$animation_type.'" '.$id.' data-wow-duration="'.$animation_duration.'" data-wow-offset="0">'.do_shortcode($content).'</'.$tag.'>';
	
	return $output;
}