<?php
if(!class_exists('acoc_field_animate_css_select')):
class acoc_field_animate_css_select{
		
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
		
		echo '<div class="acoc-form-field field-type-select">';
			echo '<label for="'.$option['id'].'">'.$option['label'].'</label><br>';
			echo '<select id="'.$option['id'].'" name="'.$option['id'].'">';
				if(is_array($option['options']) && !empty($option['options'])){
					foreach($option['options'] as $items ){
						echo '<option value="'.$items['value'].'" '.selected( $value, $items['value'], false ).'>'.$items['label'].'</option>';
					}
				}
				?>
                	<option value="">None</option>
                    <optgroup label="Attention Seekers">
                      <option value="bounce">bounce</option>
                      <option value="flash">flash</option>
                      <option value="pulse">pulse</option>
                      <option value="rubberBand">rubberBand</option>
                      <option value="shake">shake</option>
                      <option value="swing">swing</option>
                      <option value="tada">tada</option>
                      <option value="wobble">wobble</option>
                    </optgroup>
            
                    <optgroup label="Bouncing Entrances">
                      <option value="bounceIn">bounceIn</option>
                      <option value="bounceInDown">bounceInDown</option>
                      <option value="bounceInLeft">bounceInLeft</option>
                      <option value="bounceInRight">bounceInRight</option>
                      <option value="bounceInUp">bounceInUp</option>
                    </optgroup>
            
                    <optgroup label="Fading Entrances">
                      <option value="fadeIn">fadeIn</option>
                      <option value="fadeInDown">fadeInDown</option>
                      <option value="fadeInDownBig">fadeInDownBig</option>
                      <option value="fadeInLeft">fadeInLeft</option>
                      <option value="fadeInLeftBig">fadeInLeftBig</option>
                      <option value="fadeInRight">fadeInRight</option>
                      <option value="fadeInRightBig">fadeInRightBig</option>
                      <option value="fadeInUp">fadeInUp</option>
                      <option value="fadeInUpBig">fadeInUpBig</option>
                    </optgroup>
            
                    <optgroup label="Flippers">
                      <option value="flip">flip</option>
                      <option value="flipInX">flipInX</option>
                      <option value="flipInY">flipInY</option>
                    </optgroup>
            
                    <optgroup label="Lightspeed">
                      <option value="lightSpeedIn">lightSpeedIn</option>
                    </optgroup>
            
                    <optgroup label="Rotating Entrances">
                      <option value="rotateIn">rotateIn</option>
                      <option value="rotateInDownLeft">rotateInDownLeft</option>
                      <option value="rotateInDownRight">rotateInDownRight</option>
                      <option value="rotateInUpLeft">rotateInUpLeft</option>
                      <option value="rotateInUpRight">rotateInUpRight</option>
                    </optgroup>
            
                    <optgroup label="Specials">
                      <option value="rollIn">rollIn</option>
                    </optgroup>
            
                    <optgroup label="Zoom Entrances">
                      <option value="zoomIn">zoomIn</option>
                      <option value="zoomInDown">zoomInDown</option>
                      <option value="zoomInLeft">zoomInLeft</option>
                      <option value="zoomInRight">zoomInRight</option>
                      <option value="zoomInUp">zoomInUp</option>
                    </optgroup>

                <?php
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