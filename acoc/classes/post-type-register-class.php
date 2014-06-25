<?php
if(!class_exists('acoc_post_type_register')):

class acoc_post_type_register{
	public $post_type_name;
	public $args;
	public $labels;
	public $rewrite;
	public $supports;
	public $menu_icon;
	
	function __construct($options){
		add_action( 'init', array($this, 'register') );
		
		$default_options = array(
			'post_type_name'     => 'acoc',
			'args'               => array(),
			'labels'             => array(),
			'rewrite'            => array( 'slug' => 'acoc' ),
			'supports'           => array( 'title', 'editor' ),
			'menu_icon'          => 'dashicons-admin-post',
		);
		$options = array_merge($default_options, $options);
		
		$this->post_type_name = $options['post_type_name'];
		$this->args           = $options['args'];
		$this->labels         = $options['labels'];
		$this->rewrite        = $options['rewrite'];
		$this->supports       = $options['supports'];
		$this->menu_icon      = $options['menu_icon'];
	}
	
	
	function register(){
		$default_labels = array(
			'name'               => _x( 'Acocs', 'post type general name', 'acoc_textdomain' ),
			'singular_name'      => _x( 'Acoc', 'post type singular name', 'acoc_textdomain' ),
			'menu_name'          => _x( 'Acocs', 'admin menu', 'acoc_textdomain' ),
			'name_admin_bar'     => _x( 'Acoc', 'add new on admin bar', 'acoc_textdomain' ),
			'add_new'            => _x( 'Add New', 'Acoc', 'acoc_textdomain' ),
			'add_new_item'       => __( 'Add New Acoc', 'acoc_textdomain' ),
			'new_item'           => __( 'New Acoc', 'acoc_textdomain' ),
			'edit_item'          => __( 'Edit Acoc', 'acoc_textdomain' ),
			'view_item'          => __( 'View Acoc', 'acoc_textdomain' ),
			'all_items'          => __( 'All Acocs', 'acoc_textdomain' ),
			'search_items'       => __( 'Search Acocs', 'acoc_textdomain' ),
			'parent_item_colon'  => __( 'Parent Acocs:', 'acoc_textdomain' ),
			'not_found'          => __( 'No Acocs found.', 'acoc_textdomain' ),
			'not_found_in_trash' => __( 'No Acocs found in Trash.', 'acoc_textdomain' ),
		);
		$labels = array_merge($default_labels, $this->labels);
	
		$default_args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => $this->menu_icon,
			'rewrite'            => $this->rewrite,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => $this->supports,
		);
		$args = array_merge($default_args, $this->args);
	
		register_post_type($this->post_type_name, $args );	
	}
}

endif;