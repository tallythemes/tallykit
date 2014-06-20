<?php
/*
	Color Output function
---------------------------------------------------*/
function tallykitkit_color($option_name, $rgba = '', $echo = true){
	$options = array();
	/*~~ Accent Color ~~*/
	$options['site_accent_color'] = '#E43131';
	$options['site_accent2_color'] = '#52a332';
	
	/*~~ Headings Color ~~*/
	$options['color_headings_light'] = '#ffffff';
	$options['color_headings_dark'] = '#444444';
	
	/*~~ Sub-Headings Color ~~*/
	$options['color_subheading_light'] = '#e8e8e8';
	$options['color_subheading_dark'] = '#5e5e5e';
	
	/*~~ Body Text Color ~~*/
	$options['color_text_light'] = '#d3d3d3';
	$options['color_text_dark'] = '#777777';
	
	/*~~ Meta Text Color ~~*/
	$options['color_meta_light'] = '#a3a3a3';
	$options['color_meta_dark'] = '#8e8e8e';
	
	/*~~ Border Color ~~*/
	$options['color_border_light'] = '#5e5e5e';
	$options['color_border_dark'] = '#c4c4c4';
	
	/*~~ Background Color ~~*/
	$options['color_bg_light'] = '#ffffff';
	$options['color_bg_dark'] = '#444444';
	
	/*~~ Inner Background Color ~~*/
	$options['color_inner_bg_light'] = '#2d2d2d';
	$options['color_inner_bg_dark'] = '#f2f2f2';
	
	$all_colors = apply_filters('tally_option_std', $options);
	
	if(function_exists('tally_option')){ $get_color = tally_option($option_name); }else{$get_color = $all_colors[$option_name];}
	
	if($rgba != ''){ $get_color = 'rgba('.tallykit_hex2rgb($get_color).','.$rgba.')'; }
	
	if($echo == true){ echo $get_color; }else{ return $get_color; }
}


add_action('wp_head', 'tallykit_colors_do_action_light');
function tallykit_colors_do_action_light(){
	?>
    <style type="text/css">
	
	.color_mood_light .acoc-fx-nav-style-border .wfs-direction-nav a{ 
		color:<?php tallykitkit_color('color_border_light'); ?>; 
		border-color:<?php tallykitkit_color('color_border_light'); ?> !important;
	}
	
	.color_mood_light .acoc-fx-cnav-style-border .wfs-control-paging li a {border-color:<?php tallykitkit_color('color_border_light'); ?> !important;}
	.color_mood_light .acoc-fx-cnav-style-border .wfs-control-paging li a:hover { background: <?php tallykitkit_color('color_border_light'); ?>; }
	.color_mood_light .acoc-fx-cnav-style-border .wfs-control-paging li a.wfs-active { background: <?php tallykitkit_color('color_border_light'); ?>;}
	</style>
    <?php
}

add_action('wp_head', 'tallykit_colors_do_action_dark');
function tallykit_colors_do_action_dark(){
	?>
    <style type="text/css">
	.color_mood_dark .acoc-fx-nav-style-border .wfs-direction-nav a{ 
		color:<?php tallykitkit_color('color_text_dark'); ?>; 
		border-color:<?php tallykitkit_color('color_text_dark'); ?> !important;
	}
	
	.color_mood_dark .acoc-fx-cnav-style-border .wfs-control-paging li a {border-color:<?php tallykitkit_color('color_border_dark'); ?> !important;}
	.color_mood_dark .acoc-fx-cnav-style-border .wfs-control-paging li a:hover { background: <?php tallykitkit_color('color_border_dark'); ?>; }
	.color_mood_dark .acoc-fx-cnav-style-border .wfs-control-paging li a.wfs-active { background: <?php tallykitkit_color('color_border_dark'); ?>;}
	</style>
    <?php
}