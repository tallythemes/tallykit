<?php
/*
	Sections Options
==================================================*/
add_filter('option_tree_settings_args', 'tallykit_FrontPage_section_options', 19);
function tallykit_FrontPage_section_options($custom_settings){
	
	$tallykit_FrontPage = tallykit_frontPage_settings();
	if(is_array($tallykit_FrontPage) && !empty($tallykit_FrontPage)){
		$custom_settings['sections'][] = array( 'id' => 'tallykit_frontpage_sections','title' => '<div class="dashicons dashicons-admin-home"></div> Home Sections Settings');
	} // IF - $tallykit_FrontPage
	
	return $custom_settings;
}

if(is_array($tallykit_FrontPage) && !empty($tallykit_FrontPage)){
	$i = 1;
	foreach($tallykit_FrontPage as $option){ 
		
		if(isset($option['div_id']) && !empty($option['div_id'])){
			$div_id = $option['div_id'];
			$lable = (isset($option['lable']) ? $option['lable'] : 'Section #'.$i); 
				
			new tallykit_FrontPage_section_options($div_id, $lable);
			$i++;
		}
	}
} // IF - $tallykit_FrontPage

class tallykit_FrontPage_section_options{
	function __construct($id, $lable){
		$this->id = $id;
		$this->lable = $lable;
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
		add_action('tallykit_dynamic_css', array($this, 'css'));
	}
	
	function options($custom_settings){
		$custom_settings['settings'][] = array(
			'id'          => $this->id.'_block',
			'label'       => '',
			'desc'        => '<h2 style="background:#000; color:#fff; line-height: 50px; text-align: center;">Home: '.$this->lable.'</h2>',
			'std'         => '',
			'type'        => 'textblock',
			'section'     => 'tallykit_frontpage_sections',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => '',
			'settings'    => '',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->id.'_top_padding',
			'label'       => 'Top Padding of '. $this->lable,
			'desc'        => '',
			'std'         => tally_option_std($this->id.'_top_padding'),
			'type'        => 'text',
			'section'     => 'tallykit_frontpage_sections',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => '',
			'settings'    => '',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->id.'_bottom_padding',
			'label'       => 'Bottom Padding of '. $this->lable,
			'desc'        => '',
			'std'         => tally_option_std($this->id.'_bottom_padding'),
			'type'        => 'text',
			'section'     => 'tallykit_frontpage_sections',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => '',
			'settings'    => '',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->id.'_bg',
			'label'       => 'Background of '. $this->lable,
			'desc'        => '',
			'std'         => tally_option_std($this->id.'_bg'),
			'type'        => 'background',
			'section'     => 'tallykit_frontpage_sections',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => '',
			'settings'    => '',
		);
		return $custom_settings;
	}
	
	
	function css(){
		$background = tally_option($this->id.'_bg');
		$top_padding = tally_option($this->id.'_top_padding');
		$bottom_padding = tally_option($this->id.'_bottom_padding');
		?>
		#<?php echo $this->id; ?>{
			<?php 
			if(isset($background['background-image']) && !empty($background['background-image'])){ echo 'background-image:url('.$background['background-image'].');'; }
			if(isset($background['background-color']) && !empty($background['background-color'])){ echo 'background-color:'.$background['background-color'].';'; }
			if(isset($background['background-repeat']) && !empty($background['background-repeat'])){ echo 'background-repeat:'.$background['background-repeat'].';'; }
			if(isset($background['background-attachment'])&&!empty($background['background-attachment'])){echo 'background-attachment:'.$background['background-attachment'].';'; }
			if(isset($background['background-position']) && !empty($background['background-position'])){ echo 'background-position:'.$background['background-position'].';'; }
			if(isset($background['background-size']) && !empty($background['background-size'])){ echo 'background-size:'.$background['background-size'].';'; }
			if($top_padding != ''){ echo 'padding-top:'.$top_padding.';'; }
			if($bottom_padding != ''){ echo 'padding-bottom:'.$bottom_padding.';'; }
			?>
		}
        <?php	
	}
}