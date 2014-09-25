<?php
class tallykit_FrontPage_block_output_callout{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_callout_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$button_text = tally_option($this->prefix.'button_text');
		$button_link = tally_option($this->prefix.'button_link');
		$button_link_target = tally_option($this->prefix.'button_link_target');
		$button_size = tally_option($this->prefix.'button_size');
		$style = tally_option($this->prefix.'style');
		$class = tally_option($this->prefix.'class');
		$content_width = tally_option($this->prefix.'content_width');
		$content = tally_option($this->prefix.'content');
		
		if($enable == 'on'):
			echo '<div class="front_page_callout">';
			
				$output = '[tk_callout title="'.$title.'" button_text="'.$button_text.'" button_link="'.$button_link.'" button_link_target="'.$button_link_target.'" button_size="'.$button_size.'" style="'.$style.'" class='.$class.'"" content_width="'.$content_width.'" ]'.$content.'[/tk_callout]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}