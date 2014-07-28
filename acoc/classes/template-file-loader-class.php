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
	
	
	function url($extra = ''){
		$url = '';
		if(file_exists($this->child_url.$extra)){
			$url = $this->child_url.$extra;
		}elseif(file_exists($this->theme_url.$extra)){
			$url = $this->theme_url.$extra;
		}elseif(file_exists($this->plugin_url.$extra)){
			$url = $this->plugin_url.$extra;
		}
		return $url;
	}
	
	
	function dri($extra = ''){
		$url = '';
		if(file_exists($this->child_dri.$extra)){
			$url = $this->child_dri.$extra;
		}elseif(file_exists($this->theme_dri.$extra)){
			$url = $this->theme_dri.$extra;
		}elseif(file_exists($this->plugin_dri.$extra)){
			$url = $this->plugin_dri.$extra;
		}
		return $url;
	}

}

endif;