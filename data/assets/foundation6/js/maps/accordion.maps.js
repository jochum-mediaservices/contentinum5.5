$(document).ready(function() {
	if ($("#map_canvas").length) {
		if ($('.accordion').length){
			$('.accordion-item').on('click.zf.accordion', function() {
				$().InitializeMap(centerLatitude, centerLongitude, startZoom, mapMarkers);
	  		});
		}		
	}
});