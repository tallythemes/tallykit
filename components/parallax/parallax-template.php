<?php
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
if(!function_exists('tallykit_parallax_template_path')):
function tallykit_parallax_template_path($type='url', $extra = ''){
	$settings = array(
		'child_url'  => TALLYKIT_CHILD_TPL_URL.'parallax/',
		'theme_url'  => TALLYKIT_THEME_TPL_URL.'parallax/',
		'plugin_url' => TALLYKIT_COMPONENTS_URL.'parallax/templates/',
		
		'child_dri'  => TALLYKIT_CHILD_TPL_DRI.'parallax/',
		'theme_dri'  => TALLYKIT_THEME_TPL_DRI.'parallax/',
		'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'parallax/templates/',
	);
	$template = new acoc_template_file_loader($settings);
	
	if($type == 'url'){
		return $template->url($extra);
	}else{
		return $template->dri($extra);
	}
}
endif;


add_filter('the_content', 'tallykit_parallax_wp_content_filter');
function tallykit_parallax_wp_content_filter($content){
	
	if(get_post_meta(get_the_ID(), 'tallykit_parallax_active', true) == 'yes'){
		$content = do_shortcode('[tk_parallax id="'.get_the_ID().'"]');
	}
	
	return $content;	
}


/*Stting for tally framework*/
add_filter('tally_main_class', 'tallykit_parallax_tally_main_class_filter',20);
function tallykit_parallax_tally_main_class_filter($class){
	if(get_post_meta(get_the_ID(), 'tallykit_parallax_active', true) == 'yes'){ $class = '';}
	return $class;	
}


add_filter('tally_sitebar_layout_option', 'tallykit_parallax_tally_sitebar_layout_option', 12);
function tallykit_parallax_tally_sitebar_layout_option($layout){
	if(get_post_meta(get_the_ID(), 'tallykit_parallax_active', true) == 'yes'){ $layout = 'full-width-content';}
	return $layout;	
}

add_filter('tally_is_subheader', 'tallykit_parallax_tally_is_subheader', 12);
function tallykit_parallax_tally_is_subheader($layout){
	if(get_post_meta(get_the_ID(), 'tallykit_parallax_active', true) == 'yes'){
		$layout = 'no';
	}
	return $layout;	
}

add_filter('tally_is_comment_template', 'tallykit_parallax_tally_is_comment_template', 12);
function tallykit_parallax_tally_is_comment_template($layout){
	if(get_post_meta(get_the_ID(), 'tallykit_parallax_active', true) == 'yes'){
		$layout = 'no';
	}
	return $layout;	
}

function tallykit_parallax_custom_body_class( array $classes ){
	if(get_post_meta(get_the_ID(), 'tallykit_parallax_active', true) == 'yes'){
		$classes[] = 'parallax';
	}
	return $classes;
}
add_filter( 'body_class', 'tallykit_parallax_custom_body_class', 15 );