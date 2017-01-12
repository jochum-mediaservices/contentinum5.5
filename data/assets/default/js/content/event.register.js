$(document).ready(function() {
	'use strict';
	$(document.body).on('click','.mceventregister' , function(ev) {
		ev.preventDefault();
		
        var category = '';
	    if ( $(this).attr('data-dateident').length ) {
	    	category = '/' + $(this).attr('data-dateident') + '/' + $(this).attr('data-configident');
	    }		
		
		
			$("html, body").animate({ scrollTop: 5 }, 600);
			$(this).hide();
			$.ajax({
				url : '/mcevent/public/register' + category,
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