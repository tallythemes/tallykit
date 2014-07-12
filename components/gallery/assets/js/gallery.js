jQuery(document).ready(function($){
	 $('.tallykit_single_gallery').magnificPopup({ 
	 	delegate: '.magnificPopup-child',
		type:'image',
	 	gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
	 });
});
