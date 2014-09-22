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
function tallykit_people_template_path($type='url', $extra = ''){
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
$tallykit_people_theme_compact = new acoc_theme_compat2;

$tallykit_people_theme_compact->add_single(array(
	'post_type'		=> 'tallykit_people', 
	'filter'		=> 'tallykit_people_content',
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_people_theme_compact_single_content',
));
$tallykit_people_theme_compact->add_archive(array(
	'post_type'		=> 'tallykit_people',
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_people_theme_compact_archive_content',
));
$tallykit_people_theme_compact->add_taxonomy(array(
	'taxonomy'		=> 'tallykit_people_category', 
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_people_theme_compact_category_content',
));

function tallykit_people_theme_compact_single_content(){
	return do_shortcode('[tk_people_single id="'.get_the_ID().'"/]');
}
function tallykit_people_theme_compact_archive_content(){
	return do_shortcode('[tk_people_grid limit="12" column="4" /]');
}
function tallykit_people_theme_compact_category_content(){
	return do_shortcode('[tk_people_grid category="'.get_query_var('tallykit_people_category').'" limit="12" filter="no" column="4" /]');
}



/*************************** Tally Framework Theme *****************************
 *
 * Making the Component compatible with Tally Framework Theme
 *
 * @since TallyKit (2.1)
 *
**/
add_action('tally_template_init', 'tallykit_people_do_reset_page_content');
function tallykit_people_do_reset_page_content(){
		
	if( (is_single() && get_post_type() == 'tallykit_people') || is_post_type_archive( 'tallykit_people' ) || (is_tax('tallykit_people_category')) ) {
		remove_all_actions('tally_loop');
		add_action('tally_loop', 'tally_deafult_page_content');
	}
}

add_filter('tally_ot_page_metabox', 'tallykit_people_tally_ot_page_metabox');
function tallykit_people_tally_ot_page_metabox($post){
	if(post_type_exists('tallykit_people')){
		$post[] = 'tallykit_people';
	}
	return $post;
}