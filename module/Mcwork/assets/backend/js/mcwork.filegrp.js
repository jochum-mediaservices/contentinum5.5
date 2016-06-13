(function($) {
	$.fn.McworkHandleFilegroup = function(datas, elm, status, current) {
		
		$.ajax({
			url : '/mcwork/services/application/filegroup',
			type : 'POST',
			data : datas,
			beforeSend : function() {
				$(elm).html(Mcwork.Icons.getprocess());
			},	
			
		    success : function(data) {
		    	var obj = jQuery.parseJSON(data);
		    	var html = '';
		    	var active = '';
		    	$.each( obj, function( key, value ) {
                        if ('edit' === status){
                        	active = '';
                        	if (current == value.mediaident){
                        		active = ' class="avtive"';
                        	}
                        	html += '<li>' + value.file + '</li>';
		    				//html += '<li id="list'+ fileident +'"'+ active +'><a href="/mcwork/filegroupindex/savenext" data-ident="'+ value.fileident +'" class="savefilegroupelm">' + value.file + '</a></li>';
		    			} else {
		    				html += '<li>' + value.file + '</li>';
		    			}
		    		
		    	});
		    	if (html.length > 1){
		    		// obj.length
		    		html = '<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2 filegroup-list">' + html + '</ul>';
		    	}
		    	$(elm).html(html);
		    }		
		});
	};
})(jQuery);	
$(document).ready(function() {
	if ( $("#mediaLinkPage").length ){
		$("#mediaLinkPage").change(function(ev){
			ev.preventDefault();
			$("#mediaLinkUrl").val(  $("#mediaLinkPage").val()  );
		});
	}	
	if ($('#getfilegroupmembers').length) {
		var data = {};
		data.entity = $('#getfilegroupmembers').attr('data-category');
		data.category = $('#webMediagroupId').val();
		var status = $('#mcworkForm').attr('data-process');
		var current = $('#webMediasId').val();
		$().McworkHandleFilegroup(data,'#getfilegroupmembers',status, current);
	}
	$(document.body).on('click', '.savefilegroupelm', function(ev) {		
		ev.preventDefault();
		var datas = $(this).data();
		datas.forms = $('#mcworkForm').serializeArray();
		$.ajax({
			url : '/mcwork/filegroupindex/savenext',
			type : 'POST',
			data : datas,			
			success : function(data) {
				var obj = jQuery.parseJSON(data);
				$.each( obj, function( key, value ) {
					if (obj.error) {
						Mcwork.Modals.buildError(Mcwork.Language.translate('errors', obj.error));
					} else {
						
					
						if ($('#' + key).length) {
							if ( 'text' == $('#' + key).attr('type') ){
								$('#' +  key ).val(value);
							} else if ( 'hidden' == $('#' + key).attr('type') ){
								$('#' +  key ).val(value);
							} else {
					        	$('#' +  key + ' option:selected').prop("selected",false);
					        	$('#' +  key + " option[value='" +  value  + "']").prop("selected",true);
								if ( $('#' +  key ).hasClass('chosen-select') ){
									$('#' +  key ).trigger("chosen:updated");
								} 							
							}						
						}
					}
				});
			},
			error : function(xhr, ajaxOptions, thrownError) {
				McworkPanelError(xhr, ajaxOptions, thrownError);				
			}				
		});
		return false;
	});
});