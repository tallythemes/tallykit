<?php
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
	
	wp_enqueue_script('jquery-gauge');
	wp_enqueue_script('jquery-waypoints');
	
	//prettyPhoto
	wp_enqueue_style( 'jquery-prettyPhoto');
	wp_enqueue_script('jquery-prettyPhoto');
	
	//font-awesome
	wp_enqueue_style('font-awesome');
	
	//gmap
	wp_enqueue_script( 'google-map');
	wp_enqueue_script( 'jquery-gomap');
	
	wp_enqueue_script( 'jquery-wow');
	wp_enqueue_style( 'acoc-animate');
	
	wp_enqueue_script( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/js/shortcodes.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/css/shortcodes.css', '', '1.0' );
	
}


add_action('admin_enqueue_scripts', 'tallykit_shortcode_admin_scripts');
function tallykit_shortcode_admin_scripts(){
	wp_enqueue_style( 'tallykit-admin-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/css/shortcode-admin.css', '', '1.0' );	
	wp_enqueue_script( 'tallykit-admin-shortcodes', TALLYKIT_COMPONENTS_URL.'shortcodes/assets/js/shortcode-admin.js', '', '1.0' );
}