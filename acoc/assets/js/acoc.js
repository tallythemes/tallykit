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
	
	 $( ".wow" ).each(function() {
        if ($(this).attr('data-wow-center-offset')) {
            offset = windowHeight / 100 * $(this).attr('data-wow-center-offset');
        }
        else {
            offset = windowHeight * 0.25;
        }
        offset = offset + $(this).height() / 2;
      $(this).attr( "data-wow-offset", parseInt(offset) );
    });
});