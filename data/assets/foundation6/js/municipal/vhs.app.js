(function($) {
	'use strict';
	$.extend($.fn, {
		LoadDirectoryEntries : function(options){
			
			var defaults = {
				trigger : '#selectkategorie',
				url : '/contentplugin',
				attribute : $(this).data(),
			};
			defaults = $.extend({}, defaults, options);	

			$(document.body).on('change', defaults.trigger, function(ev) {
				ev.preventDefault();
				//var location = window.history.location || window.location;
				defaults.attribute.category = $(this).val();
                defaults.url = '/contentplugin/kurse/' + $('#selectbranch').val() + '/' + $(this).val();
                //history.pushState(null, null, '/' + defaults.attribute.url + '/tags/' + $('#selectbranch').val() + '/' + $(this).val());
				$.ajax({
					url : defaults.url,
					async: false, 
					type : 'POST',
					dataType : 'html',
					data : defaults.attribute,
					success : function(data) {
						$('#vhscourselist').html(data);					
					}		
				});

			});

		},
		LoadKeywords : function(options){
			var defaults = {
				elm : $(this),
				id : '#' + $(this).attr('id'),
				url : '/municipal/services/application/coursecategory',
				target : '#fieldselectkategorie',
				fieldname : 'selectkategorie',
				label : 'Kategorien',
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
	$(document).on('click', '.toogleVhsElement', function(ev) {
			ev.stopPropagation();
			ev.preventDefault();	
			var ident = $(this).data('ident');	
			$("#desc" + ident).slideToggle("slow");
			$("#room" + ident).slideToggle("slow");
			$("#participant" + ident).slideToggle("slow");
			$("#desc2" + ident).slideToggle("slow");
			$("#tax" + ident).slideToggle("slow");
			$("#termine" + ident).slideToggle("slow");
			if ( 'block' ==  $("#termine" + ident).css('display')){
				$.ajax({
					url : '/municipal/services/application/coursedates',
					async: false, 
					type : 'POST',
					dataType : 'html',
					data : {'course' : ident },
					success : function(data) {
						$("#seminardates" + ident).html(data);					
					}		
				});			
			} else {
				$("#seminardates" + ident).html('');
			}
	});
	$('#selectbranch').LoadKeywords();
	$('#vhscourselist').LoadDirectoryEntries();
});