<?php
if(!class_exists('acoc_field_slideshow')):
class acoc_field_slideshow{
	function __construct(){
		add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
		add_action( 'admin_footer', array($this, 'the_javascript') );
	}
	
	/**
	 * All global Javascript
	 */
	function the_javascript(){
		?>
        <script type="text/javascript">
		jQuery(document).ready(function($){
			$('.acoc-color-field').wpColorPicker();
		});
		</script>
        <?php
	}
	
	
	
	function admin_enqueue_scripts(){
		 wp_enqueue_style( 'wp-color-picker' );
		 wp_enqueue_style( 'jquery-ui-core' );
		 wp_enqueue_style( 'jquery-ui-widget' );
		 wp_enqueue_style( 'jquery-ui-mouse' );
	}
	
	/**
	 * Set the default setttings of all fields
	 */
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
	
	
	function html($atts, $value){
		global $post;
		$option = $this->field_default_options($atts);
		$slideshow_items = $value;
		$uid = $option['id'].'_acoc_slideshow_'.rand();
		
		echo '<label for="'.$option['id'].'"><strong>'.$option['label'].'</strong></label>';
		echo '<span>'.$option['des'].'</span>';
		
		echo '<ul class="acoc-slideshow-items-'.$uid.'" id="'.$option['id'].'">';
			if(is_array($slideshow_items) && !empty($slideshow_items)){
				foreach( $slideshow_items as $slideshow_item ){
					
					$slider_title = $slideshow_item['title'];
					if($slider_title == ''){ $slider_title = 'Slider title'; }
					
					echo '<li style="background: #F8F8F8;border: solid 1px #D8D7D7;padding: 20px;border-radius: 3px; margin-bottom:8px;">';
						echo '<input type="hidden" value="1" name="'.$option['id'].'-hiden[]" id=""/>';
						
						echo '<div class="row-header-'.$uid.'">';
							echo '<a href="#" class="title-row-'.$uid.' edit-row-'.$uid.'" style="font-size:16px; text-decoration:none;"><strong>'.$slider_title.'</strong></a>';
							echo '<a href="#" class="edit-row-'.$uid.'" style="float:right; margin-left:10px; text-decoration:none; color:#33AF02;"><div class="dashicons dashicons-edit"></div></a>';
							echo '<a href="#" class="remove-row-'.$uid.'" style="float:right; text-decoration:none; color:#FD0000;"><div class="dashicons dashicons-no"></div></a>';
						echo '</div>';
						
						echo '<div class="row-content-'.$uid.'">';
							echo '<label><strong>Title</strong></label>';
							echo '<input type="text" value="'.$slider_title.'" name="'.$option['id'].'-title[]" style="width:100%; margin-bottom:20px;" />';
							
							echo '<label><strong>Image</strong></label><br>';
							echo '<input type="text" value="'.$slideshow_item['image'].'" name="'.$option['id'].'-image[]" style="width:80%; margin-bottom:8px; flot:left;" />';
							echo '<a href="#" class="upload-image-'.$uid.' button button-primary" style="float:right;" title="Upload an Image">Upload Image</a>';
							echo '<img src="'.$slideshow_item['image'].'" style="max-width:50%;  margin-bottom:20px; clear:both; flot:left;"><br>';
							
							echo '<label><strong>Video Embaded Code</strong></label>';
							echo '<textarea name="'.$option['id'].'-video[]" style="width:100%; margin-bottom:20px;" rows="3">'.$slideshow_item['video'].'</textarea>';
							
							echo '<label><strong>Description</strong></label>';
							echo '<textarea name="'.$option['id'].'-text[]" style="width:100%; margin-bottom:20px;" rows="5">'.$slideshow_item['text'].'</textarea>';
							
							echo '<label><strong>Button Text</strong></label>';
							echo '<input type="text" value="'.$slideshow_item['buttontext'].'" name="'.$option['id'].'-buttontext[]" style="width:100%; margin-bottom:20px;" />';
							
							echo '<label><strong>Button Link</strong></label>';
							echo '<input type="text" value="'.$slideshow_item['buttonlink'].'" name="'.$option['id'].'-buttonlink[]" style="width:100%; margin-bottom:20px;" />';
							
							echo '<label style="margin-bottom:20px;"><strong>Background Color</strong></label><br>';
							echo '<input type="text" value="'.$slideshow_item['bgcolor'].'" name="'.$option['id'].'-bgcolor[]" class="acoc-color-field" style="width:100%; margin-bottom:20px;" />';
						echo '</div>';
						
					echo '</li>';
				}
			}else{
				echo '<li></li>';
			}
		echo '</ul>';
		echo '<a href="#" class="add-row-'.$uid.' button button-primary button-large">Add New</a>';
		
		
		/*~~~ empty row for being clone ~~~*/
		echo '<li class="empty-row-'.$uid.'" style="background: #F8F8F8;border: solid 1px #D8D7D7;padding: 20px;border-radius: 3px; margin-bottom:8px; display:none;">';
			echo '<input type="hidden" value="1" name="" id=""/>';
						
			echo '<div class="row-header-'.$uid.'">';
				echo '<a href="#" class="title-row-'.$uid.' edit-row-'.$uid.'" style="font-size:16px; text-decoration:none;"><strong>Slider Title</strong></a>';
				echo '<a href="#" class="edit-row-'.$uid.'" style="float:right; margin-left:10px; text-decoration:none; color:#33AF02;"><div class="dashicons dashicons-edit"></div></a>';
				echo '<a href="#" class="remove-row-'.$uid.'" style="float:right; text-decoration:none; color:#FD0000;"><div class="dashicons dashicons-no"></div></a>';
			echo '</div>';
	
			echo '<div class="row-content-'.$uid.'">';
				echo '<label><strong>Title</strong></label>';
				echo '<input id="slider-title-'.$uid.'" type="text" value="" name="'.$option['id'].'-title[]" style="width:100%; margin-bottom:20px;" />';
							
				echo '<label><strong>Image</strong></label><br>';
				echo '<input type="text" value="" name="'.$option['id'].'-image[]" style="width:80%; margin-bottom:8px; flot:left;" />';
				echo '<a href="#" class="upload-image-'.$uid.' button button-primary" style="float:right; ">Upload Image</a>';
				echo '<img src="http://placehold.it/350x150" style="max-width:50%;  margin-bottom:20px; clear:both; flot:left;"><br>';
							
				echo '<label><strong>Video Embaded Code</strong></label>';
				echo '<textarea name="'.$option['id'].'-video[]" style="width:100%; margin-bottom:20px;" rows="3"></textarea>';
				
				echo '<label><strong>Description</strong></label>';
				echo '<textarea name="'.$option['id'].'-text[]" style="width:100%; margin-bottom:20px;" rows="5"></textarea>';
							
				echo '<label><strong>Button Text</strong></label>';
				echo '<input type="text" value="" name="'.$option['id'].'-buttontext[]" style="width:100%; margin-bottom:20px;" />';
							
				echo '<label><strong>Button Link</strong></label>';
				echo '<input type="text" value="" name="'.$option['id'].'-buttonlink[]" style="width:100%; margin-bottom:20px;" />';
							
				echo '<label style="margin-bottom:20px;"><strong>Background Color</strong></label><br>';
				echo '<input type="text" value="" name="'.$option['id'].'-bgcolor[]" class="acoc-color-field" style="width:100%; margin-bottom:20px;" />';
			echo '</div>';
						
		echo '</li>';
		
		
		/*~~~ Javascript for the cloning ~~~*/
		echo '<script type="text/javascript">';
			echo 'jQuery(document).ready(function( $ ){';
				echo "$( '.add-row-".$uid."' ).on('click', function() {
						var row = $( '.empty-row-".$uid."' ).clone(true);
						row.css( 'display', 'block' );
						row.removeClass( 'empty-row-".$uid."' );
						row.find( 'input[type=\"hidden\"]' ).attr('name', '".$option['id']."-hiden[]');
						row.insertAfter( '.acoc-slideshow-items-".$uid." li:last' );
						return false;
					});
				
					$( '.remove-row-".$uid."' ).on('click', function() {
						$(this).parents('li').remove();
						return false;
					});";
				
				/*~~~ Javascript for the Accordin ~~~*/
				echo "(function($) {
					  var allPanels = $('.row-content-".$uid."').hide();
					  $('.edit-row-".$uid."').click(function() {
						  allPanels.slideUp();
						  if($(this).parent().next().is(':visible')){
							  $(this).parent().next().slideUp();
						  }
						  if(!$(this).parent().next().is(':visible')){
							  $(this).parent().next().slideDown();
						  }
						
						return false;
					  });
					})(jQuery);";
					
				/*~~~ Image Upload ~~~*/
				echo " var custom_uploader;
					$('.upload-image-".$uid."').click(function(e) {
						e.preventDefault();
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						wp.media.editor.send.attachment = function(props, attachment) {
							$(button).next().attr('src', attachment.url);
							$(button).prev().val(attachment.url);
							wp.media.editor.send.attachment = send_attachment_bkp;
						}
						wp.media.editor.open(button);
						return false;  
					});";
				
				/*~~~ Shortable ~~~*/
				echo '$( ".acoc-slideshow-items-'.$uid.'" ).sortable({
						  placeholder: "ui-state-highlight"
					  });
					  $( ".acoc-slideshow-items-'.$uid.'" ).disableSelection();';
					  
					
			echo '});';
		echo '</script>';
	}
	
	
	function save($field_id){
		$new = array();
	
		$slideshow_hiden =  $_POST[$field_id.'-hiden'];
		$slideshow_title =  $_POST[$field_id.'-title'];
		$slideshow_image =  $_POST[$field_id.'-image'];
		$slideshow_video =  $_POST[$field_id.'-video'];
		$slideshow_text =  $_POST[$field_id.'-text'];
		$slideshow_buttontext =  $_POST[$field_id.'-buttontext'];
		$slideshow_buttonlink =  $_POST[$field_id.'-buttonlink'];
		$slideshow_bgcolor =  $_POST[$field_id.'-bgcolor'];
					
		$count = count( $slideshow_hiden );
					
		for ( $i = 0; $i < $count; $i++ ) {
			$new[$i]['title'] = $slideshow_title[$i];
			$new[$i]['image'] = $slideshow_image[$i];
			$new[$i]['video'] = $slideshow_video[$i];
			$new[$i]['text'] = $slideshow_text[$i];
			$new[$i]['buttontext'] = $slideshow_buttontext[$i];
			$new[$i]['buttonlink'] = $slideshow_buttonlink[$i];
			$new[$i]['bgcolor'] = $slideshow_bgcolor[$i];
		}
		
		return $new;
	}
}
endif;