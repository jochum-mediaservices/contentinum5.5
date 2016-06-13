(function ($) {
    'use strict';
	$.fn.extend({
		compare: function(options) {
			var defaults = {
				comparefield : false,
				fieldElement : '',
				fieldSuccessStyles : '',
				fieldErrorStyles : '',
				fieldErrorMessages : 'field_no_match',	
			};
			options = $.extend(defaults, options);
			function comparevalues(){
                if ($(this).val() == $(options.comparefield)){
                    $(this).addClass(options.fieldErrorStyles);
                    return false;
                } else {
                    $(this).addClass(options.fieldSuccessStyles);
                    return true;
                }
			}
            this.each(function() {
                if($(this).val()){
                    comparevalues.apply(this);
                }
            });
            return this.each(function() {
                $(this).bind('keyup focus input propertychange mouseup', comparevalues);
            });
    }
  });			
})(jQuery);