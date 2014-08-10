<?php
/**
 * TallyKit Shortcodes
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage Shortcodes
 * @class tallykit-shortcode
**/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
$component_folder_name = 'shortcodes';

 
include('shortcodes-color.php');
include('shortcodes-tinyMCE.php');
include('shortcodes-functions.php');
include('shortcodes-scripts.php');
include('shortcodes-template.php');
include('shortcodes-shortcodes.php');

if(class_exists('AQ_Page_Builder')){
	include('aqua/aq-row-block.php');
}