<div class="collections index">
	<h2><?php __('Collections');?></h2>
	<table cellpadding="0" cellspacing="0" border="0" style="width:500px">
		<tr>
			<th width="60%">Title</th>
			<th width="20%">Hierarchy</th>
			<th width="20%">Actions</th>
		</tr>
	<? foreach($collections as $id => $collection) { ?>
		<tr>
			<td>
				<?=$this->Html->link($collection, array('action' => 'view', $id), array('escape' => false, 'target' => '_blank'))?>
			</td>
			<td>
				&nbsp;&nbsp;<?=$this->Html->link('&uarr;', array('action' => 'move', $id, -1), array('escape' => false))?>
				&nbsp;&nbsp;<?=$this->Html->link('&darr;', array('action' => 'move', $id, 1), array('escape' => false))?>
			</td>
			<td>
				<?=$this->Html->link('Edit', array('action' => 'edit', $id))?><span class="gray-sep">|</span><span class="red"><?=$this->Html->link('Delete', array('action' => 'delete', $id), array('confirm' => "Are you sure you want to delete {$collection}?"))?></span>
			</td>
		</tr>
	<? } ?>
	</table>
</div>
