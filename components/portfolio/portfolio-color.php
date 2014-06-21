<?php
add_action('wp_head', 'tallykit_portfolio_color_action_hook');
function tallykit_portfolio_color_action_hook(){
	?>
    <style type="text/css">
		.color_mood_light .tallykit_portfolio_item .tallykit_portfolio_item_details{ background-color:<?php tallykitkit_color('color_inner_bg_light'); ?>; }
		.color_mood_light .tallykit_portfolio_item .tallykit_portfolio_item_heading{ color:<?php tallykitkit_color('color_text_light'); ?> !important; }
		.color_mood_light .tallykit_portfolio_item .tallykit_portfolio_item_subheading{ color:<?php tallykitkit_color('color_meta_light'); ?>; }
		
		.color_mood_dark .tallykit_portfolio_item .tallykit_portfolio_item_details{ background-color:<?php tallykitkit_color('color_inner_bg_dark'); ?>; }
		.color_mood_dark .tallykit_portfolio_item .tallykit_portfolio_item_heading{ color:<?php tallykitkit_color('color_text_dark'); ?> !important; }
		.color_mood_dark .tallykit_portfolio_item .tallykit_portfolio_item_subheading{ color:<?php tallykitkit_color('color_meta_dark'); ?>; }
	</style>
    <?php	
}