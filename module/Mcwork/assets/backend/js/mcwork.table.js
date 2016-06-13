(function($) {
	$.fn.McworkTableContent = function(elm, opts) {
		var tableElement = 'addTblContent';

		$.ajax({
			async : false,
			cache : false,
			dataType : "html",
			url : opts.url,
			type : 'get',
			success : function(data) {
				$('#' + tableElement).html(data);
			}
		});
	};

})(jQuery);
(function($) {
	$.fn.McworkDataSet = function(elm, app) {
		var opts = {
			url : '/mcwork/services/application/chown'
		};
		function setOptions(options) {
			opts = options;
		}
		function getOptions() {
			return opts;
		}
		function addOption(key, value) {
			opts[key] = value;
		}
		function getOption(key) {
			if (opts.hasOwnProperty(key)) {
				return opts[key];
			} else {
				return false;
			}
		}
		return {
			execute : function(appoptions) {
				setOptions(appoptions);
				var orgin = location.href;
				var roleelm = getOption('element');
				
				if ( roleelm.hasOwnProperty('role') && 'admin' != roleelm.role ){
					$('#save-button').addClass('disabled').remove();
				} else {
					$('#save-button').click(function(ev) {
						ev.preventDefault();
						var error = false;
						var someForm = $('#data-set-info');
						var formDatas = {};
						formDatas['ident'] = getOption('ident');
						$.each(someForm[0].elements, function(index, elm) {
							formDatas[$(elm).attr('name')] = $(elm).val();
						});					
						var senddata = {};
						senddata.data = formDatas;
						senddata.app = getOption('element');
						$.ajax({
							url : getOption('url'),
							type : 'POST',
							data : senddata,
							beforeSend : function() {
								$('#server-process').html(Mcwork.Icons.getprocess());
							},
							success : function(data) {
								var obj = jQuery.parseJSON(data);
								if (obj.error) {
									$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
									$('#modalcontent').html(Mcwork.HTML.build('p', {
										'txt' : obj.error
									}));
								} else {
									$('#save-button').hide();
									Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));
									$('#modalhead').addClass(Mcwork.Colors.get(Mcwork.Colors.SUCCESS));
									$('#server-process').html(Mcwork.Icons.getsuccess());
									$('#modalcontent').html('<p>' + Mcwork.Language.translate('messages', 'serversuccess') + '</p>');
									var datatable = $().McworkDatatableRequest(orgin,'html');
									datatable.execute({'prep': '1'});								
								}
							},
							error : function(xhr, ajaxOptions, thrownError) {
								var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
								$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
								$('#modalcontent').html(Mcwork.HTML.build('p', {
									'txt' : msg
								}));
							}
						});
					});
				}
			}
		};
	};
})(jQuery);
(function($) {
	$.fn.McworkPublish = function(options, publishstatus, elm) {
		var defaults = {
			url : '/mcwork/services/application/publishitem',
		};
		var opts = $.extend({}, defaults, options);
		var datas = {
			categoryname : $(elm).attr('data-categoryname'),
			ident : $(elm).attr('data-ident'),
		};
		var parent = $(elm).parent();
		var link = {
			'class' : publishstatus,
			'data-ident' : datas.ident,
			'data-categoryname' : datas.categoryname,
			'href' : '#',
		};
		var cache = $(elm).attr('data-cache');
		if(typeof cache !== typeof undefined){
			datas.cachkey = cache;
			link['data-cache'] = cache;
		}
		if ('unpublish' == publishstatus) {
			var linkcontent = '<i class="fa fa-toggle-on fa-2x emerald-color"> </i>';
		} else {
			var linkcontent = '<i class="fa fa-toggle-off fa-2x alizarin-color"> </i>';
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
					$(parent).html(Mcwork.HTML.block('a', {
						'txt' : linkcontent
					}, link));
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				McworkPanelError(xhr, ajaxOptions, thrownError);
			}
		});
	};
})(jQuery);
(function($) {
	$.fn.McworkChangeRang = function(options,move){
		var defaults = {
			url : '/mcwork/services/application/rang',
		};
		var opts = $.extend({}, defaults, options);
		var orgin = location.href;
		var datas = {
			newrang : 0,
			group : $(this).attr('data-group'),
			groupname : $(this).attr('data-groupname'),
			category : $(this).attr('data-category'),
			current : $(this).attr('data-rang'),
			categoryname : $(this).attr('data-categoryname'),
			entity : $(this).attr('data-entity'),
			datamove : $(this).attr('data-move'),
		};
		var cache = $(this).attr('data-cache');
		if(typeof cache !== typeof undefined){
			datas.cachkey = cache;
		}		
		if ('jump' == move){
			datas.newrang = $(this).val();
		}
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
	};
})(jQuery);
$(document).ready(function() {
	
	$(document.body).on('click', '.publish', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();
		$().McworkPublish({}, 'unpublish', this);
	});

	$(document.body).on('click', '.unpublish', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();
		$().McworkPublish({}, 'publish', this);
	});
	
	$(document.body).on('change', '.changerang', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();
		$(this).McworkChangeRang({},'jump');
	});
	
	$(document.body).on('click', '.moveitem', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();
		$(this).McworkChangeRang({},'move');
	});		

	$(document.body).on('click', '.infotip', function(ev) {	
		ev.preventDefault();
		$().McworkClientApplication({}, this, $().McworkDataSet(this, $(this).data()));
	});

	$(document.body).on('click', '.deleteitem', function(ev) {		
		ev.preventDefault();
		var currentLocation = window.location;
		var href = $(this).attr('href');
		var usrmsg = $(this).attr('data-msg');
		if(typeof usrmsg === typeof undefined){
			var usrmsg = 'confirm_delete';
		}
		var row = $('#' + $(this).attr('data-ident'));
        $(row).prop('checked', true);

		var message = Mcwork.Language.translate('usr', usrmsg);
		Mcwork.Modals.buildConfirm(message.replace('%1', ' <em>[' + $(this).attr('data-name') + ']</em> '));

		$('#confirm-button').click(function(ev) {
			ev.preventDefault();
			$('#confirm-button').hide();
			$('#cancel-button').addClass('disabled');
			$('#modalhead').html(Mcwork.Language.translate('heads', 'serverprocess') + ' <span id="server-process">' + Mcwork.Icons.getprocess() + '</span>');
			var response = Mcwork.Server.request({
				url : href,
				type : 'GET'
			});
			$(row).prop('checked', false);
			$('#cancel-button').removeClass('disabled');
			$('#cancel-button').html(Mcwork.Language.translate('btn', 'close'));
			if (true === McworkPanelResult(response,false,false,false,false)){
				var parentElm = $(row).parents('td');
				$(parentElm).parents('tr').fadeOut(function() {
					$(parentElm).remove();
				});
			}
		});

		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			Mcwork.Parameter.unsetDomElement();
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});

	});
	
	$(document.body).on('click', '.removeitem', function(ev) {		
		ev.preventDefault();
		var currentLocation = window.location;
		var href = $(this).attr('href');
		var row = $('#' + $(this).attr('data-ident'));
        $(row).prop('checked', true);		

		var message = Mcwork.Language.translate('usr', 'confirm_remove');
		Mcwork.Modals.buildConfirm(message.replace('%1', ' <em>[' + $(this).attr('data-name') + ']</em> '));

		$('#confirm-button').click(function(ev) {
			ev.preventDefault();
			$('#confirm-button').hide();
			$('#cancel-button').addClass('disabled');
			$('#modalhead').html(Mcwork.Language.translate('heads', 'serverprocess') + ' <span id="server-process">' + Mcwork.Icons.getprocess() + '</span>');
			var response = Mcwork.Server.request({
				url : href,
				type : 'GET'
			});
			$('#cancel-button').removeClass('disabled');
			$('#cancel-button').html(Mcwork.Language.translate('btn', 'close'));
			if (true === McworkPanelResult(response,false,false,false,false)){
				var parentElm = $(row).parents('td');
				$(parentElm).parents('tr').fadeOut(function() {
					$(parentElm).remove();
				});
			}
		});

		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			Mcwork.Parameter.unsetDomElement();
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});

	});	

	$(document.body).on('click', '#btnTblEdit', function(ev) {	
		ev.preventDefault();		
		if (Mcwork.Tables.isTableRowSelected() === true) {
			var location = $(this).attr('href');
			var category = $(this).attr('data-category');
			var value = false;
			var table = $('.table');
			var ch = table.find('tbody input:checkbox:checked');
			ch.each(function() {
				value = $(this).val();
				return;
			});
			if (false !== value) {
				if ( typeof category !== 'undefined') {
					value += '/' + category;
				}
				window.location.href = location + '/' + value;
			} else {
				Mcwork.Modals.buildError(Mcwork.Language.translate('errors', 'noidentexists'));
				return false;
			}

		}
		$(document.body).on('click', '#cancel-button', function(ev) {
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});
	});

	$(document.body).on('click', '#btnTblDelete', function(ev) {		
		ev.preventDefault();
		if (Mcwork.Tables.isTableRowSelected() === true) {
			var currentLocation = window.location;
			var href = $(this).attr('href');

			var table = $('.table');
			var dataname = '';
			var ch = table.find('tbody input:checkbox:checked');
			ch.each(function() {
				if (dataname.length > 1) {
					dataname += ', ';
				}
				dataname += $(this).data('name');
			});

			var message = Mcwork.Language.translate('usr', 'confirm_delete');
			Mcwork.Modals.buildConfirm(message.replace('%1', ' die folgenden markierten Eintr&auml;ge: <em>[ ' + dataname + ' ]</em> '));

			$('#confirm-button').click(function(ev) {
				ev.preventDefault();
				$('#confirm-button').hide();
				$('#cancel-button').addClass('disabled');
				$('#modalhead').html(Mcwork.Language.translate('heads', 'serverprocess') + ' <span id="server-process">' + Mcwork.Icons.getprocess() + '</span>');
				var response;
				ch.each(function() {
					response = {};
					response = Mcwork.Server.request({
						url : href + '/' + $(this).val(),
						type : 'GET'
					});
					var parentElm = $(this).parents('td');
					$(parentElm).parents('tr').fadeOut(function() {
						$(parentElm).remove();
					});
				});
				$('#cancel-button').removeClass('disabled');
				$('#cancel-button').html(Mcwork.Language.translate('btn', 'close'));
				McworkPanelResult(response,false,false,false,false);				
			});

			$('#cancel-button').click(function(ev) {
				ev.preventDefault();
				Mcwork.Parameter.unsetDomElement();
				$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
			});
		}
		$(document.body).on('click', '#cancel-button', function(ev) {
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});
	});

});