<?php
/**
 * TallyKit Gallery
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage Gallery
*/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if(!defined( 'TALLYKIT_GALLERY_THUMB_W' )){ define('TALLYKIT_GALLERY_THUMB_W', '400'); };
if(!defined( 'TALLYKIT_GALLERY_THUMB_H' )){ define('TALLYKIT_GALLERY_THUMB_H', '400'); };

include('gallery-types.php');
include('gallery-metabox.php');
include('gallery-template.php');
include('gallery-script.php'); 
include('gallery-shortcodes.php');
include('gallery-tinymce.php');
include('gallery-color.php');