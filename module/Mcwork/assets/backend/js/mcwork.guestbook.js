$(document).ready(function() {
	$(document.body).on('change', '.validentry', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();
		var opts = {
			url : '/guestbook/entries/validate',
		};
		var orgin = location.href;
		var datas = {
			value : $(this).val(),
			ident : $(this).attr('data-ident'),
			entity : $(this).attr('data-entity'),
		};
		$.ajax({
			url : opts.url,
			type : 'POST',
			data : datas,
			beforeSend : function() {
				Mcwork.Modals.buildProcess(Mcwork.Language.translate('messages', 'serveraction'));
				$('#cancel-button').addClass('disabled');
			},				
			success : function(data) {
				Mcwork.Parameter.hasRemoveClass('#cancel-button','disabled');
				McworkPanelResult(data, orgin, 'html', true, true);				
			},
			error : function(xhr, ajaxOptions, thrownError) {
				McworkPanelError(xhr, ajaxOptions, thrownError);				
			}				
		});
		$(document.body).on('click', '#cancel-button', function(ev) {
			ev.preventDefault();
			ev.stopImmediatePropagation();
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});			
	});
});