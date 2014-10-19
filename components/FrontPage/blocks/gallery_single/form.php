<?php
class tallykit_FrontPage_block_option_gallery_single{
	public $section;
	public $section_name;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_gallery_single';
		$this->section_name = 'Home Gallery Single';
		$this->prefix = 'home_page_gallery_single_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $this->section,'title' => '<div class="dashicons dashicons-admin-home"></div> '.$this->section_name);
		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable Gallery Single', 'tallykit_taxdomain'),
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
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'slug',
			'label'       => __('Select A Gallery', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'src'),
			'type'        => 'custom-post-type-select',
			'section'     => $this->section,
			'rows'        => '3',
			'post_type'   => 'tallykit_gallery',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'columns',
			'label'       => __('Columns', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'src'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'margin',
			'label'       => __('Margin', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'src'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '3',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
						
		return $custom_settings;
	}
}