$(document).ready(function() {
	if ($('.accordion').length){
		 $(document).foundation({
			  accordion: {
			    callback : function (el) {
			    var containerPos = $(el).parent().offset().top;
			      $('html, body').animate({ scrollTop: containerPos }, 600);
			    }
			  }
		});
	}
});