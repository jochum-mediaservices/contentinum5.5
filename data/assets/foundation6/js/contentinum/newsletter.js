$(document).ready(function() {
    'use strict';
    $(document.body).on('click', '.usersubscribe', function(ev) {
        var href = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, 'slow');
        ev.preventDefault();
        $(this).hide();
        $.ajax({
            url: '/newsletter/public/usersubscribe',
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#orderform').html(data);
                $("#mcworkForm").validate({
                    submitHandler: function(form) {
                        $().setDefaults({ formIdent: false, formResultSelector: '#orderform' });
                        $().FormHandler(form);
                    }
                });
            }
        });
    });
});