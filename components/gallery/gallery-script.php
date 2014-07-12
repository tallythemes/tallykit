<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.6)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_gallery_script_loader');
function tallykit_gallery_script_loader(){
	wp_enqueue_script( 'jquery-easing');
	wp_enqueue_script( 'jquery-imagesloaded');
	wp_enqueue_script( 'jquery-isotope');
	
	wp_enqueue_style( 'font-awesome');
	
	wp_enqueue_script( 'tallykit-gallery', TALLYKIT_COMPONENTS_URL.'gallery/assets/js/gallery.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-gallery', TALLYKIT_COMPONENTS_URL.'gallery/assets/css/gallery.css', '', '1.0' );
}
