<?php $sections = get_post_meta($id, 'tallykit_parallax_sections', true); $i = 1; //print_r($sections) ?>
<?php if(is_array($sections) && !empty($sections)): ?>
	<?php foreach($sections as $section): ?>
    	<?php 
			$uclass = 'tallykit_parallax_section-'.$i;
		?>
        <style type="text/css">
			.<?php echo $uclass; ?>{
				padding-top:<?php echo $section['padding-top'] ?>px;
				padding-bottom:<?php echo $section['padding-bottom'] ?>px;
				border-top:solid <?php echo $section['border-top']?>px  <?php echo $section['border-top-color'] ?> !important;
				border-bottom:solid <?php echo $section['border-bottom'].'px '.$section['border-bottom-color'] ?> !important;
				background-color:<?php echo $section['background-color'] ?>;
				background-image:url(<?php echo $section['background-image'] ?>);
				background-attachment:<?php echo $section['background-attachment'] ?>;
				background-position:<?php echo $section['background-position'] ?>;
				background-repeat:<?php echo $section['background-repeat'] ?>;
			}
			
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner{
				width:100%;
				max-width:<?php echo $section['content-width']; ?>;
				margin:0 auto;
			}
			
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_title,
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_title span{
				text-align:<?php echo $section['align-title']; ?>;
				color:<?php echo $section['heading-color']; ?> !important;
			}
			
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_section_header{ text-align:<?php echo $section['align-title']; ?>; }
			
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_subtitle,
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_subtitle span{
				text-align:<?php echo $section['align-title']; ?>;
				color:<?php echo $section['heading-color']; ?> !important;
			}
			
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content{ text-align:<?php echo $section['align-content']; ?>; }
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content *{
				color:<?php echo $section['text-color']; ?> !important;
			}
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content h1,
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content h2,
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content h3,
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content h4,
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content h5,
			.<?php echo $uclass; ?> .tallykit_parallax_section_inner .tk_content h6{
				color:<?php echo $section['heading-color']; ?> !important;
			}
		</style>
    	<div class="tallykit_parallax_section <?php echo $uclass; ?>">
        	<div class="tallykit_parallax_section_inner">
            	<?php if($section['disable-title'] == 'no'): ?>
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
                
                <?php if(($section['content'] != 'n/a') || $section['content'] != ''): ?>
                	<div class="tk_content"><?php echo $section['content']; ?></div>
				<?php endif; ?>
            </div>
        </div>
    <?php $i++; endforeach; ?>
<?php endif; ?>
