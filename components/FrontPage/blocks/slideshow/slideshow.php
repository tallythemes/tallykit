<?php
if(!class_exists('tallykit_FrontPage_slideshow_block')):
	class tallykit_FrontPage_slideshow_block{
		
		public $uid;
		public $block_slug;
		public $settings;
		
		function __construct($uid, $settings ){		
			$this->uid = $uid;
			$this->block_slug = 'slideshow';
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
				'id'          => $this->option_name('slideshow_id'),
				'label'       => __('Select A Slideshow', 'tallykit_taxdomain'),
				'desc'        => '',
				'std'         => tally_option_std($this->option_name('slideshow_id')),
				'type'        => 'custom-post-type-select',
				'section'     => $this->uid,
				'post_type'   => 'tallykit_slideshow',
				'rows'        => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => $this->option_name('enable').':is(on)',
			);			
			return $options;
		}
		
		
		function content(){
			if(ot_get_option( $this->option_name('enable') ) == 'off') return;
			echo '<div class="tallykit_FrontPage_slideshow_block '.$this->settings['class'].'">';
				echo '<div class="tallykit_FrontPage_block_inner">';					
					echo do_shortcode('[tk_slideshow id="'.ot_get_option($this->option_name('slideshow_id')).'"/]');
				echo '</div>';
			echo '</div>';
		}
		
	}
endif;