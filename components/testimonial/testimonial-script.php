<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_testimonial_script_loader');
function tallykit_testimonial_script_loader(){
	wp_enqueue_script( 'jquery-easing');
	wp_enqueue_script( 'jquery-flexslider');
	wp_enqueue_script( 'jquery-imagesloaded');
	wp_enqueue_script( 'jquery-isotope');
	
	wp_enqueue_style( 'acoc-flexslider');
	
	wp_enqueue_script( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'testimonial/assets/js/testimonial.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-shortcodes', TALLYKIT_COMPONENTS_URL.'testimonial/assets/css/testimonial.css', '', '1.0' );
}
