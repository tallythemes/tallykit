<?php 
$slider_items = get_post_meta($id, 'tallykit_slideshow_slider_items', true ); 
$flexslider2 = new acoc_flexslider2_html(array(
	'animation'        => get_post_meta($id, 'tallykit_slideshow_animation', true ),
	'direction'        => get_post_meta($id, 'tallykit_slideshow_direction', true ),
	'slideshowSpeed'   => get_post_meta($id, 'tallykit_slideshow_slideshowSpeed', true ),
	'animationSpeed'   => get_post_meta($id, 'tallykit_slideshow_animationSpeed', true ),
	'controlNav'       => get_post_meta($id, 'tallykit_slideshow_controlNav', true ),
	'directionNav'     => get_post_meta($id, 'tallykit_slideshow_directionNav', true ),
	'prevText' => '',
	'nextText' => '',
));

//print_r($slider_items);

include(tallykit_slideshow_template_path('dri').'slideshow-style.php');
?>
<?php if(is_array($slider_items)): $i = 1; ?>    
    <div class="tallykit_slideshow">
        <div class="tallykit_slideshow_inner">
            <?php 
			$i = 1;
            $flexslider2->start();
                foreach($slider_items as $slider_item):
                    $flexslider2->in_loop_start();
                        echo '<div class="tallykit_slideshow_item '.$slider_item['type'].'" id="tallykit_slideshow_item_'.$i.'">';
                            echo '<div class="tallykit_slideshow_item_inner">';
                                include(tallykit_slideshow_template_path('dri').'_'.$slider_item['type'].'.php');
                            echo '</div>';
                        echo '</div>';
                    $flexslider2->in_loop_end();
                $i++; endforeach; 
            $flexslider2->end();
            ?>
        </div>
    </div>
<?php else: ?>
	No slider Item's found
<?php endif; ?>