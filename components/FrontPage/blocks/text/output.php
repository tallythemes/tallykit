<?php
class tallykit_FrontPage_block_output_text{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_text_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$content = tally_option($this->prefix.'content');
		
		if($enable == 'on'):
			echo '<div class="front_page_text">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				echo do_shortcode($content);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}