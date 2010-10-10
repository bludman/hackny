<div class="sites form">
<?php echo $this->Form->create('Site');?>
	<fieldset>
 		<legend><?php __('Edit Site'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('owner_email');
		echo $this->Form->input('edit_key');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Site.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Site.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sites', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Links', true), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link', true), array('controller' => 'links', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php 
$i=0;
foreach ($links as $link):?>
	<div class="links form">
	<?php echo $this->Form->create();?>
		<fieldset>
	 		<legend><?php __('Edit Link'); ?></legend>
		<?php
			echo $this->Form->hidden('Link.'.$i.'.id');
			echo $this->Form->hidden('Link.'.$i.'.site_id');
			echo $this->Form->input('Link.'.$i.'.link_text');
			echo $this->Form->input('Link.'.$i.'.link_uri');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
	
<?php 
$i++;
endforeach; ?>

<div class="actions">
		<h3><?php __('Actions'); ?></h3>
		<ul>
	
			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Link.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Link.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Links', true), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('List Sites', true), array('controller' => 'sites', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Site', true), array('controller' => 'sites', 'action' => 'add')); ?> </li>
		</ul>
	</div>