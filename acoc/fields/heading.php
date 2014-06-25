<?php
if(!class_exists('acoc_field_heading')):
class acoc_field_heading{
	
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
		
		echo '<div class="acoc-form-field field-type-heading">';
			if($option['label'] !== ''){ echo '<p class="field-heading">'.$option['label'].'</p>'; }
			if($option['des'] !== ''){ echo '<p>'.$option['des'].'</p>'; }
			echo '<hr />';
		echo '</div>';
	}
	
	
	function save($field_id){
		
	}
}
endif;