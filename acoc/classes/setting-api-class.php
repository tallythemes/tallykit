<?php
if(!class_exists('acoc_setting_api_class')):
class acoc_setting_api_class{
	
	public $options;
	public $nonce_action;
	public $nonce_name;
		
	function __construct($atts = array()) {
		$this->options = array_merge( array(
			'id' => 'acoc_setting_page',
			'option_name' => NULL,
			'page_title' => NULL,
			'menu_title' => NULL,
			'capability' => 'manage_options',
			'parent_slug' => NULL,
			'menu_slug' => NULL,
			'icon_url' => NULL,
			'position' => NULL,
			'fields' => array(),
		), $atts );
		
		$this->nonce_action = 'acoc_setting_nonce_action_'.$this->options['id'];
		$this->nonce_name = 'acoc_setting_nonce_name_'.$this->options['id'];
		
		add_action( 'admin_menu', array($this, 'register_menu_page') );
		
		add_action( 'admin_init', array($this, 'save') );
	}
	
	
	function register_menu_page(){
		
		if($this->options['parent_slug'] != NULL){
			add_submenu_page( 
				$this->options['parent_slug'], 
				$this->options['page_title'],
				$this->options['menu_title'], 
				$this->options['capability'], 
				$this->options['menu_slug'], 
				array($this, 'the_page')
			);
		}else{
			add_menu_page( 
				$this->options['page_title'], 
				$this->options['menu_title'], 
				$this->options['capability'], 
				$this->options['menu_slug'], 
				array($this, 'the_page'), 
				$this->options['icon_url'], 
				$this->options['position']
			);
		}
	}
	
	
	
	function the_page(){
		
		echo '<form action="" method="post">';
			wp_nonce_field( $this->nonce_action, $this->nonce_name );
			echo '<div class="wrap">';
				echo '<h2>'.$this->options['page_title'].'</h2>';
				
				//show success message
				if(isset($_POST[$this->nonce_name])){
					if( wp_verify_nonce( $_POST[$this->nonce_name], $this->nonce_action)){
						echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Settings saved.</strong></p></div>';
					}
				}
				if(is_array($this->options['fields']) && !empty($this->options['fields'])){
					foreach($this->options['fields'] as $field){
						echo '<div class="acoc-setting-item">';
							$all_value = get_option($this->options['option_name']);
							$value = $all_value[$field['id']];
							include(ACOC_DRI.'fields/'.$field['type'].'.php');
							$class_name = 'acoc_field_'.$field['type'];
							$field_class = new $class_name;
							$field_class->html($field, $value);
						echo '</div>';
					}
					echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>';
				}else{
					echo 'Please add some fields';	
				}
			echo '</div>';
		echo '</form>';
	}
	
	
	function save(){
		if ( ! isset( $_POST[$this->nonce_name] ) ) return '';
		$nonce = $_POST[$this->nonce_name];
		if ( ! wp_verify_nonce( $nonce, $this->nonce_action ) ) return '';
		if ( ! current_user_can( $this->options['capability'] ) ) return '';
		
		$option_data = array();
		
		if(is_array($this->options['fields'])){
			foreach($this->options['fields'] as $field){
				include(ACOC_DRI.'fields/'.$field['type'].'.php');
				$class_name = 'acoc_field_'.$field['type'];
				$field_class = new $class_name;
				$data = $field_class->save($field['id']);
				if($field['filter'] != ''){ $data = $field['filter']($data); }
				
				$option_data[$field['id']] = $data;
			}
			update_option( $this->options['option_name'], $option_data );
		}	
	}
		
}
endif;