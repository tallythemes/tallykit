<?php
add_action('wp_head', 'tallykit_doc_color_action_hook');
function tallykit_doc_color_action_hook(){
	?>
    <style type="text/css">
		
		.color_mood_light .tallykit_doc_archive .tk_doc_entry h2 a{ color:<?php tallykitkit_color('color_headings_light'); ?>; }
		.color_mood_light .tallykit_doc_archive .tk_doc_entry h2 a:hover{ color:<?php tallykitkit_color('site_accent_color'); ?>; }
		
		.color_mood_light .tallykit_doc_single .tk_doc_content .tk_doc_title{ background-color:<?php tallykitkit_color('site_accent_color'); ?>; }
		.color_mood_light .tallykit_doc_single .tk_doc_content .tk_doc_backtotop{ background-color:<?php tallykitkit_color('site_accent_color'); ?>; }
		
		.color_mood_light .tallykit_doc_single .tk_doc_side_nav .tk_doc_side_nav_inner{ background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>; }
		.color_mood_light .tallykit_doc_single .tk_doc_side_nav .tk_doc_side_nav_inner li a{ color:<?php tallykitkit_color('color_headings_light'); ?>; }
		.color_mood_light .tallykit_doc_single .tk_doc_side_nav .tk_doc_side_nav_inner li a:hover{ color:<?php tallykitkit_color('site_accent_color'); ?>; }
		
		
		
		.color_mood_dark .tallykit_doc_archive .tk_doc_entry h2 a{ color:<?php tallykitkit_color('color_headings_dark'); ?>; }
		.color_mood_dark .tallykit_doc_archive .tk_doc_entry h2 a:hover{ color:<?php tallykitkit_color('site_accent_color'); ?>; }
		
		.color_mood_dark .tallykit_doc_single .tk_doc_content .tk_doc_title{ background-color:<?php tallykitkit_color('site_accent_color'); ?>; }
		.color_mood_dark .tallykit_doc_single .tk_doc_content .tk_doc_backtotop{ background-color:<?php tallykitkit_color('site_accent_color'); ?>; }
		
		.color_mood_dark .tallykit_doc_single .tk_doc_side_nav .tk_doc_side_nav_inner{ background-color:<?php tallykitkit_color('color_inner_bg_dark'); ?>; }
		.color_mood_dark .tallykit_doc_single .tk_doc_side_nav .tk_doc_side_nav_inner li a{ color:<?php tallykitkit_color('color_headings_dark'); ?>; }
		.color_mood_dark .tallykit_doc_single .tk_doc_side_nav .tk_doc_side_nav_inner li a:hover{ color:<?php tallykitkit_color('site_accent_color'); ?>; }
	</style>
    <?php	
}