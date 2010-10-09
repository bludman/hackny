<div class="sites form">
<?php echo $this->Form->create('Site');?>
	<fieldset>
 		<legend><?php __('Add Site'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('owner_email');
		//echo $this->Form->input('edit_key');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sites', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Links', true), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link', true), array('controller' => 'links', 'action' => 'add')); ?> </li>
	</ul>
</div>