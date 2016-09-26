$(document).ready(function() {
	if ( $(".newsteaser").length) {
		tinymce.init({
		    selector: "textarea#contentTeaser",
		    language : 'de',
		    browser_spellcheck : true ,
		    height: 100,
		    convert_urls: false,
		    style_formats: [
		                    {title: "Headers", items: [
		                        {title: "Header 2", format: "h2"},
		                        {title: "Header 3", format: "h3"},
		                        {title: "Header 4", format: "h4"},
		                        {title: "Header 5", format: "h5"},
		                        {title: "Header 6", format: "h6"}
		                    ]},
		                    {title: "Inline", items: [
		                        {title: "Bold", icon: "bold", format: "bold"},
		                        {title: "Italic", icon: "italic", format: "italic"},
		                    ]},
		                    {title: "Blocks", items: [
		                        {title: "Paragraph", format: "p"},

		                    ]},
		                    {title: "Alignment", items: [
		                        {title: "Left", icon: "alignleft", format: "alignleft"},
		                        {title: "Center", icon: "aligncenter", format: "aligncenter"},
		                        {title: "Right", icon: "alignright", format: "alignright"},
		                        {title: "Justify", icon: "alignjustify", format: "alignjustify"}
		                    ]}
		                ],			    
		    
		    plugins: [
		        "paste, code"
		    ],	    
		    menubar: "file insert edit tools",  
		    toolbar: "insertfile undo redo | styleselect | bold italic"
		});
    }		
	if ( $(".newscontent").length) {
		tinymce.init({
		    selector: "textarea#content",
		    language : 'de',
		    browser_spellcheck : true ,
		    height: 400,
		    convert_urls: false,
		    content_css : "/assets/app/tinymce/css/content.css" ,
		    extended_valid_elements : "i[class],span[itemprop|itemscope|itemtype|class]",
		    link_list: "/mcwork/services/application/linklist",
		    link_class_list: [
		                      {title: 'None', value: ''},
		                      {title: 'Video Youtube Modal', value: 'popup-youtube'},
		                      {title: 'Button Video Youtube (Foundation)', value: 'button popup-youtube'},
		                      {title: 'Button mini (Foundation)', value: 'button tiny'},
		                      {title: 'Button small (Foundation)', value: 'button small'},
		                      {title: 'Button standard (Foundation)', value: 'button'},
		                      {title: 'Button large (Foundation)', value: 'button large'},
		                      {title: 'Button expand (Foundation)', value: 'button expand'},
		                      {title: 'Button secondary mini (Foundation)', value: 'button secondary tiny'},
		                      {title: 'Button secondary small (Foundation)', value: 'button secondary small'},
		                      {title: 'Button secondary standard (Foundation)', value: 'button secondary'},
		                      {title: 'Button secondary large (Foundation)', value: 'button secondary large'},
		                      {title: 'Button secondary expand (Foundation)', value: 'button secondary expand'},
		                      {title: 'Button info mini (Foundation)', value: 'button info tiny'},
		                      {title: 'Button info small (Foundation)', value: 'button info small'},
		                      {title: 'Button info standard (Foundation)', value: 'button info'},
		                      {title: 'Button info large (Foundation)', value: 'button info large'},
		                      {title: 'Button info expand (Foundation)', value: 'button info expand'},	
		                      {title: 'Button success mini (Foundation)', value: 'button success tiny'},
		                      {title: 'Button success small (Foundation)', value: 'button success small'},
		                      {title: 'Button success standard (Foundation)', value: 'button success'},
		                      {title: 'Button success large (Foundation)', value: 'button success large'},
		                      {title: 'Button success expand (Foundation)', value: 'button success expand'},	
		                      {title: 'Button alert mini (Foundation)', value: 'button alert tiny'},
		                      {title: 'Button alert small (Foundation)', value: 'button alert small'},
		                      {title: 'Button alert standard (Foundation)', value: 'button alert'},
		                      {title: 'Button alert large (Foundation)', value: 'button alert large'},
		                      {title: 'Button alert expand (Foundation)', value: 'button alert expand'},     
		    ],	
		    style_formats: [
		                    {title: "Headers", items: [
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
		        	  	        "advlist autolink lists link charmap print anchor",
		        	  	        "searchreplace code",
		        	  	        "media table contextmenu paste"
		        	  	    ],	
		    menubar: "file insert edit view table tools",    	  	    
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link unlink"
		});		
	    }
	    
	    $("#contentTags").chosen({width : '100%',max_selected_options: 10,	no_results_text: "Nothing found, add this in new tags",	});


	    
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
				    case 'flexwide':
					   $('#elementAttribute').val('class:flex-video widescreen;');
					   break;
				    case 'flexvimeo':
					   $('#elementAttribute').val('class:flex-video widescreen vimeo;');
					   break;					   					   
					default:
					break;				    
				}
			});
		}				
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
		$("#mediaPlaceholder").click( function(ev){ 
			if (false === $( this ).prop( "checked" )){
				 tinyMCE.activeEditor.selection.setContent('');
			} else {
				tinyMCE.execCommand('mceInsertContent',false,'{MEDIAPLACE}'); 
			}
		});		
});