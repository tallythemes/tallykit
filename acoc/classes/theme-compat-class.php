<?php
if(!class_exists('acoc_theme_compat')):

class acoc_theme_compat{
	
	public $options;
		
	function __construct($atts = array()) {
		$this->options = array_merge( array(
			'post_type'			=> NULL,
			'taxonomy'			=> NULL,
			'single_page' 		=> true,
			'archive_page'		=> true,
			'taxonomy_page'		=> true,
			'template_3'		=> 'acoc.php',
			'template_2'		=> 'page.php',
			'template_1'		=> 'index.php',
			
			'single_content'	=> NULL,
			'archive_content'	=> NULL,
			'taxonomy_content'	=> NULL,
			
			'archive_title'		=> NULL,
			'taxonomy_title'	=> NULL,
			
			'content_filter_name'	=> NULL,
		), $atts );
		
		
		add_filter( 'template_include', array($this, 'template_include') );
		add_filter('the_content', array($this, 'the_content'));
		add_action( 'pre_get_posts', array($this, 'pre_get_posts') );
		add_action('loop_start', array($this, 'condition_filter_title'));
		
		
		/* Add "the_content" filters to "content_filter_name"
		----------------------------------------------*/
		if($this->options['content_filter_name'] !== NULL){
			add_filter($this->options['content_filter_name'], 'capital_P_dangit' , 11);
			add_filter($this->options['content_filter_name'], 'do_shortcode', 11);
			add_filter($this->options['content_filter_name'], 'wptexturize', 10);
			add_filter($this->options['content_filter_name'], 'convert_smilies', 10);
			add_filter($this->options['content_filter_name'], 'convert_chars', 10);
			add_filter($this->options['content_filter_name'], 'wpautop', 10);
			add_filter($this->options['content_filter_name'], 'shortcode_unautop', 10);
			add_filter($this->options['content_filter_name'], 'prepend_attachment', 10);
		}
	}
	
	
	
	function template_include( $template ){
		$find = array();
		$file = '';
		$options = $this->options;
		
		if(is_single() && get_post_type() == $options['post_type'] ) {
			if($options['single_page'] == true){
				$file   = 'single-'.$options['post_type'].'.php';
				$find[] = $file;
			}
		}elseif(is_post_type_archive( $options['post_type'])) {
			if($options['archive_page'] == true){
				$file 	= 'archive-'.$options['post_type'].'.php';
				$find[] = $file;
			}
		}elseif(is_tax($options['taxonomy'])) {
			if($options['taxonomy_page'] == true){
				$file   = 'taxonomy-'.$options['taxonomy'].'.php';
				$find[] = $file;
			}
		}
		
		$find[] = $options['template_3'];
		$find[] = $options['template_2'];
		$find[] = $options['template_1'];
		
		if($file){ $template = locate_template( $find ); }
	
		return $template;
	}
	
	
	
	function the_content($content){
		global $post, $wpdb, $wp_query;
		if( empty($post) ) return $content; //fix for any other plugins calling the_content outside the loop
		$options = $this->options;
		
		if(is_single() && get_post_type() == $options['post_type']  ) {
			if($options['single_page'] == true){
				$content =  $options['single_content']();
			}
		}elseif(is_post_type_archive( $options['post_type'] )) {
			if($options['archive_page'] == true){
				$content =  $options['archive_content']();
			}
		}elseif(is_tax($options['taxonomy'])) {
			if($options['taxonomy_page'] == true){
				$content =  $options['taxonomy_content']();
			}
		}	
		
		return $content;
	}
	
	
	
	function pre_get_posts( $query ) {
		
		$options = $this->options;
		
		if( $query->is_main_query() && !is_admin() && is_post_type_archive( $options['post_type'] ) ) {
			if($options['archive_page'] == true){
				$query->set( 'posts_per_page', '1' );
			}
		}elseif($query->is_main_query() && !is_admin() && is_tax( $options['taxonomy'] )){
			if($options['taxonomy_page'] == true){
				$query->set( 'posts_per_page', '1' );
			}
		}
	}
	
	
	
	/*	Change "the_title" filter to change the  title of archive and Tax pages
	----------------------------------------------*/
	function the_title_filter( $title ) {
		$options = $this->options;
		
		if(is_post_type_archive( $options['post_type'])) {
			$title = $options['archive_title'];
		}elseif(is_tax($options['taxonomy_page'])) {
			global $wp_query;
			$term =	$wp_query->queried_object;
			$title = $options['taxonomy_title'].$term->name;
		}
		return $title;
	}
	
	function condition_filter_title($array){
		global $wp_query;
		if($array === $wp_query){
			add_filter( 'the_title', array($this, 'the_title_filter') );
		}else{
			remove_filter( 'the_title', array($this, 'the_title_filter') );
		}
	}
	
} // End of the CLASS

endif;