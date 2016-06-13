$(document).ready(function() {
	var serverClock = $("#serverClock");
	if (serverClock.length > 0) {
		Mcwork.Clock.show(serverClock, serverClock.text());
	}
	if ( $('#dashboardContent').length ){
		if ( $.fn.dataTable.isDataTable( '#mcworkTables' ) ) {
		    var table = $('#mcworkTables').DataTable();
		    table.ajax.url( '/mcwork/dashboard/tabledata' ).load();
		    setInterval(function(){
		    	table.ajax.reload();
		    },60000);
		}
	}
	$(document.body).on('click', '.setvalidation', function(ev) {
		ev.preventDefault();
		var row = $('#' + $(this).attr('data-row'));
		var href = $(this).attr('href');
		var senddatas = {};
		senddatas.ident = $(this).attr('data-ident');
		senddatas.entity = $(this).attr('data-entity');
        $(row).prop('checked', true);
        $(this).removeClass('secondary');
        $(this).addClass('info');
        $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"> </i>');
    	var response = Mcwork.Server.request({
			url : href,
			type : 'POST',
			data : senddatas,
		});
        if (response.hasOwnProperty('success')) {
	        $(this).removeClass('info');
	        $(this).addClass('success');        
	        $(this).html('<i class="fa fa-check" aria-hidden="true"> </i>');
			var parentElm = $(row).parents('td');
			$(row).prop('checked', false);
			$(parentElm).parents('tr').slideUp( "slow", function() {
				$(parentElm).remove();
			});
		} else {
	        $(this).removeClass('info');
	        $(this).addClass('alert');        
	        $(this).html('<i class="fa fa-exclamation-triangle" aria-hidden="true"> </i>');	
	        $(row).prop('checked', false);	
	        if (response.hasOwnProperty('error')) {
	        	alert( Mcwork.Language.translate('server', response.error));
	        }
		}        
	});
});