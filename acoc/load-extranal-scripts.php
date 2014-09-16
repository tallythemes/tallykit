<?php
add_action( 'wp_enqueue_scripts', 'acoc_load_extranal_scripts');
function acoc_load_extranal_scripts(){
	$css = ACOC_URL . 'assets/css/';
	$js = ACOC_URL . 'assets/js/';
	
	/**- modernizr -**/
	wp_enqueue_script( 'modernizr', $js.'modernizr.custom.97507.js', '', '2.8.1', false );
	
	/**- easing -**/
	wp_register_script('jquery-easing', $js.'jquery.easing.1.3.js', array('jquery'), '', true);
	
	/**- flexslider -**/
	wp_register_style( 'acoc-flexslider', $css.'flexslider.css', '', '2.2.2' );
	wp_register_script( 'jquery-flexslider', $js.'jquery.flexslider-min.js', array('jquery'), '2.2.2', true );
	
	/**- prettyPhoto -**/
	wp_register_style( 'jquery-prettyPhoto', $css.'prettyPhoto.css', '', '3.1.5' );
	wp_register_script( 'jquery-prettyPhoto', $js.'jquery.prettyPhoto.js', array('jquery'), '3.1.5', true );
	
	/**- fitvids -**/
	wp_register_script('jquery-fitvids', $js.'jquery.fitvids.js', array('jquery'), '', true);
	
	/**- Images Loaded -**/
	wp_register_script( 'jquery-imagesloaded', $js.'imagesloaded.pkgd.min.js', array('jquery'), '3.1.6', true );
	
	/**- isotope -**/
	wp_register_script( 'jquery-isotope','http://cdn.jsdelivr.net/isotope/2.0.0/isotope.pkgd.min.js', array('jquery'), '2.0.0', true );
	
	/**- Shuffle -**/
	wp_register_script( 'jquery-shuffle', $js.'jquery.shuffle.min.js', array('jquery', 'modernizr'), '2.1.1', true );
	
	/**- Masonry -**/
	wp_register_script( 'jquery-masonry', $js.'masonry.pkgd.min.js', array('jquery'), '2.1.1', true );
	
	/**- Font Awesome -**/
	wp_register_style( 'font-awesome', $css.'font-awesome.min.css', '', ' 4.2.0' );
	
	/**- Google Map -**/
	wp_register_script( 'google-map', 'http://maps.google.com/maps/api/js?sensor=true', array(), '', true);
	wp_register_script( 'jquery-gomap', $js.'jquery.gomap-1.3.2.min.js', array('jquery'), '', true);
	
	/**- gauge -**/
	wp_register_script('jquery-gauge', $js.'gauge.min.js', array('jquery'), '', true);
	
	/**- waypoints -**/
	wp_register_script('jquery-waypoints', $js.'waypoints.min.js', array(), '', true);
	
	/**- magnific-popup -**/
	wp_register_script('jquery-magnific-popup', $js.'jquery.magnific-popup.min.js', array(), '0.9.9 ', true);
	wp_register_style( 'jquery-magnific-popup', $css.'magnific-popup.css', '', '0.9.9 ' );
	
	/**- animate CSS -**/
	wp_register_style( 'animate', $css.'animate.css', '', '3.2.0 ' );
	
	/**- wow JS -**/
	wp_register_script('jquery-wow', $js.'wow.min.js', array(), '1.0.1 ', true);
	
	wp_enqueue_style( 'acoc', $css.'acoc.css', '', '1.0' );
	wp_enqueue_style( 'acoc', $js.'acoc.js', '', '1.0' );
}



add_action( 'admin_enqueue_scripts', 'acoc_load_admin_scripts');
function acoc_load_admin_scripts(){
	$css = ACOC_URL . 'assets/css/';
	$js = ACOC_URL . 'assets/js/';
	wp_enqueue_script('acoc-admin', $js.'acoc-admin.js', array(), null);
	wp_enqueue_style( 'acoc-admin', $css.'admin.css', '', '1.0' );
}