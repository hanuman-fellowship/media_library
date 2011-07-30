<link href="/app/webroot/css/uploadify.css" type="text/css" rel="stylesheet" /> 
<script type="text/javascript" src="/app/webroot/files/uploadify/swfobject.js"></script> 
<script type="text/javascript" src="/app/webroot/js/jquery.uploadify.v2.1.4.min.js"></script> 
<script type="text/javascript"> 
$(document).ready(function() {
	var goAhead = true;
	$('#resource_upload').uploadify({
		'uploader'      : '/app/webroot/files/uploadify/uploadify.swf',
		'cancelImg'     : '/app/webroot/files/uploadify/cancel.png',
		'script'        : '/resources/upload',
		'multi'         : true,
		'auto'          : true,
		'buttonText'    : 'Upload Files',
		'folder'        : '/app/files/resources',
		'onSelect'      : function(eventa, ida, fileObja) {
			if (!$('#ResourceCollectionId').val()) {
				alert('Please choose a Collection');
				goAhead = false;
				return false;
			} else {
				$('#ResourceCollectionId').attr('disabled', true);
				$('#proto').clone().appendTo('#files').attr('id', ida).show().find('span').html(fileObja.name);
			}
		},
		'onComplete'    : function(eventb,idb,fileObjb,response,data) {
			if (goAhead) {
				var url = "/resources/upload/" + response + "/" + $('#ResourceCollectionId').val();
				$.get(url, function(dbId){
					$('#'+idb).find('textarea').attr('id',"Resource"+ dbId +"Description").attr('name',"data[Resource][descriptions]["+dbId+"]");
				});
			}
		}
	});
});
</script> 
<?=$this->Form->input('resource', array('type' => 'file', 'id' => 'resource_upload', 'label' => false))?>
