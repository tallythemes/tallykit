jQuery(document).ready(function($) {
	var wow = new WOW(
	  {
		boxClass:     'wow',      // animated element css class (default is wow)
		animateClass: 'animated', // animation css class (default is animated)
		offset:       '0',          // distance to the element when triggering the animation (default is 0)
		mobile:       true,       // trigger animations on mobile devices (default is true)
		live:         true        // act on asynchronously loaded content (default is true)
	  }
	);
	wow.init();
	

	if(jQuery().magnificPopup){
		$('.acoc-magnificPopup-image').magnificPopup({type:'image'});
		$('.acoc-magnificPopup-iframe').magnificPopup({type:'iframe'});
		$('.acoc-magnificPopup-image-group').magnificPopup({ 
			delegate: '.acoc-magnificPopup-child',
			type:'image',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
		});
	}
});