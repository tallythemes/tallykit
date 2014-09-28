<?php
class tallykit_FrontPage_block_output_slideshow{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_slideshow_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$id = tally_option($this->prefix.'id');
		
		if($enable == 'on'):
			echo '<div class="front_page_slideshow">';
				
				$output = '[tk_slideshow id="'.$id.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}