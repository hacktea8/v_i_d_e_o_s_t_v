<script type="text/javascript" src="<?php echo $js_url;?>swfupload/swfupload.js?v=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $js_url;?>swfupload/swfupload.queue.js?v=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $js_url;?>swfupload/fileprogress.js?v=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $js_url;?>swfupload/handlers.js?v=<?php echo $version;?>"></script>
<script type="text/javascript">
var swfu;
var showimgapi = '<?php echo $showimgapi;?>';
window.onload = function() {
var settings = {
flash_url : "<?php echo $js_url;?>swfupload/swfupload.swf",
upload_url: "<?php echo $imguploadapiurl;?>",
post_params: {},
file_size_limit : "2 MB",
file_types : "*.jpg;*.gif;*.png;*.jpeg",
file_types_description : "Images Files",
file_upload_limit : 2000,
file_queue_limit : 1,
custom_settings : {
progressTarget : "fsUploadProgress",
cancelButtonId : "btnCancel"
},
debug: false,
// Button settings
button_image_url: "<?php echo $img_url;?>upload_btn.jpg",
button_width: "96",
button_height: "48",
button_placeholder_id: "spanButtonPlaceHolder",
button_text: '<span class="theFont">Hello</span>',
button_text_style: ".theFont { font-size: 16; }",
button_text_left_padding: 12,
button_text_top_padding: 3,
// The event handler functions are defined in handlers.js
file_queued_handler : fileQueued,
file_queue_error_handler : fileQueueError,
file_dialog_complete_handler : fileDialogComplete,
upload_start_handler : uploadStart,
upload_progress_handler : uploadProgress,
upload_error_handler : uploadError,
upload_success_handler : uploadSuccess,
upload_complete_handler : uploadComplete,
//queue_complete_handler : queueComplete	// Queue plugin event
};
swfu = new SWFUpload(settings);
};
</script>
<div id="uploadui" style="display:none;">
	<h2>Simple Demo</h2>
	<form id="form1" action="index.php" method="post" enctype="multipart/form-data">
		<p>This page demonstrates a simple usage of SWFUpload.  It uses the Queue Plugin to simplify uploading or cancelling all queued files.</p>

			<div class="fieldset flash" id="fsUploadProgress">
			<span class="legend">Upload Queue</span>
			</div>
		<div id="divStatus">0 Files Uploaded</div>
			<div>
				<span id="spanButtonPlaceHolder"></span>
				<input id="btnCancel" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
			</div>

	</form>
</div>
<script type="text/javascript">
$(document).ready(function(){$('#uploadbtn').click(function(){$('#uploadui').toggle();return false;});});
</script>
