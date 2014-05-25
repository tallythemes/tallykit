/* jQuery CounTo */
(function(a){a.fn.countTo=function(g){g=g||{};return a(this).each(function(){function e(a){a=b.formatter.call(h,a,b);f.html(a)}var b=a.extend({},a.fn.countTo.defaults,{from:a(this).data("from"),to:a(this).data("to"),speed:a(this).data("speed"),refreshInterval:a(this).data("refresh-interval"),decimals:a(this).data("decimals")},g),j=Math.ceil(b.speed/b.refreshInterval),l=(b.to-b.from)/j,h=this,f=a(this),k=0,c=b.from,d=f.data("countTo")||{};f.data("countTo",d);d.interval&&clearInterval(d.interval);d.interval=
setInterval(function(){c+=l;k++;e(c);"function"==typeof b.onUpdate&&b.onUpdate.call(h,c);k>=j&&(f.removeData("countTo"),clearInterval(d.interval),c=b.to,"function"==typeof b.onComplete&&b.onComplete.call(h,c))},b.refreshInterval);e(c)})};a.fn.countTo.defaults={from:0,to:0,speed:1E3,refreshInterval:100,decimals:0,formatter:function(a,e){return a.toFixed(e.decimals)},onUpdate:null,onComplete:null}})(jQuery);

jQuery(document).ready(function($){
	$(".tallykit-shortcode-accordion").accordion({heightStyle: "content"});
	$(".tallykit-shortcode-alert-close").click(function() { $( this ).parent( ".tallykit-shortcode-alert-block" ).hide( "slow"); });
	$(".tallykit-shortcode-tabs").tabs({
		fx: { opacity: 'toggle' },
		select: function(event, ui) {
			$(this).css('height', jQuery(this).height());
			$(this).css('overflow', 'hidden');
		},
		show: function(event, ui) {
			$(this).css('height', 'auto');
			$(this).css('overflow', 'visible');
		}	
	});
	
	$("h3.tallykit-shortcode-toggle-trigger").click(function(){$(this).toggleClass("active").next().slideToggle("fast");return false;});
	$('.tallykit-shortcode-tooltip').tooltip({track: true});
	
	$("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'fast', /* fast/slow/normal */
		slideshow: 5000, /* false OR interval time in ms */
		autoplay_slideshow: false, /* true/false */
		opacity: 0.80, /* Value between 0 and 1 */
		show_title: true, /* true/false */
		allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		default_width: 500,
		default_height: 344,
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		horizontal_padding: 20, /* The padding on each side of the picture */
		hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
		wmode: 'opaque', /* Set the flash wmode attribute */
		autoplay: true, /* Automatically start videos: True/False */
		modal: false, /* If set to true, only the close button will close the window */
		deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
		overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
		keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
		changepicturecallback: function(){}, /* Called everytime an item is shown/changed */
		callback: function(){}, /* Called when prettyPhoto is closed */
		ie6_fallback: true,
		custom_markup: '',
		social_tools: false /* html or false to disable */
	});
	
	if(jQuery().waypoint) {
		jQuery('.tallykit-shortcode-counterBox-wrapper').waypoint(function() {
			jQuery(this).find('.display-percentage').each(function() {
				var percentage = jQuery(this).data('percentage');
				jQuery(this).countTo({from: 0, to: percentage, speed: 300});
			});
		}, {
			triggerOnce: true,
			offset: '100%'
		});
	}
	
	if(jQuery().waypoint) {
		jQuery('.tallykit-shortcode-progressBar').waypoint(function() {
			var percentage = jQuery(this).find('.tallykit-shortcode-progressBar-content').data('percentage');
			jQuery(this).find('.tallykit-shortcode-progressBar-content').css('width', '0%');
			jQuery(this).find('.tallykit-shortcode-progressBar-content').animate({
				width: percentage+'%'
			}, 'slow');
		}, {
			triggerOnce: true,
			offset: '100%'
		});
	}
});