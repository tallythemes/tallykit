<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (3.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_buddypress_script_loader');
function tallykit_buddypress_script_loader(){		
	wp_enqueue_script( 'tallykit-buddypress', TALLYKIT_COMPONENTS_URL.'buddypress/assets/js/tk-buddypress.js', array('jquery', 'jquery-wow'), '1.0', true );
	wp_enqueue_style( 'tallykit-buddypress', TALLYKIT_COMPONENTS_URL.'buddypress/assets/css/tk-buddypress.css', '', '1.0' );
}