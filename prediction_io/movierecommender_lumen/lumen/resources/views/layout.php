<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo $base_path; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $base_path; ?>/assets/css/style.css">
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
		    <a class="navbar-brand" href="<?php echo $base_path; ?>">Movie Recommender</a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse">
		    <ul class="nav navbar-nav">
		      <li><a href="/">Home</a></li>
		    </ul>
		  </div>
		</div>

		<div class="container">
		<?php echo $content; ?>
		</div>
	</div>
	<script src="<?php echo $base_path; ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo $base_path; ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $base_path; ?>/assets/js/handlebars.min.js"></script>
	<script src="<?php echo $base_path; ?>/assets/js/main.js"></script>
</body>
</html>