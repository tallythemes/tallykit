<?php
/**
 * TallyKit People
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage People
*/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

include('people-types.php');
include('people-metabox.php');
include('people-template.php');
include('people-script.php'); 
include('people-shortcodes.php');
include('people-tinymce.php');
include('people-color.php');