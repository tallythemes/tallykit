<?php
class acoc_metabox_register {
	
	public $options;
	public $nonce_action;
	public $nonce_name;
	
	public $url;
	public $dri;

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct($atts = array()) {
		$this->options = array_merge( array(
			'id' => 'acoc_metabox',
			'title' => 'ACOC Metabox Title',
			'post_type' => 'post',
			'context' => 'advanced', //'normal', 'advanced', or 'side'
			'priority' => 'high', //'high', 'core', 'default' or 'low'
			'callback_args' => NULL,
			'fields' => array(),
		), $atts );
		
		$this->nonce_action = 'acoc_metabox_nonce_action_'.$this->options['id'];
		$this->nonce_name = 'acoc_metabox_nonce_name_'.$this->options['id'];
		
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}
	
	
	/**
	 * Adds the meta box container.
	 */
	public function add_meta_box( $post_type ) {
		if ( $post_type == $this->options['post_type']) {
			add_meta_box(
				$this->options['id']
				,$this->options['title']
				,array( $this, 'render_meta_box_content' )
				,$this->options['post_type']
				,$this->options['context']
				,$this->options['priority']
				,$this->options['callback_args']
			);
		}
	}
	
	

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save( $post_id ) {
	
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST[$this->nonce_name] ) )
			
			return $post_id;

		$nonce = $_POST[$this->nonce_name];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, $this->nonce_action ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		/* OK, its safe for us to save the data now. */
		
		if(is_array($this->options['fields'])){
			foreach($this->options['fields'] as $field){
				include(ACOC_DRI.'fields/'.$field['type'].'.php');
				$class_name = 'acoc_field_'.$field['type'];
				$field_class = new $class_name;
				$data = $field_class->save($field['id']);
				if($field['filter'] != ''){ $data = $field['filter']($data); }
				update_post_meta( $post_id, $field['id'], $data );
			}
		}
	}


	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_content( $post ) {
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( $this->nonce_action, $this->nonce_name );
		
		if(is_array($this->options['fields']) && !empty($this->options['fields'])){
			foreach($this->options['fields'] as $field){
				echo '<div class="acoc-metabox-item" style="margin-bottom:20px;">';
					$value = get_post_meta( $post->ID, $field['id'], true );
					include(ACOC_DRI.'fields/'.$field['type'].'.php');
					$class_name = 'acoc_field_'.$field['type'];
					$field_class = new $class_name;
					$field_class->html($field, $value);
				echo '</div>';
			}
		}else{
			echo 'Please add some fields';	
		}
		
	}
}