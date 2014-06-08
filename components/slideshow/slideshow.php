<?php
/**
 * TallyKit Slideshow
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage slideshow
*/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

include('slideshow-types.php');
include('slideshow-metabox.php');
include('slideshow-template.php');
include('slideshow-script.php'); 
include('slideshow-shortcodes.php');
include('slideshow-tinymce.php');
include('slideshow-widgets.php');