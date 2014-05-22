<?php
if(!class_exists('acoc_field_checkbox')):
class acoc_field_checkbox{
		
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
		
		$uid = $option['id'].'_acoc_slideshow_'.rand();
		if($value == ""){ $value = $option['std']; }
		$checked = '';
		if( $value == 1 ){ $checked = 'checked="checked"'; }
		
		echo '<label for="'.$option['id'].'"><strong>'.$option['label'].'</strong></label><br>';
		echo '<input type="checkbox" id="'.$option['id'].'" name="'.$option['id'].'" value="'.$value.'" '.$checked.' />'.$value;
		echo '<span>'.$option['des'].'</span>';
	}
	
	
	function save($field_id){
		$new =  $_POST[$field_id];
		return $new;
	}
}
endif;