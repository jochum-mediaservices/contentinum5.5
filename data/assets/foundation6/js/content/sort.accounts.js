(function($) {
    'use strict';
    $.extend($.fn, {
        LoadSortAccounts: function(options) {
            var defaults = {
                trigger: '.displaythis',
                url: '/contentplugin',
                attribute: $(this).data(),
            };
            defaults = $.extend({}, defaults, options);

            $(document.body).on('click', defaults.trigger, function(ev) {
                ev.preventDefault();

                var location = window.history.location || window.location;
                defaults.attribute.category = $(this).attr('data-letterkey');

                defaults.url = '/contentplugin/letter/' + $(this).attr('data-letterkey');

                $.ajax({
                    url: defaults.url,
                    type: 'POST',
                    dataType: 'html',
                    data: defaults.attribute,
                    success: function(data) {
                        $('#account-listing').html(data);
                    }
                });

            });
        }
    });
})(jQuery);


$(document).ready(function() {
    $('.disabled').click(function(ev) { ev.preventDefault(); return false; });
    $('#account-listing').LoadSortAccounts();
});