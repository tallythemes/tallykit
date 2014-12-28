<?php
/**
 * TallyKit Testimonial
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage Testimonial
*/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if(!defined( 'TALLYKIT_LOGO_IMAGE_WIDTH' )){ define('TALLYKIT_LOGO_IMAGE_WIDTH', '307'); };
if(!defined( 'TALLYKIT_LOGO_IMAGE_HEIGHT' )){ define('TALLYKIT_LOGO_IMAGE_HEIGHT', '9999'); };

include('logo-types.php');
include('logo-metabox.php');
include('logo-template.php');
include('logo-script.php'); 
include('logo-shortcodes.php');
include('logo-tinymce.php');
include('logo-color.php');