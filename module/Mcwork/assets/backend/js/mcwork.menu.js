(function($) {
	$.fn.McworkRemoveSubmenue = function(elm) {
		var opts = {
			ident : $(elm).attr('data-ident'),
			parent : $(elm).attr('data-parent'),
			dataaction : $(elm).attr('data-action'),
			entity : $(elm).attr('data-entity'),
		};
		var btn = {
			ident : $(elm).attr('data-ident'),
			label : $(elm).attr('data-label'),
			scope : $(elm).attr('data-scope'),
			pageident : $(elm).attr('data-pageident'),
			entity : $(elm).attr('data-entity'),
			groupname : $(elm).attr('data-groupname'),
		};
		var parent = $(elm).parent();
		var ul = $(parent).parent();
		$.ajax({
			url : '/mcwork/services/application/submenue',
			type : 'POST',
			data : opts,
			beforeSend : function() {
				$(elm).html(Mcwork.Icons.getprocess());
			},
			success : function(data) {
				var obj = jQuery.parseJSON(data);
				if (obj.error) {
					Mcwork.Modals.buildError(obj.error);
					$(elm).html('<i class="fa fa-minus"> </i>');
					$('#cancel-button').click(function(ev) {
						$(Mcwork.std_modal).foundation('reveal', 'close');
					});
				} else {
					var str = '<li><a class="button tiny addsubmenue" data-action="add" ';
					$.each(btn, function(key, value) {
						str += ' data-' + key + '="' + value + '" ';
					});
					str += ' href="#">';
					str += '<i class="fa fa-plus"> </i></a></li>';
					$(ul).html(str);
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				McworkPanelError(xhr, ajaxOptions, thrownError);
			}
		});
	};
})(jQuery);
(function($) {
	$.fn.McworkAddSubmenue = function(options, elm) {
		var opts = options;
		var element = elm;
		function getOption(key) {
			if (false === key) {
				return opts;
			}
			if (opts.hasOwnProperty(key)) {
				return opts[key];
			}
		}
		function getElement() {
			return element;
		}
		return {
			execute : function() {
				var option = getOption(false);
				var elm = getElement();
				var parent = $(elm).parent();
				$('#addsub-button').click(function(ev) {
					ev.preventDefault();
					option.headline = $('#submenueHeadline').val();
					$.ajax({
						url : '/mcwork/services/application/submenue',
						type : 'POST',
						data : opts,
						beforeSend : function() {
							$('#server-process').html(Mcwork.Icons.getprocess());
						},
						success : function(data) {
							var obj = jQuery.parseJSON(data);
							if (obj.error) {
								$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
								$('#modalcontent').html(Mcwork.Html.build('p', {
									'txt' : obj.error
								}));
							} else {
								$('#addsub-button').hide();
								Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));
								$('#modalhead').addClass(Mcwork.Colors.get(Mcwork.Colors.SUCCESS));
								$('#server-process').html(Mcwork.Icons.getsuccess());
								$('#modalcontent').html('<p>' + Mcwork.Language.translate('server', 'addsubmenuesuccess') + '</p>');
								$(parent).html('<a class="button tiny success" role="button" href="/mcwork/menue/category/' + obj.category + '"><i class="fa fa-pencil"> </i></a>');
							}
						},
						error : function(xhr, ajaxOptions, thrownError) {
							McworkPanelError(xhr, ajaxOptions, thrownError);
						}
					});
				});
			}
		};
	};
})(jQuery);
$(document).ready(function() {
	$(document.body).on('click', '.removesub', function(ev) {
		ev.preventDefault();
		$().McworkRemoveSubmenue(this);
		$(document.body).on('click', '#cancel-button', function(ev) {
			ev.preventDefault();
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});
	});
	$(document.body).on('click', '.addsubmenue', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();
		var opts = {
			ident : $(this).attr('data-ident'),
			label : $(this).attr('data-label'),
			scope : $(this).attr('data-scope'),
			page : $(this).attr('data-pageident'),
			entity : $(this).attr('data-entity'),
			groupname : $(this).attr('data-groupname'),
			dataaction : $(this).attr('data-action'),
		};
		$().McworkClientApplication({}, this, $().McworkAddSubmenue(opts, this));
	});
}); 