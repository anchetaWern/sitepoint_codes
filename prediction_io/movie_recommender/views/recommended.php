<div class="row">
	<h1>Recommended Movies</h1>
	<div id="recommended-movies" class="col-md-12">
	<?php
	foreach($recommended_movies as $rm){
	?>

	<div class="col-md-6">
		<img src="http://image.tmdb.org/t/p/w500<?php echo $rm['ca_poster_path'] ?>" alt="<?php echo $rm['ca_title'] ?>">
		<h4><?php echo $rm['ca_title']; ?></h4>
		<div class="release-date">
		<?php echo $rm['ca_release_date']; ?>
		</div>
		<div class="overview">			
		<?php
		echo $rm['ca_overview'];
		?>
		</div>
	</div>

	<?php	
	}
	?>		
	</div>
</div>