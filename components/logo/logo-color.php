<?php
add_action('tallykit_dynamic_css', 'tallykit_logo_color_action_hook');
function tallykit_logo_color_action_hook(){
?>
.color_mood_light .tallykit_logo_item{ background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>;}		
.color_mood_dark .tallykit_logo_item{ background-color:<?php tallykitkit_color('color_inner_bg_dark'); ?>;}
<?php	
}