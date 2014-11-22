<?php
class tallykit_FrontPage_block_option_testimonial_carousel{
	public $section;
	public $section_name;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_testimonial_carousel';
		$this->section_name = 'Home Testimonial Carousel';
		$this->prefix = 'home_page_testimonial_carousel_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $this->section,'title' => '<div class="dashicons dashicons-admin-home"></div> '.$this->section_name);
		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable Testimonial Carousel', 'tallykit_taxdomain'),
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
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'item_width',
			'label'       => __('itemWidth', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'item_width', '100'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'item_margin',
			'label'       => __('itemMargin', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'item_margin', '10'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'min_items',
			'label'       => __('minItems', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'min_items', '2'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'max_items',
			'label'       => __('maxItems', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'max_items', '4'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
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
		
		return $custom_settings;
	}
}