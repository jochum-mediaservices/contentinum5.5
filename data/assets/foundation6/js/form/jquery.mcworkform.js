
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {
	
	$.extend($.fn, {
		
		defaults : {
			async : true,
			formIdent : false,
			formAction : false,
			formMethod : 'POST',
			warnColor : 'alizarin-color',
			successColor : 'emerald-color',
			iconSuccess : 'fa fa-check-circle',
			iconWarn : 'fa fa-exclamation-triangle',
			iconSpinner : 'fa fa-spinner fa-spin',
			icon2x : 'fa-2x',
			formProcessSelector : '.server-process',
			formResultSelector : '#form-container',
			panel : 'callout',
			panelWarn : 'callout alert',
			panelSucess : 'callout success',
			panelTag : 'div',
			panelBootstrap : false,
			bottonIdent : '#send',
			
		},
		
		setDefaults: function( options ) {
			$.extend( this.defaults, options );
		},	
		
		FormValidation : function (form){
			var formFieldError = false;	
	    	$.each($(':input:visible:not(:button, :submit, :radio, :checkbox)', form), function(i) {
	    		$().UnmarkErrorFields($(this).attr('name'));
	    		if(this.getAttribute('required') != null) {
	    			if(($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
	    				formFieldError = true;
	    				$().MarkErrorField($(this).attr('name'), 'Das Feld muss einen Wert enthalten');
	    			}			    						    			
	    		}
	    		if(this.getAttribute('pattern') != null) {
					if(($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
						return true;
					}						
					if($(this).val().search($(this).attr('pattern'))) {
						formFieldError = true;
						$().MarkErrorField($(this).attr('name'), 'Der Wert ist im falschen Format: ' + $(this).attr('title'));
					}			    			
	    		}
	    		if(this.getAttribute('type') == 'email') {
					if(($(this).val() == $(this).attr('placeholder')) || ($(this).val() == '')) {
						return true;
					}						
					if($(this).val().search( /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/ )) {
						formFieldError = true;
						$().MarkErrorField($(this).attr('name'), 'Die E-Mail Adresse ist im falschen Format');
					}				    			
	    		}
	    	});
	    	
	    	if (false === formFieldError){
	    		if (true === this.defaults.async){
	    			$(form).submit( function(ev){
	    				ev.preventDefault();
	    				ev.stopPropagation();
	    				$().FormHandler(form);
	    				
	    			} );
	    		} else {
	    			$(form).submit();
	    		}
	    	}			
		},		
		
		FormHandler : function (form){
			this.defaults.formAction = $(form).attr('action');
			var buttonIdent = this.defaults.bottonIdent;
			var formData = $(form).serialize();	
			if (false !== this.defaults.formIdent){
				formData += '&' + this.defaults.formIdent + '=' + $(form).attr('data-' + this.defaults.formIdent);
			}
			if (false !== this.defaults.formAction){
				$.ajax({
					url : this.defaults.formAction,
					type : this.defaults.formMethod,
					data : formData,	
					beforeSend : function(){	
						$(buttonIdent).addClass('disabled');
						$(buttonIdent).val('Bitte warten ...');
						$().BeforeSendPanel();						
					},	
					error : function (argument) {
						$(buttonIdent).removeClass('disabled');
						$(buttonIdent).val('Senden');
						$().FormErrorPanel();
					},
					success : function(data) {
						var obj = jQuery.parseJSON(data);
						if (obj.success){
							$('.server-process').html('');
							$().FormSuccessPanel(obj.success);
							delete form;
						} else if (obj.error) {		
							$(buttonIdent).removeClass('disabled');		
							$(buttonIdent).val('Senden');		
							$().FieldErrorPanel();
							$.each(obj.error.fields, function(index, messages) {
								$.each(messages, function(mIndex, message) {
									$().MarkErrorField(index, message);
								});
							});							
						} else {
							$().FormErrorPanel();
						}						
					},															
				});
			}			
		},
		
		IsBootstrapPanel : function(content) {
			if ( true === this.defaults.panelBootstrap ){
				return '<div class="panel-body">' +  content + '</div>';
			} else {
				return content;
			}
		},		
		
		BuildPanel : function ( type, content ) {
			var panelHtml = '<'+ this.defaults.panelTag +' class="';
			switch(type){
				case 'warn':
				panelHtml += this.defaults.panelWarn;
				break;
				case 'success':
				panelHtml += this.defaults.panelSuccess;
				break;	
				default:
				panelHtml += this.defaults.panel;
				break;							
			}
			return panelHtml + '">' + this.IsBootstrapPanel(content) + '</'+ this.defaults.panelTag +'>';
		},
		

		
		BeforeSendPanel : function (){
			$(this.defaults.formProcessSelector).html( this.BuildPanel('warn', '<p class="text-center">' + this.FontAwesomeIcon('spinner','2x') + ' Formular wird versandt.</p>'  ) );
		},
		
		FieldErrorPanel : function(){
			$(this.defaults.formProcessSelector).html('<div class="'+ this.defaults.panelWarn +'">' + this.IsBootstrapPanel('<p class="text-center"><i class="fa fa-exclamation-triangle fa-2x alizarin-color"> </i></p>') + '</div>');
		},
		
		FormErrorPanel : function(){
			var str = '<div class="callout alert">';
			str += '<h2>Ihr Formular wurde erfolgreich &uuml;bermittelt<h2>';
			str += '<p>Vielen Dank f&uuml;r Ihre Nachricht.</p>';
			str += '</div>';
			$(this.defaults.formResultSelector).html(str);
		},		
		
		FormErrorPanel2 : function(){
			var str = '<div class="callout alert">';
			str += '<h2>Fehler beim versenden des Formulars<h2>';
			str += '<p>Das Formular konnte nicht versandt werden, versuchen Sie es sp&auml;ter Bitte noch einmal.<br />';
			str += 'oder wenden Sie sich Bitte direkt an uns.</p>';
			str += '</div>';
			$(this.defaults.formResultSelector).html(str);
		},
		
		FormSuccessPanel : function(messages){
			var html = '<div class="callout success">';
			html += '<p class="text-center"><i class="fa fa-check-circle emerald-color fa-2x"> </i></p>';
			html += messages;
			html += '</div>';	
			$(this.defaults.formResultSelector).html(html);		
		},
		
		MarkErrorField : function(fieldname, messages) {
			$('#field' + fieldname).addClass("error");
			$('#field' + fieldname).append('<span role="alert" id="err' + fieldname + '" class="validation-error">' + messages + '</span>');
		},
		
		UnmarkErrorFields : function(fieldname) {
			$("#field" + fieldname).removeClass("error");
			$("#err" + fieldname).remove();
		},		
		
		FontAwesomeIcon : function(type, size){
			var fontIcon = '<i class="';
			switch(type){
				case 'warn':
				fontIcon += this.defaults.iconWarn;
				break;
				case 'success':
				fontIcon += this.defaults.iconSuccess;
				break;
				case 'spinner':
				fontIcon += this.defaults.iconSpinner;
				break;									
				default:
				return '';
				break;
			}
			switch(size){
				case '2x':
				fontIcon += ' ' + this.defaults.icon2x;
				break;
				default:
				break;
			}	
			switch(type){
				case 'spinner':
				case 'warn':
				fontIcon += ' ' + this.defaults.warnColor;
				break;
				case 'sucess':
				fontIcon += ' ' + this.defaults.successColor;
				break;							
				default:
				break;
			}						
			return fontIcon + '"> </i>';
		},
	
		
	});
	
}));