jQuery(document).ready(function($) {
	// Target your .container, .wrapper, .post, etc.
	$(".tallykit_slideshow .tk_slideshow_the_video").fitVids();
	$(".tk-slideshow-video-popup").fitVids();
	
	$('.tk-slideshow-video-popup-link').magnificPopup({type:'inline'});
});