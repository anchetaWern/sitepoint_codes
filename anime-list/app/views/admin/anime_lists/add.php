<h2>Add Anime List</h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('title'); ?>
<?php echo $this->form->input('poster'); ?>
<?php echo $this->form->input('plot'); ?>
<?php echo $this->form->input('genres'); ?>
<?php echo $this->form->input('producer'); ?>
<?php echo $this->form->end('Add'); ?>