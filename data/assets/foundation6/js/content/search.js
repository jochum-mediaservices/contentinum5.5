$(document).ready(function() {
	if ($("#searchForm").length) {
	    $(document).on('click', '#searchbutton', function(ev) {
	    	ev.stopPropagation();
	    	ev.preventDefault();
	    	$().setDefaults({async : false});
	    	$().FormValidation($('#searchForm'));
	    });			
	}
});