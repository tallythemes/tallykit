<?php
class tallykit_FrontPage_block_output_gallery_single{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_gallery_single_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$slug = tally_option($this->prefix.'slug');
		$columns = tally_option($this->prefix.'columns');
		$margin = tally_option($this->prefix.'margin');
		
		if($enable == 'on'):
			echo '<div class="front_page_gallery_single">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_gallery id="'.$slug.'" columns="'.$columns.'" margin="'.$margin.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}