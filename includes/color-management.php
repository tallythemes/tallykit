<?php
/*
	Color Output function
---------------------------------------------------*/
function tallykitkit_color( $name, $type, $rgba = '', $echo = true ){
	$light_colors = apply_filters('tallykit_light_colors', array(
		'accent' => '#E43131',
		'heading' => '#1f1f1f',
		'subheading' => '#1f1f1f',
		'text' => '#1f1f1f',
		'meta' => '#1f1f1f',
		'border' => '#1f1f1f',
		'inner_bg' => '#1f1f1f',
		'bg' => '#1f1f1f',
	));
	
	$dark_colors = apply_filters('tallykit_dark_colors', array(
		'accent' => '#E43131',
		'heading' => '#1f1f1f',
		'subheading' => '#1f1f1f',
		'text' => '#1f1f1f',
		'meta' => '#1f1f1f',
		'border' => '#1f1f1f',
		'inner_bg' => '#1f1f1f',
		'bg' => '#1f1f1f',
	));
	
	
	$all_colors = NULL;
	if($type == 'light'){ $all_colors = $light_colors; }else{ $all_colors = $dark_colors; }
	
	$get_color = $all_colors[$name];
	
	if($rgba != ''){ $get_color = tallykit_hex2rgb($get_color); }
	
	if($echo == true){ echo $get_color; }else{ return $get_color; }
	
}