<?php
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/

/*---------|- template -|-------------------------------------*/
add_shortcode('tk_parallax', 'tallykit_parallax_sc');
function tallykit_parallax_sc( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'id' => '',
		), $atts)
	);
	
	ob_start();
	include(tallykit_parallax_template_path('dri').'parallax-template.php');
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}