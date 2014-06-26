<?php
/**
 * TallyKit Parallax
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage Parallax
*/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

include('parallax-metabox.php');
include('parallax-template.php');
include('parallax-script.php'); 
include('parallax-shortcodes.php');
include('parallax-export-import.php');