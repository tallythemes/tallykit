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
				
				if(file_exists($file_path) && file_exists($active_file_path)){ include($file_path); }
								
			}
		}
	}
}