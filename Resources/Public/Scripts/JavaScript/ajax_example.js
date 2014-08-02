(function($) {
	$(function() {
		$('#ajax-submit').on('click', function(event) {
			event.preventDefault();
			var $nameField = $('#greeted-name');
			if (!$nameField.val()) {
				alert("Please enter a name!");
				return;
			}
			var $submitButton = $(this);
			var uri = $submitButton.data('ajaxuri');
			var parameters = {};
			parameters[$nameField.attr("name")] = $nameField.val();
			$.ajax(
				uri,
				{
					"type": "post",
					"data": parameters
				}
			).done(function(result) {
				$(".tx-ajax-example").html(result);
			});
		});

		function registerAjaxInterceptor(linkElementSelector, resultElementSelector, outputTime) {
			outputTime = outputTime || false;
			$('body').on('click', linkElementSelector, function(event) {
				event.preventDefault();
				var $linkElement = $(this);
				var uri = $linkElement.attr('href');
				var startTime = new Date().getTime();
				var duration = 0;

				$.ajax(
					uri,
					{
						"type": "post"
					}
				).done(function(result) {
					duration = new Date().getTime() - startTime;
					if (outputTime) {
						result = duration + 'ms <br>' + result;
					}
					$(resultElementSelector).html(result);
				});
			});

		}

		registerAjaxInterceptor('.f3-widget-paginator a', '.news');
		registerAjaxInterceptor('.ajax-link', '#ajax-results', true);

	});
})(jQuery);
