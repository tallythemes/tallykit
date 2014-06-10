<?php $sections = get_post_meta($id, 'tallykit_parallax_sections', true); $i = 1; //print_r($sections) ?>
<?php if(is_array($sections) && !empty($sections)): ?>
	<?php foreach($sections as $section): ?>
    	<?php 
			$uclass = 'tallykit_parallax_section-'.$i;
		?>
        <style type="text/css">
			
			/*- Title area -*/
			<?php if($section['active_title'] == 'on'): ?>
				.<?php echo $uclass; ?> .tk_section_header{display:block; text-align:<?php echo $section['title_align']; ?>;	}
				.<?php echo $uclass; ?> .tk_section_header h2.tk_title span{color:<?php echo $section['title_color'] ?> !important; }
				.<?php echo $uclass; ?> .tk_section_header p.tk_subtitle span{color:<?php echo $section['title_color'] ?> !important; opacity: 0.9; }
			<?php endif; ?>
			
			/*- Content area -*/
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner{ width:96%; max-width:<?php echo $section['content_width']; ?>; margin:0 auto; }
			.<?php echo $uclass; ?> .tk_content{ text-align:<?php echo $section['content_align']; ?>; }
			<?php if($section['active_content_color'] == 'on'): ?>
				.<?php echo $uclass; ?> .tk_content *{ color:<?php echo $section['text_color']; ?> !important; }
				.<?php echo $uclass; ?> .tk_content h1,
				.<?php echo $uclass; ?> .tk_content h2,
				.<?php echo $uclass; ?> .tk_content h3,
				.<?php echo $uclass; ?> .tk_content h4,
				.<?php echo $uclass; ?> .tk_content h5,
				.<?php echo $uclass; ?> .tk_content h6{ color:<?php echo $section['heading_color']; ?> !important; }
				.<?php echo $uclass; ?> .tk_content a{ color:<?php echo $section['link_color']; ?> !important; }
				.<?php echo $uclass; ?> .tk_content a:hover{ color:<?php echo $section['link_hover_color']; ?> !important; }
			<?php endif; ?>
			
			
			/*- padding -*/
			<?php if($section['active_padding'] == 'on'): ?>
				.<?php echo $uclass; ?> .tallykit_parallax_section_inner{
					padding-top:<?php echo $section['padding_top']; ?>px; padding-bottom:<?php echo $section['padding_bottom']; ?>px; 
				}
			<?php endif; ?>
			
			/*- border -*/
			<?php if($section['active_border'] == 'on'): ?>
				.<?php echo $uclass; ?>{
					border-top:solid <?php echo $section['border_top']; ?>px <?php echo $section['border_color_top']; ?>; 
					border-bottom:solid <?php echo $section['border_bottom']; ?>px <?php echo $section['border_color_bottom']; ?>;
				}
			<?php endif; ?>
			
			
			/*- Background -*/
			<?php if(is_array($section['bg'])): ?>
				.<?php echo $uclass; ?>{
					<?php if(isset($section['bg']['background-attachment'])): ?>background-attachment:<?php echo $section['bg']['background-attachment'] ?>;<?php endif; ?>
					<?php if(isset($section['bg']['background-color'])): ?>background-color:<?php echo $section['bg']['background-color'] ?>;<?php endif; ?>
					<?php if(isset($section['bg']['background-image'])): ?>background-image:url(<?php echo $section['bg']['background-image'] ?>);<?php endif; ?>
					<?php if(isset($section['bg']['background-position'])): ?>background-position:<?php echo $section['bg']['background-position'] ?>;<?php endif; ?>
					<?php if(isset($section['bg']['background-repeat'])): ?>background-repeat:<?php echo $section['bg']['background-repeat'] ?>;<?php endif; ?>
					<?php if(isset($section['bg']['background-size'])): ?>background-size:<?php echo $section['bg']['background-size'] ?>;<?php endif; ?>
				}
			<?php endif; ?>
			
		</style>
    	<div class="tallykit_parallax_section <?php echo $uclass; ?>" id="<?php echo $section['section_id']; ?>">
        	<div class="tallykit_parallax_section_inner">
            	<?php if($section['active_title'] == 'on'): ?>
                	<div class="tk_section_header">	
						<?php if($section['title'] != ''): ?>
                            <h2 class="tk_title"><span><?php echo $section['title']; ?></span></h2>
                        <?php endif; ?>
                        <?php if($section['subtitle'] != ''): ?>
                            <p class="tk_subtitle"><span><?php echo $section['subtitle']; ?></span></p>
                        <?php endif; ?>
                        <span class="tk_bottomLine"></span>
                    </div>
                <?php endif; ?>
                
                <?php if($section['content'] != ''): ?>
                	<div class="tk_content"><?php echo $section['content']; ?></div>
				<?php endif; ?>
            </div>
        </div>
    <?php $i++; endforeach; ?>
<?php endif; ?>
