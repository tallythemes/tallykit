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

if(!defined( 'TALLYKIT_GALLERY_ALBUM_WIDTH' )){ define('TALLYKIT_GALLERY_ALBUM_WIDTH', '600'); };
if(!defined( 'TALLYKIT_GALLERY_ALBUM_HEIGHT' )){ define('TALLYKIT_GALLERY_ALBUM_HEIGHT', '600'); };

if(!defined( 'TALLYKIT_GALLERY_SINGLE_WIDTH' )){ define('TALLYKIT_GALLERY_SINGLE_WIDTH', '600'); };
if(!defined( 'TALLYKIT_GALLERY_SINGLE_HEIGHT' )){ define('TALLYKIT_GALLERY_SINGLE_HEIGHT', '600'); };

include('gallery-types.php');
include('gallery-metabox.php');
include('gallery-template.php');
include('gallery-script.php'); 
include('gallery-shortcodes.php');
include('gallery-tinymce.php');
include('gallery-color.php');