<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_parallax_script_loader');
function tallykit_parallax_script_loader(){	
	wp_enqueue_script( 'tallykit-parallax', TALLYKIT_COMPONENTS_URL.'parallax/assets/js/parallax.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-parallax', TALLYKIT_COMPONENTS_URL.'parallax/assets/css/parallax.css', '', '1.0' );
}
