<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_slideshow_script_loader');
function tallykit_slideshow_script_loader(){
	wp_enqueue_script( 'jquery-easing');
	wp_enqueue_script( 'jquery-flexslider');
	wp_enqueue_script( 'jquery-fitvids');
	wp_enqueue_style( 'acoc-flexslider');
	wp_enqueue_script( 'tallykit-slideshow', TALLYKIT_COMPONENTS_URL.'slideshow/assets/js/slideshow.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-slideshow', TALLYKIT_COMPONENTS_URL.'slideshow/assets/css/slideshow.css', '', '1.0' );
}
