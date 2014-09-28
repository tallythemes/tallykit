<?php
class tallykit_FrontPage_block_option_slideshow{
	public $section;
	public $section_name;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_slideshow';
		$this->section_name = 'Home Slideshow';
		$this->prefix = 'home_page_slideshow_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $this->section,'title' => '<div class="dashicons dashicons-admin-home"></div> '.$this->section_name);
		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable Slideshow', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'enable'),
			'type'        => 'on_off',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
		);		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'id',
			'label'       => __('Select a Slideshow', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'id'),
			'type'        => 'custom-post-type-select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => 'tallykit_slideshow',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		
		return $custom_settings;
	}
}