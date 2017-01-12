$(document).ready(function() {
	'use strict';
	$(document.body).on('click', '.setreview', function(ev) {
		ev.preventDefault();
		var datas = $(this).data();
		var postIdent = $(this).attr('data-post');
		var elm = $(this);
		var parent = $(this).parent();
		var parentUL = $(parent).parent();
		$($(parentUL).children()).each(function(index, value) {
			$(value).find("a").removeAttr('style');
		});
		$.ajax({
			url : '/citizensbudget/public/userreview',
			type : 'POST',
			data : datas,
			//dataType : 'html',
			//beforeSend : function() {//$(".server-process").html('<p class=""> <i class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"> </i></p>');},
			success : function(data) {
				var datas = jQuery.parseJSON(data);
				console.log(datas);
				$(elm).css("color", "red");
				$('#likes' + postIdent).html(datas.likes);
			}
		});
	});
}); 