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
		
		
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger { background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>; }
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger:hover { background-color:<?php tallykitkit_color('color_border_light'); ?>; }
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger.active, 
		.color_mood_light .tallykit-shortcode-toggle .tallykit-shortcode-toggle-trigger.active:hover {  background-color:<?php tallykitkit_color('color_border_light'); ?>;}
	</style>
    <?php	
}