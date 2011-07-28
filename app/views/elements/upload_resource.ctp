<link href="/app/webroot/css/uploadify.css" type="text/css" rel="stylesheet" /> 
<script type="text/javascript" src="/app/webroot/files/uploadify/swfobject.js"></script> 
<script type="text/javascript" src="/app/webroot/js/jquery.uploadify.v2.1.4.min.js"></script> 
<script type="text/javascript"> 
$(document).ready(function() {
	$('#resource_upload').uploadify({
		'uploader'      : '/app/webroot/files/uploadify/uploadify.swf',
		'cancelImg'     : '/app/webroot/files/uploadify/cancel.png',
		'script'        : '/resources/upload',
		'multi'         : false,
		'auto'          : true,
		'buttonText'    : 'Upload File',
		'folder'        : '/app/webroot/files/resources',
		'onComplete'    : function(event,queueID,fileObj,response,data) {
			$('#ResourceFilename').val(response);
			$('#resource_name').html('File Name: <i>'+response+'</i>');
			$('#resource_uploadUploader').hide();
		}
	});
});
</script> 
<?=$this->Form->input('resource', array('type' => 'file', 'id' => 'resource_upload', 'label' => false))?>
