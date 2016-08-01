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
		
		LoadFurtherEntries : function(options){
			
			var defaults = {
				trigger : '#',
				url : '/contentplugin',
				attribute : $(this).data(),
			};
			defaults = $.extend({}, defaults, options);	
			
			console.log($( "#pagination > li.next" ));
			/*$(window).scroll(function() {
			$(document.body).on('scroll', '.addcontent', function(ev) {
				if($(window).scrollTop() + window.innerHeight == $(document).height()) {
					$.each($('#pagination').children(), function(key,value){
						if ($(value).hasClass('next') ){
							defaults.url = '/contentplugin/' + $(value).attr('data-url');
							
							$.ajax({
								url : defaults.url,
								async: false, 
								type : 'POST',
								dataType : 'html',
								data : defaults.attribute,
								success : function(data) {
									$('#municipal-directories').append(data);				
								}	
								$(value).removeClass('next');
								$(value).next().addClass('next');	
							});							
							
							
							

							return; 
						}
					});
				}
			});		*/		
			
			



		},		
		
	});
})(jQuery);




$(document).ready(function() {
	'use strict';
	//$('#pagination').css('display', 'none');
    Waves.attach('.btn-floating', ['waves-effect ']);
    Waves.init();	
    
$().ScrollEvent({
    listItem: '.hcard-wrapper',
    listContainer: '#municipal-directories',
    nextMarker: '.next',
    dataUrl : 'data-url',
    pagination: '#pagination',
    delay: 600,
    negativeMargin: 10
});    


    

	//$('#pagination').LoadFurtherEntries();
	$(document.body).on('click', '.addcontent', function(ev) {
		ev.preventDefault();
		console.log('click');
	});	
	/*
	$(window).scroll(function() {
		if($(window).scrollTop() + window.innerHeight == $(document).height()) {
			$.each($('#pagination').children(), function(key,value){
				if ($(value).hasClass('next') ){
					console.log($(value).attr('data-url'));
					$(value).removeClass('next');
					$(value).next().addClass('next');
					return; 
				}
			});
		}
	});	*/
	

	

	
	$('.toogleHcardElement').ToogleDescription();
});