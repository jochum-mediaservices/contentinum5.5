(function($) {
	'use strict';
	$.extend($.fn, {
		EventNavigation : function(options){
			var defaults = {
				trigger : '.list-element-link',
				url : '/contentplugin',
				attribute : $(this).data(),
			}
			defaults = $.extend({}, defaults, options);	

			$(document.body).on('click', defaults.trigger, function(ev) {
				ev.preventDefault();
				defaults.url = '/contentplugin/' + $(this).attr('data-section');
				$.ajax({
					url : defaults.url,
					async: false, 
					type : 'POST',
					dataType : 'html',
					data : defaults.attribute,
					success : function(data) {
						$('#eventapp').html(data);					
					}		
				});

			});			
		},

	});
})(jQuery);
$(document).ready(function() {
	'use strict';
	$('#eventapp').EventNavigation({});

});