<?php
if(!class_exists('acoc_isotope2_html')):

class acoc_isotope2_html{
	public $display;
	public $uid;
	public $column;
	public $column_width;
	public $margin;
	public $content_width;
	
	function __construct($data){
		$default = array(			
			'display' => true,
			'column' => 3,
			'margin' => 30,
			'content_width' => 960,
		);
		$data = array_merge($default, $data);
		
		$this->display = $data['display'];
		$this->uid = 'acoc-isotope-uid-'.rand();
		$this->column = $data['column'];
		$this->margin = $data['margin'];
		$this->content_width = $data['content_width'];
	}
	
	
	function start(){
		$content_width = $this->content_width;
		$output = '';
		$width = $content_width + $this->margin;
		$column_width = ($content_width - ( $this->margin * $this->column )) / $this->column;
		$this->column_width = $column_width;
		$css_style = 'width: '.$width.'px; margin-left:-'.$this->margin.'px;';
		
		$output .= '<div id="'.$this->uid.'" style="'.$css_style.'" class="acoc_isotope_html">';
		if($this->display == false){ return $output; }else{  echo $output; }
	}
	
		function filter($taxonomy){
			$output = '';
			
			$terms = get_terms($taxonomy);
			$count = count($terms);
			 
			$the_array = array();
			 
			if ( $count > 0 ){
				$output .= '<ul id="'.$this->uid.'-filter" class="isotope-acoc-filter">';
				$output .= '<li class="filter" data-filter="*">'.__('All', 'zoohub_taxdomain').'</li>';
				foreach ( $terms as $term ) {
					$output .= '<li class="filter" data-filter=".'.$term->slug.'">'.$term->name.'</li>';
				}
				$output .= "</ul>";
			}
			
			if($this->display == false){ return $output; }else{  echo $output; }
		}
		
		
		function post_tax_class($post_id, $taxonomy){
			$terms = get_the_terms( $post_id, $taxonomy );
								
			if ( $terms && ! is_wp_error( $terms ) ) : 
				$draught_links = array();
				foreach ( $terms as $term ) {
					$draught_links[] = $term->slug;
				}					
				$on_draught = join( " ", $draught_links );
				return $on_draught;
			endif; 
		}
	
	
		function in_loop_start($class = NULL){
			$css_style = 'width: '.$this->column_width.'px; margin-bottom:'.$this->margin.'px; margin-left:'.$this->margin.'px;';
			$output = '<div class="'.$this->uid.'-item '.$class.' isotope-wp-child-item"  style="'.$css_style.'">';
			if($this->display == false){ return $output; }else{  echo $output; }
		}
	
	
		function in_loop_end(){
			$output = '';
			$output .= '</div>';
			if($this->display == false){ return $output; }else{  echo $output; }
		}
	
	
	function end(){
		$output = "</div>\n";		
		ob_start();
		?>
        <script type="text/javascript">
			jQuery(document).ready(function($){
				var $isotop_acoc_container = $('#<?php echo $this->uid; ?>').imagesLoaded( function() {
					$isotop_acoc_container.isotope({
						itemSelector: '.<?php echo $this->uid; ?>-item',
						masonry:{},
					});
				});
				$('#<?php echo $this->uid; ?>-filter').on( 'click', 'li', function() {
					$('#<?php echo $this->uid; ?>-filter li').removeClass('active');
					var filterValue = $(this).attr('data-filter');
					$isotop_acoc_container.isotope({ filter: filterValue });
					$(this).addClass('active');
				});
			});
		</script>
        <?php
		$output .= ob_get_contents();
		ob_end_clean();
		
		if($this->display == false){ return $output; }else{  echo $output; }
	}
	
	
}

endif;