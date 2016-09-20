$(document).ready(function() {
	'use strict';
	$(document.body).on('click','.usersubscribe' , function(ev) {
		ev.preventDefault();
			$("html, body").animate({ scrollTop: 5 }, 600);
			$(this).hide();
			$.ajax({
				url : '/newsletter/public/usersubscribe',
				type : 'GET',
				dataType : 'html',
				success : function(data) {
					
					$('#orderform').html(data);
					
				    $("#mcworkForm").validate({
				    	submitHandler: function(form) {
				    		$().setDefaults({formIdent : false, formResultSelector : '#orderform'});
				    		$().FormHandler(form);
				    	}			 
				    });		
 
				}		
			});		
	});
	
  	

});