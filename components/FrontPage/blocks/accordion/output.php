<?php
class tallykit_FrontPage_block_output_accordion{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_accordion_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$items = tally_option($this->prefix.'items');
		
		if($enable == 'on'):
			echo '<div class="front_page_accordion">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_accordion class="" ]';
					if(is_array($items) && !empty($items)){
						foreach($items as $item){
							$output .= '[tk_accordion_item title="'.$item['title'].'"]'.$item['content'].'[/tk_accordion_item]';
						}
					}
				$output .= '[/tk_accordion]';
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}