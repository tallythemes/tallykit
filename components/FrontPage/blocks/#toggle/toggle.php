<?php
class tallykit_home_builder_block_toggle{
	public $settings;
	public $uid;
	public $section;
	
	function __construct($uid, $section, $settings){		
		$this->uid = $uid;
		$this->section = $section;
		$this->settings = $settings;
	}
	
	function form(){
		$settings = $this->settings;
		$options = array();
		$options[] = array(
			'id'          => $this->uid.'_enable',
			'label'       => __('Enable Toggle', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->uid.'_enable'),
			'type'        => 'on_off',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
		);
		
		$options[] = array(
			'id'          => $this->uid.'_items',
			'label'       => __('Toggle Items', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->uid.'_items'),
			'type'        => 'list-item',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->uid.'_enable'.':is(on)',
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
		
		return $options;
	}
	
	
	function block(){
		echo do_shortcode('[tk_toggle title="Toggle Title" class="" ]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget varius neque. Mauris egestas tellus eu libero viverra, quis faucibus nisi bibendum.[/tk_toggle]');
	}
}