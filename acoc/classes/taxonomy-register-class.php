<?php
if(!class_exists('acoc_taxonomy_register')):

class acoc_taxonomy_register{
	public $taxonomy;
	public $post_type;
	public $args;
	public $labels;
	public $rewrite;
	public $hierarchical;
	
	function __construct($options){
		add_action( 'init', array($this, 'register') );
		
		$default_options = array(
			'taxonomy'  => 'acoc',
			'post_type' => 'post',
			'args'      => array(),
			'labels'    => array(),
			'rewrite'   => array( 'slug' => 'writer' ),
			'hierarchical' => false,
		);
		$options = array_merge($default_options, $options);
		
		$this->taxonomy   = $options['taxonomy'];
		$this->post_type  = $options['post_type'];
		$this->args       = $options['args'];
		$this->labels     = $options['labels'];
		$this->rewrite    = $options['rewrite'];
		$this->hierarchical    = $options['hierarchical'];
	}
	
	
	function register(){
		$default_labels = array(
			'name'                       => _x( 'Writers', 'taxonomy general name', 'acoc_textdomain' ),
			'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'acoc_textdomain' ),
			'search_items'               => __( 'Search Writers', 'acoc_textdomain' ),
			'popular_items'              => __( 'Popular Writers', 'acoc_textdomain' ),
			'all_items'                  => __( 'All Writers', 'acoc_textdomain' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Writer', 'acoc_textdomain' ),
			'update_item'                => __( 'Update Writer', 'acoc_textdomain' ),
			'add_new_item'               => __( 'Add New Writer', 'acoc_textdomain' ),
			'new_item_name'              => __( 'New Writer Name', 'acoc_textdomain' ),
			'separate_items_with_commas' => __( 'Separate writers with commas', 'acoc_textdomain' ),
			'add_or_remove_items'        => __( 'Add or remove writers', 'acoc_textdomain' ),
			'choose_from_most_used'      => __( 'Choose from the most used writers', 'acoc_textdomain' ),
			'not_found'                  => __( 'No writers found.', 'acoc_textdomain' ),
			'menu_name'                  => __( 'Writers', 'acoc_textdomain' ),
		);
		$labels = array_merge($default_labels, $this->labels);
	
		$default_args = array(
			'hierarchical'          => $this->hierarchical,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '',
			'query_var'             => true,
			'rewrite'               => $this->rewrite,
		);
		$args = array_merge($default_args, $this->args);
	
		register_taxonomy( $this->taxonomy, $this->post_type, $args );
	}
}

endif;