( function(factory) {
		if ( typeof define === "function" && define.amd) {
			define(["jquery"], factory);
		} else {
			factory(jQuery);
		}
	}(function($) {
		$.extend($.fn, {
			FeuerwehrArchiv : function() {
				var archiv = $.cookie("reportarchive");
				if(typeof archiv !== typeof undefined){
					$("#" + archiv).slideToggle("fast");
					var elm = $( "a[data-ident='"+ archiv +"']" );
					$(elm).parent().addClass('active');	
				} 
				$(document).on('click', '.element-toogle', function(ev) {
					ev.stopPropagation();
					ev.preventDefault();			
					var ident = $(this).data('ident'); 
					$('.report-archive-list-item').removeClass('active');
					$(this).parent().addClass('active');			
					$.cookie("reportarchive", ident, { path: '/' });
					$("#" + ident).slideToggle("fast");
				});
				$(document).on('click', '.report-archive-sublist-link', function(ev){
					ev.stopPropagation();
					ev.preventDefault();					
					$.cookie("backlinkreportarchiv", $(this).attr('href'), { path: '/' } );
					window.location = $(this).attr('href');
				});			
				$(document).on('click', '.unsetReportBacklink', function(ev){
					ev.stopPropagation();
					ev.preventDefault();	
					$.removeCookie("backlinkreportarchiv", { path: '/' });					
					window.location = $(this).attr('href');
				});
				$(document).on('click', '.setReportBacklink', function(ev){
					ev.stopPropagation();
					ev.preventDefault();	
					$.cookie("backlinkreportarchiv", $(this).data('backlink'), { path: '/' } );					
					window.location = $(this).attr('href');
				});				
			},
		});
	}));