(function($) {
	$.fn.McworkMaps = function(startzoom, maplatitude, maplongitude) {
		$('#map_canvas').locationpicker({
			location : {
				latitude : maplatitude,
				longitude : maplongitude
			},
			zoom : startzoom,
			radius : false,
			inputBinding : {
				latitudeInput : $('.setLatitude'),
				longitudeInput : $('.setLongitude'),
				locationNameInput : $('#location')
			},
			enableAutocomplete : true,
		});
	};
})(jQuery);
$(document).ready(function() {
	
		if ($('#map_canvas').length) {
			var startzoom = parseInt($('.setMapZoom').val());// + 1;
			var maplatitude = parseFloat($('.setLatitude').val());//setLatitude
			var maplongitude = parseFloat($('.setLongitude').val());
			$().McworkMaps(startzoom, maplatitude, maplongitude);
		}

	
	if ($('.setMapZoom').length) {
		$('.setMapZoom').change(function () {
			console.log($('.setMapZoom').val());
		});
	}
});