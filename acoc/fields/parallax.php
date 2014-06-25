<?php
if(!class_exists('acoc_field_parallax')):
class acoc_field_parallax{
	
	public $atts;
	public $value;
	
	function __construct($atts = array(), $value = NULL){
		$this->atts = $this->field_default_options($atts);
		$this->value = $value;
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
			$('.acoc-parallax-color-field').wpColorPicker();
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
	
	
	function html(){
		global $post;
		
		$option = $this->atts;
		$value = $this->value;
		
		$parallax_items = $value;
		$uid = $option['id'].'_acoc_parallax_'.rand();
		
		echo '<div class="acoc-form-field field-type-parallax">';
		echo '<label for="'.$option['id'].'"><strong>'.$option['label'].'</strong></label><br><br>';
		echo '<span>'.$option['des'].'</span>';
		
		echo '<ul class="acoc-parallax-items-'.$uid.'" id="'.$option['id'].'">';
			if(is_array($parallax_items) && !empty($parallax_items)){
				foreach( $parallax_items as $parallax_item ){
					
					$slider_title = $parallax_item['title'];
					if($slider_title == ''){ $slider_title = 'Section title'; }
					
					echo '<li>';
						echo '<input type="hidden" value="1" name="'.$option['id'].'-hiden[]" id=""/>';
									
						echo '<div class="row-header-'.$uid.'">';
							echo '<a href="#" class="title-row-'.$uid.' edit-row-'.$uid.' row-title"><strong>'.$slider_title.'</strong></a>';
							echo '<a href="#" class="edit-row-'.$uid.' row-edit" ><div class="dashicons dashicons-edit"></div></a>';
							echo '<a href="#" class="remove-row-'.$uid.' row-delete"><div class="dashicons dashicons-no"></div></a>';
						echo '</div>';
				
						echo '<div class="row-content-'.$uid.'">';
							
							echo '<table class="form-table">';
								echo '<tr>';
									echo '<td>';
										echo '<label>Title</label><br >';
										echo '<input id="slider-title-'.$uid.'" type="text" value="'.$slider_title.'" name="'.$option['id'].'-title[]" />';
									echo '</td>';
									echo '<td>';
										echo '<label>Sub Title</label><br >';
										echo '<input id="slider-subtitle-'.$uid.'" type="text" value="'.$parallax_item['subtitle'].'" name="'.$option['id'].'-subtitle[]" />';
									echo '</td>';
									echo '<td>';
										echo '<label>Align</label><br >';
										echo '<select id="slider-align-title-'.$uid.'" type="text" value="'.$parallax_item['align-title'].'" name="'.$option['id'].'-align-title[]">
												<option '.selected($parallax_item['align-title'], 'left', false).' value="left">left</option>
												<option '.selected($parallax_item['align-title'], 'center', false).' value="center">center</option>
												<option '.selected($parallax_item['align-title'], 'right', false).' value="right">right</option>
												<option '.selected($parallax_item['align-title'], 'none', false).' value="none">none</option>
											  </select><br >';
									echo '</td>';
									echo '<td>';
										echo '<label>Disable Titles</label><br >';
										echo '<select id="slider-disable-title-'.$uid.'" type="text" value="'.$parallax_item['disable-title'].'" name="'.$option['id'].'-disable-title[]">
												<option '.selected($parallax_item['disable-title'], 'no', false).' value="no">no</option>
												<option '.selected($parallax_item['disable-title'], 'yes', false).' value="yes">yes</option>
											  </select><br >';
									echo '</td>';
								echo '</tr>';
							echo '</table>';
							
							echo '<hr />';
							
							echo '<table class="form-table">';
								echo '<tr>';
									echo '<td width="150">';
										echo '<label>Padding Top</label><br >';
										echo '<input id="slider-padding-top-'.$uid.'" type="text" value="'.$parallax_item['padding-top'].'" name="'.$option['id'].'-padding-top[]" /><br ><br >';
									echo '</td>';
									echo '<td width="150">';
										echo '<label>Padding bottom</label><br >';
										echo '<input id="slider-padding-bottom-'.$uid.'" type="text" value="'.$parallax_item['padding-bottom'].'" name="'.$option['id'].'-padding-bottom[]" />';
									echo '</td>';
									echo '<td >';
										echo '<label>Border Top</label><br >';
										echo '<select id="slider-border-top-'.$uid.'" type="text" value="'.$parallax_item['border-top'].'" name="'.$option['id'].'-border-top[]">
												<option '.selected($parallax_item['border-top'], '0', false).' value="0">0px</option>
												<option '.selected($parallax_item['border-top'], '1', false).' value="1">1px</option>
												<option '.selected($parallax_item['border-top'], '2', false).' value="2">2px</option>
												<option '.selected($parallax_item['border-top'], '3', false).' value="3">3px</option>
												<option '.selected($parallax_item['border-top'], '4', false).' value="4">4px</option>
												<option '.selected($parallax_item['border-top'], '5', false).' value="5">5px</option>
											  </select><br >';
										echo '<input type="text" value="'.$parallax_item['border-top-color'].'" name="'.$option['id'].'-border-top-color[]" class="acoc-parallax-color-field"/>';
									echo '</td>';
									echo '<td >';
										echo '<label>Border Bottom</label><br >';
										echo '<select id="slider-border-bottom-'.$uid.'" type="text" value="'.$parallax_item['border-bottom'].'" name="'.$option['id'].'-border-bottom[]">
												<option '.selected($parallax_item['border-bottom'], '0', false).' value="0">0px</option>
												<option '.selected($parallax_item['border-bottom'], '1', false).' value="1">1px</option>
												<option '.selected($parallax_item['border-bottom'], '2', false).' value="2">2px</option>
												<option '.selected($parallax_item['border-bottom'], '3', false).' value="3">3px</option>
												<option '.selected($parallax_item['border-bottom'], '4', false).' value="4">4px</option>
												<option '.selected($parallax_item['border-bottom'], '5', false).' value="5">5px</option>
											  </select><br >';
										echo '<input type="text" value="'.$parallax_item['border-bottom-color'].'" name="'.$option['id'].'-border-bottom-color[]" class="acoc-parallax-color-field"/>';
									echo '</td>';
								echo '</tr>';
							echo '</table>';
							
							echo '<hr />';
							
							echo '<table class="form-table">';
								echo '<tr>';
									echo '<td>';
										echo '<label>Background color</label><br >';
										echo '<input id="slider-bg-color-'.$uid.'" type="text" value="'.$parallax_item['background-color'].'" name="'.$option['id'].'-background-color[]" class="acoc-parallax-color-field" /><br ><br >';
										
										echo '<label>Text color</label><br >';
										echo '<input id="slider-text-color-'.$uid.'" type="text" value="'.$parallax_item['text-color'].'" name="'.$option['id'].'-text-color[]" class="acoc-parallax-color-field" /><br ><br >';
										
										echo '<label>Heading color</label><br >';
										echo '<input id="slider-heading-color-'.$uid.'" type="text" value="'.$parallax_item['heading-color'].'" name="'.$option['id'].'-heading-color[]" class="acoc-parallax-color-field" /><br ><br >';
									echo '</td>';
									echo '<td width="200">';
										echo '<label><strong>Background Image</strong></label><br>';
										echo '<input type="text" value="'.$parallax_item['background-image'].'" name="'.$option['id'].'-background-image[]" id="'.$uid.'_field" class="bg-image-field"/><br>';
										echo '<a href="#" class="upload-image-'.$uid.' button button-primary image-upload">Upload Image</a><br>';
										echo '<img src="'.$parallax_item['background-image'].'" class="preview-image" id="'.$uid.'_image"><br>';
									echo '</td>';
									echo '<td >';
										echo '<label>Background Attachment</label><br >';
										echo '<select id="slider-background-attachment-'.$uid.'" type="text" value="'.$parallax_item['background-attachment'].'" name="'.$option['id'].'-background-attachment[]">
												<option '.selected($parallax_item['background-attachment'], 'fixed', false).' value="fixed">fixed</option>
												<option '.selected($parallax_item['background-attachment'], 'scroll', false).' value="scroll">scroll</option>
											  </select><br ><br >';
											  
										echo '<label>Background Repeat</label><br >';
										echo '<select id="slider-background-repeat-'.$uid.'" type="text" value="'.$parallax_item['background-repeat'].'" name="'.$option['id'].'-background-repeat[]">
												<option value="">Background Repeat</option>
												<option '.selected($parallax_item['background-repeat'], 'no-repeat', false).' value="no-repeat">no-repeat</option>
												<option '.selected($parallax_item['background-repeat'], 'repeat', false).' value="repeat">repeat</option>
												<option '.selected($parallax_item['background-repeat'], 'repeat-x', false).' value="repeat-x">repeat-x</option>
												<option '.selected($parallax_item['background-repeat'], 'repeat-y', false).' value="repeat-y">repeat-y</option>
											  </select><br ><br >';
											  
										echo '<label>Background Position</label><br >';
										echo '<select id="slider-background-position-'.$uid.'" type="text" value="'.$parallax_item['background-position'].'" name="'.$option['id'].'-background-position[]">
												<option value="">background-position</option>
												<option '.selected($parallax_item['background-position'], 'left top', false).' value="left top">Left Top</option>
												<option '.selected($parallax_item['background-position'], 'left center', false).' value="left center">Left Center</option>
												<option '.selected($parallax_item['background-position'], 'left bottom', false).' value="left bottom">Left Bottom</option>
												<option '.selected($parallax_item['background-position'], 'center top', false).' value="center top">Center Top</option>
												<option '.selected($parallax_item['background-position'], 'center center', false).' value="center center">Center Center</option>
												<option '.selected($parallax_item['background-position'], 'center bottom', false).' value="center bottom">Center Bottom</option>
												<option '.selected($parallax_item['background-position'], 'right top', false).' value="right top">Right Top</option>
												<option '.selected($parallax_item['background-position'], 'right center', false).' value="right center">Right Center</option>
												<option '.selected($parallax_item['background-position'], 'right bottom', false).' value="right bottom">Right Bottom</option>
											  </select><br ><br >';
									echo '</td>';
								echo '</tr>';
							echo '</table>';
							
							echo '<hr />';
											
							echo '<table class="form-table">';
								echo '<tr>';
									echo '<td>';
										echo '<label>Contact Width</label><br >';
										echo '<input id="slider-content-width-'.$uid.'" type="text" value="'.$parallax_item['content-width'].'" name="'.$option['id'].'-content-width[]" />';
									echo '</td>';
									echo '<td>';
										echo '<label>Section ID</label><br >';
										echo '<input id="slider-section-id-'.$uid.'" type="text" value="'.$parallax_item['section-id'].'" name="'.$option['id'].'-section-id[]" />';
									echo '</td>';
									echo '<td>';
										echo '<label>Content Align</label><br >';
										echo '<select id="slider-align-content-'.$uid.'" type="text" value="'.$parallax_item['align-content'].'" name="'.$option['id'].'-align-content[]">
												<option '.selected($parallax_item['align-content'], 'left', false).' value="left">left</option>
												<option '.selected($parallax_item['align-content'], 'center', false).' value="center">center</option>
												<option '.selected($parallax_item['align-content'], 'right', false).' value="right">right</option>
												<option '.selected($parallax_item['align-content'], 'none', false).' value="none">none</option>
											  </select><br >';
									echo '</td>';
								echo '</tr>';
							echo '</table>';
							
							echo '<hr />';
							
							wp_editor( $parallax_item['content'], uniqid('custom_editor'), array("textarea_name"=> $option['id'].'-content[]', "wpautop"=>true));
						echo '</div>';
									
					echo '</li>';
				}
			}else{
				echo '<li></li>';
			}
		echo '</ul>';
		echo '<a href="#" class="add-row-'.$uid.' button button-primary button-large row-addnew">Add New</a>';
		
		
		/*~~~ empty row for being clone ~~~*/
		echo '<li class="empty-row-'.$uid.'" style="display:none" >';
			echo '<input type="hidden" value="1" name="" id=""/>';
						
			echo '<div class="row-header-'.$uid.'">';
				echo '<a href="#" class="title-row-'.$uid.' edit-row-'.$uid.' row-title"><strong>Slider Title</strong></a>';
				echo '<a href="#" class="edit-row-'.$uid.' row-edit" ><div class="dashicons dashicons-edit"></div></a>';
				echo '<a href="#" class="remove-row-'.$uid.' row-delete"><div class="dashicons dashicons-no"></div></a>';
			echo '</div>';
	
			echo '<div class="row-content-'.$uid.'">';
				
				echo '<table class="form-table">';
					echo '<tr>';
						echo '<td>';
							echo '<label>Title</label><br >';
							echo '<input id="slider-title-'.$uid.'" type="text" value="" name="'.$option['id'].'-title[]" />';
						echo '</td>';
						echo '<td>';
							echo '<label>Sub Title</label><br >';
							echo '<input id="slider-subtitle-'.$uid.'" type="text" value="" name="'.$option['id'].'-subtitle[]" />';
						echo '</td>';
						echo '<td>';
							echo '<label>Title Align</label><br >';
							echo '<select id="slider-align-title-'.$uid.'" type="text" value="" name="'.$option['id'].'-align-title[]">
									<option value="left">left</option>
									<option value="center">center</option>
									<option value="right">right</option>
									<option value="none">none</option>
								  </select><br >';
						echo '</td>';
						echo '<td>';
							echo '<label>Disable Titles</label><br >';
							echo '<select id="slider-disable-title-'.$uid.'" type="text" value="" name="'.$option['id'].'-disable-title[]">
							<option value="no">no</option>
							<option value="yes">yes</option>
							</select><br >';
						echo '</td>';
					echo '</tr>';
				echo '</table>';
				
				echo '<hr />';
				
				echo '<table class="form-table">';
					echo '<tr>';
						echo '<td width="150">';
							echo '<label>Padding Top</label><br >';
							echo '<input id="slider-padding-top-'.$uid.'" type="text" value="80" name="'.$option['id'].'-padding-top[]" /><br ><br >';
						echo '</td>';
						echo '<td width="150">';
							echo '<label>Padding bottom</label><br >';
							echo '<input id="slider-padding-bottom-'.$uid.'" type="text" value="80" name="'.$option['id'].'-padding-bottom[]" />';
						echo '</td>';
						echo '<td >';
							echo '<label>Border Top</label><br >';
							echo '<select id="slider-border-top-'.$uid.'" type="text" value="" name="'.$option['id'].'-border-top[]">
									<option value="0">0px</option>
									<option value="1">1px</option>
									<option value="2">2px</option>
									<option value="3">3px</option>
									<option value="4">4px</option>
									<option value="5">5px</option>
								  </select><br >';
							echo '<input type="text" value="" name="'.$option['id'].'-border-top-color[]" class="acoc-parallax-color-field"/>';
						echo '</td>';
						echo '<td >';
							echo '<label>Border Bottom</label><br >';
							echo '<select id="slider-border-bottom-'.$uid.'" type="text" value="" name="'.$option['id'].'-border-bottom[]">
									<option value="0">0px</option>
									<option value="1">1px</option>
									<option value="2">2px</option>
									<option value="3">3px</option>
									<option value="4">4px</option>
									<option value="5">5px</option>
								  </select><br >';
							echo '<input type="text" value="" name="'.$option['id'].'-border-bottom-color[]" class="acoc-parallax-color-field"/>';
						echo '</td>';
					echo '</tr>';
				echo '</table>';
				
				echo '<hr />';
				
				echo '<table class="form-table">';
					echo '<tr>';
						echo '<td>';
							echo '<label>Background color</label><br >';
							echo '<input id="slider-bg-color-'.$uid.'" type="text" value="" name="'.$option['id'].'-background-color[]" class="acoc-parallax-color-field" /><br ><br >';
							
							echo '<label>Text color</label><br >';
							echo '<input id="slider-text-color-'.$uid.'" type="text" value="" name="'.$option['id'].'-text-color[]" class="acoc-parallax-color-field" /><br ><br >';
							
							echo '<label>Heading color</label><br >';
							echo '<input id="slider-heading-color-'.$uid.'" type="text" value="" name="'.$option['id'].'-heading-color[]" class="acoc-parallax-color-field" /><br ><br >';
						echo '</td>';
						echo '<td width="200">';
							echo '<label><strong>Background Image</strong></label><br>';
							echo '<input type="text" value="" name="'.$option['id'].'-background-image[]" id="'.$uid.'_field" class="bg-image-field"/><br>';
							echo '<a href="#" class="upload-image-'.$uid.' button button-primary image-upload">Upload Image</a><br>';
							echo '<img src="http://placehold.it/350x350&text=BG" class="preview-image" id="'.$uid.'_image"><br>';
						echo '</td>';
						echo '<td >';
							echo '<label>Background Attachment</label><br >';
							echo '<select id="slider-background-attachment-'.$uid.'" type="text" value="" name="'.$option['id'].'-background-attachment[]">
									<option value="fixed">fixed</option>
									<option value="scroll">scroll</option>
								  </select><br ><br >';
								  
							echo '<label>Background Repeat</label><br >';
							echo '<select id="slider-background-repeat-'.$uid.'" type="text" value="" name="'.$option['id'].'-background-repeat[]">
									<option value="">Background Repeat</option>
									<option value="no-repeat">no-repeat</option>
									<option value="repeat">repeat</option>
									<option value="repeat-x">repeat-x</option>
									<option value="repeat-y">repeat-y</option>
								  </select><br ><br >';
								  
							echo '<label>Background Position</label><br >';
							echo '<select id="slider-background-position-'.$uid.'" type="text" value="" name="'.$option['id'].'-background-position[]">
									<option value="">background-position</option>
									<option value="left top">Left Top</option>
									<option value="left center">Left Center</option>
									<option value="left bottom">Left Bottom</option>
									<option value="center top">Center Top</option>
									<option value="center center">Center Center</option>
									<option value="center bottom">Center Bottom</option>
									<option value="right top">Right Top</option>
									<option value="right center">Right Center</option>
									<option value="right bottom">Right Bottom</option>
								  </select><br ><br >';
						echo '</td>';
					echo '</tr>';
				echo '</table>';
				
				echo '<hr />';
								
				echo '<table class="form-table">';
					echo '<tr>';
						echo '<td>';
							echo '<label>Contact Width</label><br >';
							echo '<input id="slider-content-width-'.$uid.'" type="text" value="960px" name="'.$option['id'].'-content-width[]" />';
						echo '</td>';
						echo '<td>';
							echo '<label>Section ID</label><br >';
							echo '<input id="slider-section-id-'.$uid.'" type="text" value="unique-id" name="'.$option['id'].'-section-id[]" />';
						echo '</td>';
						echo '<td>';
							echo '<label>Content Align</label><br >';
							echo '<select id="slider-align-content-'.$uid.'" type="text" value="" name="'.$option['id'].'-align-content[]">
									<option value="left">left</option>
									<option value="center">center</option>
									<option value="right">right</option>
									<option value="none">none</option>
								  </select><br >';
						echo '</td>';
					echo '</tr>';
				echo '</table>';
				
				echo '<hr />';
				
				wp_editor( 'n/a', uniqid('custom_editor'), array("textarea_name"=> $option['id'].'-content[]', "wpautop"=>true));
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
						row.insertAfter( '.acoc-parallax-items-".$uid." li:last' );
						return false;
					});
				
					$( '.remove-row-".$uid."' ).on('click', function() {
						var isGood=confirm('Are you sure, you want to remove this?');
						 if (isGood) {
							$(this).parents('li').remove();
						 }
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
				/*echo " var custom_uploader;
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
					});";*/
				
				/*~~~ Shortable ~~~*/
				echo '$( ".acoc-parallax-items-'.$uid.'" ).sortable({
						  placeholder: "ui-state-highlight"
					  });
					  $( ".acoc-parallax-items-'.$uid.'" ).disableSelection();';
					  
					
			echo '});';
		echo '</script>';
		
		?>
        <script type="text/javascript">
			// Uploading files
			var file_frame_<?php echo $uid ?>;
			jQuery('.upload-image-<?php echo $uid ?>').live('click', function( event ){
				event.preventDefault();
				var the_button = jQuery(this);

				// If the media frame already exists, reopen it.
				if ( file_frame_<?php echo $uid ?> ) { file_frame_<?php echo $uid ?>.open(); return; }

				// Create the media frame.
				file_frame_<?php echo $uid ?> = wp.media.frames.file_frame_<?php echo $uid ?> = wp.media({
					title: jQuery( this ).data( 'uploader_title' ),
					button: {
						text: jQuery( this ).data( 'uploader_button_text' ),
					},
					multiple: false  // Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame_<?php echo $uid ?>.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame_<?php echo $uid ?>.state().get('selection').first().toJSON();
		
					// Do something with attachment.id and/or attachment.url here
					
					//jQuery('img#<?php echo $uid ?>_image').attr('src', attachment.url);
					//jQuery('input#<?php echo $uid ?>_field').val(attachment.url);
					
					jQuery(the_button).next().next().attr('src', attachment.url);
					jQuery(the_button).prev().prev().val(attachment.url);
				});

				// Finally, open the modal
				file_frame_<?php echo $uid; ?>.open();
			});
		</script>
        <?php
		
		echo '</div>';
	}
	
	
	function save($field_id){
		$new = array();
	
		$parallax_hiden =  $_POST[$field_id.'-hiden'];
		$parallax_title =  $_POST[$field_id.'-title'];
		$parallax_subtitle =  $_POST[$field_id.'-subtitle'];
		$parallax_disable_title =  $_POST[$field_id.'-disable-title'];
		$parallax_align_content =  $_POST[$field_id.'-align-content'];
		$parallax_align_title =  $_POST[$field_id.'-align-title'];
		$parallax_padding_top =  $_POST[$field_id.'-padding-top'];
		$parallax_padding_bottom =  $_POST[$field_id.'-padding-bottom'];
		$parallax_border_top =  $_POST[$field_id.'-border-top'];
		$parallax_border_top_color =  $_POST[$field_id.'-border-top-color'];
		$parallax_border_bottom =  $_POST[$field_id.'-border-bottom'];
		$parallax_border_bottom_color =  $_POST[$field_id.'-border-bottom-color'];
		$parallax_bg_color =  $_POST[$field_id.'-background-color'];
		$parallax_text_color =  $_POST[$field_id.'-text-color'];
		$parallax_heading_color =  $_POST[$field_id.'-heading-color'];
		$parallax_background_image =  $_POST[$field_id.'-background-image'];
		$parallax_background_attachment =  $_POST[$field_id.'-background-attachment'];
		$parallax_background_repeat =  $_POST[$field_id.'-background-repeat'];
		$parallax_background_position =  $_POST[$field_id.'-background-position'];
		$parallax_content_width =  $_POST[$field_id.'-content-width'];
		$parallax_section_id =  $_POST[$field_id.'-section-id'];
		$parallax_content =  $_POST[$field_id.'-content'];
							
		$count = count( $parallax_hiden );
							
		for ( $i = 0; $i < $count; $i++ ) {
			$new[$i]['title'] = $parallax_title[$i];
			$new[$i]['subtitle'] = $parallax_subtitle[$i];
			$new[$i]['disable-title'] = $parallax_disable_title[$i];
			$new[$i]['align-content'] = $parallax_align_content[$i];
			$new[$i]['align-title'] = $parallax_align_title[$i];
			$new[$i]['padding-top'] = $parallax_padding_top[$i];
			$new[$i]['padding-bottom'] = $parallax_padding_bottom[$i];
			$new[$i]['border-top'] = $parallax_border_top[$i];
			$new[$i]['border-top-color'] = $parallax_border_top_color[$i];
			$new[$i]['border-bottom'] = $parallax_border_bottom[$i];
			$new[$i]['border-bottom-color'] = $parallax_border_bottom_color[$i];
			$new[$i]['background-color'] = $parallax_bg_color[$i];
			$new[$i]['text-color'] = $parallax_text_color[$i];
			$new[$i]['heading-color'] = $parallax_heading_color[$i];
			$new[$i]['background-image'] = $parallax_background_image[$i];
			$new[$i]['background-attachment'] = $parallax_background_attachment[$i];
			$new[$i]['background-repeat'] = $parallax_background_repeat[$i];
			$new[$i]['background-position'] = $parallax_background_position[$i];
			$new[$i]['content-width'] = $parallax_content_width[$i];
			$new[$i]['section-id'] = $parallax_section_id[$i];
			$new[$i]['content'] = $parallax_content[$i];
		}
		
		return $new;
	}
}
endif;