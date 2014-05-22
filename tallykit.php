<?php
/*
Plugin Name: TallyKit
Plugin URI: https://github.com/tallythemes/tallykit
Description: A collection of features and functionality for <strong>Tally Framework</strong> theme.
Version: 1.0
Author: TallyThemes
Author URI: http://tallythemes.com/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html

textdomain: tallykit_textdomain

namespace: tallykit

TALLYKIT
*/

$path_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
$path_abs = trailingslashit(str_replace('\\','/',ABSPATH));

define('TALLYKIT', 'TallyThemes' );
define('TALLYKIT_URL', site_url(str_replace( $path_abs, '', $path_dir )) );
define('TALLYKIT_DRI', $path_dir );
define('TALLYKIT_VERSION', 1.0 );