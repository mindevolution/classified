$(document).ready(function() {
//	$('#Microjob_verifyCode').live('focus', function() {$(this).val('')});
	$('#Microjob_verifyCode').focus(function() {
		if($(this).val() == $(this).attr('alt')) 
			$(this).val('');
	});
	$('#Microjob_verifyCode').blur(function() {
		if($(this).val() == '') 
			$(this).val($(this).attr('alt'));
			
	});
})
