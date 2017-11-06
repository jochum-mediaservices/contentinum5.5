$(document).ready(function() {
	'use strict';
	$(document.body).on('click','.getusrfrm' , function(ev) {
		ev.preventDefault();
		var url = $(this).attr('data-url');
        var category = '';
	    if ( $(this).attr('data-configident').length ) {
	    	category = '/' + $(this).attr('data-configident');
	    }        
	    //if ( $(this).attr('data-dataident').length ) {
	    //	category += '/' + $(this).attr('data-dataident');
	    //}
		//$("html, body").animate({ scrollTop: 5 }, 600);
		$(this).hide();
		$.ajax({
			url : '/' + url + category,
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