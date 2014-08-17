<?php
if(!class_exists('acoc_theme_compat2')):

class acoc_theme_compat2{
	
	public $singles;
	public $archives;
	public $taxonomies;
		
	function __construct(){
				
		add_filter( 'template_include', array($this, '_singles') );
		add_filter( 'template_include', array($this, '_archives') );
		add_filter( 'template_include', array($this, '_taxonomies') );
		
		add_filter('the_content', array($this, '_singles_content'));
		add_filter('the_content', array($this, '_archives_content'));
		add_filter('the_content', array($this, '_taxonomies_content'));
		
		add_action( 'pre_get_posts', array($this, '_archives_loop_limit') );
		add_action( 'pre_get_posts', array($this, '_taxonomies_loop_limit') );
		
		
		$this->_singles_content_filter();
	}
	
	
	function _singles($template){
		if(is_array($this->singles)){
			$find = array();
			$file = '';
		
			foreach($this->singles as $singles){
				if(is_single() && get_post_type() == $singles['post_type']){
					$file   = 'single-'.$singles['post_type'].'.php';
					$find[] = $file;
					
					$find[] = $singles['template_3'];
					$find[] = $singles['template_2'];
					$find[] = $singles['template_1'];
					
					if($file){ $template = locate_template( $find ); }
				}
			}
		}
		
		return $template;
	}
	
	function _archives($template){
		if(is_array($this->archives)){
			$find = array();
			$file = '';
		
			foreach($this->archives as $archives){
				if(is_post_type_archive( $archives['post_type'])){
					$file   = 'archive-'.$archives['post_type'].'.php';
					$find[] = $file;
					
					$find[] = $archives['template_3'];
					$find[] = $archives['template_2'];
					$find[] = $archives['template_1'];
					
					if($file){ $template = locate_template( $find ); }
				}
			}
		}
		
		return $template;
	}
	
	function _taxonomies($template){
		if(is_array($this->taxonomies)){
			$find = array();
			$file = '';
		
			foreach($this->taxonomies as $taxonomies){
				if(is_tax( $taxonomies['taxonomy'])){
					$file   = 'taxonomy-'.$taxonomies['taxonomy'].'.php';
					$find[] = $file;
					
					$find[] = $taxonomies['template_3'];
					$find[] = $taxonomies['template_2'];
					$find[] = $taxonomies['template_1'];
					
					if($file){ $template = locate_template( $find ); }
				}
			}
		}
		
		return $template;
	}
	
	function _singles_content($content){
		global $post, $wpdb, $wp_query;
		if( empty($post) ) return $content; //fix for any other plugins calling the_content outside the loop
		
		if(is_array($this->singles)){
			foreach($this->singles as $singles){
				if(is_single() && get_post_type() == $singles['post_type']){
					$content =  $singles['content']();
				}
			}
		}
		
		return $content;
	}
	
	
	function _archives_content($content){
		global $post, $wpdb, $wp_query;
		if( empty($post) ) return $content; //fix for any other plugins calling the_content outside the loop
		
		if(is_array($this->archives)){
			foreach($this->archives as $archives){
				if(is_post_type_archive( $archives['post_type'] )){
					$content =  $archives['content']();
				}
			}
		}
		
		return $content;
	}
	
	
	function _taxonomies_content($content){
		global $post, $wpdb, $wp_query;
		if( empty($post) ) return $content; //fix for any other plugins calling the_content outside the loop
		
		if(is_array($this->taxonomies)){
			foreach($this->taxonomies as $taxonomies){
				if(is_tax($taxonomies['taxonomy'])){
					$content =  $taxonomies['content']();
				}
			}
		}
		
		return $content;
	}
	
	
	function _archives_loop_limit($query){
		if(is_array($this->archives)){
			foreach($this->archives as $archives){
				if( $query->is_main_query() && !is_admin() && is_post_type_archive( $archives['post_type'] ) ) {
					$query->set( 'posts_per_page', '1' );
				}
			}
		}
	}
	
	
	function _taxonomies_loop_limit($query){
		if(is_array($this->taxonomies)){
			foreach($this->taxonomies as $taxonomies){
				if($query->is_main_query() && !is_admin() && is_tax( $taxonomies['taxonomy'] )) {
					$query->set( 'posts_per_page', '1' );
				}
			}
		}
	}
	
	
	function _singles_content_filter(){		
		if(is_array($this->singles)){
			foreach($this->singles as $singles){
				if(is_single() && get_post_type() == $singles['post_type']){
					if($singles['filter'] !== NULL){
						add_filter($singles['filter'], 'capital_P_dangit' , 11);
						add_filter($singles['filter'], 'do_shortcode', 11);
						add_filter($singles['filter'], 'wptexturize', 10);
						add_filter($singles['filter'], 'convert_smilies', 10);
						add_filter($singles['filter'], 'convert_chars', 10);
						add_filter($singles['filter'], 'wpautop', 10);
						add_filter($singles['filter'], 'shortcode_unautop', 10);
						add_filter($singles['filter'], 'prepend_attachment', 10);
					}
				}
			}
		}
	}	

	
	function add_single($args){
		$def = array(
			'post_type'		=> '', 
			'filter'		=> '',
			'template_3'	=> 'acoc.php',
			'template_2'	=> 'page.php',
			'template_1'	=> 'index.php',
			'content'		=> '',
		);
		$this->singles[] = array_merge($def,$args);
	}
	
	
	function add_archive($args){
		$def = array(
			'post_type'		=> '', 
			'title'	  		=> '', 
			'template_3'	=> 'acoc.php',
			'template_2'	=> 'page.php',
			'template_1'	=> 'index.php',
			'content'		=> '',
		);
		$this->archives[] = array_merge($def,$args);
	}
	
	
	function add_taxonomy($args){
		$def = array(
			'taxonomy'		=> '', 
			'template_3'	=> 'acoc.php',
			'template_2'	=> 'page.php',
			'template_1'	=> 'index.php',
			'content'		=> '',
		);
		$this->taxonomies[] = array_merge($def,$args);
	}
	
} // End of the CLASS

endif;