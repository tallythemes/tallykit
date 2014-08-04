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
$options = array(
	'post_type'			=> 'tallykit_gallery',
	'taxonomy'			=> 'tallykit_gallery_category',
	'single_page' 		=> true,
	'archive_page'		=> true,
	'taxonomy_page'		=> true,
	'template_3'		=> 'acoc.php',
	'template_2'		=> 'page.php',
	'template_1'		=> 'index.php',
		
	'single_content'	=> 'tallykit_gallery_theme_compact_single_content',
	'archive_content'	=> 'tallykit_gallery_theme_compact_archive_content',
	'taxonomy_content'	=> 'tallykit_gallery_theme_compact_category_content',
			
	'archive_title'		=> _('Gallery Archive', 'tallykit_textdomain'),
	'taxonomy_title'	=> _('Gallery of ', 'tallykit_textdomain'),
			
	'content_filter_name'	=> NULL,
);
new acoc_theme_compat($options);



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
add_action('tally_reset_loops', 'tallykit_gallery_do_reset_page_content', 40);
function tallykit_gallery_do_reset_page_content(){
		
	if( (is_single() && get_post_type() == 'tallykit_gallery') || is_post_type_archive( 'tallykit_gallery' ) || (is_tax('tallykit_gallery_category')) ) {
		
		remove_action( 'tally_entry_header', 'tally_do_post_media', 4 );
		remove_action( 'tally_entry_header', 'tally_entry_header_markup_open', 5 );
		remove_action( 'tally_entry_header', 'tally_entry_header_markup_close', 15 );
		remove_action( 'tally_entry_header', 'tally_do_post_title' );
		remove_action( 'tally_entry_header', 'tally_do_post_info', 12 );
		remove_action( 'tally_entry_header', 'tally_do_post_format_link', 13 );
		remove_action( 'tally_entry_content', 'tally_do_post_format_quote', 10 );
		remove_action( 'tally_entry_content', 'tally_do_post_content_nav', 12 );
		remove_action( 'tally_entry_footer', 'tally_entry_footer_markup_open', 5 );
		remove_action( 'tally_entry_footer', 'tally_entry_footer_markup_close', 15 );
		remove_action( 'tally_entry_footer', 'tally_do_post_meta' );
		remove_action( 'tally_after_entry', 'tally_do_author_box_single', 8 );
		remove_action( 'tally_after_endwhile', 'tally_do_posts_nav' );
	}
}

add_filter('tally_ot_page_metabox', 'tallykit_gallery_tally_ot_page_metabox');
function tallykit_gallery_tally_ot_page_metabox($post){
	if(post_type_exists('tallykit_gallery')){
		$post[] = 'tallykit_gallery';
	}
	return $post;
}