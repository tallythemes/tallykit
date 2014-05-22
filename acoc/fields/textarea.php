<?php
if(!class_exists('acoc_field_textarea')):
class acoc_field_textarea{
		
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
			'rows' => '4',
		), $atts );
		
		$uid = $option['id'].'_acoc_slideshow_'.rand();
		
		echo '<label for="'.$option['id'].'"><strong>'.$option['label'].'</strong></label>';
		echo '<textarea id="'.$option['id'].'" name="'.$option['id'].'" rows="'.$option['rows'].'" style="width:100%;">'.$value.'</textarea>';
		echo '<span>'.$option['des'].'</span>';
	}
	
	
	function save($field_id){
		$new =  $_POST[$field_id];
		return $new;
	}
}
endif;