(function($) {
	$.fn.McworkCacheSettings = function(options, cachestatus, elm) {
		var defaults = {
			url : '/mcwork/services/application/setcache',
		};
		var opts = $.extend({}, defaults, options);
		var datas = {
			cachekey : $(elm).attr('data-cachekey'),
			status : $(elm).attr('data-status'),
		};
		var parent = $(elm).parent();
		if ('off' == cachestatus) {
			var linkcontent = '<a href="#" class="cachesettings" data-cachekey="'+ datas.cachekey +'" data-status="on"><i class="fa fa-toggle-on fa-2x emerald-color"> </i></a>';
		} else {
			var linkcontent = '<a href="/mcwork/cache/set" class="cachesettings" data-cachekey="'+ datas.cachekey +'" data-status="off"><i class="fa fa-toggle-off fa-2x alizarin-color"> </i></a>';
		}
		$.ajax({
			url : opts.url,
			type : 'POST',
			data : datas,
			beforeSend : function() {
				$(parent).html(Mcwork.Icons.getprocess());
			},
			success : function(data) {
				var obj = jQuery.parseJSON(data);
				if (obj.error) {
					$(parent).html(Mcwork.Icons.getwarn());
					Mcwork.Modals.buildError(obj.error);
				} else {
					$(parent).html(linkcontent);
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				McworkPanelError(xhr, ajaxOptions, thrownError);
			}
		});
	};
})(jQuery);
$(document).ready(function() {
	$(document.body).on('click', '.cachesettings', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();
		$().McworkCacheSettings({}, $(this).attr('data-status'), this);		
	});
	$(document.body).on('click', '#cancel-button', function(ev) {
		$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
	});	
});