<?php
 /*************************** Shortcode fix *****************************
 *
 * Remove unwanted <br> and <p> tags
 *
 * @since TallyKit (1.0)
 *
 * @uses filter the_content  
 */
if( !function_exists('tallykit_shortcodes_fix_shortcodes') ) {
	function tallykit_shortcodes_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'tallykit_shortcodes_fix_shortcodes');
}