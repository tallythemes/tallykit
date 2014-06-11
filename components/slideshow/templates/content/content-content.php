<div class="tk_content_holder">
	<h3 class="tk_title"><?php echo $sliter_item['title']; ?></h3>
    <div class="tk_content"><?php echo $sliter_item['content']; ?></div>
    <?php if($sliter_item['active_readmore'] == 'on'): ?>
		<a href="<?php echo $sliter_item['readmore_link']; ?>" class="tk_button"><?php echo $sliter_item['readmore_text']; ?></a>
	<?php endif; ?>
</div>