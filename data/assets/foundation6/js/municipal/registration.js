$(document).ready(function() {
	'use strict';
	if ( $("#registrationform").length ){
			$.ajax({
				url : '/municipal/public/register',
				type : 'GET',
				dataType : 'html',
				beforeSend : function(){
					$(".server-process").html('<p class=""> <i class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"> </i></p>');
				},
				success : function(data) {
					$(".server-process").html('');
					$('#registrationform').html(data).append('<input id="sendregister" type="submit" value="Registrierung absenden" class="button expand submitthisform" name="send">');	


				    $("#mcworkForm").validate({
				    	submitHandler: function(form) {
				    		$().setDefaults({formIdent : false, formResultSelector : '#registrationform'});
				    		$().FormHandler(form);
				    	}			 
				    });					    
					$(document.body).on('click', '#sendregister', function(ev) {
						ev.preventDefault();
						ev.stopPropagation();
						$("#mcworkForm").submit();				
					});	    
				}		
			});				
	}
});