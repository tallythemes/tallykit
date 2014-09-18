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
					
					
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_color_mood',
						'label'       => __('Color Mood', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'select',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
						'min_max_step'=> '',
						'choices'	  => array(
							array('value' => 'color_mood_dark', 'label'=> __( 'Dark', 'tallykit_textdomain' )),
							array('value' => 'color_mood_light', 'label'=> __( 'Light', 'tallykit_textdomain' )),
						)
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_text_align',
						'label'       => __('Text Align', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'select',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
						'min_max_step'=> '',
						'choices'	  => array(
							array('value' => 'left', 'label'=> __( 'left', 'tallykit_textdomain' )),
							array('value' => 'right', 'label'=> __( 'right', 'tallykit_textdomain' )),
							array('value' => 'center', 'label'=> __( 'center', 'tallykit_textdomain' )),
							array('value' => 'inherit', 'label'=> __( 'inherit', 'tallykit_textdomain' ))
						)
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_padding_top',
						'label'       => __('Padding Top', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'numeric-slider',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
						'min_max_step'=> '0,500,1',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_padding_bottom',
						'label'       => __('Padding Bottom', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'numeric-slider',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
						'min_max_step'=> '0,500,1',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_padding_bottom',
						'label'       => __('Padding Bottom', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'numeric-slider',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
						'min_max_step'=> '0,500,1',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_content_width',
						'label'       => __('Content Width', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '960px',
						'type'        => 'text',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_heading_color',
						'label'       => __('Heading Color', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'colorpicker',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_text_color',
						'label'       => __('Text Color', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'colorpicker',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_border_color',
						'label'       => __('Border Color', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'colorpicker',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_border_width',
						'label'       => __('Border Width', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'numeric-slider',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
						'min_max_step'=> '0,20,1',
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_border_style',
						'label'       => __('Border Style', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'select',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
						'min_max_step'=> '',
						'choices'	  => array(
							array('value' => 'solid', 'label'=> __( 'solid', 'tallykit_textdomain' )),
							array('value' => 'dashed', 'label'=> __( 'dashed', 'tallykit_textdomain' )),
							array('value' => 'dotted', 'label'=> __( 'dotted', 'tallykit_textdomain' )),
							array('value' => 'double', 'label'=> __( 'double', 'tallykit_textdomain' )),
							array('value' => 'groove', 'label'=> __( 'groove', 'tallykit_textdomain' )),
							array('value' => 'inherit', 'label'=> __( 'inherit', 'tallykit_textdomain' )),
						)
					);
					$custom_settings['settings'][] = array(
						'id'          => $option['uid'].'_bg',
						'label'       => __('Background', 'tallykit_textdomain'),
						'desc'        => '',
						'std'         => '',
						'type'        => 'background',
						'section'     => $option['uid'],
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'condition'   => '',
						'operator'    => 'or',
					);
					
					
				}//end $options foreach
			}//end $options IF
			
			return $custom_settings;
		}
		
		
	}
endif;