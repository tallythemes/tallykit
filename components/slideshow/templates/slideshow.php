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
?>
<?php if(is_array($slider_items)): $i = 1; ?>    
    <div class="tallykit_slideshow">
        <div class="tallykit_slideshow_inner">
            <?php 
			$i = 1;
            $flexslider2->start();
                foreach($slider_items as $slider_item):
					$css_style = '';
					$css_style_inner = '';
					if(get_post_meta($id, 'tallykit_slideshow_h', true ) != ''):
						$css_style .= 'height:'.get_post_meta($id, 'tallykit_slideshow_h', true ).'; ';
					endif;
					if(is_array($slider_item['bg'])):
					 	if(isset($slider_item['bg']['background-attachment'])){ $css_style .= 'background-attachment:'.$slider_item['bg']['background-attachment'].'; '; }
						if(isset($slider_item['bg']['background-color'])){ $css_style .= 'background-color:'.$slider_item['bg']['background-color'].'; '; }
						if(isset($slider_item['bg']['background-image'])){ $css_style .= 'background-image:url('.$slider_item['bg']['background-image'].'); '; }
						if(isset($slider_item['bg']['background-position'])){ $css_style .= 'background-position:'.$slider_item['bg']['background-position'].'; '; }
						if(isset($slider_item['bg']['background-repeat'])){ $css_style .= 'background-repeat:'.$slider_item['bg']['background-repeat'].'; '; }
						if(isset($slider_item['bg']['background-size'])){ $css_style .= 'background-size:'.$slider_item['bg']['background-size'].'; '; }
					endif;
					if($slider_item['active_padding'] == 'on'):
						if($slider_item['padding_top'] != ''){ $css_style_inner .= 'padding-top:'.$slider_item['padding_top'].'px; '; }
						if($slider_item['padding_bottom'] != ''){ $css_style_inner .= 'padding-bottom:'.$slider_item['padding_bottom'].'px; '; }
					endif;
					if($slider_item['content_width'] != ''):
						$css_style_inner .= ' max-width:'.$slider_item['content_width'].'; ';
					endif;
                    $flexslider2->in_loop_start();
                        echo '<div class="tallykit_slideshow_item '.$slider_item['type'].' color_mood_'.$slider_item['color_mood'].'" style="'.$css_style.'">';
                            echo '<div class="tallykit_slideshow_item_inner" style="'.$css_style_inner.'">';
                                include(tallykit_slideshow_template_path('dri', '_'.$slider_item['type'].'.php'));
                            echo '</div>';
                        echo '</div>';
                    $flexslider2->in_loop_end();
                $i++; endforeach; 
            $flexslider2->end();
            ?>
        </div>
    </div>
<?php else: ?>
	<?php _e('No slider Item\'s found', 'tallykit_textdomain'); ?>
<?php endif; ?>