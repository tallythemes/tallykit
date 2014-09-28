<?php
class tallykit_FrontPage_block_output_tab{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_tab_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$items = tally_option($this->prefix.'items');
		
		if($enable == 'on'):
			echo '<div class="front_page_tab">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_tab class="" ]';
					if(is_array($items) && !empty($items)){
						foreach($items as $item){
							$output .= '[tk_tab_item title="'.$item['title'].'"]'.$item['content'].'[/tk_tab_item]';
						}
					}
				$output .= '[/tk_tab]';
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}