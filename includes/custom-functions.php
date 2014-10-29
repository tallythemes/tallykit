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
				
				if( tallykit_get_settings($name) == 'yes' ){
					if(file_exists($file_path) && file_exists($active_file_path)){ include($file_path); }
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


function tallykit_get_settings($name){
	$dri = '';
	$options = '';
	$output = '';
	if(file_exists(get_stylesheet_directory() . '/demo/tallykit-settings.php')){
		$dri = get_stylesheet_directory() . '/demo/tallykit-settings.php';
	}elseif(file_exists(get_template_directory() . '/demo/tallykit-settings.php')){
		$dri = get_template_directory() . '/demo/tallykit-settings.php';
	}
	
	if(file_exists($dri)){
		ob_start();
			include($dri);
			$options_file = ob_get_contents();
		ob_end_clean();
		
		$options = unserialize( tallykit_decode( $options_file ) );
	}
	
	if(is_array($options) && !empty($options)){
		if(isset($options[$name])){
			$output = $options[$name];
		}
	}
	
	return $output;
}


function tallykit_shortcode_alt_notice(){
	$output = '';
	
	$output .= '<div class="tallykit-shortcode-alt-notice">';
		$output .= 'This Shortcode is available on Pro Version only';
	$output .= '</div>';
	
	return $output;
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



/**
 * Helper function to return encoded strings
 *
 * @return    string
 *
 * @access    public
 * @since     4.4
 */
function tallykit_encode( $value ) {

  $func = 'base64' . '_encode';
  return $func( $value );
  
}

/**
 * Helper function to return decoded strings
 *
 * @return    string
 *
 * @access    public
 * @since     4.4
 */
function tallykit_decode( $value ) {

  $func = 'base64' . '_decode';
  return $func( $value );
  
}