<?php
/**
 * TallyKit FrontPage
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage FrontPage
**/

define('TALLYKIT_FRONTPAGE_COMPONENT_BLOCKS_DRI', TALLYKIT_COMPONENTS_DRI.'FrontPage/blocks/');
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
$component_folder_name = 'FrontPage';


include('blocks/blocks.php');
include('class-option-builder.php');
include('class-content-builder.php');

$tallykit_FrontPage = apply_filters('tallykit_FrontPage', array());


/*
	Create Theme Options
==================================================*/
if(is_array($tallykit_FrontPage) && !empty($$tallykit_FrontPage)){
	foreach($tallykit_FrontPage as $option){
		
	}
}



/*
	Register Shortcode
==================================================*/
add_shortcode('frontpage', 'tallykit_FrontPage_shortcode');
function tallykit_FrontPage_shortcode(){
	$content = new tallykit_FrontPage_content_builder( apply_filters('tallykit_FrontPage', array()) );
	ob_start();
	echo $content->render();
	$output = ob_get_contents();
	ob_end_clean();
	return 	$output;	
}


/*
	Setup Tally Framework Theme's ( Template: front-page-template.php )
==================================================*/
add_filter('tally_main_class', 'tallykit_FrontPage_main_class_filter',20);
function tallykit_FrontPage_main_class_filter($class){
	if(is_page_template('front-page-template.php')){ $class = '';}
	return $class;	
}

add_filter('tally_sitebar_layout_option', 'tallykit_FrontPage_sitebar_layout_option', 12);
function tallykit_FrontPage_sitebar_layout_option($layout){
	if(is_page_template('front-page-template.php')){ $layout = 'full-width-content';}
	return $layout;	
}

add_filter('tally_is_subheader', 'tallykit_FrontPage_is_subheader', 12);
function tallykit_FrontPage_is_subheader($layout){
	if(is_page_template('front-page-template.php')){
		$layout = 'no';
	}
	return $layout;	
}

add_filter('tally_is_comment_template', 'tallykit_FrontPage_is_comment_template', 12);
function tallykit_FrontPage_is_comment_template($layout){
	if(is_page_template('front-page-template.php')){
		$layout = 'no';
	}
	return $layout;	
}




/*
	Insert Content in the template
==================================================*/
add_action('wp_head', 'tallykit_FrontPage_content');
function tallykit_FrontPage_content(){
	if(is_page_template('front-page-template.php')){
		remove_action('tally_loop', 'tally_do_loop_content');
		add_action('tally_loop', 'tallykit_FrontPage_do_content');
	}
}
function tallykit_FrontPage_do_content(){
	echo do_shortcode('[frontpage /]');
}




/*
	Register Script
==================================================*/
add_action('wp_enqueue_scripts', 'tallykit_FrontPage_script_loader');
function tallykit_FrontPage_script_loader(){
	wp_enqueue_style( 'tallykit-frontpage', TALLYKIT_COMPONENTS_URL.'FrontPage/css/style.css', '', '1.0' );
}