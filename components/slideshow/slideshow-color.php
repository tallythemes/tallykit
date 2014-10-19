<?php
add_action('tallykit_dynamic_css', 'tallykit_slideshow_color_action_hook');
function tallykit_slideshow_color_action_hook(){
?>
/*Button*/
.tallykit_slideshow_item.color_mood_light .tallykit_slideshow_item_inner .tk_slideshow_button{ 
	border-color:<?php tallykitkit_color('color_headings_light'); ?> !important; color:<?php tallykitkit_color('color_headings_light'); ?> !important; }
.tallykit_slideshow_item.color_mood_dark .tallykit_slideshow_item_inner .tk_slideshow_button{ 
	border-color:<?php tallykitkit_color('color_headings_dark'); ?> !important; color:<?php tallykitkit_color('color_headings_dark'); ?> !important; }
				
.tallykit_slideshow_item.color_mood_light .tallykit_slideshow_item_inner .tk_slideshow_button:hover,
.tallykit_slideshow_item.color_mood_dark .tallykit_slideshow_item_inner .tk_slideshow_button:hover{
	border-color:<?php tallykitkit_color('site_accent_color'); ?> !important; background-color:<?php tallykitkit_color('site_accent_color'); ?>; color: #FFF !important; }
			
/*content*/
.tallykit_slideshow_item.color_mood_light .tallykit_slideshow_item_inner .tk_slideshow_content{ color:<?php tallykitkit_color('color_headings_light'); ?> !important; }

.tallykit_slideshow_item.color_mood_dark .tallykit_slideshow_item_inner .tk_slideshow_content{ color:<?php tallykitkit_color('color_headings_dark'); ?> !important; }
		
/*title*/
.tallykit_slideshow_item.color_mood_light .tallykit_slideshow_item_inner .tk_slideshow_title{ color:<?php tallykitkit_color('color_headings_light'); ?> !important; }
		
.tallykit_slideshow_item.color_mood_dark .tallykit_slideshow_item_inner .tk_slideshow_title{ color:<?php tallykitkit_color('color_headings_dark'); ?> !important; }
	
/*subtitle*/
.tallykit_slideshow_item.color_mood_light .tallykit_slideshow_item_inner .tk_slideshow_subtitle{ color:<?php tallykitkit_color('color_headings_light'); ?> !important; }
		
.tallykit_slideshow_item.color_mood_dark .tallykit_slideshow_item_inner .tk_slideshow_subtitle{ color:<?php tallykitkit_color('color_headings_dark'); ?> !important; }
    <?php	
}