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
function tallykit_logo_template_path($type='url', $extra = ''){
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
 * @since TallyKit (2.1)
 *
 * @uses class acoc_theme_compat
**/
$tallykit_logo_theme_compact = new acoc_theme_compat2;

$tallykit_logo_theme_compact->add_archive(array(
	'post_type'		=> 'tallykit_logo',
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_logo_theme_compact_archive_content',
));
$tallykit_logo_theme_compact->add_taxonomy(array(
	'taxonomy'		=> 'tallykit_logo_category', 
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_logo_theme_compact_category_content',
));

function tallykit_logo_theme_compact_archive_content(){
	return do_shortcode('[tk_logo_grid limit="12" columns="4" filter="no" /]');
}
function tallykit_logo_theme_compact_category_content(){
	return do_shortcode('[tk_logo_grid category="'.get_query_var('tallykit_logo_category').'" limit="12" columns="4" filter="no" /]');
}



/*************************** Tally Framework Theme *****************************
 *
 * Making the Component compatible with Tally Framework Theme
 *
 * @since TallyKit (2.1)
 *
**/
add_action('tally_reset_loops', 'tallykit_logo_do_reset_page_content', 40);
function tallykit_logo_do_reset_page_content(){
		
	if( (is_single() && get_post_type() == 'tallykit_logo') || is_post_type_archive( 'tallykit_logo' ) || (is_tax('tallykit_logo_category')) ) {
		remove_all_actions('tally_loop');
		add_action('tally_loop', 'tally_deafult_page_content');
	}
}