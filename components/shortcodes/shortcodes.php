<?php
/**
 * TallyKit Shortcodes
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage Shortcodes
 * @class tallykit-shortcode
 */
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
$component_folder_name = 'shortcodes';
 
include('shortcodes-color.php');
 
 
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
$settings = array(
	'child_url'  => TALLYKIT_CHILD_TPL_URL.'shortcodes',
	'theme_url'  => TALLYKIT_THEME_TPL_URL.'shortcodes',
	'plugin_url' => TALLYKIT_COMPONENTS_URL.'shortcodes',
	
	'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'shortcodes',
	'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'shortcodes',
	'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'shortcodes',
);
$tallykit_shortcodes_template_dri = new acoc_template_file_loader($settings);
 
 
 
 
 
 
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_shortcodes_script_loader');
function tallykit_shortcodes_script_loader(){
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_script('jquery-ui-tooltip');
	wp_enqueue_script('jquery-ui-sortable');
	
	wp_enqueue_script('jquery-easing');
	wp_enqueue_script('jquery-fitvids');
	
	wp_enqueue_script('jquery-gauge');
	wp_enqueue_script('jquery-waypoints');
	
	//prettyPhoto
	wp_enqueue_style( 'jquery-prettyPhoto');
	wp_enqueue_script('jquery-prettyPhoto');
	
	//font-awesome
	wp_enqueue_style('font-awesome');
	
	//gmap
	wp_enqueue_script( 'google-map');
	wp_enqueue_script( 'jquery-gomap');
	
	wp_enqueue_script( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/js/shortcodes.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/css/shortcodes.css', '', '1.0' );
	
}

 
 
 
 
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/


/*---------|- accordion -|-------------------------------------*/
add_shortcode('tk_accordion', 'tallykit_shortcodes_sc_accordion');
function tallykit_shortcodes_sc_accordion( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'class'	=> ''
	), $atts ) );
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
	), $atts ) );
	
	$output = '';
	
	$output .= '<div class="tallykit-shortcode-alert tallykit-shortcode-alert-block tallykit-shortcode-alert-'.$type.'">';
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
		'color'			=> '', //red, 
		'size'			=> '2x', //1x, 2x, 3x, 4x, 5x
		'link'			=> '#',
		'title'			=> '',
		'text'			=> 'Button',
		'target'		=> '',
		'rel'			=> '',
		'border_radius'	=> '',
		'class'			=> '',
		'icon_left'		=> '',
		'icon_right'	=> '',
		'id'	        => '',
		'bg_color'      => '',
		'text_color'    => '',
		'full_width'    => '', //yes, no
	), $atts ) );
	
	$output = '';
		
	//icon
	$icon_left = ($icon_left) ? '<i class="fa '. $icon_left .'"></i>' : NULL;
	$icon_right = ($icon_right) ? '<i class="fa '. $icon_right .'"></i>' : NULL;
	
	//attribute
	$rel = ($rel) ? 'rel="'.$rel.'" ':NULL;
	$target = ($target) ? 'target="'.$target.'" ':NULL;
	$id = ($id) ? 'id="'.$id.'" ':NULL;
	$title = ($title) ? 'title="'.$title.'" ':NULL;
		
	//class
	$full_width = ($full_width == 'yes') ? 'tallykit-shortcode-button-full-width':NULL;
	$icon_left_class = ($icon_left) ? 'icon-left' : NULL;
	$icon_right_class = ($icon_right) ? 'icon-right' : NULL;
	$button_class = 'class="tallykit-shortcode-button '.$full_width.' '.$class.' size-'.$size.' color-'.$color.' '.$icon_left_class.' '.$icon_right_class.'" ';
		
	//style
	$radius = ( $border_radius) ? 'border-radius:'. $border_radius .';' : NULL;
	$bg_color = ( $bg_color) ? 'background-color:'. $bg_color .';' : NULL;
	$text_color = ( $text_color) ? 'color:'. $text_color .';' : NULL;
	$button_style = 'style="'.$radius.$bg_color.$text_color.'" ';
		
	$output .= '<a href="'.$link.'" '.$button_class.$rel.$target.$id.$title.$button_style.'>'.$icon_left.$text.$icon_right.'</a>';
	
	return $output;
}



/*---------|- checklist -|-------------------------------------*/
add_shortcode('tk_checklist', 'tallykit_shortcodes_sc_checklist');
function tallykit_shortcodes_sc_checklist( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'icon' => 'arrow', //check, star, arrow, asterik, cross, plus
		'iconcolor' => 'initial',
		'iconbg' => 'rgba(0,0,0,0)',
		'iconsize' => '9px',
		'circle' => 'yes'
	), $atts));
	
	$rand = rand();
	$output = '';
	$output .= "<style type='text/css'>
	#tallykit-shortcode-checklist-".$rand." ul li:before{color:{$iconcolor} !important;}
	#tallykit-shortcode-checklist-".$rand." ul li:before{background-color:{$iconbg} !important;}
	#tallykit-shortcode-checklist-".$rand." ul li:before{font-size:{$iconsize} !important;}
	</style>";
	
	$output .= '<div class="tallykit-shortcode-checklist tallykit-shortcode-checklist-circle-'.$circle.' tallykit-shortcode-checklist-icon-'.$icon.'" id="tallykit-shortcode-checklist-'.$rand.'">';
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
		'link_color' => '',
		'padding' => '',
	  ), $atts ) );
		  
	  $output = '';
	  $uid = 'tallykit-shortcode-column'.rand();
	  $bg_color = ($bg_color) ? 'background-color:'.$bg_color.';' : '';
	  $padding = ($padding) ? 'padding:'.$padding.';' : '';
		  
	  $output .= '<style type="text/css">
				#'.$uid.'{ color:'.$text_color.'; }
				#'.$uid.' a{ color:'.$link_color.'; }
				#'.$uid.' h1, #'.$uid.' h2, #'.$uid.' h3, #'.$uid.' h4, #'.$uid.' h5, #'.$uid.' h6{ color:'.$heading_color.'; }
			</style>';
		  
	$output .= '<div id="'.$uid.'" class="tallykit-shortcode-column tallykit-shortcode-' . $size . ' tallykit-shortcode-column-'.$position.' '. $class .'" style="'.$bg_color.'">';
		$output .= '<div class="tallykit-shortcode-column-inner" style="'.$padding.'">' . do_shortcode($content) . '</div>';
	$output .= '</div>';
	   
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
	
	$output = '';
	$rand = rand();
	
	$output .= '<style type="text/css">#tallykit-shortcode-divider-'.$rand.'{  margin-bottom:'.$margin_bottom.'; margin-top:'.$margin_top.'; }</style>';
	$output .= '<div class="acoc-clear"></div>';
	$output .= '<div class="tallykit-shortcode-divider tallykit-shortcode-divider-style-'.$style.'" id="tallykit-shortcode-divider-'.$rand.'"></div>';
	$output .= '<div class="acoc-clear"></div>';
	
	return $output;
}



/*---------|- dropcap -|-------------------------------------*/
add_shortcode('tk_dropcap', 'tallykit_shortcodes_sc_dropcap');
function tallykit_shortcodes_sc_dropcap( $atts, $content = null ) {  
	extract(shortcode_atts(array(
		'style' => 'none', //circle, box, round
	), $atts));
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
	), $atts));
	
	$output = '';
	$rand = rand();
	
	$output .= '<style type="text/css">
		#shortallykit-shortcodetwell-icon-'.$rand.'{ color:'.$color.'; }
		#tallykit-shortcode-icon-'.$rand.'.tallykit-shortcode-icon-style-background{ background-color:'.$color.'; color:#ffffff !important; }
		#tallykit-shortcode-icon-'.$rand.'.tallykit-shortcode-icon-style-border{ border-color:'.$color.'; }
	</style>';
	
	if(!empty($link)){ $output .= '<a href="'.$link.'" target="'.$link_target.'">'; }
	$output .= '<i class="tallykit-shortcode-icon  tallykit-shortcode-icon-shape-'.$shape.'  tallykit-shortcode-icon-size-'.$size.' tallykit-shortcode-icon-effect-'.$effect.' tallykit-shortcode-icon-align-'.$align.' tallykit-shortcode-icon-style-'.$style.' fa '.$icon.'" id="tallykit-shortcode-icon-'.$rand.'"></i>';
	if(!empty($link)){ $output .= '</a>'; }
	
	return $output;	
}



/*---------|- highlight -|-------------------------------------*/
add_shortcode('tk_highlight', 'tallykit_shortcodes_sc_highlight');
function tallykit_shortcodes_sc_highlight($atts, $content = null) {
	$atts = shortcode_atts(array(
		'color' => 'yellow',
	), $atts);
			
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
	), $atts ) );
	
	$uid = 'tallykit-shortcode-lightbox'.rand();	
	$output = '';
	$output .= '<a href="'.$src.'" rel="prettyPhoto" title="'.$title.'" class="'.$class.'">';
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



/*---------|- blog -|-------------------------------------*/
add_shortcode('tk_blog', 'tallykit_shortcodes_sc_blog');
function tallykit_shortcodes_sc_blog(){
	
}



/*---------|- progress-bar -|-------------------------------------*/
add_shortcode('tk_progress_bar', 'tallykit_shortcodes_sc_tk_progress_bar');
function tallykit_shortcodes_sc_tk_progress_bar($atts, $content = null) {
	extract(shortcode_atts(array(
		'filled_color' => '#45b900',
		'unfilled_color' => '#f0f0f0',
		'value' => '70'
	), $atts));

	$output = '';
	$output .= '<div class="tallykit-shortcode-progressBar" style="background-color:'.$unfilled_color.' !important;border-color:'.$unfilled_color.' !important;">';
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
		'value' => '70'
	), $atts));

	$output = '';
	$output .= '<div class="tallykit-shortcode-counterBox-wrapper">';
		$output .= '<div class="tallykit-shortcode-counterBox-percentage">';
			$output .= '<span class="display-percentage" data-percentage="'.$value.'">0</span><span class="percent">%</span>';
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
		'value' => '70'
	), $atts));

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


	$output .= '<div class="tallykit-shortcode-CounterCircle-wrapper">';
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
		'button_text'	=> 'Button Text',
		'button_link'	=> '#',
		'button_link_target'	=> '_self', // _blank, _self
		'style'	=> 'button-right', //center, button-left, button-right
		'border'	=> 'left', //top, left, right, bottom, none
		'background'	=> 'no', //yes, no
	), $atts ) );
	
	$output = '<div class="tallykit-shortcode-callout style-'.$style.' border-'.$style.'  background-'.$background.' '.$class.'>';
		$output = '<div class="tallykit-shortcode-callout-inner>';
			if($title){ $output .= '<h3>'.$title.'</h3>'; }
			$output .= '<div class="con">'.do_shortcode($content).'</div>';
			if($button_link){ $output .= '<a href="'.$button_link.'" target="'.$button_link_target.'">'.$button_text.'</a>'; }
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
	
	// Display the Toggle
	return '<div class="tallykit-shortcode-toggle '. $class .'"><h3 class="tallykit-shortcode-toggle-trigger">'. $title .'</h3><div class="tallykit-shortcode-toggle-container">' . do_shortcode($content) . '</div></div>';
}



/*---------|- tooltip -|-------------------------------------*/
add_shortcode('tk_tooltip', 'tallykit_shortcodes_sc_tooltip');
function tallykit_shortcodes_sc_tooltip($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => 'none',
	), $atts));

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



 
 
 
 /*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_tinymce_register  
 */
$tinymce_fields = array();

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
			'std' => '#',
			'des' => '',
			'options' => array(
				array('value' => '_self', 'label' => '_self'),
				array('value' => '_blank', 'label' => '_blank'),
			)
		),
		array(
			'id' => 'title',
			'class' => '',
			'label' => 'Button Title',
			'type' => 'text',
			'std' => '#',
			'des' => '',
		),
		array(
			'id' => 'color',
			'class' => '',
			'label' => 'Color',
			'type' => 'select',
			'std' => '',
			'des' => '',
			'options' => array(
				array('value' => 'none', 'label' => 'none'),
				array('value' => 'red', 'label' => 'red'),
				array('value' => 'orange', 'label' => 'orange'),
				array('value' => 'blue', 'label' => 'blue'),
				array('value' => 'black', 'label' => 'black'),
				array('value' => 'pink', 'label' => 'pink'),
				array('value' => 'rosy', 'label' => 'rosy'),
				array('value' => 'green', 'label' => 'green'),
				array('value' => 'brown', 'label' => 'brown'),
				array('value' => 'purple', 'label' => 'purple'),
				array('value' => 'gold', 'label' => 'gold'),
				array('value' => 'teal', 'label' => 'teal'),
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
			'id' => 'border_radius',
			'class' => '',
			'label' => 'Border Radius',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: 4px',
		),
		array(
			'id' => 'bg_color',
			'class' => '',
			'label' => 'Backgroun Color',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #000000',
		),
		array(
			'id' => 'text_color',
			'class' => '',
			'label' => 'Text Color',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #ffffff',
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
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #ffffff',
		),
		array(
			'id' => 'iconbg',
			'class' => '',
			'label' => 'Icon Background Color',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #000000',
		),
		array(
			'id' => 'iconsize',
			'class' => '',
			'label' => 'Icon Size',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: 9px',
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
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #000000',
		),
		array(
			'id' => 'heading_color',
			'class' => '',
			'label' => 'Heading Color',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #000000',
		),
		array(
			'id' => 'link_color',
			'class' => '',
			'label' => 'Link Color',
			'type' => 'text',
			'std' => '',
			'des' => 'Example: #000000',
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

/*---------|- Blog -|----------*/
$tinymce_fields[] = array(
	'title' => 'Blog',
	'shortcode' => 'tk_blog',
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
			'id' => 'content',
			'class' => '',
			'label' => 'Text',
			'type' => 'text',
			'std' => 'Web Development - 70%',
			'des' => '',
			'content' => 'yes',//yes, no
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
			'id' => 'style',
			'class' => '',
			'label' => 'Style',
			'type' => 'select',
			'std' => 'center',
			'des' => '',
			'options' => array(
				array('value' => 'center', 'label' => 'center'),
				array('value' => 'button-left', 'label' => 'button-left'),
				array('value' => 'button-right', 'label' => 'button-right'),
			)
		),
		array(
			'id' => 'border',
			'class' => '',
			'label' => 'Border',
			'type' => 'text',
			'std' => 'select',
			'des' => '',
			'options' => array(
				array('value' => 'top', 'label' => 'top'),
				array('value' => 'left', 'label' => 'left'),
				array('value' => 'right', 'label' => 'right'),
				array('value' => 'bottom', 'label' => 'bottom'),
				array('value' => 'none', 'label' => 'none'),
			)
		),
		array(
			'id' => 'background',
			'class' => '',
			'label' => 'Background',
			'type' => 'select',
			'std' => 'yes',
			'des' => '',
			'options' => array(
				array('value' => 'yes', 'label' => 'yes'),
				array('value' => 'no', 'label' => 'no'),
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
				array('value' => 'no', 'label' => 'html5'),
				array('value' => 'yes', 'label' => 'oembed'),
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
				array('value' => 'no', 'label' => 'html5'),
				array('value' => 'yes', 'label' => 'oembed'),
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


$settings = array(
	'uid' => 'tallykit_shortcode_tinymce',
	'button_title' => '<div class="dashicons dashicons-editor-code" style="line-height:27px;"></div>',
	'button_url' => '',
	'title' => 'Insert Shortcodes',
	'options' => $tinymce_fields,
);
$register_tallykit_shortcode_tinymce = new acoc_tinymce_register($settings);
 
 
 
 
 
 
 /*************************** Shortcode fix *****************************
 *
 * Remove unwanted <br> and <p> tags
 *
 * @since TallyKit (1.0)
 *
 * @uses filter the_content  
 */
if( !function_exists('tallykit_shortcodes_fix_shortcodes') ) {
	function tallykit_shortcodes_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'tallykit_shortcodes_fix_shortcodes');
}