$(document).ready(function() {
	  $('.initmodal').click(function(ev) {
	  	  	ev.preventDefault();
	  	  	switch($(this).attr('data-reveal-id')){
	  	  		case 'recomendModal':
	  	  		$('body').append('<div id="recomendModal" class="reveal-modal" data-reveal="" data-reveal-ajax="true"> </div>');
	  	  		$('#recomendModal').foundation('reveal', 'open', $(this).attr('href'));  	  	
				    $(document).on('click', '#sendbutton', function(ev) {
				    	ev.stopPropagation();
				    	ev.preventDefault();
				    	$().setDefaults({formIdent : false});
				    	$().FormValidation($('#recommendForm'));
				    });
		  	  		break;
		  	  	default:
		  	  		break;
	  	  	}
	  });
});