<?php
/************************** Shortcodes ****************************
 *
 * Register Shortcodes
 *
 * @since TallyKit (3.0)
 *
 * @uses filter add_shortcode  
**/

/*---------|- Members -|-------------------------------------*/
add_shortcode('tk_buddypress_members', 'tallykit_buddypress_sc_members');
function tallykit_buddypress_sc_members( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'limit'         => '',
			'columns'		=> '',
			'column_margin'	=> '',
			'type'			=> '',
			'pagination'	=> '',
		), $atts)
	);
	
	if(tallykit_get_settings('tk_buddypress_members') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	$members_args = array(
		'user_id'         => 0,
		'type'            => $type,
		'per_page'        => $limit,
		'max'             => $limit,
		'populate_extras' => true,
		'search_terms'    => false,
	);
	
	ob_start();
		include(tallykit_buddypress_template_path('dri', 'members.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}



/*---------|- groups -|-------------------------------------*/
add_shortcode('tk_buddypress_groups', 'tallykit_buddypress_sc_groups');
function tallykit_buddypress_sc_groups( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'limit'         => '',
			'columns'		=> '',
			'column_margin'	=> '',
			'type'			=> '',
			'pagination'	=> '',
		), $atts)
	);
	if(tallykit_get_settings('tk_buddypress_groups') == 'no'){ return tallykit_shortcode_alt_notice(); }
	
	ob_start();
		include(tallykit_buddypress_template_path('dri', 'groups.php'));
	$output = ob_get_contents();
	ob_end_clean();
	
	return 	$output;
}