(function($) {
	"use strict";
	$('.tallykit_impoter_bootstrapguru_import').click(function(){
		
		var $import_true = confirm('are you sure to import dummy content ? it will overwrite the existing data');
        if($import_true == false) return;
		$('.tallykit_impoter_import_message').html(' Data is being imported please be patient, while the awesomeness is being created :)  <i class="fa fa-spinner fa-3x fa-spin">');
		
		
		
        var data = {
			'action': 'tallykit_impoter_demo_import',
			'target': 'xml_import'
        };
		var data2 = {
			'action': 'tallykit_impoter_demo_import',
			'target': 'widget_import'
        };
		var data3 = {
			'action': 'tallykit_impoter_demo_import',
			'target': 'setup_home'
        };
		var data4 = {
			'action': 'tallykit_impoter_demo_import',
			'target': 'setup_menu'
        };

      	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	   	$( ".tallykit_impoter_import_message1" ).css( "display", 'block' );
        $.post(ajaxurl, data, function(response) {
            $('.tallykit_impoter_import_message1').html('<div class="import_message_success">'+ response +'</div>');
        })
		.then( function( response ) {
			$( ".tallykit_impoter_import_message2" ).css( "display", 'block' );
			 $.post(ajaxurl, data2, function(response) {
				  $('.tallykit_impoter_import_message2').html('<div class="import_message_success">'+ response +'</div>');
			 });
		})
		.then( function( response ) {
			$( ".tallykit_impoter_import_message3" ).css( "display", 'block' );
			 $.post(ajaxurl, data3, function(response) {
				  $('.tallykit_impoter_import_message3').html('<div class="import_message_success">'+ response +'</div>');
			 });
		})
		.then( function( response ) {
			$( ".tallykit_impoter_import_message4" ).css( "display", 'block' );
			 $.post(ajaxurl, data4, function(response) {
				  $('.tallykit_impoter_import_message4').html('<div class="import_message_success">'+ response +'</div>');
			 });
		});
    });
})(jQuery);