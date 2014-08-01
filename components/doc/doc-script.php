<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_doc_script_loader');
function tallykit_doc_script_loader(){
	wp_enqueue_script( 'jquery-easing');
		
	wp_enqueue_script( 'tallykit-doc', TALLYKIT_COMPONENTS_URL.'doc/assets/js/doc.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-doc', TALLYKIT_COMPONENTS_URL.'doc/assets/css/doc.css', '', '1.0' );
}