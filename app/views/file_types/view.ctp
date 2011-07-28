<div class="fileTypes view">
<h2><?php  __('File Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fileType['FileType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fileType['FileType']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit File Type', true), array('action' => 'edit', $fileType['FileType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete File Type', true), array('action' => 'delete', $fileType['FileType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fileType['FileType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List File Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New File Type', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources', true), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource', true), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Resources');?></h3>
	<?php if (!empty($fileType['Resource'])):?>
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
		foreach ($fileType['Resource'] as $resource):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $resource['id'];?></td>
			<td><?php echo $resource['file_type_id'];?></td>
			<td><?php echo $resource['file_name'];?></td>
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
