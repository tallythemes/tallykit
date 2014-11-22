<?php
class tallykit_FrontPage_block_output_portfolio_carousel{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_portfolio_carousel_';
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
		$control_nav = tally_option($this->prefix.'control_nav');
		$direction_nav = tally_option($this->prefix.'direction_nav');
		
		$item_width = tally_option($this->prefix.'item_width');
		$item_margin = tally_option($this->prefix.'item_margin');
		$min_items = tally_option($this->prefix.'min_items');
		$max_items = tally_option($this->prefix.'max_items');
		$move = '0';
		$image_size = tally_option($this->prefix.'image_size');
		
		
		if($enable == 'on'):
			echo '<div class="front_page_portfolio_carousel">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_portfolio_carousel category="'.$category.'" tags="'.$tag.'" exclude_category="" relation="'.$relation.'" limit="'.$limit.'" orderby="'.$orderby.'" order="'.$order.'" ids="" control_nav="'.$control_nav.'" direction_nav="'.$direction_nav.'" item_width="'.$item_width.'" item_margin="'.$item_margin.'" min_items="'.$min_items.'" max_items="'.$max_items.'" move="'.$move.'" image_size="'.$image_size.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}