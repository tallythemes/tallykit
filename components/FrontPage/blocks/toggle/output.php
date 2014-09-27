<?php
class tallykit_FrontPage_block_output_toggle{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_toggle_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$items = tally_option($this->prefix.'items');
		
		if($enable == 'on'):
			echo '<div class="front_page_toggle">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '';
				if(is_array($items) && !empty($items)){
					foreach($items as $item){
						$output .= '[tk_toggle title="'.$item['title'].'"]'.$item['content'].'[/tk_toggle]';
					}
				}
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}