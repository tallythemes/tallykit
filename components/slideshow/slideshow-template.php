<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_slideshow_template_path')):
function tallykit_slideshow_template_path($type='url'){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'slideshow/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'slideshow/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'slideshow/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'slideshow/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'slideshow/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'slideshow/templates/',
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