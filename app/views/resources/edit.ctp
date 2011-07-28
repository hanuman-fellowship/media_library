<div class="resources form">
<?php echo $this->Form->create('Resource');?>
	<fieldset>
		<legend><?php __('Edit Resource'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('file_type_id');
		echo $this->Form->input('file_name');
		echo $this->Form->input('collection_id');
		echo $this->Form->input('description');
		echo $this->Form->input('sort_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Resource.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Resource.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Resources', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List File Types', true), array('controller' => 'file_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New File Type', true), array('controller' => 'file_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Collections', true), array('controller' => 'collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collection', true), array('controller' => 'collections', 'action' => 'add')); ?> </li>
	</ul>
</div>