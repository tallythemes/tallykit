<?php
/***************************** Sctipts ******************************
 *
 * Register CSS and JavaSctipts
 *
 * @since TallyKit (1.0)
 *
 * @uses action wp_enqueue_scripts  
**/
add_action('wp_enqueue_scripts', 'tallykit_portfolio_script_loader');
function tallykit_portfolio_script_loader(){
	wp_enqueue_script( 'jquery-easing');
	wp_enqueue_script( 'jquery-flexslider');
	wp_enqueue_script( 'jquery-prettyPhoto');
	wp_enqueue_script( 'jquery-imagesloaded');
	wp_enqueue_script( 'jquery-isotope');
	
	wp_enqueue_style( 'acoc-flexslider');
	wp_enqueue_style( 'jquery-prettyPhoto');
	wp_enqueue_style( 'font-awesome');
	
	wp_enqueue_script( 'tallykit-portfolio', TALLYKIT_COMPONENTS_URL.'portfolio/assets/js/portfolio.js', array('jquery'), '1.0', true );
	wp_enqueue_style( 'tallykit-portfolio', TALLYKIT_COMPONENTS_URL.'portfolio/assets/css/portfolio.css', '', '1.0' );
}
