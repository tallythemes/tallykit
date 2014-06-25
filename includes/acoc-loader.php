<?php
if(!function_exists( 'acoc_forceLoadFirst' )){
	if( file_exists(TALLYKIT_DRI.'acoc/acoc.php') ){ include(TALLYKIT_DRI.'acoc/acoc.php'); }
	else{  
		if ( is_admin() ) { add_filter( 'admin_notices', 'tallykit_acoc_loader_notice' ); }
		// Stop executing the plugin until the framework is activated
		return;
	}
}

function tallykit_acoc_loader_notice() {
	echo "<div class='error'><p><strong>"
		. __( 'TallyKit plugin require the <a href="https://github.com/tallythemes/acoc" target="_blank">ACOC Framework</a> plugin. Please download it from <a href="https://github.com/tallythemes/acoc" target="_blank">here</a> and active it ', "tallykit_textdomain" )
		. "</strong></p></div>";
}