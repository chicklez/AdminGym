<br>
<br>
<br>
<br>
<div class="col-sm-2 col-md-2 sidebar">
	<h3><?php echo __('Acciones'); ?></h3>
	<div class="list-group">
	<ul>
		<?php echo $this->Html->link(__('Lista Instructores'), array('action' => 'index')); ?>
	</ul>
	</div>
</div>

<div class="instructores form">
<?php echo $this->Form->create('Instructor'); ?>
	<fieldset>
		<legend><?php echo __('Add Instructor'); ?></legend>
	<?php
		echo $this->Form->input('nombre', array ('class'=>'form-control'));
		echo $this->Form->input('apellido', array ('class'=>'form-control'));
		echo $this->Form->input('telefono', array ('class'=>'form-control'));
		echo $this->Form->input('email', array ('class'=>'form-control'));
		echo $this->Form->input('foto', array ('class'=>'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
