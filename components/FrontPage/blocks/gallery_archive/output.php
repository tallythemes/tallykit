<?php
class tallykit_FrontPage_block_output_gallery_archive{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_gallery_archive_';
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
		$pagination = tally_option($this->prefix.'pagination');
		$image_size = tally_option($this->prefix.'image_size');
		
		if($enable == 'on'):
			echo '<div class="front_page_gallery_archive">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_album category="'.$category.'" relation="'.$relation.'" limit="'.$limit.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'" filter="'.$filter.'" margin="'.$margin.'" pagination="'.$pagination.'" image_size="'.$image_size.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}