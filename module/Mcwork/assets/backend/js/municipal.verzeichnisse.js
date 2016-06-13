

$(document).ready(function() {
	if (  $('#getAccountGroupForm').length ){
		var categoryForm = {
			1 : {
				'spec' : {
					'name' : 'categorieId',
	                'required' : true,
	                'options' : {
	                	  'label' : 'Kategorie',
                          'empty_option' : 'Please Select',
                          'value_options' : {},
	                },
	                'type' : 'Select',
	                'attributes' : {
	                	'id' : 'categorieId'
	                }
	            }
	         },
	   };
		var datas = {'accountGroup' : $('#groupsIdent').val()};
		var populate = { 'categorieId' : $('#categorieId').val()};
		$.ajax({
			url : '/municipal/services/application/accountcategory',
			type : 'POST',
			data : datas,
			beforeSend: function(){ 
				$('#getAccountCategorieForm').html('<p><i class="fa fa-spinner fa-pulse"> </i></p>');
			} ,							
			success : function(data) {
				categoryForm[1].spec.options.value_options = jQuery.parseJSON( data );
				$('#getAccountCategorieForm').html(Mcwork.Forms.init({populateValues : populate, formtag : false }, categoryForm));				
			},
			error: function (xhr, ajaxOptions, thrownError) {									
					var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
					Mcwork.Modals.buildError(msg);
			}				
		});	

		var groupForm = {
			1 : {
				'spec' : {
					'name' : 'groupsIdent',
	                'required' : true,
	                'options' : {
	                	  'label' : 'Gruppe',
                          'empty_option' : 'Please Select',
                          'value_options' : {},
	                },
	                'type' : 'Select',
	                'attributes' : {
	                	'id' : 'groupsIdent'
	                }
	            }
	         },
	   };
	   
	   if (0 != $('#fieldtypes').val()){	   	
			var datas = {'fieldtypes' : $('#fieldtypes').val()};
			var populate = { 'groupsIdent' : $('#groupsIdent').val()};
			$.ajax({
				url : '/municipal/services/application/accountgroups',
				type : 'POST',
				async: false, 
				data : datas,
				beforeSend: function(){ 
					$('#getAccountGroupForm').html('<p><i class="fa fa-spinner fa-pulse"> </i></p>');
				} ,							
				success : function(data) {
					groupForm[1].spec.options.value_options = jQuery.parseJSON( data );
					$('#getAccountGroupForm').html(Mcwork.Forms.init({populateValues : populate, formtag : false }, groupForm));
					
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});					   


	}
}

	if (  $('#setAccountGroupForm').length ){
		
		var groupForm = {
			1 : {
				'spec' : {
					'name' : 'accountGroup',
	                'required' : true,
	                'options' : {
	                	  'label' : 'Gruppe',
                          'empty_option' : 'Please Select',
                          'value_options' : {},
	                },
	                'type' : 'Select',
	                'attributes' : {
	                	'id' : 'accountGroup'
	                }
	            }
	         },
	   };
	   
	   if (0 != $('#fieldtypes').val()){	   	
			var datas = {'fieldtypes' : $('#fieldtypes').val()};
			var populate = { 'accountGroup' : $('#accountGroup').val()};
			$.ajax({
				url : '/municipal/services/application/accountgroups',
				type : 'POST',
				data : datas,
				beforeSend: function(){ 
					$('#setAccountGroupForm').html('<p><i class="fa fa-spinner fa-pulse"></i></p>');
				} ,							
				success : function(data) {
					groupForm[1].spec.options.value_options = jQuery.parseJSON( data );
					$('#setAccountGroupForm').html(Mcwork.Forms.init({populateValues : populate, formtag : false }, groupForm));
					
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});		   	
	   	
	   	
	   }
		
		$('#fieldtypes').change(function(ev){
			$('#setAccountGroupForm').html('');
			var datas = {'fieldtypes' : $('#fieldtypes').val()};
			$.ajax({
				url : '/municipal/services/application/accountgroups',
				type : 'POST',
				data : datas,
				beforeSend: function(){ 
					
				} ,							
				success : function(data) {
					groupForm[1].spec.options.value_options = jQuery.parseJSON( data );
					$('#setAccountGroupForm').html(Mcwork.Forms.init({ formtag : false }, groupForm));
					
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});				
			
			
			
		});
	}
	
	if (  $('#setAccountCategoryForm').length ){
		
		var categoryForm = {
			1 : {
				'spec' : {
					'name' : 'accountCategory',
	                'required' : true,
	                'options' : {
	                	  'label' : 'Kategorie',
                          'empty_option' : 'Please Select',
                          'value_options' : {},
	                },
	                'type' : 'Select',
	                'attributes' : {
	                	'id' : 'accountCategory'
	                }
	            }
	         },
	   };
	   
		
		//$('#accountGroup').change(function(ev){
		$(document.body).on('change', '#accountGroup', function(ev) {	
			$('#setAccountCategoryForm').html('');
			var datas = {'accountGroup' : $('#accountGroup').val()};
			$.ajax({
				url : '/municipal/services/application/accountcategory',
				type : 'POST',
				data : datas,
				beforeSend: function(){ 
					$('#setAccountCategoryForm').html('<p><i class="fa fa-spinner fa-pulse"></i></p>');
				} ,							
				success : function(data) {
					categoryForm[1].spec.options.value_options = jQuery.parseJSON( data );
					$('#setAccountCategoryForm').html(Mcwork.Forms.init({ formtag : false }, categoryForm));
					
				},
				error: function (xhr, ajaxOptions, thrownError) {									
						var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
						Mcwork.Modals.buildError(msg);
				}				
			});				
			
			
			
		});
	}		
	
});