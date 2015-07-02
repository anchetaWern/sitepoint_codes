<div class="anime-show">
	<div class="anime-poster-container">
		<a href="<?php echo mvc_public_url(array('controller' => 'anime_lists', 'id' => $object->id)); ?>">
			<img src="<?php echo $object->poster; ?>" class="anime-poster">
		</a>
	</div>
	<div>
		<strong><?php echo $object->title; ?></strong>
	</div>
	<div>
		<?php echo $object->producer; ?>
	</div>
	<div class="genre">
		<small><?php echo $object->genres; ?></small>
	</div>
</div>