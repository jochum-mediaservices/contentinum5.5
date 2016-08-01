(function($) { 
	'use strict';
	$.extend($.fn, {
		
		ToogleElements : function(options){
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
	});	
})(jQuery);
$(document).ready(function() {
	'use strict';
	$('.toogleHcardElement').ToogleElements();
});