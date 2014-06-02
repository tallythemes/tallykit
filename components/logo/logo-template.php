<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_logo_template_path')):
function tallykit_logo_template_path($type='url'){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'logo/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'logo/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'logo/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'logo/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'logo/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'logo/templates/',
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