<?php
if(!class_exists('tallykit_FrontPage_text_block')):
	class tallykit_FrontPage_text_block{
		
		public $uid;
		public $block_slug;
		public $settings;
		
		function __construct($uid, $settings ){		
			$this->uid = $uid;
			$this->block_slug = 'text';
			$this->settings = $settings;
		}
		
		function option_name($name){
			return $this->uid.'_'.$this->settings['uid'].'_'.$this->block_slug.'_'.$name;
		}
		
		function form(){
			$options = array();
			
			$options[] = array(
				'id'          => $this->option_name('lable'),
				'label'       => '',
				'desc'        => '<div style="background:#000;text-align:center;color:#fff;font-size:24px;font-weight:bold;padding:20px 0;">'.$this->settings['lable'].'</div>',
				'std'         => '',
				'type'        => 'textblock',
				'section'     => $this->uid,
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
			);
			$options[] = array(
				'id'          => $this->option_name('enable'),
				'label'       => __('Enable', 'tallykit_taxdomain'),
				'desc'        => '',
				'std'         => tally_option_std($this->option_name('enable')),
				'type'        => 'on_off',
				'section'     => $this->uid,
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
			);
			
			$options[] = array(
				'id'          => $this->option_name('title'),
				'label'       => __('Title', 'tallykit_taxdomain'),
				'desc'        => '',
				'std'         => tally_option_std($this->option_name('title')),
				'type'        => 'text',
				'section'     => $this->uid,
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => $this->option_name('enable').':is(on)',
			);
			$options[] = array(
				'id'          => $this->option_name('content'),
				'label'       => __('Content', 'tallykit_taxdomain'),
				'desc'        => '',
				'std'         => tally_option_std($this->option_name('content')),
				'type'        => 'textarea',
				'section'     => $this->uid,
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => $this->option_name('enable').':is(on)',
			);
			
			return $options;
		}
		
		
		function content(){
			if(ot_get_option( $this->option_name('enable') ) == 'off') return;
			
			echo '<div class="tallykit_FrontPage_text_block '.$this->settings['class'].'">';
				echo '<div class="tallykit_FrontPage_block_inner">';
					if( ot_get_option( $this->option_name('title') ) ){ echo '<h4>'.ot_get_option( $this->option_name('title') ).'</h4>'; }
					
					echo '<div class="text">'.ot_get_option( $this->option_name('content') ).'</div>';
				echo '</div>';
			echo '</div>';
		}
		
	}
endif;