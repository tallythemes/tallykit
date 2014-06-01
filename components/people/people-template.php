<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_people_template_path')):
function tallykit_people_template_path($type='url'){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'people/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'people/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'people/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'people/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'people/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'people/templates/',
	);
	$template = new acoc_template_file_loader($settings);
	
	if($type == 'url'){
		return $template->url();
	}else{
		return $template->dri();
	}
}
endif;






/*************************** Theme Compat *****************************
 *
 * Making the Component compatible with any theme
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_theme_compat
**/