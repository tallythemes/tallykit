<?php
if(!class_exists('acoc_field_checkbox')):
class acoc_field_checkbox{
	
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
		$checked = '';
		if( $value == 1 ){ $checked = 'checked="checked"'; }
		
		echo '<div class="acoc-form-field field-type-checkbox">';
			echo '<label for="'.$option['id'].'">'.$option['label'].'</label><br>';
			echo '<input type="checkbox" id="'.$option['id'].'" name="'.$option['id'].'" value="'.$value.'" '.$checked.' />'.$value;
			echo '<span class="description">'.$option['des'].'</span>';
		echo '</div>';
	}
	
	
	function save($field_id){
		$new =  $_POST[$field_id];
		return $new;
	}
}
endif;