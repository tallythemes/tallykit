<div class="tk_slideshow_content_holder">
	<h3 class="tk_slideshow_title"><?php echo $slider_item['title']; ?></h3>
    <div class="tk_slideshow_content"><?php echo $slider_item['content']; ?></div>
    <?php if($slider_item['active_readmore'] == 'on'): ?>
		<a href="<?php echo $slider_item['readmore_link']; ?>" class="tk_slideshow_button"><?php echo $slider_item['readmore_text']; ?></a>
	<?php endif; ?>
</div>