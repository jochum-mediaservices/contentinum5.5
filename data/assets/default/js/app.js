$(document).foundation();
$(document).ready(function() {
	$('a.popuplink').attr('aria-haspopup', 'true').attr('title','Dieser Link öffnet sich in einem neuen Fenster');
	$("[target='_blank']").attr('aria-haspopup', 'true').attr('title','Der Link [ '+ $("[target='_blank']").attr('aria-haspopup', 'true').attr('href') +' ] öffnet sich in einem neuen Fenster');
});