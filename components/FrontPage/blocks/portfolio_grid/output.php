<?php
class tallykit_FrontPage_block_output_portfolio_grid{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_portfolio_grid_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$category = tally_option($this->prefix.'category');
		$tag = tally_option($this->prefix.'tag');
		$relation = tally_option($this->prefix.'relation');
		$limit = tally_option($this->prefix.'limit');
		$orderby = tally_option($this->prefix.'orderby');
		$order = tally_option($this->prefix.'order');
		
		$columns = tally_option($this->prefix.'columns');
		$filter = tally_option($this->prefix.'filter');
		$margin = tally_option($this->prefix.'margin');
		
		
		if($enable == 'on'):
			echo '<div class="front_page_portfolio_grid">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_portfolio_grid category="'.$category.'" exclude_category="" tags="'.$tag.'" relation="'.$relation.'" limit="'.$limit.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'" ids="" filter="yes" margin="'.$margin.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}