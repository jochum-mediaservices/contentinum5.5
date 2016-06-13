$(document).ready(function() {
	$('.usrblocked').click(function(ev){
		ev.preventDefault();
		console.log('y');
		var options = {};
		var defaults = {
			url : '/mcwork/services/application/unlock',
		};
		var opts = $.extend({}, defaults, options);
		var datas = {
			ident : $(this).data('ident'),
		};
		var parent = $(this).parent();
		var unlockcontent = '<i class="fa fa-unlock fa-2x emerald-color"> </i>';
		$.ajax({
			url : opts.url,
			type : 'POST',
			data : datas,
			beforeSend : function() {
				$(parent).html( Mcwork.Icons.getprocess() );
			},				
			success : function(data) {
				var obj = jQuery.parseJSON(data);
				if (obj.error) {
					$(parent).html( Mcwork.Icons.getwarn() );
					Mcwork.Modals.buildError(obj.error);
				} else {
					$(parent).html(  unlockcontent  );
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
				Mcwork.Modals.buildError(msg);
			}				
		});	
	});	
});	