<?php
class tallykit_FrontPage_block_option_accordion{
	public $section;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_accordion_';
		$this->prefix = 'home_page_accordion_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $option['uid'],'title' => $option['lable']);
		
		$custom_settings[] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable Toggle', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'enable'),
			'type'        => 'on_off',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
		);
		
		$custom_settings[] = array(
			'id'          => $this->prefix.'title',
			'label'       => __('Title', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'title'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'settings'    => '',
		);
		
		$custom_settings[] = array(
			'id'          => $this->uid.'_items',
			'label'       => __('Accordion Items', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'items'),
			'type'        => 'list-item',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'settings'    => array(
				array(
					'id'          => 'content',
					'label'       => __('Content', 'tallykit_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'choices'     => '',
				)
			),
		);
		
		return $custom_settings;
	}
}