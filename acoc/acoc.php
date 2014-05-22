<?php
$path_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
$path_abs = trailingslashit(str_replace('\\','/',ABSPATH));

define('ACOC_URL', site_url(str_replace( $path_abs, '', $path_dir )) );
define('ACOC_DRI', $path_dir );
if(!defined('ACOC_IMAGE_RETINA_SUPPORT'))define('ACOC_IMAGE_RETINA_SUPPORT', false );


//Loading custom functions
include('functions.php');


//Loading extranal JavaScript and CSS
include('load-extranal-scripts.php');


//Loading Classes
include('classes/metabox-register-class.php');
include('classes/setting-api-class.php');
include('classes/post-type-register-class.php');
include('classes/post-column-class.php');
include('classes/template-file-loader-class.php');
include('classes/script-register-class.php');


//Loading html-classes
include('html-classes/flexslider-html-class.php');
include('html-classes/isotope-html-class.php');
include('html-classes/flexslider2-html-class.php');
include('html-classes/shuffle-html-class.php');
include('html-classes/masonry-html-class.php');


//Loading vandors
include('vandors/mr-image-resize/mr-image-resize.php');


//Loading Demos 

//include(ACOC_DRI.'demos/metabox-demo.php');
//include(ACOC_DRI.'demos/setting-demo.php');
//include(ACOC_DRI.'demos/posttype-demo.php');
//include(ACOC_DRI.'demos/post-column-demo.php');