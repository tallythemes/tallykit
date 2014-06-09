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
<?php if(is_array($sliter_items)): ?>
<div class="tallykit_slideshow">
	<div class="tallykit_slideshow_inner">
    	<?php 
		$flexslider2->start();
			foreach($sliter_items as $sliter_item): 
				$flexslider2->in_loop_start();
					include(tallykit_slideshow_template_path('dri').'_'.$sliter_item['type'].'.php');
				$flexslider2->in_loop_end();
			endforeach; 
		$flexslider2->end();
		?>
    </div>
</div>
<?php else: ?>
	No slider Item's found
<?php endif; ?>