<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (3.0)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_buddypress_template_path')):
function tallykit_buddypress_template_path($type='url', $extra = ''){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'buddypress/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'buddypress/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'buddypress/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'buddypress/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'buddypress/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'buddypress/templates/',
	);
	$template = new acoc_template_file_loader($settings);
	
	if($type == 'url'){
		return $template->url($extra);
	}else{
		return $template->dri($extra);
	}
}
endif;