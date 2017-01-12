$(document).ready(function() {
	'use strict';
	if ( $("#registrationcbform").length ){
			$.ajax({
				url : '/citizensbudget/public/registerusers',
				type : 'GET',
				dataType : 'html',
				beforeSend : function(){
					$(".server-process").html('<p class=""> <i class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"> </i></p>');
				},
				success : function(data) {
					$(".server-process").html('');
				    $('#registrationcbform').html(data);
					$("#mcworkForm").validate({
						submitHandler : function(form) {
							$().setDefaults({
								formIdent : false,
								formResultSelector : '#registrationcbform',
								bottonIdent : '#sendregister',
							});
							$().FormHandler(form);
						}
					});    
				}		
			});			
	}	
});