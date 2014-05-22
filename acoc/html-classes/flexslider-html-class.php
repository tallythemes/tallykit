<?php
/*
Script Name: 	WP Flexslider
Author     : 	Sazzad Hussain (@sazzadh / sazzadh.com)
Description: 	This will output Slideshow content
Version: 		1.0
*/

/**
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

/************************************************************************
		You should not edit the code below or things might explode!
*************************************************************************/
if(!class_exists('acoc_flexslider_html')):

class acoc_flexslider_html{
	
	public $uid;
	public $rand;
	
	public $div_class;
	public $file_url;
	
	public $the_array;
	
	public $post_type;
	public $post_ids;
	public $taxonomy;
	public $taxonomy_terms;
	public $post_limit;
	
	/*-script settings-*/
	public $animation;
	public $direction;
	public $smoothHeight;
	public $slideshow;
	public $animationLoop;
	public $slideshowSpeed;
	public $animationSpeed;
	public $controlNav;
	public $directionNav;
	public $prevText;
	public $nextText;
	public $pausePlay;
	public $pauseText;
	public $playText;
	public $itemWidth;
	public $itemMargin;
	public $minItems;
	public $maxItems;
	public $move;
	public $additional_data;
	
	
	/**
	* Get started
	* @since  1.0
	*/
	function __construct($data, $additional_data = NULL){
		$default = array(			
			'div_class' => 'wflds-skin',
			'file_url' => NULL,
			
			'the_array' => NULL,
			
			'post_type' => NULL,
			'post_ids' => NULL,
			'taxonomy' => NULL,
			'taxonomy_terms' => NULL,
			'post_limit' => 9,
			
			'animation' => 'slide',
			'direction' => 'horizontal',
			'smoothHeight' => 'false',
			'slideshow' => 'true',
			'animationLoop' => 'true',
			'slideshowSpeed' => '7000',
			'animationSpeed' => '600',
			'controlNav' => 'true',
			'directionNav' => 'true',
			'prevText' => 'Previous',
			'nextText' => 'Next',
			'pausePlay' => 'false',
			'pauseText' => 'Pause',
			'playText' => 'Play',
			'itemWidth' => '0',
			'itemMargin' => '0',
			'minItems' => '0',
			'maxItems' => '0',
			'move' => '0',
		);
		$data = array_merge($default, $data);
		
		$this->uid = 'acoc-flexslider-'.rand();
		$this->rand = rand();
		
		$this->div_class = $data['div_class'];
		$this->file_url = $data['file_url'];
		
		$this->the_array = $data['the_array'];
		
		$this->post_type = $data['post_type'];
		$this->post_ids = $data['post_ids'];
		$this->taxonomy = $data['taxonomy'];
		$this->taxonomy_terms = $data['taxonomy_terms'];
		$this->post_limit = $data['post_limit'];
		
		$this->animation = $data['animation'];
		$this->direction = $data['direction'];
		$this->smoothHeight = $data['smoothHeight'];
		$this->slideshow = $data['slideshow'];
		$this->animationLoop = $data['animationLoop'];
		$this->slideshowSpeed = $data['slideshowSpeed'];
		$this->animationSpeed = $data['animationSpeed'];
		$this->controlNav = $data['controlNav'];
		$this->directionNav = $data['directionNav'];
		$this->prevText = $data['prevText'];
		$this->nextText = $data['nextText'];
		$this->pausePlay = $data['pausePlay'];
		$this->pauseText = $data['pauseText'];
		$this->playText = $data['playText'];
		$this->itemWidth = $data['itemWidth'];
		$this->itemMargin = $data['itemMargin'];
		$this->minItems = $data['minItems'];
		$this->maxItems = $data['maxItems'];
		$this->move = $data['move'];
		
		$this->additional_data = $additional_data;
		
		$this->content();
	}
	
	
	
	/**
	* This will output the inline css of the grid
	* @since  1.0
	*/
	function the_css(){
		echo '<style type="text/css">';
			if(($this->itemWidth != '0') && ($this->itemMargin != '0')) { 
				echo '#'.$this->uid.' .acoc-flexslider-holder .wfs-viewport ul.slides{ margin-left: -'.$this->itemMargin.'px;  }'; 
				echo '#'.$this->uid.' .acoc-flexslider-holder .wfs-viewport ul.slides li{ margin-left: '.$this->itemMargin.'px; }';
			}
		echo '</style>';
	}
	
	
	
	/**
	* This will output the inline JavaScript of the grid
	* @since  1.0
	*/
	function the_js(){
		echo '<script type="text/javascript">';
			echo 'jQuery(document).ready(function($){';
				echo "$('#".$this->uid."-slideshow').flexslider({
						animation: '".$this->animation."',
						namespace: 'wfs-',
						direction: '".$this->direction."',
						smoothHeight: ".$this->smoothHeight.",
						slideshow: ".$this->slideshow.",
						animationLoop: ".$this->animationLoop.",
						slideshowSpeed: ".$this->slideshowSpeed.",
						animationSpeed: ".$this->animationSpeed.",
						controlNav: ".$this->controlNav.",
						
						directionNav: ".$this->directionNav.",
						prevText: '".$this->prevText."',
						nextText: '".$this->nextText."',
						
						pausePlay: ".$this->pausePlay.",
						pauseText: '".$this->pauseText."',
						playText: '".$this->playText."',
						
						itemWidth: ".$this->itemWidth.",
						itemMargin: ".$this->itemMargin.",
						minItems: ".$this->minItems.",
						maxItems: ".$this->maxItems.",
						move: ".$this->move.",
					});";
			echo '});';
		echo '</script>';
	}
	
	
	
	/**
	* Main Content Output Fucntion
	* @since  1.0
	*/
	function content($additional_data = NULL){
		ob_start();
			$this->the_css();
			echo '<div class="acoc-flexslider-clear"></div>';
			echo '<div class="acoc-flexslider '.$this->div_class.'" id="'.$this->uid.'">';
				$this->main_loop();
			echo '</div>';
			echo '<div class="acoc-flexslider-clear"></div>';
			$this->the_js();
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
	}
	
	
	
	/**
	* Main Loop: from main_loop_array() & main_loop_typs()
	* @since  1.0
	*/
	function main_loop(){
		
			if(is_array($this->the_array) && !empty($this->the_array)){
				$this->main_loop_array();
			}elseif($this->post_type != NULL){
				$this->main_loop_typs();
			}else{
				echo '<li>No Content found</li>';	
			}
		
	}
	
	
	
	/**
	* Content before the loop start
	* @since  1.0
	*/
	function before_loop(){
		echo '<div class="acoc-flexslider-holder" id="'.$this->uid.'-slideshow">';
			echo '<ul class="slides">';
	}
	
	
	
	/**
	* content after the loop end
	* @since  1.0
	*/
	function after_loop(){
			echo '</ul>';
		echo '</div>';
	}
	
	
	
	
	/**
	* Main Loop: This function run when we use ARRAY to output the grid
	* @since  1.0
	*/
	function main_loop_array(){
		$additional_data = $this->additional_data;
		$this-> before_loop();
		if(is_array($this->the_array) && !empty($this->the_array)){
			foreach($this->the_array as $item){
				echo '<li>';
						include($this->file_url);
				echo '</li>';
			}
		}
		$this->after_loop();
	}
	
	
	
	/**
	* Main Loop: This function run when we use CUSTOM POST TYPE to output the grid
	* @since  1.0
	*/
	function main_loop_typs(){
		$additional_data = $this->additional_data;
		if($this->post_type != NULL){
			$query_args = array();
			$query_args['post_type'] = array( $this->post_type );
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$query_args['paged'] = $paged;
			if($this->post_ids) { $query_args['post__in'] = explode(",", $this->post_ids); } 
			if($this->taxonomy_terms){ $query_args['tax_query'] = array(array('taxonomy' => $this->taxonomy,'field' => 'slug','terms' => $this->taxonomy_terms)); }
			$query_args['posts_per_page'] = $this->post_limit;
			$query = new WP_Query($query_args);
			
			if($query->have_posts()):
				$this-> before_loop();
					while( $query->have_posts() ): $query->the_post();
						echo '<li>';
							include($this->file_url);
						echo '</li>';
					endwhile;
				$this->after_loop();
			else:
				echo 'No Post Found';
			endif;
		}
	}
}

endif;