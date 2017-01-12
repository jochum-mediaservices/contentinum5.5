(function($){
	//'use strict';
	$.fn.MunicipalTrashlist = function() {
		var defaults = {
			districts : {},
			usrstreet : '',
			trash : '',
			month : false,
			monthIdent : false,
			disableDates : false,
			currentHeadline : false,
			currentDate : false,
			selectmonth : '#selectmonat',
		};

		var AddDateZero = function(i){
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		};

		var GetCurrentDate = function() {
		    var d = new Date();
		    var y = d.getFullYear();
		    var mm = AddDateZero(d.getMonth() + 1);
		    var t = AddDateZero(d.getDate());
		    var h = AddDateZero(d.getHours());
		    var m = AddDateZero(d.getMinutes());
		    var s = AddDateZero(d.getSeconds());
		    defaults.currentDate =  y + "-" + mm + "-" + t + " " + h + ":" + m + ":" + s;
		};

		var GetCurrentHeadline = function() {
		    var d = new Date();
		    defaults.currentHeadline = AddDateZero(d.getMonth() + 1);
		};				

		var UserMessage = function() {
			var htmlstr = '<div class="callout secondary"><p class="emerald-color"><i class="fa fa-check-circle" aria-hidden="true"> </i> ';
			htmlstr += 'Ihre Einstellungen wurden auf diesem Ger&auml;t gespeichert.</p></div>';
			return htmlstr;
		};

		var UserMessageRemove = function() {
			var htmlstr = '<div class="callout secondary"><p class="emerald-color"><i class="fa fa-check-circle" aria-hidden="true"> </i> ';
			htmlstr += 'Ihre Einstellungen wurden von diesem Ger&auml;t entfernt.</p></div>';
			return htmlstr;
		};		

		var FilterDates = function() {
			$.each($('#trashdatelist').children(), function(k,v){
				$.each($(v).children(), function(key, value) {
					if ($(value).hasClass('event-mounth-headline') ){
						if (defaults.currentHeadline > $(value).attr('data-month')){
							$(value).css("display","none");
						}
					}
					if ($(value).hasClass('event-wrapper') ){ // && 'none' !== $(value).css('display')){
						if (defaults.currentDate > $(value).attr('data-trashdate')){
							$(value).css("display","none");
						}
					}				
				});
			});
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
			if(typeof trashcookie !== typeof undefined ){
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
					defaults.monthIdent = 'month0' + n;
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
				if (true === defaults.disableDates){
					GetCurrentDate();
					GetCurrentHeadline();
				} else {
					defaults.currentHeadline = false;
					defaults.currentDate = false;
				}

				$.each($('#trashdatelist').children(), function(k,v){
					$(v).css("display","block");
				});
				if ('' !== defaults.trash){
					FilterTrash();
				}
				if (true !== jQuery.isEmptyObject(defaults.districts)){
					FilterDistrict();
				}
				if (true === defaults.disableDates){
					FilterDates();
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
								//console.log($(value).css('display'));
								//if (! $(value).css('none')){
                                if ($(value).css('display') == "none" ){						
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
		var deletecookie = function(){
			$.cookie("municipaltrash",  null  , { path: '/' });
			$.removeCookie("municipaltrash");
			defaults.districts = {};
			defaults.usrstreet = '';
			defaults.trash = '';
			defaults.month = false;
			defaults.monthIdent = false;
			defaults.disableDates = false;
			defaults.currentHeadline = false;
			defaults.currentDate = false;
			$('#usrmessage').html(UserMessageRemove());
			ini();
		};		
		return { 
			init : function(options) {
				if (true === jQuery.isEmptyObject(options)){
					ini();
				} else {
					if ( options.hasOwnProperty('cookie') ){
						setcookie(options);
				    } else if (options.hasOwnProperty('delcookie')){
				    	deletecookie();
					} else {
						sets(options);
					}
				}
		    }
		};
	};
})(jQuery);
$(document).ready(function() {



	$(document.body).on('click', '.displayselectform', function(ev) {
		ev.preventDefault();
		$('#' + $(this).attr('data-ident')).toggle();
	});		
	
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
	
	$(document.body).on('click', '#disablePrevDate', function(ev) {
		
		
		if ( 1 == $( '#disablePrevDate' ).val( ) ){
			$( '#disablePrevDate' ).val(0);
			$("#disablePrevDate").removeAttr('checked');
			trashapp.init({'disableDates' : false});
		} else {
			$( '#disablePrevDate' ).val(1);
			$("#disablePrevDate").attr( "checked", "checked" );
			var d = new Date();
			trashapp.init({'disableDates' : true }); 
		}
		
		//trashapp.init({'disableDates' : true });
	});		
	$(document.body).on('click', '#savetrash', function(ev) {
		ev.preventDefault();
		trashapp.init({'cookie' : true });
	});	
	$(document.body).on('click', '#deletetrash', function(ev) {
		ev.preventDefault();
		trashapp.init({'delcookie' : true });
	});		
	
});