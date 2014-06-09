<?php
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (1.0)
 *
 * @uses filter add_shortcode  
**/
/*---------|- Slideshow -|-------------------------------------*/
add_shortcode('tk_slideshow', 'tallykit_slideshow_sc');
function tallykit_slideshow_sc( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id'	=> '',
	), $atts ) );
	
	$output = '';
	
	ob_start();
	include(tallykit_slideshow_template_path('dri').'slideshow.php');
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}
