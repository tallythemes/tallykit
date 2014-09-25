<?php
class tallykit_FrontPage_block_output_map{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_map_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$address = tally_option($this->prefix.'address');
		$type = tally_option($this->prefix.'type');
		$width = tally_option($this->prefix.'width');
		$height = tally_option($this->prefix.'height');
		$zoom = tally_option($this->prefix.'zoom');
		$scrollwheel = tally_option($this->prefix.'scrollwheel');
		$scale = tally_option($this->prefix.'scale');
		$popup = tally_option($this->prefix.'popup');
		$zoom_pancontrol = tally_option($this->prefix.'zoom_pancontrol');
		$icon = tally_option($this->prefix.'icon');
		
		if($enable == 'on'):
			echo '<div class="front_page_map">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '[tk_map address="'.$address.'" type="'.$type.'" width="'.$width.'" height="'.$height.'" zoom="'.$zoom.'" scrollwheel="'.$scrollwheel.'" scale="'.$scale.'" popup="'.$popup.'" zoom_pancontrol="'.$zoom_pancontrol.'" icon="'.$icon.'" /]';
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}