<?php $entrys = get_post_meta(get_the_ID(), 'tallykit_doc_contents', true); $i = 0; ?>
<div class="tallykit_doc_single" id="tallykit_doc_single">
	<?php echo apply_filters('tallykit_doc_the_content', get_the_content()); ?>
    <div class="clear"></div>
    <div class="tk_doc_content">
    	 <div class="tk_doc_content_inner">
    		<?php 
			if(is_array($entrys) && !empty($entrys)){
				foreach($entrys as $entry){ $i++;
					include(tallykit_doc_template_path('dri', '_content-single-entry.php'));
				}
			}
			$i = 0;
			?>    
    	</div>
    </div>
  
	<div class="tk_doc_side_nav">
		<div class="tk_doc_side_nav_inner">
			<?php include(tallykit_doc_template_path('dri', '_content-single-nav.php')); ?>
		</div>
	</div>
    
</div>