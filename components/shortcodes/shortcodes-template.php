<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
$settings = array(
	'child_url'  => TALLYKIT_CHILD_TPL_URL.'shortcodes',
	'theme_url'  => TALLYKIT_THEME_TPL_URL.'shortcodes',
	'plugin_url' => TALLYKIT_COMPONENTS_URL.'shortcodes',
	
	'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'shortcodes',
	'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'shortcodes',
	'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'shortcodes',
);
$tallykit_shortcodes_template_dri = new acoc_template_file_loader($settings);