<?php
if(!class_exists('tallykit_FrontPage_option_builder')):
	class tallykit_FrontPage_option_builder{
		
		public $options;
		
		
		function __construct($options){
			
			$this->options = $options;
			
			add_filter('option_tree_settings_args', array($this, 'options'), 20);
		}
		
		
		function options($custom_settings){
			$options = $this->options;
			
			if(is_array($options) && !empty($options)){
				foreach($options as $option){
					$custom_settings['sections'][] = array( 'id' => $option['uid'],'title' => $option['lable']);
					
					$columns = $option['columns'];
					if(is_array($columns) && !empty($columns)){
						foreach($columns as $column){
							
							$blocks = $column['blocks'];
							if(is_array($blocks) && !empty($blocks)){
								foreach($blocks as $block){
									$block_class_name = 'tallykit_FrontPage_'.$block['type'].'_block';
									$block_class_data = new $block_class_name($option['uid'], $block);
									$block_fields = $block_class_data->form();
									
									if(is_array($block_fields) && !empty($block_fields)){
										foreach($block_fields as $block_field){
											$custom_settings['settings'][] = $block_field;
										}//end $block_fields foreach
									}//end $block_fields IF
									
								}//end $blocks foreach
							}//end $blocks IF
							
						}//end $columns foreach
					}//end $columns IF
					
				}//end $options foreach
			}//end $options IF
			
			return $custom_settings;
		}
	}
endif;