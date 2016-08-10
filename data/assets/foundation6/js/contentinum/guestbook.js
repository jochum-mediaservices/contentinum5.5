$(document).ready(function() {
	'use strict';
	$(document.body).on('click','.guestbookentry' , function(ev) {
		ev.preventDefault();
			$("html, body").animate({ scrollTop: 5 }, 600);
			$(this).hide();
			$.ajax({
				url : '/guestbook/public/entry',
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
				    /*			    
					$(document.body).on('click', '#sendantrag', function(ev) {
						ev.preventDefault();
						ev.stopPropagation();
						$("#mcworkForm").submit();
						$("html, body").animate({ scrollTop: 2 }, 600);					
					});	 */   
				}		
			});		
	});

});