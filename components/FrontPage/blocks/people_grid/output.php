<?php
class tallykit_FrontPage_block_output_people_grid{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_people_grid_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$category = tally_option($this->prefix.'category');
		$relation = tally_option($this->prefix.'relation');
		$limit = tally_option($this->prefix.'limit');
		$orderby = tally_option($this->prefix.'orderby');
		$order = tally_option($this->prefix.'order');
		
		$columns = tally_option($this->prefix.'columns');
		$filter = tally_option($this->prefix.'filter');
		$margin = tally_option($this->prefix.'margin');
		
		
		if($enable == 'on'):
			echo '<div class="front_page_people_grid">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_people_grid category="'.$category.'" exclude_category="" relation="'.$relation.'" limit="'.$limit.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'" ids="" filter="'.$filter.'" margin="'.$margin.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}