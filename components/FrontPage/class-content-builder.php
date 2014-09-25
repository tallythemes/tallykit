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
					
					if($this->check_empty_row($option) != 0){
					echo '<div class="tallykit_FrontPage_row '.$option['class'].'" id="'.$option['div_id'].'">';
						echo '<div class="tallykit_FrontPage_row_inner">';
					
							echo '<div class="col-holder">';
							
							$columns = $option['columns'];
							if(is_array($columns) && !empty($columns)){
								foreach($columns as $column){ 
									
									if($this->column_count($option, $columns) == $option['max_columns']){
										//all is ok
									}elseif($this->column_count($option, $columns) == 0){
										//all is ok
									}else{
										$column['col'] = 12/$this->column_count($option, $columns);
									}
									if($this->check_empty_column($option, $column) != 0):
										echo '<div class="col col_'.$column['col'].'">';
								
										$blocks = $column['blocks'];
										if(is_array($blocks) && !empty($blocks)){
											foreach($blocks as $block){
												$block_class_name = 'tallykit_FrontPage_block_output_'.$block['type'];
												if(class_exists($block_class_name)){
													$block_class_data = new $block_class_name;
													$block_class_data->content();
												}

											}//end $blocks foreach
										}//end $blocks IF
										
										echo '</div>';
									endif;
								
								}//end $columns foreach
							}//end $columns IF
							
							echo '</div>';
						echo '</div>';
					echo '</div>';
					}
				}//end $options foreach
			}//end $options IF
		}
		
		
		function check_empty_column($option, $column){
			$blocks = $column['blocks'];
			$block_cunt = 0;
			$output = false;
			
			if(is_array($blocks) && !empty($blocks)){
				foreach($blocks as $block){
					
					$block_class_name = 'tallykit_FrontPage_block_output_'.$block['type'];
					if(class_exists($block_class_name)){
						$block_class_data = new $block_class_name;
						$output = $block_class_data->enable();
					}
					if( $output == true ) { $block_cunt++; }
							
				}//end $blocks foreach
			}//end $blocks IF
			
			return $block_cunt;
		}
		
		
		function check_empty_row($option){
			$block_cunt = 0;
			$output = false;
										
			$columns = $option['columns'];
			if(is_array($columns) && !empty($columns)){
				foreach($columns as $column){
					
					$blocks = $column['blocks'];
					if(is_array($blocks) && !empty($blocks)){
						foreach($blocks as $block){
							$block_class_name = 'tallykit_FrontPage_block_output_'.$block['type'];
							if(class_exists($block_class_name)){
								$block_class_data = new $block_class_name;
								$output = $block_class_data->enable();
							}
							if( $output == true ) { $block_cunt++; }
						}//end $blocks foreach
					}//end $blocks IF
							
				}//end $columns foreach
			}//end $columns IF
			
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
		
	}
endif;