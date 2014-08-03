<div class="tk_doc_entry" id="tallykit_doc_<?php the_ID(); ?>_<?php echo $i; ?>">
	<div class="tk_doc_entry_inner">
		<h2 class="tk_doc_title">
			<?php echo $entry['title']; ?>
        	<a href="<?php the_permalink(); ?>#tallykit_doc_<?php the_ID(); ?>_<?php echo $i; ?>"><i class="dashicons dashicons-format-links"></i></a>
        </h2>
		<div class="tk_doc_con">
			<?php echo do_shortcode($entry['content']); ?>
		</div>
        <a href="#tallykit_doc_single" class="tk_doc_backtotop">Back to Top <i class="dashicons dashicons-arrow-up-alt"></i></a>
	</div>
</div>