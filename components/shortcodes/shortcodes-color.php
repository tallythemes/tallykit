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
			
		.color_mood_light .tallykit-shortcode-button.style-fill.color-default:hover{  color:<?php tallykitkit_color('color_headings_light'); ?>; }
		.color_mood_dark .tallykit-shortcode-button.style-fill.color-default:hover{  color:<?php tallykitkit_color('color_headings_dark'); ?>; }
			
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
			
			
		/*---------------------------------------------
    		 Callout
		--------------------------------------------- */
		/*- style center-border -*/
		.color_mood_light .tallykit-shortcode-callout.style-center-border{ border-color:<?php tallykitkit_color('color_headings_light'); ?> !important;  }
		.color_mood_dark .tallykit-shortcode-callout.style-center-border{ border-color:<?php tallykitkit_color('color_headings_dark'); ?> !important;  }
		

		/*- style center-border-bg -*/
		.color_mood_light .tallykit-shortcode-callout.style-center-border-bg{ 
			border-color:<?php tallykitkit_color('color_border_light'); ?>; 
			background-color:<?php tallykitkit_color('color_inner_bg_light', '0.8'); ?>; 
		}
		.color_mood_dark .tallykit-shortcode-callout.style-center-border-bg{ 
			border-color:<?php tallykitkit_color('color_border_dark'); ?>; 
			background-color:<?php tallykitkit_color('color_inner_bg_dark', '0.8'); ?>; 
		}
		
		
		/*- style left-border -*/
		.color_mood_light .tallykit-shortcode-callout.style-left-border{ border-color:<?php tallykitkit_color('color_headings_light'); ?> !important;  }
		.color_mood_dark .tallykit-shortcode-callout.style-left-border{ border-color:<?php tallykitkit_color('color_headings_dark'); ?> !important;  }
		
		
		/*- style left-border-bg -*/
		.color_mood_light .tallykit-shortcode-callout.style-left-border-bg{
			 border-color:<?php tallykitkit_color('color_border_light'); ?>;
			 background-color:<?php tallykitkit_color('color_inner_bg_light', '0.8'); ?>;  
		}
		.color_mood_dark .tallykit-shortcode-callout.style-left-border-bg{
			border-color:<?php tallykitkit_color('color_border_dark'); ?>; 
			background-color:<?php tallykitkit_color('color_inner_bg_dark', '0.8'); ?>; 
		}
		
		
		/*---------------------------------------------
			 Blog
		--------------------------------------------- */
		.color_mood_light .tk-shortcode-blog-grid-item{ background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>;   }
		.color_mood_light .tk-shortcode-blog-grid-item .tk-shortcode-blog-title a{ color:<?php tallykitkit_color('color_headings_light'); ?>;  }
		.color_mood_light .tk-shortcode-blog-grid-item .tk-shortcode-blog-title a:hover,
		.color_mood_light .tk-shortcode-blog-grid-item .tk-shortcode-blog-info a:hover{ <?php tallykitkit_color('site_accent_color'); ?> }
		.color_mood_light .tk-shortcode-blog-grid-item .tk-shortcode-blog-info,
		.color_mood_light .tk-shortcode-blog-grid-item .tk-shortcode-blog-info span.time,
		.color_mood_light .tk-shortcode-blog-grid-item .tk-shortcode-blog-info a{ color:<?php tallykitkit_color('color_meta_light'); ?>; }
		.color_mood_light .tk-shortcode-blog-grid-item .tk-shortcode-blog-info{ background-color:<?php tallykitkit_color('color_border_light', '0.1'); ?>; }
		
		.color_mood_dark .tk-shortcode-blog-grid-item{ background-color:<?php tallykitkit_color('color_inner_bg_dark'); ?>;   }
		.color_mood_dark .tk-shortcode-blog-grid-item .tk-shortcode-blog-title a{ color:<?php tallykitkit_color('color_headings_dark'); ?>;  }
		.color_mood_dark .tk-shortcode-blog-grid-item .tk-shortcode-blog-title a:hover,
		.color_mood_dark .tk-shortcode-blog-grid-item .tk-shortcode-blog-info a:hover{ color:<?php tallykitkit_color('site_accent_color'); ?>; }
		.color_mood_dark .tk-shortcode-blog-grid-item .tk-shortcode-blog-info,
		.color_mood_dark .tk-shortcode-blog-grid-item .tk-shortcode-blog-info span.time,
		.color_mood_dark .tk-shortcode-blog-grid-item .tk-shortcode-blog-info a{ color:<?php tallykitkit_color('color_meta_dark'); ?> !important; }
		.color_mood_dark .tk-shortcode-blog-grid-item .tk-shortcode-blog-info{ background-color:<?php tallykitkit_color('color_border_dark', '0.1'); ?>; }
		
		
		
		/*---------------------------------------------
			 Blog Timeline
		--------------------------------------------- */
		.tallykit-blog-timeline .tallykit-blog-timeline-list .tallykit-blog-author-img img{ border-color:<?php tallykitkit_color('site_accent_color'); ?> !important; }
		.tallykit-blog-timeline .line,
		.tallykit-blog-timeline .line:before,
		.tallykit-blog-timeline .line:after{ background-color:<?php tallykitkit_color('site_accent_color'); ?> !important; }
		
		.color_mood_light .tallykit-blog-timeline-post .tk-post-content:before,
		.color_mood_light .tallykit-blog-timeline .tallykit-blog-timeline-list:nth-child(2n+2) .tallykit-blog-timeline-post .tk-post-content:before{  border-color:<?php tallykitkit_color('color_border_light'); ?>; }
		
		.color_mood_dark .tallykit-blog-timeline-post .tk-post-content:before,
		.color_mood_dark .tallykit-blog-timeline .tallykit-blog-timeline-list:nth-child(2n+2) .tallykit-blog-timeline-post .tk-post-content:before{  border-color:<?php tallykitkit_color('color_border_dark'); ?>; }
	</style>
    <?php	
}