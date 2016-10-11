(function($) {
	'use strict';
	$.extend($.fn, {
		ToogleDescription : function(options){
			var defaults = {
				elm : $(this),
				class : '.' + $(this).attr('class'),
			};

			defaults = $.extend({}, defaults, options);	
			$(document).on('click', defaults.class, function(ev) {
				ev.stopPropagation();
				ev.preventDefault();
				var ident = $(this).data('ident');
				$("#" + ident).slideToggle("slow");
				if ($(this).children().hasClass('fa-plus')) {
					$(this).children().removeClass('fa-plus');
					$(this).children().addClass('fa-minus');
				} else if ($(this).children().hasClass('fa-minus')) {
					$(this).children().removeClass('fa-minus');
					$(this).children().addClass('fa-plus');
				}
			});			
		},
		
		LoadFurtherEntries : function(options){
			
			var defaults = {
				trigger : '#',
				url : '/contentplugin',
				attribute : $(this).data(),
			};
			defaults = $.extend({}, defaults, options);	
			
			console.log($( "#pagination > li.next" ));
		},		
		
	});
})(jQuery);
$(document).ready(function() {
	'use strict';
	//$('#pagination').css('display', 'none');
    Waves.attach('.btn-floating', ['waves-effect ']);
    Waves.init();	
    
	$().ScrollEvent({
	    listItem: '.hcard-wrapper',
	    listContainer: '#municipal-directories',
	    nextMarker: '.next',
	    dataUrl : 'data-url',
	    pagination: '#pagination',
	    delay: 600,
	    negativeMargin: 10
	});    
	//$('#pagination').LoadFurtherEntries();
	$(document.body).on('click', '.addcontent', function(ev) {
		ev.preventDefault();
		console.log('click');
	});	
	$('.toogleHcardElement').ToogleDescription();
});