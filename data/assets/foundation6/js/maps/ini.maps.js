$(document).ready(function() {
	if ($("#map_canvas").length) {
		$().InitializeMap(centerLatitude, centerLongitude, startZoom, mapMarkers);		
	}
});