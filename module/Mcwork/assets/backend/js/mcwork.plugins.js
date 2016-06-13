(function ($){
	$.fn.McworkSelectModules = function(options) {
		var emptyForm = {
			1 : {
				'spec' : {
					'name' : 'modulParams',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulParams'
	                }
	            }
	         },
			2 : {
				'spec' : {
					'name' : 'modulDisplay',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulDisplay'
	                }
	            }
	         },
			3 : {
				'spec' : {
					'name' : 'modulConfig',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulConfig'
	                }
	            }
	         },
			4 : {
				'spec' : {
					'name' : 'modulLink',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulLink'
	                }
	            }
	         },
			5 : {
				'spec' : {
					'name' : 'modulFormat',
	                'required' : false,
	                'options' : {},
	                'type' : 'Hidden',
	                'attributes' : {
	                	'id' : 'modulFormat'
	                }
	            }
	         },	
		};
		var value = $(this).val();
		var fields = new Array('modulParams','modulDisplay','modulConfig','modulLink','modulFormat');
		var opts = {};
		opts.url = '/mcwork/services/application/configure';
		opts.data = {service : $(this).attr('data-service')};
		datas = Mcwork.Server.request(opts);
		if (value > '0'){
			var modul = datas[$(this).val()];
			var populate = {};
			$.each(fields, function( index, value ) {
				populate[value] = $('#' + value).val();
			});		
			$('#pluginForm').html(Mcwork.Forms.init({ populateValues : populate, formtag : false }, modul.form ));
		}
		$(this).change(function(){
			var value = $(this).val();
			if (value > '0'){
				var modul = datas[$(this).val()];
				$('#pluginForm').html(Mcwork.Forms.init({ formtag : false }, modul.form ));
			} else {
				$('#pluginForm').html(Mcwork.Forms.init({ formtag : false }, emptyForm));
			}
		});
		
	};
})(jQuery);
$(document).ready(function() {
	if ( $("#modul").length) {
		$('#modul').McworkSelectModules({} );
	}	
});