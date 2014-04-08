<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/public/css/admin/style.css" rel="stylesheet" />
<script type="text/javascript" src="/public/js/jquery.js"></script>
<script type="text/javascript" src="/public/js/base.js"></script>
<script type="text/javascript" src="/public/js/json.js"></script>
<script type="text/javascript" src="/public/js/jquery.pngFix.js"></script>
<script type="text/javascript">
<!--
//指定当前组模块URL地址 
var URL = '/admin/index.php/AlbumCategory';
var ROOT_PATH = '';
var APP	 =	 '/admin/index.php';
var STATIC = '/admin/Tpl/Default/Static';
var VAR_MODULE = 'm';
var VAR_ACTION = 'a';
var CURR_MODULE = 'AlbumCategory';
var CURR_ACTION = 'add';

//定义JS中使用的语言变量
var CONFIRM_DELETE = '你确定要删除选择项吗？';
var AJAX_LOADING = '提交请求中，请稍候...';
var AJAX_ERROR = 'AJAX请求发生错误！';
var ALREADY_REMOVE = '已删除';
var SEARCH_LOADING = '搜索中...';
var CLICK_EDIT_CONTENT = '点击修改内容';
//-->
</script>
</head>
<body>
<div class="fanwe-body">
 <div class="fb-title"><div><p><span></span></p></div></div>
 <div class="fb-body">
  <table class="body-table" cellpadding="0" cellspacing="1" border="0">
   <tr>
    <td class="body-table-td">
     <div class="body-table-div">
<div class="handle-btns">
 <div class="link-button "><p><a id="" name="" href="/<?php echo $_c;?>/avlist" class="">返回列表</a></p></div>
</div>
<form method='post' id="form" name="form" action="/<?php echo $_c;?>/avdetail" enctype="multipart/form-data">
<table cellpadding="4" cellspacing="0" border="0" class="table-form">
 <tr>
  <th width="150">影片名称</th>
   <td><input type="text" class="textinput requireinput" name="data_head[title]" size="100" value="<?php if(isset($info))echo $info['title'];?>" /></td>
 </tr>
 <tr>
  <th>avkey:</th>
  <td>
   <input type="text" class="textinput" name="data_head[avkey]" size="12" value="<?php echo isset($info)?$info['avkey']:0;?>" />
  </td>
 </tr>
 <tr>
  <th>添加时间:</th>
  <td>
   <input type="text" class="textinput" name="data_head[atime]" size="9" value="<?php echo isset($info)?$info['atime']:date('Ymd');?>" />
  </td>
 </tr>
 <tr>
  <th>关键字:</th>
  <td>
   <input type="text" class="textinput" name="data_head[keyword]" size="60" value="<?php if(isset($info))echo $info['keyword'];?>" />
  </td>
 </tr>
 <tr>
  <th>是否有码:</th>
  <td>
   <input type="text" class="textinput" name="data_head[mosaic]" size="1" value="<?php echo isset($info)?$info['mosaic']:0;?>" />
  </td>
 </tr>
 <tr>
  <th>状态:</th>
  <td>
   <input type="text" class="textinput" name="data_head[flag]" size="1" value="<?php echo isset($info)?$info['flag']:3;?>" />
  </td>
 </tr>
 <tr>
  <th>cover:</th>
  <td>
   <input type="text" class="textinput" name="data_head[cover]" size="16" value="<?php echo isset($info)?$info['cover']:0;?>" />
  </td>
 </tr>
 <tr>
 <th>封面:</th>
 <td>
  <input type="text" class="textinput" name="data_head[thum]" size="100" value="<?php if(isset($info))echo $info['thum'];?>" />
  <input type="hidden" name="data_head[vid]" value="<?php if(isset($info))echo $info['vid'];?>" />
 </td>
 </tr>
 <tr>
  <th>介绍:</th>
  <td>
   <textarea name="data_body[intro]" rows="10" cols="80"><?php echo isset($info)?$info['intro']:'';?></textarea>
  </td>
 </tr>
 <tr>
  <th>ourl:</th>
  <td>
   <input type="text" class="textinput" name="data_body[ourl]" size="100" value="<?php echo isset($info)?$info['ourl']:'';?>" />
  </td>
 </tr>
 <tr>
  <th>playmode:</th>
  <td>
   <input type="text" class="textinput" name="data_body[playmode]" size="1" value="<?php echo isset($info)?$info['playmode']:0;?>" />
  </td>
 </tr>
 <tr>
  <th>分类:</th>
  <td>
   <input type="text" class="textinput" name="data_head[cid]" size="2" value="<?php echo isset($info)?$info['cid']:0;?>" />
  </td>
 </tr>
 <tr>
  <th>剧集列表:</th>
  <td>
 <table>
<thead>
<tr>
<th>ID</th><th>title</th><th>playnum</th><th>playurl</th><th>dwurl</th><th>vipdwurl</th>
</tr>
</thead>
<tbody>

</tbody>
 </table>
  </td>
 </tr>
 <tr class="act">
 <th>&nbsp;</th>
 <td>
 <input type="submit" class="submit_btn" value="提交" />
 <input type="reset" class="reset_btn" value="重置" />
 </td>
 </tr>
</table>
</form>
<p>剧集添加</p>
<form method='post' id="dramform" name="form" action="/<?php echo $_c;?>/avdraminfo" enctype="multipart/form-data">
<table cellpadding="4" cellspacing="0" border="0" class="table-form">
 <tr>
  <th width="150">剧集名称</th>
   <td><input type="text" class="textinput requireinput" name="data_head[title]" value="第01集" /></td>
  <input type="hidden" name="data_head[vid]" value="<?php if(isset($info))echo $info['vid'];?>" />
 </tr>
<tr>
  <th width="150">剧集索引</th>
   <td><input type="text" class="textinput requireinput" name="data_head[playnum]" value="1" /></td>
</tr>
<tr>
  <th width="150">播放连接</th>
   <td><input type="text" class="textinput requireinput" size="100" name="data_head[playurl]" value="" /></td>
</tr>
<tr>
  <th>下载连接:</th>
  <td>
   <textarea name="data_head[dwurl]" rows="10" cols="80"></textarea>
  </td>
 </tr>
<tr>
  <th>VIP下载连接:</th>
  <td>
   <textarea name="data_head[vipdwurl]" rows="10" cols="80"></textarea>
  </td>
 </tr>
<tr class="act">
 <th>&nbsp;</th>
 <td>
<button id="ajaxsubmit">提交</button>
       </td>
 </tr>
</table>
</form>
 </div>
<div class="ajax-loading"></div>
</body>
<script type="text/javascript">
jQuery(function($){
	updateBodyDivHeight();
	$(window).resize(function(){
		updateBodyDivHeight();
	});
});
$('#ajaxsubmit').click(function(){
 var action = $('#dramform').attr('action');
 var param = $('#dramform').serialize();
 $.post(action,param,function(result){
 if(200 == result.status){
  window.location.reload(1);
  return false;
 }
 alert('Error!');
 },'json');
 return false;
});
function updateBodyDivHeight()
{
	jQuery(".body-table-div").height(jQuery(".fanwe-body").height() - 36);
	if(jQuery(".body-table-div").get(0).scrollHeight > jQuery(".body-table-div").height())
	{
		var width = jQuery(".body-table-div").width() - 16;
		jQuery(".body-table-div > *").each(function(){
			if(!$(this).hasClass('ajax-loading'))
			{
				$(this).width(width)	
			}
		});
	}
}
</script>
</html>
