<?php
add_action('wp_head', 'tallykit_shortcode_color_action_hook');
function tallykit_shortcode_color_action_hook(){
	?>
    <style type="text/css">
		/*~-~ Accordion ~-~*/
		.color_mood_light .tallykit-shortcode-accordion h3.tallykit-shortcode-accordion-trigger { background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>; }
		.color_mood_light .tallykit-shortcode-accordion h3.tallykit-shortcode-accordion-trigger a { color:<?php tallykitkit_color('color_headings_light'); ?>; }
		.color_mood_light .tallykit-shortcode-accordion .tallykit-shortcode-accordion-trigger:hover { background-color: <?php tallykitkit_color('color_border_light'); ?>;}
		.color_mood_light .tallykit-shortcode-accordion .tallykit-shortcode-accordion-trigger.ui-state-active{background-color:<?php tallykitkit_color('color_border_light'); ?>; }
		.color_mood_light .tallykit-shortcode-accordion .ui-accordion-content { background-color: <?php tallykitkit_color('color_inner_bg_light'); ?>; }
		
		.color_mood_dark .tallykit-shortcode-accordion h3.tallykit-shortcode-accordion-trigger { background-color:<?php tallykitkit_color('color_inner_bg_dark'); ?>; }
		.color_mood_dark .tallykit-shortcode-accordion h3.tallykit-shortcode-accordion-trigger a { color:<?php tallykitkit_color('color_headings_dark'); ?>; }
		.color_mood_dark .tallykit-shortcode-accordion .tallykit-shortcode-accordion-trigger:hover { background-color: <?php tallykitkit_color('color_border_dark'); ?>;}
		.color_mood_dark .tallykit-shortcode-accordion .tallykit-shortcode-accordion-trigger.ui-state-active{background-color:<?php tallykitkit_color('color_border_dark'); ?>; }
		.color_mood_dark .tallykit-shortcode-accordion .ui-accordion-content { background-color: <?php tallykitkit_color('color_inner_bg_dark'); ?>; }
		
		
		/*~-~ Tabs ~-~*/
		.color_mood_light .tallykit-shortcode-tabs ul.ui-tabs-nav li a {
			background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>; 
			color:<?php tallykitkit_color('color_text_light'); ?>; 
		}
		.color_mood_light .tallykit-shortcode-tabs ul.ui-tabs-nav li a:hover { background-color:<?php tallykitkit_color('color_border_light'); ?>; }
		.color_mood_light .tallykit-shortcode-tabs ul.ui-tabs-nav .ui-state-active a { 
			background-color:<?php tallykitkit_color('color_border_light'); ?>; 
			color:<?php tallykitkit_color('color_text_light'); ?>; 
		}
		.color_mood_light .tallykit-shortcode-tabs ul.ui-tabs-nav .ui-state-active a:hover { background-color:<?php tallykitkit_color('color_border_light'); ?>; }
		.color_mood_light .tallykit-shortcode-tabs .tab-content { background-color:<?php tallykitkit_color('color_border_light'); ?>; }
		
		.color_mood_dark .tallykit-shortcode-tabs ul.ui-tabs-nav li a {
			background-color:<?php tallykitkit_color('color_inner_bg_dark'); ?>; 
			color:<?php tallykitkit_color('color_text_dark'); ?>; 
		}
		.color_mood_dark .tallykit-shortcode-tabs ul.ui-tabs-nav li a:hover { background-color:<?php tallykitkit_color('color_border_dark'); ?>; }
		.color_mood_dark .tallykit-shortcode-tabs ul.ui-tabs-nav .ui-state-active a { 
			background-color:<?php tallykitkit_color('color_border_dark'); ?>; 
			color:<?php tallykitkit_color('color_text_dark'); ?>; 
		}
		.color_mood_dark .tallykit-shortcode-tabs ul.ui-tabs-nav .ui-state-active a:hover { background-color:<?php tallykitkit_color('color_border_dark'); ?>; }
		.color_mood_dark .tallykit-shortcode-tabs .tab-content { background-color:<?php tallykitkit_color('color_border_dark'); ?>; }
		
		
		/*~-~ Toggle ~-~*/
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger { background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>; }
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger:hover { background-color:<?php tallykitkit_color('color_border_light'); ?>; }
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger.active, 
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger.active:hover {  background-color:<?php tallykitkit_color('color_border_light'); ?>;}
		
		
		/*~-~ Button ~-~*/
		
		/*fill style*/
		.color_mood_light .tallykit-shortcode-button.style-fill.color-default{ 
			background:<?php tallykitkit_color('color_headings_light'); ?>; color:<?php tallykitkit_color('color_headings_dark'); ?>; border-color:<?php tallykitkit_color('color_headings_light'); ?>  !important; }
		.color_mood_dark .tallykit-shortcode-button.style-fill.color-default{ 
			background:<?php tallykitkit_color('color_headings_dark'); ?>; color:<?php tallykitkit_color('color_headings_light'); ?>; border-color:<?php tallykitkit_color('color_headings_dark'); ?>  !important; }
			
		.color_mood_light .tallykit-shortcode-button.style-fill.color-accent,
		.color_mood_dark .tallykit-shortcode-button.style-fill.color-accent{ 
			background:<?php tallykitkit_color('site_accent_color'); ?>; color:#FFF; border-color:<?php tallykitkit_color('site_accent_color'); ?>  !important; }
			
		.color_mood_light .tallykit-shortcode-button.style-fill.color-accent:hover,
		.color_mood_dark .tallykit-shortcode-button.style-fill.color-accent:hover{ 
			color:<?php tallykitkit_color('site_accent_color'); ?>; }
			
		/*border style*/
		.color_mood_light .tallykit-shortcode-button.style-border.color-default{ 
			border-color:<?php tallykitkit_color('color_headings_light'); ?> !important; color:<?php tallykitkit_color('color_headings_light'); ?> !important; }
		.color_mood_dark .tallykit-shortcode-button.style-border.color-default{ 
			border-color:<?php tallykitkit_color('color_headings_dark'); ?> !important; color:<?php tallykitkit_color('color_headings_dark'); ?> !important; }
			
		.color_mood_light .tallykit-shortcode-button.style-border.color-accent,
		.color_mood_dark .tallykit-shortcode-button.style-border.color-accent{ 
			border-color:<?php tallykitkit_color('site_accent_color'); ?> !important; color:<?php tallykitkit_color('site_accent_color'); ?> !important; }
				
		.color_mood_light .tallykit-shortcode-button.style-border.color-default:hover,
		.color_mood_dark .tallykit-shortcode-button.style-border.color-default:hover,
		.color_mood_light .tallykit-shortcode-button.style-border.color-accent:hover,
		.color_mood_dark .tallykit-shortcode-button.style-border.color-accent:hover{ 
			border-color:<?php tallykitkit_color('site_accent_color'); ?> !important; background-color:<?php tallykitkit_color('site_accent_color'); ?>; color: #FFF !important; }
			
		
	</style>
    <?php	
}