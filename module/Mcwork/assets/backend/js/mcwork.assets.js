(function($) {
	$.fn.McworkAssetCopy = function(app, elm, type) {
		var opts = {};

		function setOptions(options) {
			opts = options;
		}

		function getOptions() {
			return opts;
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
				$('#save-button').click(function(ev) {
					ev.preventDefault();
					var error = false;
					var someForm = $('#appedit');
					var formDatas = {};
					$.each(someForm[0].elements, function(index, elm) {
						formDatas[$(elm).attr('name')] = $(elm).val();
						Mcwork.Validation.unmarkErrorFields($(elm).attr('name'));
						if (elm.getAttribute('required') !== null && ($(elm).val() == '')) {
							error = true;
							Mcwork.Validation.markErrorField($(elm).attr('name'), Mcwork.Language.translate('usr', 'requiredentry'));
						}
					});
					formDatas['ident'] = appoptions.ident;
					if (appoptions.element.hasOwnProperty('current')) {
						formDatas['current'] = appoptions.element.current;
					}
					if (false === error) {
						if ('ajax' === getOption('method')) {
							var senddata = {};
							senddata.data = formDatas;
							senddata.app = getOption('app');
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
										$('#save-button').addClass('disabled');
										$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
										$('#modalcontent').html('<p class="alizarin-color">' + Mcwork.Language.translate('server', obj.error) + '</p>');
									} else if (obj.warn) {
										$('#save-button').addClass('disabled');
										$('#modalhead').html(Mcwork.Language.translate('warn', 'server') + ' ' + Mcwork.Icons.getwarn());
										$('#modalcontent').html('<p class="pumpkim-color">' + Mcwork.Language.translate('server', obj.warn) + '</p>');
									} else {
										$('#save-button').hide();
										Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));
										$('#modalhead').addClass(Mcwork.Colors.get(Mcwork.Colors.SUCCESS));
										$('#server-process').html(Mcwork.Icons.getsuccess());
										$('#modalcontent').html('<p class="emerald-color">' + Mcwork.Language.translate('messages', 'serversuccess') + '</p>');
									}

								},
								error : function(xhr, ajaxOptions, thrownError) {
									var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
									$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
									$('#modalcontent').html(Mcwork.HTML.block('p', {
										'txt' : msg
									}));
								}
							});
						}
					}
				});

			}
		};
	};
})(jQuery);



$(document).ready(function() {
	
	$('.copyassetfiles').click(function(ev) {
		ev.preventDefault();
		$().McworkClientApplication({}, this, $().McworkAssetCopy());
	});

	$('.copyassetfile').click(function(ev) {
		ev.preventDefault();
		$().McworkClientApplication({}, this, $().McworkAssetCopy());
	});	
	
	$('.assetcollection').click(function(ev) {
		ev.preventDefault();
		$().McworkClientApplication({}, this, $().McworkAssetCollection());
	});
	
	$('.copycollectionfile').click(function(ev) {
		ev.preventDefault();
		$().McworkClientApplication({}, this, $().McworkApplication());
	});	
	
	$(document.body).on('click', '.deleteassetfile', function(ev) {		
		ev.preventDefault();
		var row = $('#' + $(this).attr('data-ident'));
        $(row).prop('checked', true);
        var datas = $(this).data();
        datas.url = $(this).attr('href');
		$().McworkRemoveFiles(this, datas);
	});
	
	$('#btnDelAssetCache').click(function(ev) {
		ev.preventDefault();
        var datas = $(this).data();
        datas.url = $(this).attr('href');
		$().McworkRemoveFiles(this, datas);		
	});
	
	
	$(document.body).on('click','.assetsettings', function(ev) {
		ev.preventDefault();
		var senddatas = $(this).data();
		console.log(senddatas);
		$(this).html('<i class="fa fa-2x fa-spin fa-spinner emerald-color" aria-hidden="true"> </i>');
    	var response = Mcwork.Server.request({
			url : '/mcwork/services/application/configuration',
			type : 'POST',
			data : senddatas,
		});
        if (response.hasOwnProperty('success')) {
			var datatable = $().McworkDatatableRequest(location.href,'html');
			datatable.execute({'prep': '1'});	 
		} else {      
	        $(this).html('<i class="fa fa-2x fa-exclamation-triangle alizarin-color" aria-hidden="true"> </i>');	
	        if (response.hasOwnProperty('error')) {
	        	alert( Mcwork.Language.translate('server', response.error));
	        } else {
	        	alert('Unbekannter Fehler!');
	        }
		} 		
	});
	
});