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
				<h1>Recommended Movies</h1>
				<div id="recommended-movies" class="col-md-12">
				<?php
				foreach($recommended_movies as $rm){
				?>
				<div class="col-md-6">
					<img src="http://image.tmdb.org/t/p/w500<?php echo $rm['_source']['poster_path'] ?>" alt="<?php echo $rm['_source']['title'] ?>">
					<h4><?php echo $rm['_source']['title']; ?></h4>
					<div class="release-date">
					<?php echo $rm['_source']['release_date']; ?>
					</div>
					<div class="genre">
					<?php echo $rm['_source']['genre']; ?>
					</div>
					<div class="overview">			
					<?php
					echo $rm['_source']['overview'];
					?>
					</div>
				</div>

				<?php	
				}
				?>		
				</div>
			</div>
		
		</div>
	</div>

</body>
</html>