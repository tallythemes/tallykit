<?php
if(!class_exists('acoc_field_taxonomy_select')):
class acoc_field_taxonomy_select{
		
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
		
		$terms = get_terms($option['taxonomy']);
		
		echo '<div class="acoc-form-field field-type-taxonomy_select">';
			echo '<label for="'.$option['id'].'">'.$option['label'].'</label><br>';
			echo '<select id="'.$option['id'].'" name="'.$option['id'].'">';
			
				if ( !empty( $terms ) && !is_wp_error( $terms ) ){
					foreach($terms as $term ){
						echo '<option value="'.$term->term_id.'" '.selected( $value, $term->term_id, false ).'>'.$term->name.'</option>';
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