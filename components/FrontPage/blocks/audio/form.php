<?php
class tallykit_FrontPage_block_option_audio{
	public $section;
	public $section_name;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_audio';
		$this->section_name = 'Home Audio';
		$this->prefix = 'home_page_audio_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $this->section,'title' => '<div class="dashicons dashicons-admin-home"></div> '.$this->section_name);
		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable Audio', 'tallykit_taxdomain'),
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
			'id'          => $this->prefix.'html5',
			'label'       => __('Audio Type', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'html5'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				 array( 'label' => 'oembed', 'value' => 'no' ),
				 array( 'label' => 'html5', 'value' => 'yes'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'src',
			'label'       => __('SRC', 'tallykit_taxdomain'),
			'desc'        => 'If you select html5 audio you have to enter a .mp3 audio with full URL. Or if you select oembed, just copy and past the audio url like soundcloud',
			'std'         => tally_option_std($this->prefix.'src'),
			'type'        => 'textarea-simple',
			'section'     => $this->section,
			'rows'        => '3',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'w',
			'label'       => __('Width', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'w'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'h',
			'label'       => __('Height', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'h'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'poster',
			'label'       => __('Poster', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'poster'),
			'type'        => 'upload',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'class',
			'label'       => __('Class', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'class'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
				
		return $custom_settings;
	}
}