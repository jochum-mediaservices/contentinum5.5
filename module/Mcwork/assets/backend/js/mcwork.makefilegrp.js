McworkCreateFileGroup = (function(){
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
			
			console.log(getOptions());
			
			
			$.ajax({
					url :  '/mcwork/publicmedias/creategroup', 
					type : 'POST',
					data : getOption('element'),	
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
							//$('#save-button').hide();
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
							$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  								
							$('#server-process').html( Mcwork.Icons.getsuccess() );
							var i = 1;
							var ident = 'mediagroup';
							var modalHtml = '';
							modalHtml += '<p id="fieldgroupName" class="formElement"><label>Name Bilderstrecke</label>';
							modalHtml += '<input id="groupName" class="elm" type="text" value="" required="required" name="groupName"></p>';							
							modalHtml += '<ul id="imagelistforgroup">';
							$.each(obj, function(src, file) {
								modalHtml += '<li class="formElement" data-src="'+ src + '" data-element="'+ ident + i + '"><label for="'+ ident + i + '"> <input id="'+ ident + i + '" ';
								modalHtml += 'type="checkbox" name="mediagroup[]" value="' + file.id + '" checked="checked"> ' + file.mediaName + ', ' + file.mediaDimensions + 'px</label> </li>';
								i = i + 1;
							});							
							modalHtml += '</ul>';
							$('#modalcontent').html( modalHtml );
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {									
							var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
							$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
							$('#modalcontent').html( Mcwork.HTML.build('p', {'txt':  msg } ) );
					}	
			});	
			$('#display-button').click(function(ev) {
				ev.preventDefault();
				ev.stopImmediatePropagation();	
				
				$.each($('#imagelistforgroup').children(), function(k,v){
					$(v).prepend('<img src="'+ $(v).attr('data-src') +'" width="200" alt="" />');
				});
			});
			
			
			
			$('#save-button').click(function(ev) {
				ev.preventDefault();
				var datas = {};
				datas.files = {};
				var i = 1;
				$.each($('#imagelistforgroup').children(), function(k,v){
					if($("#" + $(v).attr('data-element')).is(':checked')){
						datas.files[i] = $("#" + $(v).attr('data-element')).val();
						i = i + 1;
					}
				});				
				var error = false;
				Mcwork.Validation.unmarkErrorFields($("#groupName").attr('name'));
				if ('' == $("#groupName").val()){
						error = true;
						Mcwork.Validation.markErrorField($("#groupName").attr('name'), Mcwork.Language.translate('usr', 'requiredentry'));					
				} else {
					datas.groupName = $("#groupName").val();
				}
				
				
				if (false === error){
					if ( 'ajax' === getOption('method') ){
						var senddata = {};
						senddata.data = datas;
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

$(document).ready(function() {
	
	
	$(document.body).on('click', '.createimagegroup', function(ev) {
		ev.preventDefault();
		ev.stopImmediatePropagation();	
		var datas = $(this).data();		
		$().McworkClientApplication({}, this, McworkCreateFileGroup);	
	});
	
});