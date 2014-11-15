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

if(!defined( 'TALLYKIT_TESTIMONIAL_IMAGE_W' )){ define('TALLYKIT_TESTIMONIAL_IMAGE_W', '100'); };
if(!defined( 'TALLYKIT_TESTIMONIAL_IMAGE_H' )){ define('TALLYKIT_TESTIMONIAL_IMAGE_H', '100'); };

include('testimonial-types.php');
include('testimonial-metabox.php');
include('testimonial-template.php');
include('testimonial-script.php'); 
include('testimonial-shortcodes.php');
include('testimonial-tinymce.php');
include('testimonial-color.php');