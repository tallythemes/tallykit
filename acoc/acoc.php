<?php
/*
Plugin Name: ACOC
Plugin URI: https://github.com/tallythemes/acoc
Description: WordPress Plugin Development framework.
Version: 0.9
Author: TallyThemes
Author URI: http://tallythemes.com/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html

textdomain: acoc_textdomain

namespace: acoc

ACOC
*/

if(!function_exists( 'acoc_forceLoadFirst' )):

$path_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
$path_abs = trailingslashit(str_replace('\\','/',ABSPATH));

define('ACOC', "ACOC Framework" );
define('ACOC_URL', site_url(str_replace( $path_abs, '', $path_dir )) );
define('ACOC_DRI', $path_dir );
if(!defined('ACOC_IMAGE_RETINA_SUPPORT'))define('ACOC_IMAGE_RETINA_SUPPORT', false );


//Loading custom functions
include('functions.php');


//Loading extranal JavaScript and CSS
include('load-extranal-scripts.php');

//Loading Classes
include('fields/_init.php');

//Loading Classes
include('classes/metabox-register-class.php');
include('classes/setting-api-class.php');
include('classes/post-type-register-class.php');
include('classes/taxonomy-register-class.php');
include('classes/post-column-class.php');
include('classes/template-file-loader-class.php');
include('classes/script-register-class.php');
include('classes/tinymce-register-class.php');
include('classes/post-taxonomy-filter.php');
include('classes/theme-compat-class.php');
include('classes/theme-compat-class2.php');


//Loading html-classes
include('html-classes/flexslider-html-class.php');
include('html-classes/isotope-html-class.php');
include('html-classes/flexslider2-html-class.php');
include('html-classes/shuffle-html-class.php');
include('html-classes/masonry-html-class.php');


//Loading vandors
include('vandors/mr-image-resize/mr-image-resize.php');
include('vandors/cmb/init.php');



/**
 * Forces our plugin to be loaded first. This is to ensure that plugins that use the framework have access to
 * this class.
 *
 * @access  public
 * @return  void
 * @since   1.0
 * @see	 http://snippets.khromov.se/modify-wordpress-plugin-load-order/
*/

function acoc_forceLoadFirst() {
	$path = str_replace( WP_PLUGIN_DIR . '/', '', __FILE__ );
	if ( $plugins = get_option( 'active_plugins' ) ) {
		if ( $key = array_search( $path, $plugins ) ) {
			array_splice( $plugins, $key, 1 );
			array_unshift( $plugins, $path );
			update_option( 'active_plugins', $plugins );
		}
	}
}
add_action( 'activated_plugin', 'acoc_forceLoadFirst');

endif;