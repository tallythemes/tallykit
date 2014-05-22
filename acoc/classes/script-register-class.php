<?php
if(!class_exists('acoc_script_register')):

class acoc_script_register{
	
	public $type = NULL;
	public $enqueue = true;
	public $handle = NULL;
	public $src = false;
	public $deps = array();
	public $ver = false;
	public $media = 'all';
	public $in_footer = false;
	
	function __construct($settings){
		$this->type      = $settings['type'];
		$this->enqueue   = $settings['enqueue'];
		$this->handle    = $settings['handle'];
		$this->src       = $settings['src'];
		$this->deps      = $settings['deps'];
		$this->ver       = $settings['ver'];
		$this->media     = $settings['media'];
		$this->in_footer = $settings['in_footer'];
		
		add_action( 'wp_enqueue_scripts', array($this, '_register'));
	}
	
	function _register(){
		if($this->type == 'css'){
			if($this->enqueue == true){
				wp_enqueue_style( $this->handle, $this->src, $this->deps, $this->ver, $this->media );
			}else{
				wp_register_style( $this->handle, $this->src, $this->deps, $this->ver, $this->media );
			}
		}elseif($this->type == 'js'){
			if($this->enqueue == true){
				wp_enqueue_script( $this->handle, $this->src, $this->deps, $this->ver, $this->in_footer );
			}else{
				wp_register_script( $this->handle, $this->src, $this->deps, $this->ver, $this->in_footer );
			}
		}
	}

}

endif;