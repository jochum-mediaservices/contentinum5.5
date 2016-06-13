McworkDropzone = (function(options){
	function getMaxFileSize()
	{
		var result = Mcwork.Server.request({url : '/mcwork/services/application/configure', data : { service : 'mcwork_upload_max_file_size' }});
		if (result.hasOwnProperty('maxfilesize')){
			return result['maxfilesize'];
		} else if (result.hasOwnProperty('inivalue')){
			return result['inivalue'];
		} else {
			return 2;
		}
	}
	function getAllowedUploads()
	{
		var result = Mcwork.Server.request({url : '/mcwork/services/application/configure', data : { service : 'mcwork_allowed_upload_files' }});
		if (result.hasOwnProperty('files')){
			return result['files'].join();
		} else {
			return 'jpg';
		}
	}
	return {
		execute : function(){
			var orgin = location.href;		
			$('#currentuploadpath').val( $('#currentpath').val() );		
			var mcworkDropzone = new Dropzone("form#contentinumUpload", {
				url : '/mcwork/files/multipleupload',
				dictDefaultMessage : "Datei auswaehlen",	
				maxFilesize : getMaxFileSize(),
				//acceptedFiles : getAllowedUploads(),	
				addRemoveLinks : true,
				uploadMultiple : true,
				data : {'test' : 'testvalue'},
				init : function() {	
					this.on("processingmultiple", function(files, message, xhr) {
						$('#server-process').html(   Mcwork.Icons.getprocess()   );
						Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.SUCCESS );
						$('#modalhead').addClass( Mcwork.Colors.WARN );
						Mcwork.Parameter.hasRemoveClass('#cancel-button', 'success');
						$('#cancel-button').addClass('disabled');
					}), this.on("errormultiple", function(files, message, xhr) {
						$('#server-process').html( Mcwork.Icons.getwarn() ) ;
					}), this.on("successmultiple", function(files, response) {
						response = jQuery.parseJSON(response);
						if (response.servererror) {
							$('#server-process').html( Mcwork.Icons.getwarn() ) ;
							$().html('<p>' + Mcwork.Language.translate('server', response.servererror) + '</p>');
						} else {
							$.each(files, function(index, file) {
								var uploaded = {};
								if (response.hasOwnProperty(file.name)) {
									uploaded.name = response[file.name].filename;
									uploaded.size = file.size;
									uploaded.label = Mcwork.Icons.geticon(Mcwork.Icons.UPLOAD); // + ' ' + uploaded.name;
									//$(".table > tbody").prepend('<tr><td>' + uploaded.label + '</td><td>' + uploaded.name + '</td><td>' + Math.ceil(uploaded.size / 1024)  + ' KB</td><td colspan="2">&nbsp;</td>');
									var datatable = $().McworkDatatableRequest(orgin,'html');
									datatable.execute({'prep': '1'});									
								}
							});
							$('#server-process').html( Mcwork.Icons.getsuccess() );
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.WARN);
							$('#modalhead').addClass(Mcwork.Colors.SUCCESS);
							Mcwork.Parameter.hasRemoveClass('#cancel-button', 'disabled');
							$('#cancel-button').addClass('success');
						}
					});
				},					
			});
		}
	};	
})(this.document);
McworkAppEdit = (function(){
	var opts = {};
	function setOptions(options){
		opts = options;
	}
	function getOptions(){
		return opts;
	}
	function getOption(key){
		if ( opts.hasOwnProperty(key) ){
			return opts[key];
		} else {
			return false;
		}
	}
	return {
		execute : function(appoptions){
			setOptions(appoptions);
			$('#save-button').click(function(ev) {
				ev.preventDefault();
				var error = false;
				var someForm = $('#appedit');
				var formDatas = {};
				$.each(someForm[0].elements, function(index, elm){		
					formDatas[$(elm).attr('name')] = $(elm).val();		 
					Mcwork.Validation.unmarkErrorFields($(elm).attr('name'));
					if (elm.getAttribute('required') !== null && ($(elm).val() == '')) {
						error = true;
						Mcwork.Validation.markErrorField($(elm).attr('name'), Mcwork.Language.translate('usr', 'requiredentry'));
					}				  
				});
				formDatas['ident'] = appoptions.ident;
				if (false === error){
					if ( 'ajax' === getOption('method') ){
						var senddata = {};
						senddata.data = formDatas;
						senddata.app = getOption('app'); 
						$.ajax({
								url :  getOption('url'), 
								type : 'POST',
								data : senddata,	
								beforeSend: function(){ 
									$('#server-process').html( Mcwork.Icons.getprocess() );	
								},	
								success : function(data) {
									var obj = jQuery.parseJSON(data);
									if (obj.error) {
										$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.WARN));  
										$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
										$('#modalcontent').html( '<p>' + Mcwork.Language.translate('server', obj.error) + '</p>' );
									} else {
										$('#save-button').hide();
										Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
										$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  								
										$('#server-process').html( Mcwork.Icons.getsuccess() );
										$('#modalcontent').html( '<p>' + Mcwork.Language.translate('messages', 'serversuccess') + '</p>' );
									}
								},
								error: function (xhr, ajaxOptions, thrownError) {									
										var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
										$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
										$('#modalcontent').html( Mcwork.HTML.build('p', {'txt':  msg } ) );
								}	
						});					
					}
				}
			});
		}
	};
})(this.document);
(function($) {
	$.fn.McworkRemoveFiles = function(elm, datas) {
		if (Mcwork.Tables.isTableRowSelected() === true) {
			var files = '';
			var senddata = {};
			senddata.files = {};
			var table = $('.table');
			var ch = table.find('tbody input:checkbox:checked');
			var i = 1;
			ch.each(function() {
				if ('file' === $(this).data('type')){
					if (files.length > 1) {
						files += ', ';
					}
					senddata.files[i] = {
						'name' : $(this).data('name'),
						'value' : $(this).val(),
						'ident' : $(this).data('ident'),
					};
					i = i + 1;
					files += $(this).data('name');
				} else {
					$(this).prop('checked', false);
				}
			});
			if (1 === i){
				Mcwork.Modals.buildError(Mcwork.Language.translate('usr', 'no_file_select'));
			} else {
				var message = Mcwork.Language.translate('usr', 'confirm_delete');
				Mcwork.Modals.buildConfirm(message.replace('%1', ' die folgenden markierten Eintr&auml;ge: <em>[ ' + files + ' ]</em> '));
			}
			$('#confirm-button').click(function(ev) {
				senddata.data = datas;
				$.ajax({
					url : datas.url,
					type : 'POST',
					data : senddata,
					beforeSend : function() {
						$('#modalhead').html(Mcwork.Language.translate('heads', 'delete'));
						$('#server-process').html(Mcwork.Icons.getprocess());
					},
					success : function(data) {
						var obj = jQuery.parseJSON(data);
						if (obj.error) {
							$('#confirm-button').addClass('disabled');
							$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
							$('#modalcontent').html('<p class="alizarin-color">' + Mcwork.Language.translate('server', obj.error) + '</p>');
						} else if (obj.warn) {
							$('#confirm-button').addClass('disabled');
							$('#modalhead').html(Mcwork.Language.translate('warn', 'server') + ' ' + Mcwork.Icons.getwarn());
							$('#modalcontent').html('<p class="pumpkim-color">' + Mcwork.Language.translate('server', obj.warn) + '</p>');
						} else {
							$('#confirm-button').hide();
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));
							var msg = '';
							var warn = '';
							ch.each(function() {
								if (obj.success.hasOwnProperty($(this).data('ident'))) {
									if (msg.length == 0){
										msg += '<br /><i class="fa fa-check-circle"> </i>';
									}
									msg += ' ' +  $(this).data('name') + ',';
									$(this).prop('checked', false);
									var parentElm = $(this).parents('td');
									$(parentElm).parents('tr').fadeOut(function() {
										$(parentElm).remove();
									});
								} else {
									if (warn.length == 0){
										warn += '<br /><span class="alizarin-color"><i class="fa fa-exclamation-triangle"> </i>';
									}
									warn += ' ' +  $(this).data('name') + ',';
									$(this).prop('checked', false);									
								}
								
								if (warn.length == 0){
									warn += '</span>';
								}
							});
							ch = false;
							$('#modalhead').addClass(Mcwork.Colors.get(Mcwork.Colors.SUCCESS));
							$('#server-process').html(Mcwork.Icons.getsuccess());
							$('#modalcontent').html('<p class="emerald-color">' + Mcwork.Language.translate('messages', 'serversuccess') + msg + warn + '</p>');
						}
					},
					error : function(xhr, ajaxOptions, thrownError) {
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
						$('#modalcontent').html('<p class="alizarin-color">' + msg + '</p>');
					}
				});
			});
			$('#cancel-button').click(function(ev) {
				ev.preventDefault();
				if (false !== ch) {
					ch.each(function() {
						$(this).prop('checked', false);
					});
				}
				Mcwork.Parameter.unsetDomElement();
				delete datas;
				delete elm;
				$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
			});
		}
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});
	};
})(jQuery);
(function($) {
	$.fn.McworkRemoveDirectory = function(elm, datas) {
		if (Mcwork.Tables.isTableRowSelected() === true) {
			var files = '';
			var senddata = {};
			senddata.files = {};
			var table = $('.table');
			var ch = table.find('tbody input:checkbox:checked');
			var i = 1;
			var close = false;
			ch.each(function() {
				if ('dir' === $(this).data('type')){
					if (files.length > 1) {
						files += ', ';
					}
					senddata.files[i] = {
						'name' : $(this).data('name'),
						'value' : $(this).val(),
					};
					i = i + 1;
					files += $(this).data('name');
				} else {
					if ('dir' === $(this).data('type')){
						close = true;
					}
					$(this).prop('checked', false);
				}
			});
			if (1 === i){
				if (true === close){
					Mcwork.Modals.buildError(Mcwork.Language.translate('usr', 'dir_with_elments'));
				} else {
					Mcwork.Modals.buildError(Mcwork.Language.translate('usr', 'no_dir_select'));
				}
				
			} else {
				var message = Mcwork.Language.translate('usr', 'confirm_delete');
				Mcwork.Modals.buildConfirm(message.replace('%1', ' die folgenden markierten Eintr&auml;ge: <em>[ ' + files + ' ]</em> '));
			}
			$('#confirm-button').click(function(ev) {
				senddata.data = datas;
				$.ajax({
					url : datas.url,
					type : 'POST',
					data : senddata,
					beforeSend : function() {
						$('#modalhead').html(Mcwork.Language.translate('heads', 'delete'));
						$('#server-process').html(Mcwork.Icons.getprocess());
					},
					success : function(data) { 
						var obj = jQuery.parseJSON(data);
						if (obj.error) {
							$('#confirm-button').addClass('disabled');
							$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
							$('#modalcontent').html('<p class="alizarin-color">' + Mcwork.Language.translate('server', obj.error) + '</p>');
						} else if (obj.warn) {
							$('#confirm-button').addClass('disabled');
							$('#modalhead').html(Mcwork.Language.translate('warn', 'server') + ' ' + Mcwork.Icons.getwarn());
							$('#modalcontent').html('<p class="pumpkim-color">' + Mcwork.Language.translate('server', obj.warn) + '</p>');
						} else {
							$('#confirm-button').hide();
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));
							var msg = '';
							ch.each(function() {
							
									if (msg.length == 0){
										msg += '<br /><i class="fa fa-check-circle"> </i>';
									}
									msg += ' ' +  $(this).data('name') + ',';
									$(this).prop('checked', false);
									var parentElm = $(this).parents('td');
									$(parentElm).parents('tr').fadeOut(function() {
										$(parentElm).remove();
									});
								
							});
							ch = false;
							$('#modalhead').addClass(Mcwork.Colors.get(Mcwork.Colors.SUCCESS));
							$('#server-process').html(Mcwork.Icons.getsuccess());
							$('#modalcontent').html('<p class="emerald-color">' + Mcwork.Language.translate('messages', 'serversuccess') + msg + '</p>');
						}
					},
					error : function(xhr, ajaxOptions, thrownError) {
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn());
						$('#modalcontent').html('<p class="alizarin-color">' + msg + '</p>');
					}
				});
			});
			$('#cancel-button').click(function(ev) {
				ev.preventDefault();
				if (false !== ch) {
					ch.each(function() {
						$(this).prop('checked', false);
					});
				}
				Mcwork.Parameter.unsetDomElement();
				delete datas;
				delete elm;
				$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
			});
		}
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});
	};
})(jQuery);
(function($) {
	$.fn.McworkMoveCopy = function(app, elm, type) {
		var opts = {};

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
				$('#save-button').click(function(ev) {
					ev.preventDefault();
					addOption('orgin', location.href);
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
					if (appoptions.element.hasOwnProperty('entity')) {
						formDatas['entity'] = appoptions.element.entity;
					}	
					if (appoptions.element.hasOwnProperty('fileextension')) {
						formDatas['fileextension'] = appoptions.element.fileextension;
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
										if (false !== getOption('request')){
											console.log('yes');
											var datatable = $().McworkDatatableRequest(getOption('orgin'),getOption('datatable'));
											datatable.execute({'prep': '1'});
										}
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
	
	$(document.body).on('click', '.copyfile', function(ev) {		
		ev.preventDefault();
		$().McworkClientApplication({}, this, $().McworkMoveCopy());
	});	
	
	$(document.body).on('click', '.copypublicdir', function(ev) {	
		ev.preventDefault();
		$().McworkClientApplication({}, this, $().McworkMoveCopy());
	});

	$(document.body).on('click', '.rmitem', function(ev) {
		ev.preventDefault();
		var row = $('#' + $(this).attr('data-ident'));
        $(row).prop('checked', true);
        var datas = $(this).data();
        datas.url = $(this).attr('href');        
		$().McworkRemoveFiles(this, datas);
	});
	
	$(document.body).on('click', '.rmdir', function(ev) {		
		ev.preventDefault();
		var row = $('#' + $(this).attr('data-row'));
        $(row).prop('checked', true);
        var datas = $(this).data();
        datas.url = $(this).attr('href');
		$().McworkRemoveDirectory(this, datas);
	});
		
	
	
	
	$('#btnUpload').click(function(ev){
		ev.preventDefault();
		console.log('10');
		$().McworkClientApplication({}, this, McworkDropzone);
	});		

	$('#btnTblrm').click(function(ev) {
		ev.preventDefault();
        var datas = $(this).data();
        datas.url = $(this).attr('href');
		$().McworkRemoveFiles(this, datas);
	});
	
	$(document.body).on('click', '.editapp', function(ev) {		
		ev.preventDefault();
		ev.stopImmediatePropagation();		
		$().McworkClientApplication({}, this, McworkAppEdit);		
	});	
	
	$('#btnNewFolder').click(function(ev) {
		ev.preventDefault();
		Mcwork.Parameter.hasRemoveClass($('#new-folder'), 'error');
		
		if ('' == $('#new-folder').val()) {
			$('#new-folder').addClass('error');
			$('.errNewFolder').html( Mcwork.Language.translate('val','newdir') );
		} else {
			var someForm = $('#mkDirForm');
			someForm.submit();
		}
		return false;
	});
}); 