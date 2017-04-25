$(document).ready(function() {
    $(document.body).on('click', ".getics", function(ev) {
        ev.stopPropagation();
        ev.preventDefault();
        var summary = $(this).attr('data-summary');
        var attendee = $(this).attr('data-attendee');
        var description = $(this).attr('data-description');
        var location = $(this).attr('data-location');
        var dstart = $(this).attr('data-dstart');
        var dend = $(this).attr('data-dend');
        var uuid = $(this).attr('data-uuid');
        if (typeof description == "undefined") {
            var description = summary;
        }
        downloadIcs('Diesen-Termin-speichern', attendee, summary, description, location, uuid, dstart, dend, '.ics');
        return false;
    });
    if ($('.event-description').length) {
        $().ContentinumEvent();
    }
});