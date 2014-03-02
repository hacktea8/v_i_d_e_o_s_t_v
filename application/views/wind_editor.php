<textarea name="<?php echo $editor_name;?>" id="J_wind_editor_<?php echo $key_name;?>" style="height:300px;width:100%;padding:0;margin:0;"><?php echo @$info[$key_name];?></textarea>
<script charset="utf-8" src="<?php echo $js_url;?>kindeditor/kindeditor.min.js"></script>
<script charset="utf-8" src="<?php echo $js_url;?>kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
var options = {
        filterMode : true,
        allowFileManager : false
        ,uploadJson : ''
        ,filePostName : ''
        ,extraFileUploadParams : {
           <?php echo @$uploadPostParam;?>
        }
        ,afterUpload : function(url){
        alert(url);
        }
        ,allowFileUpload : false
        ,allowFlashUpload : false
        ,allowMediaUpload : false
        ,allowImageUpload : false
};
        KindEditor.ready(function(K) {
                window.editor = K.create('#J_wind_editor_<?php echo $key_name;?>',options);
        });
</script>
