<?php
add_action( 'admin_enqueue_scripts', 'tallykit_load_admin_scripts');
function tallykit_load_admin_scripts(){
	$css = TALLYKIT_URL . 'assets/css/';
	$js = TALLYKIT_URL . 'assets/js/';
	wp_enqueue_style( 'tallykit-admin', $css.'tallykit-admin.css', '', '1.0' );
}