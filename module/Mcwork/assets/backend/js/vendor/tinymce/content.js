$(document).ready(function() {
	    $("#webPages").chosen().change( function(ev){
	    	ev.preventDefault();
	    	var datas = {};
	    	$('#webContentgroup').empty().append('<option value="">Please select</option>');
	    	datas.pageident = $("#webPages").val();
	    	if (datas.pageident.length > 0){
				$.ajax({
					url : '/mcwork/services/application/contentgroup',
					type : 'POST',
					data : datas,
					beforeSend : function() {
						console.log('send request');
					},
					success : function(data) {
						var jsonData = jQuery.parseJSON(data);
						$.each(jsonData, function (i, item) {
						    $('#webContentgroup').append($('<option>', { 
						        value: item.web_contentgroup_id,
						        text : item.title 
						    }));
						});
					},
					error : function(xhr, ajaxOptions, thrownError) {
						console.log('Response Status: ' + xhr.status + ' ' + thrownError);
					}
				});
			}
	    } );
	    if ( $("#webPagesIdent").length) {
	    	var datas = {};
	    	datas.pageident = $("#webPagesIdent").val();
	    	var contentIdent = $("#id").val();
	    	if (datas.pageident.length > 0){
				$.ajax({
					url : '/mcwork/services/application/contentgroup',
					type : 'POST',
					data : datas,
					beforeSend : function() {
						console.log('send request');
					},
					success : function(data) {
						var jsonData = jQuery.parseJSON(data);
						$.each(jsonData, function (i, item) {
							if (contentIdent !== item.id){
						    $('#webContentgroup').append($('<option>', { 
						        value: item.web_contentgroup_id,
						        text : item.title 
						    }));
						    }
						});
					},
					error : function(xhr, ajaxOptions, thrownError) {
						console.log('Response Status: ' + xhr.status + ' ' + thrownError);
					}
				});
			}	    	
	    }
		tinymce.init({
		    selector: "textarea#content",
		    language : 'de',
		    browser_spellcheck : true ,
		    height: 500,
		    convert_urls: false,
		    content_css : "/assets/app/tinymce/css/content.css" ,
		    extended_valid_elements : "i[class|aria-hidden],span[itemprop|itemscope|itemtype|class]",
		    link_list: "/mcwork/services/application/linklist",
		    link_class_list: [
		                      {title: 'None', value: ''},
		                      {title: 'Fonticon Bleistift', value: 'fa fa-edit'},
		                      {title: 'Button small (Foundation)', value: 'button small'},
		                      {title: 'Button standard (Foundation)', value: 'button'},
		                      {title: 'Button expand (Foundation)', value: 'button expand'},
		                      {title: 'Button expanded (Foundation 6)', value: 'expanded button'},
		                      {title: 'Button secondary small (Foundation)', value: 'button secondary small'},
		                      {title: 'Button secondary standard (Foundation)', value: 'button secondary'},
		                      {title: 'Button secondary expand (Foundation)', value: 'button secondary expand'},
		                      {title: 'Button secondary expanded (Foundation 6)', value: 'secondary expanded button'},
		                      
			                      
		                      
		    ],	
		    style_formats: [
		                    {title: "Headers", items: [
		                        {title: "Header 1", format: "h1"},
		                        {title: "Header 2", format: "h2"},
		                        {title: "Header 3", format: "h3"},
		                        {title: "Header 4", format: "h4"},
		                        {title: "Header 5", format: "h5"},
		                        {title: "Header 6", format: "h6"}
		                    ]},
		                    {title: "Inline", items: [
		                        {title: "Bold", icon: "bold", format: "bold"},
		                        {title: "Italic", icon: "italic", format: "italic"},
		                        {title: "Superscript", icon: "superscript", format: "superscript"},
		                        {title: "Subscript", icon: "subscript", format: "subscript"},
		                        {title: "Code", icon: "code", format: "code"}
		                    ]},
		                    {title: "Blocks", items: [
		                        {title: "Paragraph", format: "p"},
		                        {title: "Blockquote", format: "blockquote"},
		                        {title: "Div", format: "div"},
		                        {title: "Pre", format: "pre"}
		                    ]},
		                    {title: "Alignment", items: [
		                        {title: "Left", icon: "alignleft", format: "alignleft"},
		                        {title: "Center", icon: "aligncenter", format: "aligncenter"},
		                        {title: "Right", icon: "alignright", format: "alignright"},
		                        {title: "Justify", icon: "alignjustify", format: "alignjustify"}
		                    ]}
		    ],	    
    	    plugins: [
    	  	        "advlist autolink lists hr link charmap print anchor",
    	  	        "searchreplace code",
    	  	        "media table contextmenu paste template"
    	  	],	
		    menubar: "file insert edit view table tools",    	  	    
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link unlink | template",
		    templates : [
		                 {
		                     title: "Downloadliste",
		                     url: "/assets/app/template/filelist.htm",
		                     description: "Downloadliste"
		                 },
		                 {
		                     title: "Buttongroup",
		                     url: "/assets/app/template/btngrp.htm",
		                     description: "Buttongroup mit Standard Buttons"
		                 },	
		                 {
		                     title: "Buttongroup Secondary",
		                     url: "/assets/app/template/btngrps.htm",
		                     description: "Buttongroup mit Secondary Standard Buttons"
		                 },	
		                 {
		                     title: "Buttongroup Small",
		                     url: "/assets/app/template/btngrpsm.htm",
		                     description: "Buttongroup mit Standard Buttons"
		                 },	
		                 {
		                     title: "Buttongroup Small Secondary",
		                     url: "/assets/app/template/btngrpsms.htm",
		                     description: "Buttongroup mit Secondary Standard Buttons"
		                 },	
		                 {
		                     title: "Buttongroup Expanded",
		                     url: "/assets/app/template/btngrpex.htm",
		                     description: "Buttongroup Expanded mit Standard Buttons"
		                 },	
		                 {
		                     title: "Buttongroup Secondary Expanded",
		                     url: "/assets/app/template/btngrpexs.htm",
		                     description: "Buttongroup Expanded mit Secondary Standard Buttons"
		                 },	
		                 {
		                     title: "Buttongroup Expanded stacked-for-small",
		                     url: "/assets/app/template/btngrpexsts.htm",
		                     description: "Buttongroup Expanded stacked mit Standard Buttons"
		                 },			                 		                 		                 		                 		                 	                 
		             ]
		});
		if ( $("#mediaLinkPage").length ){
			$("#mediaLinkPage").change(function(ev){
				ev.preventDefault();
				$("#mediaLinkUrl").val(  $("#mediaLinkPage").val()  );
			});
		}	
		if ( $("#element").length ){
			$("#element").change(function(ev){
				ev.preventDefault();
				switch($("#element").val()){
					case 'panel':
					   $('#elementAttribute').val('class:panel;');
					   break;
					case 'callout':
					   $('#elementAttribute').val('class:callout;');
					   break;	
				    case 'flexvideo':
					   $('#elementAttribute').val('class:flex-video;');
					   break;
					case 'column2':
					    $('#elementAttribute').val('class:contribution-columns;');
						break;
					default:
					break;				    
				}
			});
		}	
		$("#mediaPlaceholder").click( function(ev){ 
			if (false === $( this ).prop( "checked" )){
				 tinyMCE.activeEditor.selection.setContent('');
			} else {
				tinyMCE.execCommand('mceInsertContent',false,'{MEDIAPLACE}'); 
			}
		});
		$('.editorlink').click(function(ev){
			ev.preventDefault();
			var elm = $(this).attr('data-ref');
			var link = $(this).attr('data-link');
			var media = $('#' + elm).val();
			var label = $('#' + elm + ' option:selected').text();
			if (media.length > 0) {
				var str = '';
				var selectedText = tinyMCE.activeEditor.selection.getContent({format: 'text'});
				if ('org' === link){
					if (selectedText.length > 0) {
						label = selectedText;
					} else {
						label = label.replace('(internal)','');
						label = label.trim();
					}
					str += '<a href="'+ media +'">' + label + '</a>';
				} else {
					if (selectedText.length > 0) {
						label = selectedText;
					} else  {
						label = label.substr(label.indexOf('#') + 1);
					}
					
					str += '<a href="/' + link + '/'+ media +'">' + label + '</a>';				
				}
				tinyMCE.activeEditor.insertContent(str);
	        	$('#' +  elm + ' option:selected').prop("selected",false);
	        	$('#' +  elm ).trigger("chosen:updated");
			}
		});	
});