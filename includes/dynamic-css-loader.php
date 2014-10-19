<?php
add_action('wp_enqueue_scripts', 'tallykit_dynamic_css_loader');
function tallykit_dynamic_css_loader(){

	wp_enqueue_style('tallykit-dynamic', admin_url('admin-ajax.php').'?action=tallykit_dynamic_css');
}


function tallykit_dynamic_css() {
  require(TALLYKIT_DRI.'includes/dynamic-css.php');
  exit;
}
add_action('wp_ajax_tallykit_dynamic_css', 'tallykit_dynamic_css');
add_action('wp_ajax_nopriv_tallykit_dynamic_css', 'tallykit_dynamic_css');