<h2>Anime Lists</h2>

<div id="anime-shows">
	<?php foreach ($objects as $object): ?>

	    <?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>

	<?php endforeach; ?>
</div>
<div id="pagination">
	<?php echo $this->pagination(); ?>
</div>