<p>
    <?php echo $this->html->link('&#8592; All Anime Lists', array('controller' => 'anime_lists')); ?>
</p>
<div id="anime-show">
	<div class="anime-poster-container">
		<img src="<?php echo $object->poster; ?>" class="anime-poster">
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
	<div class="plot">
		<small><?php echo $object->plot; ?></small>
	</div>
</div>