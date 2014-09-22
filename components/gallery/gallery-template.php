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
 * @since TallyKit (2.1)
 *
 * @uses class acoc_theme_compat
**/

$tallykit_gallery_theme_compact = new acoc_theme_compat2;

$tallykit_gallery_theme_compact->add_single(array(
	'post_type'		=> 'tallykit_gallery', 
	'filter'		=> '',
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_gallery_theme_compact_single_content',
));
$tallykit_gallery_theme_compact->add_archive(array(
	'post_type'		=> 'tallykit_gallery',
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_gallery_theme_compact_archive_content',
));
$tallykit_gallery_theme_compact->add_taxonomy(array(
	'taxonomy'		=> 'tallykit_gallery_category', 
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_gallery_theme_compact_category_content',
));



function tallykit_gallery_theme_compact_single_content(){
	return do_shortcode('[tk_gallery id="'.get_the_ID().'" columns="4"/]');
}
function tallykit_gallery_theme_compact_archive_content(){
	return do_shortcode('[tk_album category="" exclude_category="" limit="10" orderby="post_date" order="DESC" ids="" /]');
}
function tallykit_gallery_theme_compact_category_content(){
	return do_shortcode('[tk_album category="'.get_query_var('tallykit_gallery_category').'" exclude_category="" limit="10" filter="no" /]');
}





/*************************** Tally Framework Theme *****************************
 *
 * Making the Component compatible with Tally Framework Theme
 *
 * @since TallyKit (2.1)
 *
**/
add_action('tally_template_init', 'tallykit_gallery_do_reset_page_content');
function tallykit_gallery_do_reset_page_content(){
	if( (is_single() && get_post_type() == 'tallykit_gallery') || is_post_type_archive( 'tallykit_gallery' ) || (is_tax('tallykit_gallery_category')) ) {
		remove_all_actions('tally_loop');
		add_action('tally_loop', 'tally_deafult_page_content');
	}
}

add_filter('tally_ot_page_metabox', 'tallykit_gallery_tally_ot_page_metabox');
function tallykit_gallery_tally_ot_page_metabox($post){
	if(post_type_exists('tallykit_gallery')){
		$post[] = 'tallykit_gallery';
	}
	return $post;
}