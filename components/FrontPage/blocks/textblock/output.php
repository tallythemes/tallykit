<?php
class tallykit_FrontPage_block_output_textblock{
	public $prefix;
	
	function __construct(){
		$this->prefix = 'home_page_textblock_';
	}
	
	
	function content(){
		$enable = tally_option($this->prefix.'enable');
		$title = tally_option($this->prefix.'title');
		$items = tally_option($this->prefix.'items');
		$column = tally_option($this->prefix.'column');
		$image_size = tally_option($this->prefix.'image_size');
		
		if($image_size != ''){
			$image_size = explode("x", $image_size);
		}else{
			$image_size = array(600, 260);
		}
		
		if($enable == 'on'):
			echo '<div class="front_page_textblock">';
				if($title != ''){ echo '<h4>'.$title.'</h4>'; }
				
				$output = '';
				if(is_array($items) && !empty($items)){
					echo '<div class="cl_holder">';
						foreach($items as $item){
							?>
							<div class="tk-FrontPage-textblock-item cl cl_<?php echo $column; ?>">
								<div class="tk-FrontPage-textblock-item-inner">
									<?php if( $item['image'] != ''): ?>
										<a class="tk-fptb-image" href="<?php echo $item['link']; ?>"><img src="<?php echo acoc_image_size($item['image'], $image_size[0], $image_size[1], true); ?>"  width="<?php echo $image_size[0]; ?>" height="<?php echo $image_size[1]; ?>" alt="<?php echo $item['title']; ?>" /></a>
									<?php else: ?>
										<a class="tk-fptb-icon" href="<?php echo $item['link']; ?>"><i class="fa fa-<?php echo $item['icon']; ?>"></i></a>
									<?php endif; ?>
									<h4><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></h4>
									<div class="tk-fptb-content"><?php echo $item['content']; ?></div>
									<?php if( $item['link'] != ''): ?>
										<a class="tk-fptb-readmre" href="<?php echo $item['link']; ?>"><?php echo $item['readmore_text']; ?></a>
									<?php endif; ?>
								</div>
							</div>
							<?php
						}
					echo '</div>';
				}
				
				echo do_shortcode($output);
			echo '</div>';
		endif;
	}
	
	
	function enable(){
		if(tally_option($this->prefix.'enable') == 'on'){ return true; }
		else{ return false; }	
	}
}