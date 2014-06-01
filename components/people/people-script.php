<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_people_script_loader');
function tallykit_people_script_loader(){
	wp_enqueue_script( 'jquery-easing');
	wp_enqueue_script( 'jquery-flexslider');
	wp_enqueue_script( 'jquery-imagesloaded');
	wp_enqueue_script( 'jquery-isotope');
	
	wp_enqueue_style( 'acoc-flexslider');
	
	wp_enqueue_script( 'tallykit-people', TALLYKIT_COMPONENTS_URL.'people/assets/js/people.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-people', TALLYKIT_COMPONENTS_URL.'people/assets/css/people.css', '', '1.0' );
}
