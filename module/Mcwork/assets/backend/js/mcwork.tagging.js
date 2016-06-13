(function ($){
	$.fn.McworkFileCategories = function(options, elm){
		var TagsTemplate = {
			header : {
				content : {
					element : 'h4',
					'attr' : {
						'id' : 'modalhead',
					},
					'translate' : {
						'key' : 'heads',
						'txt' : 'filecategories'
					},
					'behind' : ' [<span id="mcfilename"> </span>] <span id="server-process"> </span>'
				}
			},
			body : {
				content : {
					element : 'p',
					'attr' : {
						'class' : 'alizarin-color'
					},
					'txt' : 
						formtags()
				}
			},
			footer : {
				content : {
					row : {
						element : 'ul',
						'attr' : {
							'class' : 'modal-buttons right'
						}
					},
					'grids' : {
						'1' : {
							'element' : 'li'
						},
						'2' : {
							'element' : 'li'
						}						
					},
					'1' : {
						'element' : 'button',
						'attr' : {
							'id' : 'tag-button',
							'class' : 'button alert'
						},
						'translate' : {
							'key' : 'btn',
							'txt' : 'save'
						}
					},
					'2' : {
						'element' : 'button',
						'attr' : {
							'id' : 'cancel-button',
							'class' : 'button'
						},
						'translate' : {
							'key' : 'btn',
							'txt' : 'cancel'
						}
					}
				}
			}
		};
		var defaults = {
			url : '/mcwork/services/application/savetags',
			model : false,
			alltags : Mcwork.Server.request({url : '/mcwork/services/application/alltags', data : {'group':$(elm).attr('data-group')}}),
			elementTags : $(elm).attr('data-tags'),
			mediaName : $(elm).attr('data-filename'),
			ident : $(elm).attr('data-ident'),
			taggroup : $(elm).attr('data-group'),
		};
		var opts = $.extend({}, defaults, options);	
		function formtags(){
			var html = '<form action="#" method="POST" class="tags well"> <label for="tag" class="control-label">' + Mcwork.Language.translate('labels','adminfilecategories') +'</label>';
			html += '<div data-tags-input-name="taggone" id="tag">';
			html +=  '';
			html += '</div>';
			html += '<p class="help-block">'+  Mcwork.Language.translate('text', 'tagshelpblock')  +'</p>';
			html += '</form>';	
			return html;			
		};		
		Mcwork.Modals.build(Mcwork.ArrayMerge.recursive( Mcwork.Modals.getBasicModal(), TagsTemplate ));
	    $('#mcfilename').html(opts.mediaName);
	    console.log(opts.alltags);
		var t = $("#tag").tagging(Mcwork.Parameter.getTagging());
		$( "#mcautocompletetags" ).autocomplete({
			source: opts.alltags
		});
		$tagBox = t[0];
		if (opts.elementTags.length > 1 ){
			$tagBox.tagging( "add", opts.elementTags.split(',') );
		}
		$('#tag-button').click(function(ev) {
			ev.preventDefault();
			//console.log($tagBox.tagging( "getTags" ));			
			var sendData = {};
			sendData.tags = $tagBox.tagging( "getTags" );
			sendData.ident = opts.ident;
			sendData.model = opts.model;
			sendData.group = opts.taggroup;
			$.ajax({
					url :  opts.url, 
					type : 'POST',
					data : sendData,	
					beforeSend: function(){ 
						$('#server-process').html( Mcwork.Icons.getprocess() );	
					},	
					success : function(data) {
						var obj = jQuery.parseJSON(data);
						if (obj.error) {
							$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
							$('#modalcontent').html( Mcwork.Html.build('p', {'txt':  obj.error } ) );	
						} else {
							$('#tag-button').hide();
							$('#cancel-button').html( Mcwork.Language.translate('btn', 'close') );
							Mcwork.Parameter.hasRemoveClass('#modalhead', Mcwork.Colors.get(Mcwork.Colors.WARN));  
							$('#modalhead').addClass( Mcwork.Colors.get(Mcwork.Colors.SUCCESS));  								
							$('#server-process').html( Mcwork.Icons.getsuccess() );
							$('#modalcontent').html( '<p>' + Mcwork.Language.translate('messages', 'serversuccess') + '</p>' );
							$(elm).attr('data-tags',sendData.tags.toString());
							var cats = '';
							$.each(sendData.tags, function(i,val) { 
							      cats += '<span class="label">' + val + '</span>';
							});
							$('#cat' + sendData.ident).html(cats);
						}				
				
					},
					error: function (xhr, ajaxOptions, thrownError) {									
							var msg = 'Response Status: ' + xhr.status + ' ' + thrownError;
							$('#modalhead').html(Mcwork.Language.translate('errors', 'server') + ' ' + Mcwork.Icons.getwarn() );
							$('#modalcontent').html( Mcwork.Html.build('p', {'txt':  msg } ) );
					}	
			});
		});
		$('#cancel-button').click(function(ev) {
			ev.preventDefault();
			$( Mcwork.Modals.getStdModal()).foundation('reveal', 'close');
		});			
	};
})(jQuery);
$(document).ready(function() {
	$(document.body).on('click', '.filetags', function(ev) {	
		ev.preventDefault();
		$().McworkFileCategories({model : 'file_tags'},this);
	});	
});