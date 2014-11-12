<?php
/**
 * TallyKit Portfolio
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package Sample
 * @subpackage Portfolio
*/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if(!defined( 'TALLYKIT_PORTFOLIO_ARCHIVE_W' )){ define('TALLYKIT_PORTFOLIO_ARCHIVE_W', '344'); };
if(!defined( 'TALLYKIT_PORTFOLIO_ARCHIVE_H' )){ define('TALLYKIT_PORTFOLIO_ARCHIVE_H', '200'); };

include('portfolio-types.php');
include('portfolio-metabox.php');
include('portfolio-template.php');
include('portfolio-script.php'); 
include('portfolio-shortcodes.php');
include('portfolio-tinymce.php');
include('portfolio-color.php');