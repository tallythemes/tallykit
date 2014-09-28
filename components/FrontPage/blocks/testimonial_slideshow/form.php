<?php
class tallykit_FrontPage_block_option_testimonial_slideshow{
	public $section;
	public $section_name;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_testimonial_slideshow';
		$this->section_name = 'Home Testimonial Slider';
		$this->prefix = 'home_page_testimonial_slideshow_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $this->section,'title' => '<div class="dashicons dashicons-admin-home"></div> '.$this->section_name);
		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable Testimonial Slider', 'tallykit_taxdomain'),
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
			'id'          => $this->prefix.'category',
			'label'       => __('Category', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'category'),
			'type'        => 'taxonomy-select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => 'tallykit_testimonial_category',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);	
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'relation',
			'label'       => __('Relation', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'relation'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				 array( 'label' => 'AND', 'value' => 'AND' ),
				 array( 'label' => 'OR', 'value' => 'OR'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'limit',
			'label'       => __('Limit', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'limit'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'orderby',
			'label'       => __('Orderby', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'orderby'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				 array( 'label' => 'post_date', 'value' => 'post_date' ),
				 array( 'label' => 'none', 'value' => 'none'),
				 array( 'label' => 'ID', 'value' => 'ID' ),
				 array( 'label' => 'title', 'value' => 'title'),
				 array( 'label' => 'name', 'value' => 'name' ),
				 array( 'label' => 'false', 'value' => 'false'),
				 array( 'label' => 'date', 'value' => 'date' ),
				 array( 'label' => 'menu_order', 'value' => 'menu_order'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'order',
			'label'       => __('Order', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'order'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				 array( 'label' => 'DESC', 'value' => 'DESC' ),
				 array( 'label' => 'ASC', 'value' => 'ASC'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'animation',
			'label'       => __('Animation', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'animation'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'slide', 'value' => 'slide'),
				array('label' => 'fade', 'value' => 'fade'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'direction',
			'label'       => __('Direction', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'direction'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'horizontal', 'value' => 'horizontal'),
				array('label' => 'vertical', 'value' => 'vertical'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'smooth_height',
			'label'       => __('Smooth Height', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'smooth_height'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'false', 'value' => 'false'),
				array('label' => 'true', 'value' => 'true'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'slideshow',
			'label'       => __('Slideshow', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'slideshow'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'animation_loop',
			'label'       => __('Animation Loop', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'animation_loop'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'slideshow_speed',
			'label'       => __('Slideshow Speed', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'slideshow_speed', '7000'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'animation_speed',
			'label'       => __('Animation Speed', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'animation_speed', '600'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'control_nav',
			'label'       => __('Animation Speed', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'control_nav', '7000'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'direction_nav',
			'label'       => __('Direction Nav', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'direction_nav', '7000'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'true', 'value' => 'true'),
				array('label' => 'false', 'value' => 'false'),
			)
		);
		
		return $custom_settings;
	}
}