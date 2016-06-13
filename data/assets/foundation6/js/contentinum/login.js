/*
$(document).ready(function() {
	$('#username').focus().select();
	$(document).on('click', '#submitlogin', function(ev) {
		ev.stopPropagation();
		ev.preventDefault();
		$().setDefaults({
			async : false
		});
		$().FormValidation($('#loginForm'));
	});
});
*/
$(document).ready(function() {
	$('#username').focus().select();
	if ($("#loginForm").length) {
	    $("#loginForm").validate({
	    	submitHandler: function(form) {
	    		$().setDefaults({async : false});
	    		$().FormHandler(form);
	    	}			 
	    });	
	}
});