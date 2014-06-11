<?php 
$sliter_items = get_post_meta($id, 'tallykit_slideshow_slider_items', true ); 
$flexslider2 = new acoc_flexslider2_html(array(
	/*animation'        => $animation,
	direction'        => $direction,
	smoothHeight'     => $smooth_height,
	slideshow'        => $slideshow,
	animationLoop'    => $animation_loop,
	slideshowSpeed'   => $slideshow_speed,
	animationSpeed'   => $animation_speed,
	controlNav'       => $control_nav,
	directionNav'     => $direction_nav,*/
	
	'prevText' => '',
	'nextText' => '',
));
?>
<?php if(is_array($sliter_items)): $i = 1; ?>
	
    <style type="text/css">
		<?php foreach($sliter_items as $sliter_item): ?>
			#tallykit_slideshow_item_<?php echo $i; ?>{
				
			}
			#tallykit_slideshow_item_<?php echo $i; ?> .tk_video_only_warp .tk_video_holder .tk_the_video iframe { height:500px; }
		<?php $i++; endforeach; ?>
	</style>
    
    <div class="tallykit_slideshow">
        <div class="tallykit_slideshow_inner">
            <?php 
			$i = 1;
            $flexslider2->start();
                foreach($sliter_items as $sliter_item):
                    $flexslider2->in_loop_start();
                        echo '<div class="tallykit_slideshow_item '.$sliter_item['type'].'" id="tallykit_slideshow_item_'.$i.'">';
                            echo '<div class="tallykit_slideshow_item_inner">';
                                include(tallykit_slideshow_template_path('dri').'_'.$sliter_item['type'].'.php');
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