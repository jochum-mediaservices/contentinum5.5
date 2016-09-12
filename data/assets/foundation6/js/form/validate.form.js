$(document).ready(function() {
	if ($(".form-customer").length) {
	    $(".form-customer").validate({
	    	submitHandler: function(form) {
	    		$().setDefaults({formIdent : 'formident'});
	    		$().FormHandler(form);
	    	}			 
	    });	
	}
});