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