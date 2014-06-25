<?php
if(!class_exists('acoc_field_post_select')):
class acoc_field_post_select{
		
	public $atts;
	public $value;
	
	function __construct($atts = array(), $value = NULL){
		$this->atts = $this->field_default_options($atts);
		$this->value = $value;
	}
		
	function field_default_options($atts){
		$options = array_merge( array(
			'id' => '',
			'class' => '',
			'label' => '',
			'type' => '',
			'std' => '',
			'des' => '',
			'filter' => '', //sanitize_text_field, esc_attr
			'rows' => '4',
		), $atts );
		
		return $options;
	}
		
	function html(){
		global $post;
		$option = $this->atts;
		$value = $this->value;
		
		if($value == ""){ $value = $option['std']; }
		
		$the_query = new WP_Query( array('post_type' => $option['post_type'], 'posts_per_page' => -1) );
		
		echo '<div class="acoc-form-field field-type-post_select">';
			echo '<label for="'.$option['id'].'">'.$option['label'].'</label><br>';
			echo '<select id="'.$option['id'].'" name="'.$option['id'].'">';
			
				if ( $the_query->have_posts() ){
					while ( $the_query->have_posts() ) { $the_query->the_post();
						echo '<option value="'.get_the_ID().'" '.selected( $value, get_the_ID(), false ).'>'.get_the_title().'</option>';
					}
				}
				
			echo '</select>';
			echo '<br><span class="description">'.$option['des'].'</span>';
		echo '</div>';
	}
	
	
	function save($field_id){
		$new =  $_POST[$field_id];
		return $new;
	}
}
endif;