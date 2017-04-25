$(document).ready(function() {
	'use strict';
	if ( $("#orderform").length ){
		    var exturl = '/' + $('#orderform').attr('data-referer');
			$.ajax({
				url : '/municipal/public/antragwahlschein' + exturl,
				type : 'GET',
				dataType : 'html',
				beforeSend : function(){
					$(".server-process").html('<p class=""> <i class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"> </i></p>');
				},
				success : function(data) {
					$(".server-process").html('');
				    $('#orderform').html(data);
					$("#mcworkForm").validate({
						submitHandler : function(form) {
							$().setDefaults({
								formIdent : false,
								formResultSelector : '#orderform',
								bottonIdent : '#sendappform',
							});
							$().FormHandler(form);
						}
					});    
				}		
			});			
	}	
});