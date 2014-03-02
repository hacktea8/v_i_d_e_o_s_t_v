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
var URL = '/admin/index.php/UserSetting';
var ROOT_PATH = '';
var APP	 =	 '/admin/index.php';
var STATIC = '/public/js';
var VAR_MODULE = 'm';
var VAR_ACTION = 'a';
var CURR_MODULE = 'UserSetting';
var CURR_ACTION = 'index';

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
		<div class="fb-title"><div><p><span>会员配置管理 > 会员配置</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div">
<div class="tabs-title">
	<div class="tt-item active" rel="1"><p><a href="javascript:;">注册协议</a></p></div>
	<div class="tt-item" rel="2"><p><a href="javascript:;">积分设置</a></p></div>
	<div class="tt-item" rel="3"><p><a href="javascript:;">积分说明</a></p></div>
</div>
<form method='post' id="form" name="form" action="/admin/index.php?m=UserSetting&a=update">
<div class="tabs-body">
	<table cellpadding="4" cellspacing="0" border="0" class="table-form tabs-item tabs-active" rel="1">
		<tr>
			<td><script type="text/javascript" src="/public/js/Ckeditor/ckeditor.js"></script><script type="text/javascript" src="/public/js/Ckfinder/ckfinder.js"></script><textarea id="USER_AGREEMENT_editor" name="settings[USER_AGREEMENT]"><p>
	网络服务使用协议</p>
</textarea><script type="text/javascript">var USER_AGREEMENT_editor =CKEDITOR.replace("USER_AGREEMENT_editor",{"width":"96%","height":"130px","toolbar":"Default"}) ;CKFinder.setupCKEditor(USER_AGREEMENT_editor,"/public/js/Ckfinder") ;</script></td>
		</tr>
	</table>
	<table cellpadding="4" cellspacing="0" border="0" class="table-form tabs-item" rel="2">
		<tr>
			<th width="200">每日最多获取积分</th>
			<td><input type="text" class="textinput" name="settings[TODAY_MAX_SCORE]" value="100" /></td>
		</tr>
		<tr>
			<th>会员注册积分</th>
			<td><input type="text" class="textinput" name="settings[USER_REGISTER_SCORE]" value="10" /></td>
		</tr>
		<tr>
			<th>会员每日登陆积分</th>
			<td><input type="text" class="textinput" name="settings[USER_LOGIN_SCORE]" value="1" /></td>
		</tr>
		<tr>
			<th>会员上传头像积分</th>
			<td><input type="text" class="textinput" name="settings[USER_AVATAR_SCORE]" value="10" /></td>
		</tr>
		<tr>
			<th>会员邀请积分</th>
			<td><input type="text" class="textinput" name="settings[USER_REFERRAL_SCORE]" value="10" /></td>
		</tr>
		<tr>
			<th>取消邀请扣除积分</th>
			<td><input type="text" class="textinput" name="settings[CLEAR_REFERRAL_SCORE]" value="-20" /></td>
		</tr>
		<tr>
			<th>发布普通分享积分</th>
			<td><input type="text" class="textinput" name="settings[SHARE_DEFAULT_SCORE]" value="1" /></td>
		</tr>
		<tr>
			<th>发布有图分享积分</th>
			<td><input type="text" class="textinput" name="settings[SHARE_IMAGE_SCORE]" value="5" /></td>
		</tr>
		<tr>
			<th>删除普通分享扣除积分</th>
			<td><input type="text" class="textinput" name="settings[DELETE_SHARE_DEFAULT_SCORE]" value="-10" /></td>
		</tr>
		<tr>
			<th>删除有图分享扣除积分</th>
			<td><input type="text" class="textinput" name="settings[DELETE_SHARE_IMAGE_SCORE]" value="-20" /></td>
		</tr>
	</table>
	<table cellpadding="4" cellspacing="0" border="0" class="table-form tabs-item" rel="3">
		<tr>
			<td><script type="text/javascript" src="/public/js/Ckeditor/ckeditor.js"></script><script type="text/javascript" src="/public/js/Ckfinder/ckfinder.js"></script><textarea id="USER_SORE_RULE_editor" name="settings[USER_SORE_RULE]"><h1>
	会员加减分规则</h1>
<p>
	1、会员注册＋10分；</p>
<p>
	2、每日登陆＋1分；</p>
<p>
	3、上传头像＋10分；</p>
<p>
	4、会员成功邀请＋10分；</p>
<p>
	5、删除取消会员邀请－20分；</p>
<p>
	6、发布普通(无图)分享＋1分；</p>
<p>
	7、发布有图分享＋5分；</p>
<p>
	8、管理员删除普通分享－10分；</p>
<p>
	9、管理员删除有图分享－20分；</p>
</textarea><script type="text/javascript">var USER_SORE_RULE_editor =CKEDITOR.replace("USER_SORE_RULE_editor",{"width":"96%","height":"130px","toolbar":"Default"}) ;CKFinder.setupCKEditor(USER_SORE_RULE_editor,"/public/js/Ckfinder") ;</script></td>
		</tr>
	</table>
</div>
<table cellpadding="4" cellspacing="0" border="0" class="table-form" style="border-top:none;">
	<tr class="act">
		<th width="200">&nbsp;</th>
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