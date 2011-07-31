$(document).ready(function(){  
	$(':input').keypress(function(e) {
		if (e.which == 13) {	
			var goAhead = false;
			var queueItem = $(this).parent('.uploadifyQueueItem');
			if (queueItem.hasClass('completed')) {
				if ($('.uploadifyQueueItem').length == 1) { // if it's the last one, submit the form like normal!
					goAhead = true;
				} else {
					var url = '/resources/saveDescription';
					var data = {'id' : $(this).attr('rel'), 'description' : $(this).val()};
					$.get(url, data, function() {
						if (queueItem.next('.uploadifyQueueItem').length) {
							queueItem.next('.uploadifyQueueItem').find(':input').focus();
						} else {
							queueItem.prev('.uploadifyQueueItem').find(':input').focus();
						}
						queueItem.remove();
					});
				}
			} 
			if (!goAhead) e.preventDefault();
		}
	});
});
