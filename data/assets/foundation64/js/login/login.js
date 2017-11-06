$(document).ready(function() {
	$('#username').focus().select();
	 $("#loginForm").validate({
		  submitHandler: function(form) {
		    form.submit();
		  }
     });	
});