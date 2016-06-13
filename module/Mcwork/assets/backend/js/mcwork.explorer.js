(function ($){
	$.fn.McworkViewAndSelectFiles = function(options, app) {
		app.view();
		var domIdent = 'webMediasId';
		var dataIdent = 'data-ident';
		var opts = {};
		if (options.hasOwnProperty('domIdent')){
			domIdent = options.domIdent;
		}
		if (options.hasOwnProperty('mediaSource')){
			dataIdent = 'data-' + options.mediaSource;
		}		
		opts.url = '/mcwork/services/application/dirlist';	
		var dirlist = Mcwork.Server.request(opts);
		$('#dir-links').html(dirlist);
		app.setApplication('/mcwork/services/application/explorer');
		app.ls(options.filetype);
		$(document.body).on('click', ".setlink", function(ev) {
			ev.preventDefault();
			ev.stopImmediatePropagation();
			app.setDirectory($(this).attr('data-link'));
			app.ls(options.filetype);
			var dirIdent = $(this).data('dir');
			if(typeof dirIdent !== typeof undefined){
			    if ($(this).children().hasClass('fa-folder')) {
					$(this).children().removeClass('fa-folder');
					$(this).children().addClass('fa-folder-open');
				} else if ($(this).children().hasClass('fa-folder-open')) {
					$(this).children().removeClass('fa-folder-open');
					$(this).children().addClass('fa-folder');
				}
				$("#" + dirIdent).slideToggle("fast");
			}
		});	
		$(document.body).on('click', ".thisMediaElement", function(ev) {
			ev.preventDefault();
			ev.stopImmediatePropagation();
			console.log(dataIdent);
			console.log($(this).attr(dataIdent));
			$('#' + domIdent).val($(this).attr(dataIdent));
			$('#' + domIdent).trigger("chosen:updated");
			delete app;
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');		
		});	
		$(document.body).on('click', '#cancel-button', function(ev) {
			delete app;
			delete opts;
			delete options;
			$(Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});					
	};
})(jQuery); 

$(document).ready(function() {
	$('#viewSelectFile').click(function(ev){
		ev.preventDefault();
		var options = {};
		options.filetype = false;
		var mediafield = $(this).data('mediafield');
		var mediasource = $(this).data('mediasource');
		if (typeof mediafield != 'undefined'){
			options.domIdent = mediafield;
		}
		if (typeof mediasource != 'undefined'){
			options.mediaSource = mediasource;
		}		
		$().McworkViewAndSelectFiles(options,Mcwork.Explorer);
	});	
	$('#viewSelectPdfFile').click(function(ev){
		ev.preventDefault();
		var options = {};
		options.filetype = 'pdf';
		var mediafield = $(this).data('mediafield');
		if (typeof mediafield != 'undefined'){
			options.domIdent = mediafield;
		}
		$().McworkViewAndSelectFiles(options,Mcwork.Explorer);
	});		
});