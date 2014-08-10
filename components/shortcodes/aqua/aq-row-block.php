<?php

//aq_unregister_block('AQ_Column_Block');
aq_register_block('AQ_Row_Block');
/** A simple text block **/
class AQ_Row_Block extends AQ_Block {
	
	/* PHP5 constructor */
	function __construct() {
		
		$block_options = array(
			'name' => __('Row', 'aqpb-l10n'),
			'size' => 'span12',
			'bg_image' => '',
			'bg_color' => '',
			'bg_size' => '',
			'bg_attachment' => '',
			'bg_repeat' => '',
			'bg_position' => '',
			'bg_video' => '',
			'color_mood' => '',
			'top_padding' => '',
			'bottom_padding' => '',
			'top_border' => '',
			'bottom_border' => '',
			'section_id' => '',
			'section_class' => '',
		);
		
		//create the widget
		parent::__construct('aq_row_block', $block_options);
		
	}



	//form header
	function before_form($instance) {
		extract($instance);
		
		$title = $title ? '<span class="in-block-title"> : '.$title.'</span>' : '';
		$resizable = $resizable ? '' : 'not-resizable';
		
		echo '<li id="template-block-'.$number.'" class="block block-container block-aq_column_block '. $size .' '.$resizable.'">',
				'<dl class="block-bar">',
					'<dt class="block-handle">',
						'<div class="block-title">',
							$name , $title, 
						'</div>',
						'<span class="block-controls">',
							'<a class="block-edit" id="edit-'.$number.'" title="Edit Block" href="#block-settings-'.$number.'">Edit Block</a>',
						'</span>',
					'</dt>',
				'</dl>',
				'<div class="block-settings cf" id="block-settings-'.$number.'">';
	}

	function form($instance) {
		echo '<p class="empty-column">',
		__('Drag block items into this Row box', 'aqpb-l10n'),
		'</p>';
		echo '<ul class="blocks column-blocks cf"></ul>';
	}
	
	function form_callback($instance = array()) {
		$instance = is_array($instance) ? wp_parse_args($instance, $this->block_options) : $this->block_options;
		
		//insert the dynamic block_id & block_saving_id into the array
		$this->block_id = 'aq_block_' . $instance['number'];
		$instance['block_saving_id'] = 'aq_blocks[aq_block_'. $instance['number'] .']';

		extract($instance);
		
		$col_order = $order;
		
		//column block header
		if(isset($template_id)) {
			echo '<li id="template-block-'.$number.'" class="block block-container block-aq_column_block '.$size.'">',
					'<div class="block-settings-column cf" id="block-settings-'.$number.'">',
						'<p class="empty-column">',
							__('Drag block items into this Row box', 'aqpb-l10n'),
						'</p>',
						'<ul class="blocks column-blocks cf">';
					
			//check if column has blocks inside it
			$blocks = aq_get_blocks($template_id);
			
			//outputs the blocks
			if($blocks) {
				foreach($blocks as $key => $child) {
					global $aq_registered_blocks;
					extract($child);
					
					//get the block object
					$block = $aq_registered_blocks[$id_base];
					
					if($parent == $col_order) {
						$block->form_callback($child);
					}
				}
			} 
			echo 		'</ul>';
			
		} else {
			$this->before_form($instance);
			$this->form($instance);
		}
				
		//form footer
		$this->after_form($instance);
	}
	
	//form footer
	function after_form($instance) {
		extract($instance);
		
		$block_saving_id = 'aq_blocks[aq_block_'.$number.']';
			
			echo '<div class="block-control-actions cf"><a href="#" class="delete" title="Delete this Row"><div class="dashicons dashicons-trash"></div></a></div>';
			echo '<input type="hidden" class="id_base" name="'.$this->get_field_name('id_base').'" value="'.$id_base.'" />';
			echo '<input type="hidden" class="name" name="'.$this->get_field_name('name').'" value="'.$name.'" />';
			echo '<input type="hidden" class="order" name="'.$this->get_field_name('order').'" value="'.$order.'" />';
			echo '<input type="hidden" class="size" name="'.$this->get_field_name('size').'" value="'.$size.'" />';
			echo '<input type="hidden" class="parent" name="'.$this->get_field_name('parent').'" value="'.$parent.'" />';
			echo '<input type="hidden" class="number" name="'.$this->get_field_name('number').'" value="'.$number.'" />';
			
			add_thickbox();
			echo '<a href="#TB_inline?width=600&height=550&inlineId='.$this->get_field_id('id_base').'" class="thickbox row-edit"><div class="dashicons dashicons-welcome-write-blog"></div></a>	';
			echo '<div class="" id="'.$this->get_field_id('id_base').'" style="display:none;">';
				echo '<label for="'.$this->get_field_name('bg_image').'">Background Image</label><br />';
				echo '<input type="text" id="'.$this->get_field_id('bg_image').'" class="input-full input-upload" value="'.$bg_image.'" name="'.$this->get_field_name('bg_image').'">';
				echo '<a href="#" class="aq_upload_button button" rel="image">Upload</a><br />';
				echo '<img src="'.($bg_image == '' ? 'http://placehold.it/300x100' : $bg_image).'" width="300">';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('bg_color').'">Background Color</label><br />';
				echo '<div class="aqpb-color-picker">';
					echo '<input type="text" id="'.$this->get_field_id('bg_color').'" class="input-color-picker" value="'.$bg_color.'" name="'.$this->get_field_name('bg_color').'">';
				echo '</div>';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('bg_size').'">Background Size</label><br />';
				echo '<input type="text" id="'.$this->get_field_id('bg_size').'" class="" value="'.$bg_size.'" name="'.$this->get_field_name('bg_size').'">';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('bg_attachment').'">Background Attachment</label><br />';
				echo '<select id="'.$this->get_field_id('bg_attachment').'" name="'.$this->get_field_name('bg_attachment').'">';
					echo '<option value="">background-attachment</option>';
					echo '<option value="scroll" '.selected( $bg_attachment, 'scroll', false ).'>scroll</option>';
					echo '<option value="fixed" '.selected( $bg_attachment, 'fixed', false ).'>fixed</option>';
					echo '<option value="inherit" '.selected( $bg_attachment, 'inherit', false ).'>Inherit</option>';
				echo '</select>';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('bg_repeat').'">Background Repeat</label><br />';
				echo '<select id="'.$this->get_field_id('bg_repeat').'" name="'.$this->get_field_name('bg_repeat').'">';
					echo '<option value="">background-repeat</option>';
					echo '<option value="no-repeat" '.selected( $bg_repeat, 'no-repeat', false ).'>No Repeat</option>';
					echo '<option value="repeat" '.selected( $bg_repeat, 'repeat', false ).'>Repeat All</option>';
					echo '<option value="repeat-x" '.selected( $bg_repeat, 'repeat-x', false ).'>Repeat Horizontally</option>';
					echo '<option value="repeat-y" '.selected( $bg_repeat, 'repeat-y', false ).'>Repeat Vertically</option>';
					echo '<option value="inherit" '.selected( $bg_repeat, 'inherit', false ).'>Inherit</option>';
				echo '</select>';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('bg_position').'">Background Position</label><br />';
				echo '<select id="'.$this->get_field_id('bg_position').'" name="'.$this->get_field_name('bg_position').'">';
					echo '<option value="">background-position</option>';
					echo '<option value="left top" '.selected( $bg_position, 'left top', false ).'>Left Top</option>';
					echo '<option value="left center" '.selected( $bg_position, 'left center', false ).'>Left Center</option>';
					echo '<option value="left bottom" '.selected( $bg_position, 'left bottom', false ).'>Left Bottom</option>';
					echo '<option value="center top" '.selected( $bg_position, 'center top', false ).'>Center Top</option>';
					echo '<option value="center center" '.selected( $bg_position, 'center center', false ).'>Center Center</option>';
					echo '<option value="center bottom" '.selected( $bg_position, 'center bottom', false ).'>Center Bottom</option>';
					echo '<option value="right top" '.selected( $bg_position, 'right top', false ).'>Right Top</option>';
					echo '<option value="right center" '.selected( $bg_position, 'right center', false ).'>Right Center</option>';
					echo '<option value="right bottom" '.selected( $bg_position, 'right bottom', false ).'>Right Bottom</option>';
				echo '</select>';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('bg_video').'">Background Video</label><br />';
				echo '<input type="text" id="'.$this->get_field_id('bg_video').'" class="input-full input-upload" value="'.$bg_video.'" name="'.$this->get_field_name('bg_video').'">';
				echo '<a href="#" class="aq_upload_button button" rel="video">Upload Video</a>';
				
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('color_mood').'">Color Mood</label><br />';
				echo '<select id="'.$this->get_field_id('color_mood').'" name="'.$this->get_field_name('color_mood').'">';
					echo '<option value="dark" '.selected( $color_mood, 'dark', false ).'>Dark</option>';
					echo '<option value="light" '.selected( $color_mood, 'light', false ).'>Light</option>';
				echo '</select>';
				
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('top_padding').'">Padding</label><br />';
				echo '<input type="text" id="'.$this->get_field_id('top_padding').'" class="" value="'.$top_padding.'" name="'.$this->get_field_name('top_padding').'" placeholder="top padding">';
				
				echo '<input type="text" id="'.$this->get_field_id('bottom_padding').'" class="" value="'.$bottom_padding.'" name="'.$this->get_field_name('bottom_padding').'" placeholder="Bottom padding">';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('top_border').'">Border</label><br />';
				echo '<input type="text" id="'.$this->get_field_id('top_border').'" class="" value="'.$top_border.'" name="'.$this->get_field_name('top_border').'" placeholder="top border">';
				
				echo '<input type="text" id="'.$this->get_field_id('bottom_border').'" class="" value="'.$bottom_border.'" name="'.$this->get_field_name('bottom_border').'" placeholder="Bottom border">';
				
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('section_id').'">Section ID</label><br />';
				echo '<input type="text" id="'.$this->get_field_id('section_id').'" class="" value="'.$section_id.'" name="'.$this->get_field_name('section_id').'">';
				
				echo '<p></p>';
				
				echo '<label for="'.$this->get_field_name('section_class').'">Section Class</label><br />';
				echo '<input type="text" id="'.$this->get_field_id('section_class').'" class="" value="'.$section_class.'" name="'.$this->get_field_name('section_class').'">';
				
				echo '<a href="#" onclick="self.parent.tb_remove();return false" class="button button-primary ">Done</a>';
			echo '</div>';
			
		echo '</div>',
			'</li>';
	}
	
	function before_block($instance) {
		extract($instance);
		$column_class = $first ? 'aq-first' : '';
		
		$style = '';
		
		if($bg_image != ''){ $style .= ' background-image:url('.$bg_image.');'; }
		if($bg_color != ''){ $style .= ' background-color:'.$bg_color.';'; }
		if($bg_size != ''){ $style .= ' background-size:'.$bg_size.';'; }
		if($bg_attachment != ''){ $style .= ' background-attachment:'.$bg_attachment.';'; }
		if($bg_repeat != ''){ $style .= ' background-repeat:'.$bg_repeat.';'; }
		if($bg_position != ''){ $style .= ' background-position:'.$bg_position.';'; }
		if($top_padding != ''){ $style .= ' padding-top:'.$top_padding.'px;'; }
		if($bottom_padding != ''){ $style .= ' padding-bottom:'.$bottom_padding.'px;'; }
		if($top_border != ''){ $style .= ' border-bottom:'.$top_border.'px;'; }
		if($bottom_border != ''){ $style .= ' border-bottom:'.$bottom_border.'px;'; }
		if($section_id != ''){ $section_id = $section_id; }else{ $section_id = 'aq-block-'.$template_id.'-'.$number; }
	 		
		echo '<div id="'.$section_id.'" class="color_mood_'.$color_mood.' '.$section_class.' aq-block aq-block-'.$id_base.' aq_'.$size.' '.$column_class.' clearfix" style="'.$style.'">';
	}
	
	function block_callback($instance) {
		$instance = is_array($instance) ? wp_parse_args($instance, $this->block_options) : $this->block_options;
		
		extract($instance);
		
		$col_order = $order;
		$col_size = absint(preg_replace("/[^0-9]/", '', $size));
		
		//column block header
		if(isset($template_id)) {
			$this->before_block($instance);
			
			//define vars
			$overgrid = 0; $span = 0; $first = false;
			
			//check if column has blocks inside it
			$blocks = aq_get_blocks($template_id);
			
			//outputs the blocks
			if($blocks) {
				foreach($blocks as $key => $child) {
					global $aq_registered_blocks;
					extract($child);
					
					if(class_exists($id_base)) {
						//get the block object
						$block = $aq_registered_blocks[$id_base];
						
						//insert template_id into $child
						$child['template_id'] = $template_id;
						
						//display the block
						if($parent == $col_order) {
							
							$child_col_size = absint(preg_replace("/[^0-9]/", '', $size));
							
							$overgrid = $span + $child_col_size;
							
							if($overgrid > $col_size || $span == $col_size || $span == 0) {
								$span = 0;
								$first = true;
							}
							
							if($first == true) {
								$child['first'] = true;
							}
							
							$block->block_callback($child);
							
							$span = $span + $child_col_size;
							
							$overgrid = 0; //reset $overgrid
							$first = false; //reset $first
						}
					}
				}
			} 
			
			$this->after_block($instance);
			
		} else {
			//show nothing
		}
	}
	

}