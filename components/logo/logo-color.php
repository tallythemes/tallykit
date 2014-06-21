<?php
add_action('wp_head', 'tallykit_logo_color_action_hook');
function tallykit_logo_color_action_hook(){
	?>
    <style type="text/css">	
		.color_mood_light .tallykit_logo_item{ background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>;}
		
		.color_mood_dark .tallykit_logo_item{ background-color:<?php tallykitkit_color('color_inner_bg_dark'); ?>;}
	</style>
    <?php	
}