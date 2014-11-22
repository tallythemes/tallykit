<?php
class tallykit_FrontPage_block_option_people_grid{
	public $section;
	public $section_name;
	public $prefix;
	
	function __construct(){
		$this->section = 'home_page_people_grid';
		$this->section_name = 'Home People Grid';
		$this->prefix = 'home_page_people_grid_';
		add_filter('option_tree_settings_args', array($this, 'options'), 20);
	}
	
	
	function options($custom_settings){
		$custom_settings['sections'][] = array( 'id' => $this->section,'title' => '<div class="dashicons dashicons-admin-home"></div> '.$this->section_name);
		
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'enable',
			'label'       => __('Enable People Grid', 'tallykit_taxdomain'),
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
			'id'          => $this->prefix.'columns',
			'label'       => __('Columns', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'columns'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => '1', 'value' => '1'),
				array('label' => '2', 'value' => '2'),
				array('label' => '3', 'value' => '3'),
				array('label' => '4', 'value' => '4'),
				array('label' => '5', 'value' => '5'),
				array('label' => '6', 'value' => '6'),
			)
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'margin',
			'label'       => __('Margin', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'margin', '3'),
			'type'        => 'text',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
		);
		$custom_settings['settings'][] = array(
			'id'          => $this->prefix.'filter',
			'label'       => __('Filter', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'filter'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'yes', 'value' => 'yes'),
				array('label' => 'no', 'value' => 'no'),
			)
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
			'taxonomy'    => 'tallykit_people_category',
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
			'id'          => $this->prefix.'pagination',
			'label'       => __('Pagination', 'tallykit_taxdomain'),
			'desc'        => '',
			'std'         => tally_option_std($this->prefix.'pagination'),
			'type'        => 'select',
			'section'     => $this->section,
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'condition'   => $this->prefix.'enable'.':is(on)',
			'choices'     => array(
				array('label' => 'yes', 'value' => 'yes'),
				array('label' => 'no', 'value' => 'no'),
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
		
		return $custom_settings;
	}
}