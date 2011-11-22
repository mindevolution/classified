$(document).ready(function() {
	$("#Microjob_description").val($("#Microjob_description").attr('alt'));

	$('#Microjob_verifyCode, #Microjob_description').live('focus', function() {
		if($(this).val() == $(this).attr('alt')) 
			$(this).val('');
	})
	$('#Microjob_verifyCode, #Microjob_description').blur(function() {
		if($(this).val() == '') 
			$(this).val($(this).attr('alt'));
			
	});
})
