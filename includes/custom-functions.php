<?php
function tallykit_components_loader(){
	$initial_scan = scandir(TALLYKIT_DRI.'components');
	
	if(is_array($initial_scan)){
		foreach($initial_scan as $key => $name){
				
			if(strpos($name, '#') !== false){  }
			elseif(strpos($name, '.') !== false){  }
			elseif(strpos($name, '..') !== false){  }
			else{
				$file_path = TALLYKIT_DRI.'components/'.$name.'/'.$name.'.php';
				$active_file_path = TALLYKIT_DRI.'components/'.$name.'/active.html';
				
				if( tallykit_component_check($name) == true ){
					if(file_exists($file_path) && file_exists($active_file_path)){ include($file_path); }
					
					//echo tallykit_component_check_display($name).'<br>';
				}else{
					//echo tallykit_component_check_display($name).'<br>';
				}
				
				
			}
		}
	}
}


function tallykit_component_check($name){
	$theme_info = wp_get_theme();
	$full_name =  $theme_info->get( 'Name' ).'512'.$name;	
	$filter = 'tallykit_'.$name.md5($full_name);
	
	return apply_filters($filter, false);
}

function tallykit_component_check_display($name){
	$theme_info = wp_get_theme();
	$full_name =  $theme_info->get( 'Name' ).'512'.$name;	
	$filter = 'tallykit_'.$name.md5($full_name);
	
	return $filter;
}


/*-**************************************************************
	hex2rgb
-****************************************************************/
function tallykit_hex2rgb($hex, $arry_format = false) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   
   if( $arry_format == true ){
		return $rgb; // returns an array with the rgb values
   }else{
		return implode(",", $rgb); // returns the rgb values separated by commas
   } 
}