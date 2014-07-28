<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.6)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_gallery_template_path')):
function tallykit_gallery_template_path($type='url', $extra = ''){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'gallery/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'gallery/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'gallery/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'gallery/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'gallery/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'gallery/templates/',
	);
	$template = new acoc_template_file_loader($settings);
	
	if($type == 'url'){
		return $template->url($extra);
	}else{
		return $template->dri($extra);
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