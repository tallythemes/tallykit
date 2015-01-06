<?php
/**
 * TallyKit BuddyPress
 *
 * @since TallyKit (3.0)
 *
 * This file generate portfolio post type, shortcode, 
 * widgets, theme compat and other require elements
 *
 * @package TallyKit
 * @subpackage BuddyPress
*/
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/** Fail silently if WooCommerce is not activated */
if ( in_array( 'buddypress/bp-loader.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){	
	include('buddypress-color.php');
	include('buddypress-script.php');
	include('buddypress-template.php');
	include('buddypress-shortcodes.php');
	include('buddypress-tinymce.php');

}