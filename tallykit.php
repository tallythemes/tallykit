<?php
/*
Plugin Name: TallyKit
Plugin URI: https://github.com/tallythemes/tallykit
Description: A collection of features and functionality for <strong>Tally Framework</strong> theme.
Version: 0.7
Author: TallyThemes
Author URI: http://tallythemes.com/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html

textdomain: tallykit_textdomain

namespace: tallykit

TALLYKIT
*/
add_action( 'after_setup_theme', 'load_tallykit', 2 );
function load_tallykit(){
	$path_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
	$path_abs = trailingslashit(str_replace('\\','/',ABSPATH));
	
	define('TALLYKIT', 'TallyKit' );
	define('TALLYKIT_URL', site_url(str_replace( $path_abs, '', $path_dir )) );
	define('TALLYKIT_DRI', $path_dir );
	define('TALLYKIT_VERSION', 0.7 );
	
	define('TALLYKIT_COMPONENTS_URL', TALLYKIT_URL.'components/' );
	define('TALLYKIT_COMPONENTS_DRI', TALLYKIT_DRI.'components/' );
	
	define('TALLYKIT_THEME_TPL_URL', get_template_directory_uri().'/tallykit/' );
	define('TALLYKIT_THEME_TPL_DRI', get_template_directory().'/tallykit/' );
	
	define('TALLYKIT_CHILD_TPL_URL', get_stylesheet_directory_uri().'/tallykit/' );
	define('TALLYKIT_CHILD_TPL_DRI', get_stylesheet_directory().'/tallykit/' );
	
	include('includes/acoc-loader.php');
	include('includes/custom-functions.php'); 
	include('includes/color-management.php');
	
	if ( function_exists( 'acoc_forceLoadFirst' ) ) {
		tallykit_components_loader();
	}
}