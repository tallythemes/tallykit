<?php
/**
 * TallyKit Shortcodes
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage Shortcodes
 */
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
$component_folder_name = 'shortcodes';
 
 
 
 
/************************** Template Path ***************************
 *
 * Setup Template Folder path
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_template_file_loader  
**/
$settings = array(
	'child_url'  => TALLYKIT_CHILD_URL.'shortcodes',
	'theme_url'  => TALLYKIT_THEME_URL.'shortcodes',
	'plugin_url' => TALLYKIT_COMPONENTS_URL.'shortcodes',
	
	'child_dri'  => TALLYKIT_CHILD_DRI.'shortcodes',
	'theme_dri'  => TALLYKIT_THEME_DRI.'shortcodes',
	'plugin_dri' => TALLYKIT_COMPONENTS_DRI.'shortcodes',
);
$tallykit_shortcodes_template_dri = new acoc_template_file_loader($settings);
 
 
 
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_shortcodes_script_loader');
function tallykit_shortcodes_script_loader(){
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_script('jquery-ui-tooltip');
	wp_enqueue_script('jquery-ui-sortable');
	
	wp_enqueue_script('jquery-easing');
	wp_enqueue_script('jquery-fitvids');
	
	//prettyPhoto
	wp_enqueue_style( 'jquery-prettyPhoto');
	wp_enqueue_script('jquery-prettyPhoto');
	
	//font-awesome
	wp_enqueue_style('font-awesome');
	
	//gmap
	wp_enqueue_script( 'google-map');
	wp_enqueue_script( 'jquery-gomap');
	
	wp_enqueue_script( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/js/shortcodes.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/css/shortcodes.css', '', '1.0' );
	
}

 
 
 
 
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/

/*---------|- Name -|-------------------------------------*/
add_shortcode('tk_', 'tallykit_shortcodes_sc_');
function tallykit_shortcodes_sc_(){
	
}


/*---------|- accordion -|-------------------------------------*/
add_shortcode('tk_accordion', 'tallykit_shortcodes_sc_accordion');
function tallykit_shortcodes_sc_accordion(){
	
}


/*---------|- alert -|-------------------------------------*/
add_shortcode('tk_alert', 'tallykit_shortcodes_sc_alert');
function tallykit_shortcodes_sc_alert(){
	
}


/*---------|- button -|-------------------------------------*/
add_shortcode('tk_button', 'tallykit_shortcodes_sc_button');
function tallykit_shortcodes_sc_button(){
	
}


/*---------|- checklist -|-------------------------------------*/
add_shortcode('tk_checklist', 'tallykit_shortcodes_sc_checklist');
function tallykit_shortcodes_sc_checklist(){
	
}


/*---------|- column -|-------------------------------------*/
add_shortcode('tk_column', 'tallykit_shortcodes_sc_column');
function tallykit_shortcodes_sc_column(){
	
}


/*---------|- divider -|-------------------------------------*/
add_shortcode('tk_divider', 'tallykit_shortcodes_sc_divider');
function tallykit_shortcodes_sc_divider(){
	
}


/*---------|- dropcap -|-------------------------------------*/
add_shortcode('tk_dropcap', 'tallykit_shortcodes_sc_dropcap');
function tallykit_shortcodes_sc_dropcap(){
	
}


/*---------|- icon -|-------------------------------------*/
add_shortcode('tk_icon', 'tallykit_shortcodes_sc_icon');
function tallykit_shortcodes_sc_icon(){
	
}


/*---------|- highlight -|-------------------------------------*/
add_shortcode('tk_highlight', 'tallykit_shortcodes_sc_highlight');
function tallykit_shortcodes_sc_highlight(){
	
}


/*---------|- image -|-------------------------------------*/
add_shortcode('tk_image', 'tallykit_shortcodes_sc_image');
function tallykit_shortcodes_sc_image(){
	
}


/*---------|- lightbox -|-------------------------------------*/
add_shortcode('tk_lightbox', 'tallykit_shortcodes_sc_lightbox');
function tallykit_shortcodes_sc_lightbox(){
	
}


/*---------|- map -|-------------------------------------*/
add_shortcode('tk_map', 'tallykit_shortcodes_sc_map');
function tallykit_shortcodes_sc_map(){
	
}


/*---------|- blog -|-------------------------------------*/
add_shortcode('tk_blog', 'tallykit_shortcodes_sc_blog');
function tallykit_shortcodes_sc_blog(){
	
}


/*---------|- progress-bar -|-------------------------------------*/
add_shortcode('tk_progress_bar', 'tallykit_shortcodes_sc_tk_progress_bar');
function tallykit_shortcodes_sc_tk_progress_bar(){
	
}


/*---------|- tab -|-------------------------------------*/
add_shortcode('tk_tab', 'tallykit_shortcodes_sc_tab');
function tallykit_shortcodes_sc_tab(){
	
}


/*---------|- callout -|-------------------------------------*/
add_shortcode('tk_callout', 'tallykit_shortcodes_sc_callout');
function tallykit_shortcodes_sc_callout(){
	
}


/*---------|- toggle -|-------------------------------------*/
add_shortcode('tk_toggle', 'tallykit_shortcodes_sc_toggle');
function tallykit_shortcodes_sc_toggle(){
	
}


/*---------|- tooltip -|-------------------------------------*/
add_shortcode('tk_tooltip', 'tallykit_shortcodes_sc_tooltip');
function tallykit_shortcodes_sc_tooltip(){
	
}


/*---------|- video -|-------------------------------------*/
add_shortcode('tk_video', 'tallykit_shortcodes_sc_video');
function tallykit_shortcodes_sc_video(){
	
}


/*---------|- audio -|-------------------------------------*/
add_shortcode('tk_audio', 'tallykit_shortcodes_sc_audio');
function tallykit_shortcodes_sc_audio(){
	
}


/*---------|- heading -|-------------------------------------*/
add_shortcode('tk_heading', 'tallykit_shortcodes_sc_heading');
function tallykit_shortcodes_sc_heading(){
	
}



 
 
 
 /*************************** TinyMCE *****************************
 *
 * Add TinyMCE buttons for the Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_tinymce_register  
 */
   new acoc_tinymce_register;
 
 
 
 
 
 
 /*************************** Widgets *****************************
 *
 * Register Widgets
 *
 * @since TallyKit (1.0)
 *
 * @uses class acoc_widget_register  
 */