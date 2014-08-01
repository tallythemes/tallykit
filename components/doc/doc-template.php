<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.8)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_doc_template_path')):
function tallykit_doc_template_path($type='url', $extra = ''){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'doc/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'doc/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'doc/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'doc/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'doc/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'doc/templates/',
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
 * @since TallyKit (1.8)
 *
 * @uses class acoc_theme_compat
**/
$options = array(
	'post_type'			=> 'tallykit_doc',
	'taxonomy'			=> 'tallykit_doc_category',
	'single_page' 		=> true,
	'archive_page'		=> true,
	'taxonomy_page'		=> true,
	'template_3'		=> 'acoc.php',
	'template_2'		=> 'page.php',
	'template_1'		=> 'index.php',
		
	'single_content'	=> 'tallykit_doc_theme_compact_single_content',
	'archive_content'	=> 'tallykit_doc_theme_compact_archive_content',
	'taxonomy_content'	=> 'tallykit_doc_theme_compact_category_content',
			
	'archive_title'		=> _('Documentation Archive', 'tallykit_textdomain'),
	'taxonomy_title'	=> _('Documentation of ', 'tallykit_textdomain'),
			
	'content_filter_name'	=> NULL,
);
new acoc_theme_compat($options);



function tallykit_doc_theme_compact_single_content(){
	return do_shortcode('[tk_doc_single id="'.get_the_ID().'" top_nav="no" side_nav="yes" /]');
}
function tallykit_doc_theme_compact_archive_content(){
	return do_shortcode('[tk_doc_archive category="" exclude_category="" limit="10" orderby="post_date" order="DESC" ids="" /]');
}
function tallykit_doc_theme_compact_category_content(){
	return do_shortcode('[tk_doc_archive category="'.get_query_var('tallykit_doc_category').'" exclude_category="" limit="10"  /]');
}





/*************************** Tally Framework Theme *****************************
 *
 * Making the Component compatible with Tally Framework Theme
 *
 * @since TallyKit (1.8)
 *
**/
add_action('tally_reset_loops', 'tallykit_doc_do_reset_page_content', 40);
function tallykit_doc_do_reset_page_content(){
		
	if( (is_single() && get_post_type() == 'tallykit_doc') || is_post_type_archive( 'tallykit_doc' ) || (is_tax('tallykit_doc_category')) ) {
		
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