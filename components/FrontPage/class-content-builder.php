<?php
if(!class_exists('tallykit_FrontPage_content_builder')):
	class tallykit_FrontPage_content_builder{
		
		public $options;
		
		
		function __construct($options){
			
			$this->options = $options;
		}
		
		
		function render(){
			$options = $this->options;
			
			if(is_array($options) && !empty($options)){
				foreach($options as $option){
					$this->row_css_style($option);
					echo '<div class="tallykit_FrontPage_row '.ot_get_option($option['uid'].'_color_mood').'" id="'.$option['uid'].'">';
						echo '<div class="tallykit_FrontPage_row_inner">';
					
							echo '<div class="col-holder">';
							
							$columns = $option['columns'];
							if(is_array($columns) && !empty($columns)){
								foreach($columns as $column){ 
									
									if($this->column_count($option, $columns) == $option['max_columns']){
										//all is ok
									}else{
										$column['col'] = 12/$this->column_count($option, $columns);
									}
									
									if($this->check_empty_column($option, $column) != 0):
										echo '<div class="col col_'.$column['col'].'">';
								
										$blocks = $column['blocks'];
										if(is_array($blocks) && !empty($blocks)){
											foreach($blocks as $block){
												$block_class_name = 'tallykit_FrontPage_'.$block['type'].'_block';
												$block_class_data = new $block_class_name($option['uid'], $block);
												
												echo $block_class_data->content();

											}//end $blocks foreach
										}//end $blocks IF
										
										echo '</div>';
									endif;
								
								}//end $columns foreach
							}//end $columns IF
							
							echo '</div>';
						echo '</div>';
					echo '</div>';
					
				}//end $options foreach
			}//end $options IF
		}
		
		
		function check_empty_column($option, $column){
			$blocks = $column['blocks'];
			
			$block_cunt = 0;
			
			if(is_array($blocks) && !empty($blocks)){
				foreach($blocks as $block){
					$block_class_name = 'tallykit_FrontPage_'.$block['type'].'_block';
					$block_class_data = new $block_class_name($option['uid'], $block);
					
					ob_start();
					$block_class_data->content();
					$output = ob_get_contents();
					ob_end_clean();
		
					if( $output != NULL ) { $block_cunt++; }
							
				}//end $blocks foreach
			}//end $blocks IF
			
			return $block_cunt;
		}
		
		
		function column_count($option, $columns){
			if(is_array($columns) && !empty($columns)){ $i = 0;
				foreach($columns as $column){ 
					if($this->check_empty_column($option, $column) != 0):
						$i++;
					endif;
						
				}//end $columns foreach
			}//end $columns IF
			return $i;
		}
		
		
		function row_css_style($option){
			?>
            <style type="text/css">
			#<?php echo $option['uid']; ?>{ 
				<?php 
				$bg = ot_get_option($option['uid'].'_bg');
				?>
				background-color:<?php echo $bg['background-color']; ?>;
				background-image:url(<?php echo $bg['background-image']; ?>);
				background-attachment:<?php echo $bg['background-attachment']; ?>; 
				background-position:<?php echo $bg['background-position']; ?>; 
				background-repeat:<?php echo $bg['background-repeat']; ?>; 
				background-size:<?php echo $bg['background-size']; ?>; 
				border-top-width:<?php echo ot_get_option($option['uid'].'_border_width'); ?>px;
				border-bottom-width:<?php echo ot_get_option($option['uid'].'_border_width'); ?>px;
				border-style:<?php echo ot_get_option($option['uid'].'_border_style'); ?>;
				padding-top:<?php echo ot_get_option($option['uid'].'_padding_top'); ?>px;
				padding-bottom:<?php echo ot_get_option($option['uid'].'_padding_bottom'); ?>px;
				text-align:<?php echo ot_get_option($option['uid'].'_text_align'); ?>;
				border-color:<?php echo ot_get_option($option['uid'].'_border_color'); ?> !important;
			}
			#<?php echo $option['uid']; ?> *{
				color:<?php echo ot_get_option($option['uid'].'_text_color'); ?> !important; 
				
			}
			#<?php echo $option['uid']; ?> .tallykit_FrontPage_row_inner{
				max-width:<?php echo ot_get_option($option['uid'].'_content_width'); ?>;
			}
			#<?php echo $option['uid']; ?> h1,
			#<?php echo $option['uid']; ?> h2,
			#<?php echo $option['uid']; ?> h3,
			#<?php echo $option['uid']; ?> h4,
			#<?php echo $option['uid']; ?> h5,
			#<?php echo $option['uid']; ?> h6{ color:<?php echo ot_get_option($option['uid'].'_heading_color'); ?> !important; }
			</style>
            <?php	
		}
		
	}
endif;