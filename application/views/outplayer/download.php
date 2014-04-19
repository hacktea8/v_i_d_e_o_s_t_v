<style tyle="text/css">
#downdialog{height:250px;background-color:white;}
.downui{height:100px;margin:20px auto;}
.downui input{height:20px;}
</style>
<div id="downdialog">
<script type="text/javascript" src="<?php echo $js_url;?>jquery.zclip.min.js"></script>
<div class="downui">
下载地址一（VIP）:<input type="text" size="100" id="dwurl" value="<?php echo $info['dwurl'];?>" /> 
<button id="dwurlBtn">复制(COPY)</button>
</div>
<?php if($uinfo['isvip'] > 1){?>
<div class="downui">
下载地址二（SVIP）:<input type="text" size="100" id="vipdwurl" value="<?php echo $info['vipdwurl'];?>" /> 
<button id="vipdwurlBtn" >复制(COPY)</button>
</div>
<?php } ?>
</div>
<script type="text/javascript">
$('#dwurlBtn').zclip({
path:'<?php echo $js_url;?>ZeroClipboard.swf',
copy:function(){return $('#dwurl').val();}
});
<?php if($uinfo['isvip'] > 1){?>
$('#vipdwurlBtn').zclip({
path:'<?php echo $js_url;?>ZeroClipboard.swf',
copy:function(){return $('#vipdwurl').val();}
});
<?php } ?>
</script>
