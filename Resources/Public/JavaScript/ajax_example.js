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


		$('.news').on('click', '.f3-widget-paginator a', function(event) {
			event.preventDefault();
			var $linkElement = $(this);
			var uri = $linkElement.attr('href');
			$.ajax(
				uri,
				{
					"type": "get"
				}
			).done(function(result) {
				$(".news").html(result);
			});
		});
	});
})(jQuery);
