$(document).ready(function() {
	//'use strict';

	$('body').append('<div class="small reveal" id="bookingModal" data-close-on-click="true" data-reveal> </div>');

	$(document.body).on('click', '.calendar-day-btn', function(ev) {
		ev.preventDefault();

		var selected = $("input[type='radio'][name='servicebooking']:checked");
		if (selected.length == 0) {
			var modalHtml = '<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"> </i> Auswahl fehlt</h2>';
			modalHtml += '<p>Bitte w&auml;hlen Sie einen Service vor der Terminwahl aus</p>';
			modalHtml += '<button class="close-button" data-close aria-label="Close Accessible Modal" type="button"><span aria-hidden="true">&times;</span></button>';
			var $modal = new Foundation.Reveal($('#bookingModal').html(modalHtml));
			$modal.open();
		} else {
			var business = selected.attr('data-business');
			var service = selected.val();
			var bookingday = $(this).attr('data-bookingday');
			var bookingtime = $(this).attr('data-bookingtime');
			var displayDate = bookingday.split('-');
			var modalHtml = '<h2>Termin buchen f&uuml;r den ' + displayDate[2] + '.' + displayDate[1] + '.' + displayDate[0] +  '</h2>';
			modalHtml += '<div class="server-process"> </div>';
			modalHtml += '<div id="orderform"><form id="mcworkForm" action="/municipal/public/appointments" accept-charset="UTF-8"  action="/"><div class="row"><fieldset  id="fieldoccupancyStart" class="large-4 columns"><legend>Uhrzeit ausw&auml;hlen</legend>';

			$.each(bookingtime.split(';'), function(key, value) {
				modalHtml += '<p class="formElement"><label><input type="radio" name="occupancyStart" value="' + bookingday + ' ' + value + '"> ' + value + ' Uhr</label> </p>';
			});

			modalHtml += '</fieldset><fieldset class="large-8 columns"><legend>Ihre Kontakdaten</legend>';
			modalHtml += '<p id="fieldtitle" class="formElement"><label>Anrede</label>';
			modalHtml += '<select id="title" required="required" name="title"><option value="Frau">Frau</option><option value="Herr">Herr</option></select></p>';
			modalHtml += '<p id="fieldname" class="formElement"><label>Vorame</label>';
			modalHtml += '<input id="surname" class="elm" type="text" value="" required="required" name="surname"></p>';
			modalHtml += '<p id="fieldname" class="formElement"><label>Name</label>';
			modalHtml += '<input id="name" class="elm" type="text" value="" required="required" name="name"></p>';
			modalHtml += '<p id="fieldtelefon" class="formElement"><label>Telefon</label>';
			modalHtml += '<input id="phone" class="elm" type="tel" value="" name="phone"></p>';
			modalHtml += '<p id="fieldemail" class="formElement"><label>E-Mail Adresse</label>';
			modalHtml += '<input id="email" class="elm" type="email" value="" required="required" name="email"></p>';
			modalHtml += '<input id="service" class="elm" type="hidden" value="'+ service +'" required="required" name="service">';
			modalHtml += '<input id="business" class="elm" type="hidden" value="'+ business +'" required="required" name="business">';
			modalHtml += '</fieldset></div></form><div>';
			modalHtml += '<p><input id="sendantrag" class="button expanded submitthisform" type="submit" name="send" value="Termin buchen"></p>';
			modalHtml += '<button class="close-button" data-close aria-label="Close Accessible Modal" type="button"><span aria-hidden="true">&times;</span></button>';

			var $modal = new Foundation.Reveal($('#bookingModal').html(modalHtml));
			$modal.open();

			$("#mcworkForm").validate({
				submitHandler : function(form) {
					$().setDefaults({
						formIdent : false,
						formResultSelector : '#orderform'
					});
					$().FormHandler(form);
				}
			});
			$(document.body).on('click', '#sendantrag', function(ev) {
				ev.preventDefault();
				ev.stopPropagation();
				$("#mcworkForm").submit();
			});

		}

	});

}); 