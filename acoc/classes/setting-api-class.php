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
			echo '<div class="wrap" id="'.$this->options['id'].'">';
				echo '<h2>'.$this->options['page_title'].'</h2>';
				
				//show success message
				if(isset($_POST[$this->nonce_name])){
					if( wp_verify_nonce( $_POST[$this->nonce_name], $this->nonce_action)){
						echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Settings saved.</strong></p></div>';
					}
				}
				if(is_array($this->options['fields']) && !empty($this->options['fields'])){
					foreach($this->options['fields'] as $field){
						echo '<div class="acoc-setting-item '.$field['class'].' acoc-setting-item-type-'.$field['type'].'">';
							$all_value = get_option($this->options['option_name']);
							$value = $all_value[$field['id']];
							$class_name = 'acoc_field_'.$field['type'];
							$field_class = new $class_name($field, $value);
							$field_class->html();
						echo '</div>';
					}
					echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>';
					
					
					echo '<hr /><h3>Import Option Data:</h3>';
					echo '<textarea style="width:50%; height:150px;" name="import_data"></textarea>';
					echo '<p class="submit"><input type="submit" name="submit_import_data" id="submit_import_data" class="button" value="Import Data"></p>';
					
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
				$class_name = 'acoc_field_'.$field['type'];
				$field_class = new $class_name($field);
				$data = $field_class->save($field['id']);
				if($field['filter'] != ''){ $data = $field['filter']($data); }
				
				$option_data[$field['id']] = $data;
			}
			if(isset($_POST['submit_import_data'])){
				if(!empty($_POST['import_data'])){
					$option_data = unserialize( acoc_decode( $_POST['import_data'] ) );
				}
			}
			update_option( $this->options['option_name'], $option_data );
		}	
	}
		
}
endif;