<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<div id="wrapper">
		<div class="navbar navbar-default">
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="">Movie Recommender</a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse">
		    <ul class="nav navbar-nav">
		      <li><a href="/">Home</a></li>
		    </ul>
		  </div>
		</div>

		<div class="container">

			<div class="row">
				
				<div id="movie-container" class="col-md-10 col-centered">
					
				</div>
				
			</div>


			<script id="movie-template" type="text/x-handlebars-template">
				<div class="col-md-8">
					<img src="http://image.tmdb.org/t/p/w500{{_source.poster_path}}">
				</div>
				<div class="col-md-4">
					<h3>{{_source.title}}</h3>
					<div class="release-date">
						{{_source.release_date}}
					</div>
					<div class="genre">
						Genre: {{_source.genre}}
					</div>
					<div class="overview">
						{{_source.overview}}
					</div>
					<div class="button-container">
						<button class="btn btn-success btn-block btn-next" data-id="{{_id}}" data-action="like">Like</button>
						<button class="btn btn-danger btn-block btn-next" data-id="{{_id}}" data-action="dislike">Dislike</button>
						<a href="/movies/recommended" class="show-recommendations">Show Recommendations</a>
					</div>
				</div>
			</script>


			<span class="label label-success"></span>

		
		</div>
	</div>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/handlebars.min.js"></script>
	<script src="/assets/js/main.js"></script>
</body>
</html>