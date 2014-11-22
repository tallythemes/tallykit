<?php
class tallykit_FrontPage_block_option_textblock{
	public $section;
	public $section_name;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_textblock';
		$this->section_name = 'Home Text Block';
		$this->prefix = 'home_page_textblock_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $this->section,'title' => '<div class="dashicons dashicons-admin-home"></div> '.$this->section_name);
		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable Text Blocks', 'tallykit_taxdomain'),
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
			'id'          => $this->prefix.'column',
			'label'       => __('Columns', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'column'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'settings'    => '',
			'choices'     => array(
				 array( 'label' => '1 Column', 'value' => '1'),
				 array( 'label' => '2 Column', 'value' => '2'),
				 array( 'label' => '3 Column', 'value' => '3'),
				 array( 'label' => '4 Column', 'value' => '4'),
				 array( 'label' => '5 Column', 'value' => '5'),
				 array( 'label' => '6 Column', 'value' => '6'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'image_size',
			'label'       => __('Image Size', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'image_size'),
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
			'id'          => $this->prefix.'items',
			'label'       => __('Block Items', 'tallykit_taxdomain'),
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
					'id'          => 'image',
					'label'       => __('Image', 'tallykit_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'upload',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'choices'     => '',
				),
				array(
					'id'          => 'icon',
					'label'       => __('Icon', 'tallykit_taxdomain'),
					'desc'        => __('Please enter the class name of icon. You can copy and past the icon class from this URL <a href=" http://fontawesome.io/cheatsheet/" target="_blank"> http://fontawesome.io/cheatsheet/</a>', 'tallykit_taxdomain'),
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'choices'     => '',
				),
				array(
					'id'          => 'content',
					'label'       => __('Content', 'tallykit_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'textarea-simple',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'choices'     => '',
				),
				array(
					'id'          => 'link',
					'label'       => __('Link', 'tallykit_taxdomain'),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'section'     => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'choices'     => '',
				),
				array(
					'id'          => 'readmore_text',
					'label'       => __('ReadMore Text', 'tallykit_taxdomain'),
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