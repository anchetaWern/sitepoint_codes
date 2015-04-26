var movie_src = $("#movie-template").html();
var movie_template = Handlebars.compile(movie_src);

function getRandomMovie(request_data){

	request_data = typeof request_data !== 'undefined' ? request_data : {};

	$.post('movie/random', request_data, function(response){
		var data = response
		
		var movie_html = movie_template(data);
		$('#movie-container').html(movie_html);
		
		if(data.has_recommended){
			$('.show-recommendations').show();
		}

	});
}

getRandomMovie();

$('#movie-container').on('click', '.btn-next', function(){
	var self = $(this);
	var id = self.data('id');
	var action = self.data('action');
	getRandomMovie({'movie_id' : id, 'action' : action});

});