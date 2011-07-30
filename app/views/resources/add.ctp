<?
$file_uploaded = false;
if (isset($this->data['Resource']['filename'])) {
	if ($this->data['Resource']['filename']) {
		$file_uploaded = true;
	}
}
?>
<div class="resources form">
<?php echo $this->Form->create('Resource');?>
	<?php
		echo $this->Form->label('collection_id','Collection');
		echo $this->Form->select('collection_id',$collections,null,array('escape'=>false));
		echo $this->Form->error('collection_id');
		echo $this->element('upload_resource');
		echo $this->Form->hidden('filename', array('enabled' => false));
		echo $this->Form->error('filename');
	?>
	<div id='files'>
		<div id='proto' style='display:none'>
			<span></span>
			<?=$this->Form->input('description', array('name' => '', 'id' => ''))?>
		</div>
	</div>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
