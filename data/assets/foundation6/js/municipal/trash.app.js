(function($){
	//'use strict';
	$.fn.MunicipalTrashlist = function() {
		var defaults = {
			districts : {},
			usrstreet : '',
			trash : '',
			month : false,
			monthIdent : false,
			selectmonth : '#selectmonat',
		};
		var UserMessage = function() {
			var htmlstr = '<div data-alert class="alert-box success">';
			htmlstr = 'Ihre Einstellungen wurden gespeichert. <a href="#" class="close">&times;</a></div>';
			return htmlstr;
		};
		var FilterTrash = function() {
			$.each($('#trashdatelist').children(), function(k,v){
				$.each($(v).children(), function(key, value) {
					if ($(value).hasClass('event-wrapper')){
						if (defaults.trash !== $(value).attr('data-trash')){
							$(value).css("display","none");
						}
					}				
				});
			});
		};

		var FilterDistrict = function() {
			$.each($('#trashdatelist').children(), function(k,v){
				$.each($(v).children(), function(key, value) {
					if ($(value).hasClass('event-wrapper')){
						if (defaults.districts.hasOwnProperty($(value).attr('data-district')) ){
							if ( typeof $(value).css('none') !== "undefined" ){	
								$(value).css("display","block");
							}
						} else {
							$(value).css("display","none");
						}							
					}					
				});
			});
		};	
		
		var UnsetFilters = function() {
			$.each($('#trashdatelist').children(), function(k,v){
				$(v).children().removeAttr('style');
			});
		};			
		
		var ini = function () {
			var trashcookie = $.cookie("municipaltrash");
			if(typeof trashcookie !== typeof undefined){
				sets(JSON.parse(trashcookie));
				$("#selectmeull option[value='"+defaults.trash+"']").attr('selected',true);
				$("#selectbezirk option[value='"+defaults.usrstreet+"']").attr('selected',true);
			} else if (false === defaults.month){
				var d = new Date();
				var n = d.getMonth() + 1; // current	
				if (n.length = 1){
					defaults.monthIdent = 'month0' + n;
					defaults.month = '0' + n;
				} else {
					defaults.monthIdent = 'month' + n;
					defaults.month = n;					
				}			
			}
			$('#' + defaults.monthIdent).css("display","block");
	        $(defaults.selectmonth + " option[value='"+defaults.month+"']").attr('selected',true);
		};
		
		var settings = function(options) {
			defaults = $.extend({}, defaults, options);			
		};
		var sets = function(opts){
			var previous = defaults;
			settings(opts);
			if ('00' == previous.month){
				if ('' !== previous.trash || true !== jQuery.isEmptyObject(previous.districts)){
					UnsetFilters();
				}
				$('#trashdatelist').children().removeAttr('style');
			} else {			
				if ('' !== previous.trash){
					$('#' + previous.monthIdent).children().removeAttr('style');
				}				
				$('#' + previous.monthIdent).removeAttr('style');
			}	
			if ('00' == defaults.month){
				$.each($('#trashdatelist').children(), function(k,v){
					$(v).css("display","block");
				});
				if ('' !== defaults.trash){
					FilterTrash();
				}
				if (true !== jQuery.isEmptyObject(defaults.districts)){
					FilterDistrict();
				}
			} else {
				$('#' + defaults.monthIdent).css("display","block");
				if ('' !== defaults.trash){
					$.each($('#' + defaults.monthIdent).children(), function(key, value) {
						if ($(value).hasClass('event-wrapper')){
							if (defaults.trash !== $(value).attr('data-trash')){
								$(value).css("display","none");
							}
						}
					});			
				}
                if (true !== jQuery.isEmptyObject(defaults.districts)){
					$.each($('#' + defaults.monthIdent).children(), function(key, value) {
						if ($(value).hasClass('event-wrapper')){
							if (defaults.districts.hasOwnProperty($(value).attr('data-district')) ){
								//if (! $(value).css('none')){
                                if ( typeof $(value).css('none') !== "undefined" ){						
									$(value).css("display","block");
								}
							} else {
								$(value).css("display","none");
							}
						}
					});	
			}
			}
		};
		var setcookie = function(options){
			$.cookie("municipaltrash",  JSON.stringify( defaults )  , { path: '/', expires: 365 });
			$('#usrmessage').html(UserMessage());
		};
		return { 
			init : function(options) {
				if (true === jQuery.isEmptyObject(options)){
					ini();
				} else {
					if ( options.hasOwnProperty('cookie') ){
						setcookie(options);
					} else {
						sets(options);
					}
				}
		    }
		};
	};
})(jQuery);
$(document).ready(function() {
	
	var trashapp = $('#trashdatelist').MunicipalTrashlist();
	trashapp.init({});
	$(document.body).on('change', '#selectmonat', function(ev) {
		ev.preventDefault();
		trashapp.init({month : $(this).val(), monthIdent : 'month' + $(this).val() });
	});
	$(document.body).on('change', '#selectmeull', function(ev) {
		ev.preventDefault();
		trashapp.init({trash : $(this).val() });
	});
	$(document.body).on('change', '#selectbezirk', function(ev) {
		ev.preventDefault();
		var districts = {};
		if ('' == $('#selectbezirk').val()){
			trashapp.init({'districts' : {} });
		} else {
			$.ajax({
				url : '/municipal/services/application/districtkeys',
				type : 'POST',
				data : {street : $('#selectbezirk').val() },	
				success : function(data) {
					var obj = jQuery.parseJSON(data);
					$.each(obj, function(key, value) {
						districts[value.districtscope] = 1;
					});
					trashapp.init({'districts' : districts, usrstreet : $('#selectbezirk').val() });
				}		
			});
		}
	});
	$(document.body).on('click', '#savetrash', function(ev) {
		ev.preventDefault();
		trashapp.init({'cookie' : true });
	});	
	
});