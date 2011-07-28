<div class="resources index">
	<h2><?php __('Resources');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('file_type_id');?></th>
			<th><?php echo $this->Paginator->sort('filename');?></th>
			<th><?php echo $this->Paginator->sort('collection_id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('sort_order');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($resources as $resource):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $resource['Resource']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resource['FileType']['name'], array('controller' => 'file_types', 'action' => 'view', $resource['FileType']['id'])); ?>
		</td>
		<td><?php echo $resource['Resource']['filename']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resource['Collection']['title'], array('controller' => 'collections', 'action' => 'view', $resource['Collection']['id'])); ?>
		</td>
		<td><?php echo $resource['Resource']['description']; ?>&nbsp;</td>
		<td><?php echo $resource['Resource']['sort_order']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $resource['Resource']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $resource['Resource']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $resource['Resource']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resource['Resource']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Resource', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List File Types', true), array('controller' => 'file_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New File Type', true), array('controller' => 'file_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Collections', true), array('controller' => 'collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collection', true), array('controller' => 'collections', 'action' => 'add')); ?> </li>
	</ul>
</div>
