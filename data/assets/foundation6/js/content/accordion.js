$(document).ready(function() {
	if ($('.accordion').length){
		$('.accordion-title').on('click.zf.accordion', function() {
			//console.log($(this).attr('id'));
		    var containerPos = $(this).offset().top;
		    //var containerPos = $(this).parent().offset().top;
		    //console.log(containerPos);
		    $('html, body').animate({ scrollTop: containerPos }, 600);

		    
  		});
	}
});