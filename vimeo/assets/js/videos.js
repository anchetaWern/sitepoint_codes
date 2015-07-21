$('.like').click(function(){
	var self = $(this);
	var uri = self.data('uri');
	$.post(
		'/tester/vimeo-slim/video/like',
		{
			'uri': uri
		},
		function(response){
			if(response.status == '204'){
				self.prop('disabled', true);
			}
		}
	);
});

$('.watch-later').click(function(){
	var self = $(this);
	var uri = self.data('uri');
	$.post(
		'/tester/vimeo-slim/video/watchlater',
		{
			'uri': uri
		},
		function(response){
			if(response.status == '204'){
				self.prop('disabled', true);
			}
		}
	);
});