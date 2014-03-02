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
var URL = '/admin/index.php/yundisk_detail';
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
		<div class="fb-title"><div><p><span>云盘信息修改</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div">
<div class="handle-btns">
	<div class="link-button "><p><a id="" name="" href="/admin/yundisk_list" class="">返回列表</a></p></div>
</div>
<form method='post' id="form" name="form" action="/admin/yundisk_detail" enctype="multipart/form-data">
<table cellpadding="4" cellspacing="0" border="0" class="table-form">
	<tr>
		<th width="150">用户名</th>
		<td><input type="text" class="textinput requireinput" name="row[uname]" value="<?php if(isset($info))echo $info['uname'];?>" /></td>
	</tr>
	<tr>
		<th>access_token</th>
		<td>
			<textarea name="row[access_token]" class="textinput areainput" rows="3"><?php if(isset($info))echo $info['access_token'];?></textarea>
		</td>
	</tr>
	<tr>
		<th>refresh_token</th>
		<td>
			<textarea name="row[refresh_token]" class="textinput areainput" rows="3"><?php if(isset($info))echo $info['refresh_token'];?></textarea>
		</td>
	</tr>
	<tr>
		<th>session_key</th>
		<td>
			<textarea name="row[session_key]" class="textinput areainput" rows="3"><?php if(isset($info))echo $info['session_key'];?></textarea>
		</td>
	</tr>
	<tr>
		<th>session_secret</th>
		<td>
			<textarea name="row[session_secret]" class="textinput areainput" rows="3"><?php if(isset($info))echo $info['session_secret'];?></textarea>
			<?php if(isset($info['uid'])){?> <input type="hidden" name="row[uid]" value="<?php echo $info['uid'];?>" /> <?php } ?>
		</td>
	</tr>
	<tr>
		<th width="150">sort</th>
		<td><input type="text" class="textinput requireinput" name="row[sort]" value="<?php if(isset($info))echo $info['sort'];?>" /></td>
	</tr>
	<tr>
		<th width="150">flag(admin:8)</th>
		<td><input type="text" class="textinput requireinput" name="row[flag]" value="<?php if(isset($info))echo $info['flag'];?>" /></td>
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
						</div>
					</td>
				</tr>
			</table>
		</div>
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
