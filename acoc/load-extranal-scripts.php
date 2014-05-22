<?php
add_action( 'wp_enqueue_scripts', 'acoc_load_extranal_scripts');
function acoc_load_extranal_scripts(){
	$css = ACOC_URL . 'assets/css/';
	$js = ACOC_URL . 'assets/js/';
	
	wp_enqueue_script( 'modernizr', $js.'modernizr.custom.97507.js', '', '2.8.1', false );
	wp_register_style( 'acoc-flexslider', $css.'flexslider.css', '', '2.2.2' );
	wp_register_script( 'jquery-flexslider', $js.'jquery.flexslider-min.js', '', '2.2.2', true );
	
	wp_register_script( 'jquery-imagesloaded', $js.'imagesloaded.pkgd.min.js', '', '3.1.6', true );
	
	wp_register_script( 'jquery-isotope','http://cdn.jsdelivr.net/isotope/2.0.0/isotope.pkgd.min.js', '', '2.0.0', true );
	wp_register_script( 'jquery-shuffle', $js.'jquery.shuffle.min.js', array('jquery', 'modernizr'), '2.1.1', true );
	wp_enqueue_script( 'jquery-masonry', $js.'masonry.pkgd.min.js', array('jquery'), '2.1.1', true );
	
	wp_register_style( 'font-awesome', $css.'font-awesome.min.css', '', '4.0.3' );
	
	wp_enqueue_style( 'acoc', $css.'acoc.css', '', '1.0' );
}



add_action( 'admin_enqueue_scripts', 'acoc_load_admin_scripts');
function acoc_load_admin_scripts(){
	$css = ACOC_URL . 'assets/css/';
	$js = ACOC_URL . 'assets/js/';
	
	wp_enqueue_style( 'acoc-admin', $css.'admin.css', '', '1.0' );
}