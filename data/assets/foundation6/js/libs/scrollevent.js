(function($) {

	'use strict';

	var SCROLLOFFSET = -1;

	var ScrollLoad = function(element, options) {
		var listItem = options.listItem;
		var listContainer = options.listContainer;
		var nextMarker = options.nextMarker;
		var dataUrl = options.dataUrl;
		var paginationElement = options.pagination;
		var delay = options.delay;
		var negativeMargin = options.negativeMargin;
		var loadAttribute = options.attribute;

		var isPaused = false;
		var scrollContainer = element;
		var container = (window === element.get(0) ? $(document) : element);
		
        var loadsrc = 'data:image/gif;base64,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';
        var loadhtml = '<div id="loadspinner" style="text-align: center;"><img src="{src}"/></div>';		

		element.hidePagination = function() {
			if (paginationElement) {
				$(paginationElement).hide();
			}
		};

		element.restorePagination = function() {
			if (paginationElement) {
				$(paginationElement).show();
			}
		};

		element.getScrollContainer = function() {
			return scrollContainer;
		};

		element.getContainer = function() {
			return container;
		};

		element.getItemsContainer = function() {
			return $(listContainer, container);
		};

		element.getLastItem = function() {
			return $(listItem, element.getItemsContainer().get(0)).last();
		};

		element.getNextElement = function() {

			// always take the last matching item
			return $(nextMarker, container).last();
		};

		element.getNextUrl = function() {

			// always take the last matching item
			return $(nextMarker, container).last().attr(dataUrl);
		};

		element.getCurrentScrollOffset = function(container) {
			var scrollTop = 0,
			    containerHeight = container.height();

			if (window === container.get(0)) {
				scrollTop = container.scrollTop();
			} else {
				scrollTop = container.offset().top;
			}

			// compensate for iPhone
			if (navigator.platform.indexOf("iPhone") != -1 || navigator.platform.indexOf("iPod") != -1) {
				containerHeight += 80;
			}

			return (scrollTop + containerHeight);
		};

		element.getScrollThreshold = function(negativeMargin) {
			var lastElement;
			var documentHeight = $(document).height();

			//negativeMargin = negativeMargin || this.negativeMargin;
			negativeMargin = (negativeMargin >= 0 ? negativeMargin * -1 : negativeMargin);

			lastElement = element.getLastItem();

			// if the don't have a last element, the DOM might not have been loaded,
			// or the selector is invalid
			if (0 === lastElement.length) {
				return SCROLLOFFSET;
			}

			//return (lastElement.offset().top + lastElement.height() + negativeMargin);
			return documentHeight;
		};

		element.load = function(url) {
			var jsXhrData = {};
			$.ajax({
				url : '/contentplugin/' + url,
				async : false,
				type : 'POST',
				dataType : 'html',
				data : loadAttribute,
				beforeSend: function() {
				    $(listContainer).append( loadhtml.replace('{src}',loadsrc));
				},				
				success : function(data) {
					jsXhrData = data;
					$('#loadspinner').remove();
				}
			});
			return jsXhrData;
		};

		element.scrollHandler = function() {
			if (true === isPaused) {
				return;
			}
			var currentScrollOffset = element.getCurrentScrollOffset(scrollContainer),
			    scrollThreshold = element.getScrollThreshold();
			if (SCROLLOFFSET == scrollThreshold) {
				return;
			}
			$(window).scroll(function() {
				var nextUrl = element.getNextUrl();
				var prevElement = element.getNextElement();
				if ($(prevElement).hasClass('next')) {
					if (element.getCurrentScrollOffset(scrollContainer) >= element.getScrollThreshold()) {
						//console.log('scroll');
						//console.log(prevElement);
						$(prevElement).removeClass('next');
						var nextElement = $(prevElement).next();
						$(listContainer).append(element.load(nextUrl));
						if (! $(nextElement).has( "li" )){
							$(listContainer).append('<p>Keine weiteren Daten.</p>');
						} else {
							$(nextElement).addClass('next');
						}
					}
				}
			});
		};
		return element;
	};
	$.extend($.fn, {

		ScrollEvent : function(option) {
			var $window = $(window);
			var defaults = {
				listItem : '.item',
				listContainer : '.listing',
				nextMarker : '.next',
				dataUrl : 'data-url',
				pagination : false,
				delay : 600,
				negativeMargin : 10
			};

			defaults = $.extend({}, defaults, option);
			defaults.attribute = $(defaults.pagination).data();

			var trigger = ScrollLoad($window, defaults);
			var supportsOnScroll = (!!('onscroll' in trigger.getScrollContainer().get(0))),
			    currentScrollOffset = trigger.getCurrentScrollOffset(trigger.getScrollContainer()),
			    scrollThreshold = trigger.getScrollThreshold();

			trigger.hidePagination();
			trigger.scrollHandler();

		},
	});

})(jQuery); 