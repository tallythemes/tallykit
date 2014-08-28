<?php
if(!class_exists('acoc_field_color')):
class acoc_field_color{
		
	public $atts;
	public $value;
	
	function __construct($atts = array(), $value = NULL){
		add_action( 'admin_enqueue_scripts', array($this, 'script') );
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
		
		?>
        <script type="text/javascript">
			jQuery(document).ready(function($){
				$('.acoc-color-field-<?php echo $option['id']; ?>').wpColorPicker();
			});
		</script>
        <?php
		
		echo '<div class="acoc-form-field field-type-color">';
			echo '<label for="'.$option['id'].'">'.$option['label'].'</label><br>';
			echo '<input type="text" id="'.$option['id'].'" name="'.$option['id'].'" value="'.$value.'" class="acoc-color-field-'.$option['id'].'" /><br />';
			echo '<span class="description">'.$option['des'].'</span>';
		echo '</div>';
	}
	
	
	function save($field_id){
		$new =  $_POST[$field_id];
		return $new;
	}
	
	function script(){
		wp_enqueue_style( 'wp-color-picker' );
	}
}
endif;