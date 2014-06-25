<?php
if(!class_exists('acoc_template_file_loader')):

class acoc_template_file_loader{
	
	public $child_url;
	public $theme_url;
	public $plugin_url;
	
	public $child_dri;
	public $theme_dri;
	public $plugin_dri;
	
	
	function __construct($urls){
		$this->child_url  =  $urls['child_url'];
		$this->theme_url  =  $urls['theme_url'];
		$this->plugin_url =  $urls['plugin_url'];
		
		$this->child_dri  =  $urls['child_dri'];
		$this->theme_dri  =  $urls['theme_dri'];
		$this->plugin_dri =  $urls['plugin_dri'];
	}
	
	
	function url(){
		$url = '';
		if(file_exists($this->child_url)){
			$url = $this->child_url;
		}elseif(file_exists($this->theme_url)){
			$url = $this->theme_url;
		}elseif(file_exists($this->plugin_url)){
			$url = $this->plugin_url;
		}
		return $url;
	}
	
	
	function dri(){
		$url = '';
		if(file_exists($this->child_dri)){
			$url = $this->child_dri;
		}elseif(file_exists($this->theme_dri)){
			$url = $this->theme_dri;
		}elseif(file_exists($this->plugin_dri)){
			$url = $this->plugin_dri;
		}
		return $url;
	}

}

endif;