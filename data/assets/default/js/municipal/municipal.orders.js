

$(document).ready(function() {
	'use strict';
	$(document.body).on('click', '.settrashorder', function(ev) {
		ev.preventDefault();
            var category = '';
		    if ( $(this).attr('data-dateident').length ) {
		    	category = '/' + $(this).attr('data-dateident');
		    }
				
			$("html, body").animate({ scrollTop: 5 }, 600);
		
			$.ajax({
				url : '/municipal/public/orders' + category,
				type : 'GET',
				dataType : 'html',
				success : function(data) {
					$('#orderform').html(data).append('<input id="sendantrag" type="submit" value="Antrag absenden" class="button expand submitthisform" name="send">');	

				    $(document.body).on('click', '#enableAddress', function(ev) {
				    	if ( 1 == $( '#enableAddress' ).val( ) ){
				    		$( '#enableAddress' ).val(0);
				    		$("#enableAddress").removeAttr('checked');
				    	} else {
				    		$( '#enableAddress' ).val(1);
				    		$("#enableAddress").attr('checked', 'checked');
				    	}
				    	
				    	$('#fieldsetAbweichendePost').toggle();
				    });

				    $("#mcworkForm").validate({
				    	submitHandler: function(form) {
				    		$().setDefaults({formIdent : false, formResultSelector : '#orderform'});
				    		$().FormHandler(form);
				    	}			 
				    });					    
					$(document.body).on('click', '#sendantrag', function(ev) {
						ev.preventDefault();
						ev.stopPropagation();
						$("#mcworkForm").submit();
						$("html, body").animate({ scrollTop: 2 }, 600);					
					});	    
				}		
			});		
	});

});