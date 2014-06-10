jQuery(document).ready(function($) {	
	if( $("select#tallykit_parallax_active option[selected=\"selected\"]").val() == 'yes'){
		$("#postdivrich").css({'display':'none'});
	}
});