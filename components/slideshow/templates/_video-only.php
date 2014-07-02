<div class="tk_slideshow_video_only_warp">
	<a class="tk-slideshow-video-popup-link" href="#tk-slideshow-video-popup-<?php echo $i; ?>"><i class="fa fa-play-circle-o"></i></a>
    
    <div style="display:none">
        <div id="tk-slideshow-video-popup-<?php echo $i; ?>" class="tk-slideshow-video-popup">
            <?php echo wp_oembed_get($slider_item['video']); ?>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
    </div>
</div>