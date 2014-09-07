jQuery(document).ready(function($) {
	jQuery('.fusion-animated').waypoint(function() {
		jQuery(this).css('visibility', 'visible');

		// this code is executed for each appeared element
		var animation_type = jQuery(this).data('animationtype');
		var animation_duration = jQuery(this).data('animationduration');

		jQuery(this).addClass('animated-	'+animation_type);

		if(animation_duration) {
			jQuery(this).css('-moz-animation-duration', animation_duration+'s');
			jQuery(this).css('-webkit-animation-duration', animation_duration+'s');
			jQuery(this).css('-ms-animation-duration', animation_duration+'s');
			jQuery(this).css('-o-animation-duration', animation_duration+'s');
			jQuery(this).css('animation-duration', animation_duration+'s');
		}
	},{ triggerOnce: true, offset: 'bottom-in-view' });
		
});