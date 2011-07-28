<div class="collections view">
<h2><?php  __('Collection');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $collection['Collection']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $collection['Collection']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $collection['Collection']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $collection['Collection']['parent_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lft'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $collection['Collection']['lft']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $collection['Collection']['rght']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Collection', true), array('action' => 'edit', $collection['Collection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Collection', true), array('action' => 'delete', $collection['Collection']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $collection['Collection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Collections', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collection', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources', true), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource', true), array('controller' => 'resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subscriptions', true), array('controller' => 'subscriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subscription', true), array('controller' => 'subscriptions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Resources');?></h3>
	<?php if (!empty($collection['Resource'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('File Type Id'); ?></th>
		<th><?php __('File Name'); ?></th>
		<th><?php __('Collection Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Sort Order'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($collection['Resource'] as $resource):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resource['id'];?></td>
			<td><?php echo $resource['file_type_id'];?></td>
			<td><?php echo $resource['filename'];?></td>
			<td><?php echo $resource['collection_id'];?></td>
			<td><?php echo $resource['description'];?></td>
			<td><?php echo $resource['sort_order'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'resources', 'action' => 'view', $resource['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'resources', 'action' => 'edit', $resource['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'resources', 'action' => 'delete', $resource['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resource['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resource', true), array('controller' => 'resources', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Subscriptions');?></h3>
	<?php if (!empty($collection['Subscription'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Collection Id'); ?></th>
		<th><?php __('Expiration Date'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($collection['Subscription'] as $subscription):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $subscription['id'];?></td>
			<td><?php echo $subscription['user_id'];?></td>
			<td><?php echo $subscription['collection_id'];?></td>
			<td><?php echo $subscription['expiration_date'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'subscriptions', 'action' => 'view', $subscription['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'subscriptions', 'action' => 'edit', $subscription['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'subscriptions', 'action' => 'delete', $subscription['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subscription['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subscription', true), array('controller' => 'subscriptions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
