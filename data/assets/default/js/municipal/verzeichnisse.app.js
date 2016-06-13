(function($) {
	'use strict';
	$.extend($.fn, {
		ToogleDescription : function(options){
			var defaults = {
				elm : $(this),
				class : '.' + $(this).attr('class'),
			};

			defaults = $.extend({}, defaults, options);	
			$(document).on('click', defaults.class, function(ev) {
				ev.stopPropagation();
				ev.preventDefault();
				var ident = $(this).data('ident');
				$("#" + ident).slideToggle("slow");
				if ($(this).children().hasClass('fa-plus')) {
					$(this).children().removeClass('fa-plus');
					$(this).children().addClass('fa-minus');
				} else if ($(this).children().hasClass('fa-minus')) {
					$(this).children().removeClass('fa-minus');
					$(this).children().addClass('fa-plus');
				}
			});			
		},
		LoadDirectoryEntries : function(options){
			
			var defaults = {
				trigger : '#selectkategorie',
				url : '/contentplugin',
				attribute : $(this).data(),
			};
			defaults = $.extend({}, defaults, options);	

			$(document.body).on('change', defaults.trigger, function(ev) {
				ev.preventDefault();
				var location = window.history.location || window.location;
				defaults.attribute.category = $(this).val();
                defaults.url = '/contentplugin/tags/' + $('#selectbranch').val() + '/' + $(this).val();
                history.pushState(null, null, '/' + defaults.attribute.url + '/tags/' + $('#selectbranch').val() + '/' + $(this).val());
				$.ajax({
					url : defaults.url,
					async: false, 
					type : 'POST',
					dataType : 'html',
					data : defaults.attribute,
					success : function(data) {
						$('#municipal-directories').html(data);		
						$('#paginationrow').attr('aria-hidden' , 'true');	
						$('#paginationrow').css('display' , 'none');			
					}		
				});

			});

		},
		LoadKeywords : function(options){
			var defaults = {
				elm : $(this),
				id : '#' + $(this).attr('id'),
				url : '/municipal/services/application/keywords',
				target : '#fieldselectkategorie',
				fieldname : 'selectkategorie',
				label : 'Kategorie',
				datas : {},
				results : {},
			};

			defaults = $.extend({}, defaults, options);	

			var load = function(){
				$.ajax({
					url : defaults.url,
					async: false, 
					type : 'POST',
					data : defaults.datas,
					success : function(data) {
						defaults.results = jQuery.parseJSON(data);
					}		
				}); 
			};

			var formfieldselect = function(fieldname, label, current){
				var selectfield = '<label for="'+fieldname+'">' + label +'</label><select id="' + fieldname +'" name="' + fieldname +'">';
				selectfield += '<option value="" selected="selected">Bitte ausw&auml;hlen</option>';
				$.each(defaults.results, function(key, value) {
					if (current === value.scope){
						selectfield += '<option value="' + value.scope + '" selected="selected">' + value.name + '</option>'
					} else {
						selectfield += '<option value="' + value.scope + '">' + value.name + '</option>'
					}
				});	
				selectfield += '</select>';
				return selectfield;			
			};

			if ('' !== $(defaults.id).val()){
				defaults.datas = {scope : $(defaults.id).val()};
				load();
				var category = window.location.pathname.split('/').splice(-1,1);
				$(defaults.target).html(formfieldselect(defaults.fieldname, defaults.label, category.join()));
			}

			$(document.body).on('change', defaults.id, function(ev) {
				ev.preventDefault();
				defaults.datas = {scope : $(this).val()};
				load();
				$(defaults.target).html(formfieldselect(defaults.fieldname, defaults.label, ''));
			});				
		},
	});
})(jQuery);

$(document).ready(function() {
	'use strict';
  	if ( $('.pagination').length) {
	    $('.pagination').pagination({
	        items: $('.pagination').attr('data-total'),
	        itemsOnPage: 10,
	        displayedPages: 10,
	        hrefTextPrefix: '/' + $('.pagination').attr('data-url'),
	        hrefTextSuffix: '0',
			prevText: 'Zur&uuml;ck',
			nextText: 'Vor',   
			currentPage: $('.pagination').attr('data-current'),     
	    }); 
    } 

	$('.toogleHcardElement').ToogleDescription();
	$('#selectbranch').LoadKeywords();
	$('#municipal-directories').LoadDirectoryEntries();
});