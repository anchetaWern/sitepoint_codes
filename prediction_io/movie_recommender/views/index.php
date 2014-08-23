<div class="row">
	
	<div id="movie-container" class="col-md-10 col-centered">
		
	</div>
	
</div>
<div class="row">
	<div id="recommended-movie-container" class="col-md-12 col-centered">

	</div>
</div>

<script id="movie-template" type="text/x-handlebars-template">
	<div class="col-md-8">
		<img src="http://image.tmdb.org/t/p/w500{{ca_poster_path}}">
	</div>
	<div class="col-md-4">	
		<h3>{{ca_title}}</h3>
		<div class="release-date">
			{{ca_release_date}}
		</div>
		<div class="overview">
			{{ca_overview}}
		</div>
		<div class="button-container">
			<button class="btn btn-success btn-block btn-next" data-id="{{_id}}" data-action="like">Like</button>
			<button class="btn btn-danger btn-block btn-next" data-id="{{_id}}" data-action="dislike">Dislike</button>
			<a href="/movie_recommender/movies/recommended" class="show-recommendations">Show Recommendations</a>
		</div>
	</div>
</script>


<span class="label label-success"></span>

<script id="recommended-movie-template" type="text/x-handlebars-template">
	<div class="col-md-4">
		<img src="http://image.tmdb.org/t/p/w500{{ca_poster_path}}" class="rm-image">
		<h5>{{ca_title}}</h5>
		<div class="release-date">
			{{ca_release_date}}
		</div>
		<div class="overview">
			{{ca_overview}}
		</div>	
	</div>
</script>