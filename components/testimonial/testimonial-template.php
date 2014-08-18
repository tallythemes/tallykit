<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_testimonial_template_path')):
function tallykit_testimonial_template_path($type='url', $extra = ''){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'testimonial/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'testimonial/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'testimonial/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'testimonial/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'testimonial/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'testimonial/templates/',
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
$tallykit_testimonial_theme_compact = new acoc_theme_compat2;

$tallykit_testimonial_theme_compact->add_archive(array(
	'post_type'		=> 'tallykit_testimonial',
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_testimonial_theme_compact_archive_content',
));
$tallykit_testimonial_theme_compact->add_taxonomy(array(
	'taxonomy'		=> 'tallykit_testimonial_category', 
	'template_3'	=> 'acoc.php',
	'template_2'	=> 'page.php',
	'template_1'	=> 'index.php',
	'content'		=> 'tallykit_testimonial_theme_compact_category_content',
));
function tallykit_testimonial_theme_compact_archive_content(){
	return do_shortcode('[tk_testimonial_grid limit="9" column="3" /]');
}
function tallykit_testimonial_theme_compact_category_content(){
	return do_shortcode('[tk_testimonial_grid category="'.get_query_var('tallykit_testimonial_category').'" limit="9" column="3" filter="no" /]');
}



/*************************** Tally Framework Theme *****************************
 *
 * Making the Component compatible with Tally Framework Theme
 *
 * @since TallyKit (2.1)
 *
**/
add_action('tally_reset_loops', 'tallykit_testimonial_do_reset_page_content', 40);
function tallykit_testimonial_do_reset_page_content(){
		
	if( (is_single() && get_post_type() == 'tallykit_testimonial') || is_post_type_archive( 'tallykit_testimonial' ) || (is_tax('tallykit_testimonial_category')) ) {
		
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

add_filter('tally_ot_page_metabox', 'tallykit_testimonial_tally_ot_page_metabox');
function tallykit_testimonial_tally_ot_page_metabox($post){
	if(post_type_exists('tallykit_testimonial')){
		$post[] = 'tallykit_testimonial';
	}
	return $post;
}