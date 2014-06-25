<?php
if(!class_exists('acoc_field_image_upload')):
class acoc_field_image_upload{
	
	public $atts;
	public $value;
	
	function __construct($atts = array(), $value = NULL){
		$this->atts = $this->field_default_options($atts);
		$this->value = $value;
		
		if( $this->atts['html_id'] == '' ){ $this->atts['html_id'] = $this->atts['id']; }
		
		add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
	}
		
	function field_default_options($atts){
		$options = array_merge( array(
			'id' => '',
			'html_id' => '',
			'class' => '',
			'label' => '',
			'type' => '',
			'std' => '',
			'des' => '',
			'filter' => '', //sanitize_text_field, esc_attr
			'rows' => '4',
			'size' => '300x300',
		), $atts );
		
		return $options;
	}
		
	function html(){
		global $post;
		$option = $this->atts;
		$value = $this->value;
		$form_name = $option['id'];
		$option['id'] = str_replace('[]','',$option['id']);
		
		if($value == ""){ $value = $option['std']; }
		$image_url = ( $value == "" ) ? 'http://placehold.it/'.$option['size'] : $value;
		
		echo '<div class="acoc-form-field field-type-image_upload">';
			echo '<label for="'.$option['id'].'">'.$option['label'].'</label><br>';
			echo '<input type="text" id="'.$option['id'].'_field" name="'.$form_name.'" value="'.$value.'" />';
			echo '<a href="#" id="'.$option['html_id'].'_button" class="button button-primary">Upload Image</a><br>';
			echo '<img src="'.$image_url.'" id="'.$option['id'].'_image" /><br>';
			echo '<span class="description">'.$option['des'].'</span>';
		echo '</div>';		
		?>
        <script type="text/javascript">
			// Uploading files
			var file_frame_<?php echo $option['html_id'] ?>;
			jQuery('#<?php echo $option['html_id'] ?>_button').live('click', function( event ){
				event.preventDefault();
				var the_button = jQuery(this);
				// If the media frame already exists, reopen it.
				if ( file_frame_<?php echo $option['html_id'] ?> ) { file_frame_<?php echo $option['html_id'] ?>.open(); return; }

				// Create the media frame.
				file_frame_<?php echo $option['html_id'] ?> = wp.media.frames.file_frame_<?php echo $option['html_id'] ?> = wp.media({
					title: jQuery( this ).data( 'uploader_title' ),
					button: {
						text: jQuery( this ).data( 'uploader_button_text' ),
					},
					multiple: false  // Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame_<?php echo $option['html_id'] ?>.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame_<?php echo $option['html_id'] ?>.state().get('selection').first().toJSON();
		
					// Do something with attachment.id and/or attachment.url here
					//jQuery('img#<?php echo $option['id'] ?>_image').attr('src', attachment.url);
					//jQuery('input#<?php echo $option['id'] ?>_field').val(attachment.url);
					
					jQuery(the_button).next().next().attr('src', attachment.url);
					jQuery(the_button).prev().val(attachment.url);
				});

				// Finally, open the modal
				file_frame_<?php echo $option['html_id'] ?>.open();
			});
		</script>
        <?php
	}
	
	
	function save($field_id){
		$new =  $_POST[$field_id];
		return $new;
	}
	
	function admin_enqueue_scripts(){
		 if(function_exists( 'wp_enqueue_media' )){
			wp_enqueue_media();
		}else{
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
	}
}
endif;