<div class="tk-shortcode-blog-grid-item">
	<div class="tk-shortcode-blog-image">
		<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(); ?>">
			<img width="634" height="357" src="<?php echo acoc_post_thumbnail(array( 'w' => '634', 'h' => '357')); ?>" alt="<?php the_title(); ?>">
		</a>
	</div>
	<div class="tk-shortcode-blog-content">
		<h5 class="tk-shortcode-blog-title"><a href="<?php the_permalink(); ?>" target="_self" title=""><?php the_title(); ?></a></h5>
		<p class="tk-shortcode-blog-text"><?php echo acoc_max_charlength(120); ?></p>
	</div>
    <div class="tk-shortcode-blog-info"><span class="time"><?php the_date(); ?></span> / <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
</div>