<?php
class tallykit_FrontPage_block_output_portfolio_slideshow{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_portfolio_slideshow_';
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
		$animation = tally_option($this->prefix.'animation');
		$direction = tally_option($this->prefix.'direction');
		$smooth_height = tally_option($this->prefix.'smooth_height');
		$slideshow = tally_option($this->prefix.'slideshow');
		$animation_loop = tally_option($this->prefix.'animation_loop');
		$slideshow_speed = tally_option($this->prefix.'slideshow_speed');
		$animation_speed = tally_option($this->prefix.'animation_speed');
		$control_nav = tally_option($this->prefix.'control_nav');
		$direction_nav = tally_option($this->prefix.'direction_nav');
		
		if($enable == 'on'):
			echo '<div class="front_page_portfolio_slideshow">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_portfolio_slideshow category="'.$category.'" tags="'.$tag.'" exclude_category="" relation="'.$relation.'" limit="'.$limit.'" orderby="'.$orderby.'" order="'.$order.'" ids="" animation="'.$animation.'" direction="'.$direction.'" smooth_height="'.$smooth_height.'" slideshow="'.$slideshow.'" animation_loop="'.$animation_loop.'" slideshow_speed="'.$slideshow_speed.'" animation_speed="'.$animation_speed.'" control_nav="'.$control_nav.'" direction_nav="'.$direction_nav.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}