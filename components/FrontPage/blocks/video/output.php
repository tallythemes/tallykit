<?php
class tallykit_FrontPage_block_output_video{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_video_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$html5 = tally_option($this->prefix.'html5');
		$src = tally_option($this->prefix.'src');
		$w = tally_option($this->prefix.'w');
		$h = tally_option($this->prefix.'h');
		$poster = tally_option($this->prefix.'poster');
		$class = tally_option($this->prefix.'class');
		
		if($enable == 'on'):
			echo '<div class="front_page_video">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_video html5="'.$html5.'" src="'.$src.'" w="'.$w.'" h="'.$h.'" poster="'.$poster.'" class="'.$class.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}