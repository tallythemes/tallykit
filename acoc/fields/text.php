<?php
if(!class_exists('acoc_field_text')):
class acoc_field_text{
		
	function html($atts, $value){
		global $post;
		$option = array_merge( array(
			'id' => '',
			'class' => '',
			'label' => '',
			'type' => '',
			'std' => '',
			'des' => '',
			'filter' => '', //sanitize_text_field, esc_attr
		), $atts );
		
		if($value == ""){ $value = $option['std']; }
		
		echo '<label for="'.$option['id'].'"><strong>'.$option['label'].'</strong></label>';
		echo '<input type="text" id="'.$option['id'].'" name="'.$option['id'].'" value="'.$value.'" /><br />';
		echo '<span class="description">'.$option['des'].'</span>';
	}
	
	
	function save($field_id){
		$new =  $_POST[$field_id];
		return $new;
	}
}
endif;