$(document).ready(function(){  
	$(':input').keypress(function(e) {
		if (e.which == 13) {	
			var queueItem = $(this).parent('.uploadifyQueueItem');
			if (queueItem.hasClass('completed')) {
				var url = '/resources/saveDescription';
				var data = {'id' : $(this).attr('rel'), 'description' : $(this).val()};
				$.get(url, data, function() {
					queueItem.next('.uploadifyQueueItem').find(':input').focus();
					queueItem.remove();
				});
			} 
			e.preventDefault();
		}
	});
});
