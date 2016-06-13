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