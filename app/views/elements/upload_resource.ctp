<link href="/app/webroot/css/uploadify.css" type="text/css" rel="stylesheet" /> 
<script type="text/javascript" src="/app/webroot/files/uploadify/swfobject.js"></script> 
<script type="text/javascript" src="/app/webroot/js/jquery.uploadify.v2.1.4.min.js"></script> 
<script type="text/javascript"> 
$(document).ready(function() {
	var goAhead = true;
	$('#resource_upload').uploadify({
		'uploader'       : '/app/webroot/files/uploadify/uploadify.swf',
		'cancelImg'      : '/app/webroot/files/uploadify/cancel.png',
		'script'         : '/resources/upload',
		'multi'          : true,
		'auto'           : true,
		'buttonText'     : 'Upload Files',
		'folder'         : '/app/files/resources',
		'removeCompleted': false,
		'onSelect'       : function(event, id, fileObj) {
			if (!$('#ResourceCollectionId').val()) {
				alert('Please choose a Collection');
				goAhead = false;
				return false;
			} else {
				$('#ResourceCollectionId').attr('disabled', true);
			}
		},
		'onProgress'     : function(event, id, fileObj) {
			if ($('#data'+id).length == 0) {
				$('#proto').clone().appendTo('#resource_upload'+id).attr('id','uploading'+ id).watermark('Description').show();
			}
		},
		'onComplete'     : function(eventb,id,fileObj,response,data) {
			if (goAhead) {
				var url = "/resources/upload/" + response + "/" + $('#ResourceCollectionId').val();
				$.get(url, function(dbId){
					$('#uploading'+id).attr('id',"Resource"+ dbId +"Description").attr('name',"data[Resource][descriptions]["+dbId+"]");
				});
				$('#resource_upload'+id).find('.cancel').remove();
			}
		}
	});
});
</script> 
<?=$this->Form->input('resource', array('type' => 'file', 'id' => 'resource_upload', 'label' => false))?>
