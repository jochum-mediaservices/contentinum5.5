$(document).ready(function() {
	'use strict';
	if ( $("#proposalcbform").length ){
			$.ajax({
				url : '/citizensbudget/public/userproposal',
				type : 'GET',
				dataType : 'html',
				beforeSend : function(){
					$(".server-process").html('<p class=""> <i class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"> </i></p>');
				},
				success : function(data) {
					$(".server-process").html('');
				    $('#proposalcbform').html(data);
					$("#mcworkForm").validate({
						submitHandler : function(form) {
							$().setDefaults({
								formIdent : false,
								formResultSelector : '#proposalcbform',
								bottonIdent : '#sendregister',
							});
							$().FormHandler(form);
						}
					});    
				}		
			});			
	}	
});