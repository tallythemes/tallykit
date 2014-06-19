<?php
add_action('wp_head', 'tallykit_testimonial_colors');
function tallykit_testimonial_colors(){
?>
<style type="text/css">
.color_mood_light .tk_testimonial_item .tk_testimonial_item_content{  background:<?php tallykitkit_color('color_inner_bg_light'); ?>;  }
.color_mood_light .tk_testimonial_item .tk_testimonial_item_content{  border-color:<?php tallykitkit_color('color_border_light'); ?>;  }
.color_mood_light .tk_testimonial_item .tk_testimonial_arrow_wrap .tk_testimonial_arrow{background: <?php tallykitkit_color('color_inner_bg_light'); ?>;}
</style>
<?php	
}