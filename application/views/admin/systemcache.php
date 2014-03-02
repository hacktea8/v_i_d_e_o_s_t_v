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
var URL = '/admin/index.php/Cache';
var ROOT_PATH = '';
var APP	 =	 '/admin/systemcache';
var STATIC = '/admin/Tpl/Default/Static';
var VAR_MODULE = 'm';
var VAR_ACTION = 'a';
var CURR_MODULE = 'Cache';
var CURR_ACTION = 'system';

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
		<div class="fb-title"><div><p><span>缓存管理 > 系统缓存</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div">
<form method='post' id="form" name="form" action="/admin/systemcache">
<table cellpadding="4" cellspacing="0" border="0" class="table-form">
	<tr>
		<td>
			<ul class="tipslis">
				<li>当站点进行了数据修改、恢复、升级或者工作出现异常的时候，你可以使用本功能重新生成缓存。更新缓存的时候，可能让服务器负载升高，请尽量避开会员访问的高峰时间</li>
				<li>后台数据缓存：更新站点的后台数据缓存</li>
				<li>前台数据缓存：更新站点的前台系统数据缓存</li>
				<li>前台模板缓存：更新前台模板缓存文件，当你修改了模板，但是没有立即生效的时候使用</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td style="padding-left:30px;">
			<label><input type="checkbox" name="mod[]" value="1" />&nbsp;<span>后台数据缓存</span></label>&nbsp;&nbsp;
			<label><input type="checkbox" name="mod[]" value="2" />&nbsp;<span>前台数据缓存</span></label>&nbsp;&nbsp;
			<label><input type="checkbox" name="mod[]" value="3" />&nbsp;<span>前台模板缓存</span></label>
		</td>
	</tr>
	<tr>
		<td style="padding-left:30px;">
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