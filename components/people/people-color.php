<?php
add_action('wp_head', 'tallykit_people_color_action_hook');
function tallykit_people_color_action_hook(){
	?>
    <style type="text/css">
		.color_mood_light .tk_people_item_details .tk_people_item_heading a{ color:<?php tallykitkit_color('color_headings_light'); ?>; }
		
		.color_mood_dark .tk_people_item_details .tk_people_item_heading a{ color:<?php tallykitkit_color('color_headings_dark'); ?>; }
	</style>
    <?php	
}