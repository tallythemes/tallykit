<?php
class tallykit_FrontPage_block_output_blog_grid{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_blog_grid_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$category = tally_option($this->prefix.'category');
		$tags = tally_option($this->prefix.'tags');
		$relation = tally_option($this->prefix.'relation');
		$limit = tally_option($this->prefix.'limit');
		$columns = tally_option($this->prefix.'columns');
		$orderby = tally_option($this->prefix.'orderby');
		$order = tally_option($this->prefix.'order');
		$filter = tally_option($this->prefix.'filter');
		$pagination = tally_option($this->prefix.'pagination');
		$margin = tally_option($this->prefix.'margin');
		$animation_type = tally_option($this->prefix.'animation_type');
		$animation_duration = tally_option($this->prefix.'animation_duration');
		
		if($enable == 'on'):
			echo '<div class="front_page_blog_grid">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_blog_grid category="'.$category.'" exclude_category="" tags="'.$tags.'" exclude_tags="" relation="'.$relation.'" limit="'.$limit.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'" ids="" filter="'.$filter.'" pagination="'.$pagination.'" margin="'.$margin.'" animation_type="'.$animation_type.'" animation_duration="'.$animation_duration.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}