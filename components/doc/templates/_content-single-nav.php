<ul>
	<?php 
	if(is_array($entrys) && !empty($entrys)){
		foreach($entrys as $entry){ $i++;
			?>
            <li>
                <a href="<?php the_permalink(); ?>#tallykit_doc_<?php the_ID(); ?>_<?php echo $i; ?>">
                	<?php echo $i; ?>. <?php if( $entry['menu_title'] == '' ){ echo $entry['title']; }else{ echo $entry['menu_title']; }  ?>
                </a>
            </li>
            <?php
		}
	}
	$i = 0;
	?> 
</ul>
          