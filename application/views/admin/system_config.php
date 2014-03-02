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
var URL = '/admin/index.php/SysConf';
var ROOT_PATH = '';
var APP	 =	 '/admin/index.php';
var STATIC = '/admin/Tpl/Default/Static';
var VAR_MODULE = 'm';
var VAR_ACTION = 'a';
var CURR_MODULE = 'SysConf';
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
		<div class="fb-title"><div><p><span>系统管理 > 系统设置</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div">
<div class="tabs-title">
	<div class="tt-item active" rel="站点设置"><p><a href="javascript:;">站点设置</a></p></div><div class="tt-item " rel="上传设置"><p><a href="javascript:;">上传设置</a></p></div><div class="tt-item " rel="分享设置"><p><a href="javascript:;">分享设置</a></p></div><div class="tt-item " rel="邮件设置"><p><a href="javascript:;">邮件设置</a></p></div></div>
<form method='post' id="form" name="form" action="/admin/index.php?m=SysConf&a=update" enctype="multipart/form-data">
<div class="tabs-body">
<table cellpadding="4" cellspacing="0" border="0" class="table-form tabs-item tabs-active" rel="站点设置">
	<tr>
			<th width="190">站点名称：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SITE_NAME" value="最旅" />
							</td>
		</tr>
                <tr>
			<th width="190">站点标题：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SITE_TITLE" value="最旅 - 发现时尚,分享兴趣 - 采集靓图" />
							</td>
		</tr>
                <tr>
			<th width="190">网站LOGO：</th>
			<td>
				<!-- 图片域 -->
					<input type="file" class="fileinput" name="SITE_LOGO" /> 
					<a href="/./logo.gif" target="_blank" >浏览</a>			</td>
		</tr>
                <tr>
			<th width="190">底部LOGO：</th>
			<td>
				<!-- 图片域 -->
					<input type="file" class="fileinput" name="FOOT_LOGO" /> 
					<a href="/./foot_logo.gif" target="_blank" >浏览</a>			</td>
		</tr>
                <tr>
			<th width="190">友情链接LOGO：</th>
			<td>
				<!-- 图片域 -->
					<input type="file" class="fileinput" name="LINK_LOGO" /> 
					<a href="/./link_logo.gif" target="_blank" >浏览</a>			</td>
		</tr>
                <tr>
			<th width="190">默认模板：</th>
			<td>
				<!-- 下拉 -->
					<select name="SITE_TMPL">
						<option value="huaban" >huaban</option><option value="zhimei" selected="selected">zhimei</option>					</select>
												</td>
		</tr>
                <tr>
			<th width="190">系统管理员：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SYS_ADMIN" value="admin" />
							</td>
		</tr>
                <tr>
			<th width="190">登录超时时间(分钟)：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="EXPIRED_TIME" value="3600" />
							</td>
		</tr>
                <tr>
			<th width="190">系统时区：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="TIME_ZONE" value="8" />
							</td>
		</tr>
                <tr>
			<th width="190">联系邮箱：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SITE_SERVICE_EMAIL" value="service@fanwe.com" />
							</td>
		</tr>
                <tr>
			<th width="190">默认语言：</th>
			<td>
				<!-- 下拉 -->
					<select name="DEFAULT_LANG">
						<option value="zh-cn" selected="selected">zh-cn</option>					</select>
												</td>
		</tr>
                <tr>
			<th width="190">URL重写：</th>
			<td>
				<!-- 下拉 -->
										<select name="URL_MODEL">
						<option value="0" >否</option><option value="1" selected="selected">是</option>					</select>							</td>
		</tr>
                <tr>
			<th width="190">开启后台日志：</th>
			<td>
				<!-- 下拉 -->
										<select name="APP_LOG">
						<option value="0" >关闭</option><option value="1" selected="selected">开启</option>					</select>							</td>
		</tr>
                <tr>
			<th width="190">SEO关键词：</th>
			<td>
				<!-- 文本域 -->
					<textarea class="areainput" rows="3" name="SITE_KEYWORDS">最旅，分享图片，采集图片，发现图片，消费兴趣收集平台</textarea>
							</td>
		</tr>
                <tr>
			<th width="190">SEO描述：</th>
			<td>
				<!-- 文本域 -->
					<textarea class="areainput" rows="3" name="SITE_DESCRIPTION">最旅网，帮你采集，整理，分享，发现网络上你喜欢的图片。你可以用它收集灵感，保存有用的素材，计划旅行，晒晒美好的物品。</textarea>
							</td>
		</tr>
                <tr>
			<th width="190">页面底部内容：</th>
			<td>
				<!-- 编辑器 -->
					<script type="text/javascript" src="/admin/Tpl/Default/Static/Ckeditor/ckeditor.js"></script><script type="text/javascript" src="/admin/Tpl/Default/Static/Ckfinder/ckfinder.js"></script><textarea id="FOOTER_HTML_editor" name="FOOTER_HTML">方维兴趣分享系统 系统版本：v2.0版权所有&copy; 方维</textarea><script type="text/javascript">var FOOTER_HTML_editor =CKEDITOR.replace("FOOTER_HTML_editor",{"width":"96%","height":"130px","toolbar":"Default"}) ;CKFinder.setupCKEditor(FOOTER_HTML_editor,"/admin/Tpl/Default/Static/Ckfinder") ;</script>
							</td>
		</tr>
                </table><table cellpadding="4" cellspacing="0" border="0" class="table-form tabs-item " rel="上传设置">
	<tr>
			<th width="190">图片背景色：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="BG_COLOR" value="#ffffff" />
							</td>
		</tr>
                <tr>
			<th width="190">最大上传限制(KB)：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="MAX_UPLOAD" value="2048" />
							</td>
		</tr>
                <tr>
			<th width="190">允许上传的文件类型：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="ALLOW_UPLOAD_EXTS" value="jpg,gif,png,jpeg" />
							</td>
		</tr>
                <tr>
			<th width="190">开启水印：</th>
			<td>
									<!-- 单选 -->
					<label><input type="radio" name="WATER_MARK" value="0"  />&nbsp;否</label><!-- 单选 -->
					<label><input type="radio" name="WATER_MARK" value="1" checked="checked" />&nbsp;是</label>							</td>
		</tr>
                <tr>
			<th width="190">大图宽度：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="BIG_WIDTH" value="500" />
							</td>
		</tr>
                <tr>
			<th width="190">大图高度：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="BIG_HEIGHT" value="0" />
							</td>
		</tr>
                <tr>
			<th width="190">小图宽度：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SMALL_WIDTH" value="200" />
							</td>
		</tr>
                <tr>
			<th width="190">小图高度：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SMALL_HEIGHT" value="0" />
							</td>
		</tr>
                <tr>
			<th width="190">水印图片：</th>
			<td>
				<!-- 图片域 -->
					<input type="file" class="fileinput" name="WATER_IMAGE" /> 
					<a href="/./public/upload/images/201111/30/4ed5e7f8bb45c.png" target="_blank" >浏览</a>			</td>
		</tr>
                <tr>
			<th width="190">水印显示位置：</th>
			<td>
				<!-- 下拉 -->
										<select name="WATER_POSITION">
						<option value="1" >左上</option><option value="2" >右上</option><option value="3" >左下</option><option value="4" selected="selected">右下</option><option value="5" >中间</option>					</select>							</td>
		</tr>
                <tr>
			<th width="190">水印透明度：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="WATER_ALPHA" value="100" />
							</td>
		</tr>
                <tr>
			<th width="190">自动剪裁：</th>
			<td>
				<!-- 下拉 -->
										<select name="AUTO_GEN_IMAGE">
						<option value="0" selected="selected">否</option><option value="1" >是</option>					</select>							</td>
		</tr>
                </table><table cellpadding="4" cellspacing="0" border="0" class="table-form tabs-item " rel="分享设置">
	<tr>
			<th width="190">一个分享最大商品数量：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SHARE_GOODS_COUNT" value="3" />
							</td>
		</tr>
                <tr>
			<th width="190">首页分享分页量：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SHARE_INDEX_PAGE" value="30" />
							</td>
		</tr>
                <tr>
			<th width="190">搜索页分页量：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SHARE_SEARCH_PAGE" value="10" />
							</td>
		</tr>
                <tr>
			<th width="190">会员中心分页量：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SHARE_SELF_PAGE" value="10" />
							</td>
		</tr>
                <tr>
			<th width="190">一个分享最大图片数量：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SHARE_PIC_COUNT" value="3" />
							</td>
		</tr>
                <tr>
			<th width="190">一个分享最大标签数量：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SHARE_TAG_COUNT" value="10" />
							</td>
		</tr>
                </table><table cellpadding="4" cellspacing="0" border="0" class="table-form tabs-item " rel="邮件设置">
	<tr>
			<th width="190">邮件服务器：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SMTP_SERVER" value="" />
							</td>
		</tr>
                <tr>
			<th width="190">邮件服务器端口：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SMTP_PORT" value="25" />
							</td>
		</tr>
                <tr>
			<th width="190">邮件帐号：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SMTP_ACCOUNT" value="" />
							</td>
		</tr>
                <tr>
			<th width="190">邮件密码：</th>
			<td>
				<!-- 手动输入 -->
					<input type="text" class="textinput" name="SMTP_PASSWORD" value="" />
							</td>
		</tr>
                <tr>
			<th width="190">SSL连接加密：</th>
			<td>
									<!-- 单选 -->
					<label><input type="radio" name="SMTP_IS_SSL" value="0" checked="checked" />&nbsp;否</label><!-- 单选 -->
					<label><input type="radio" name="SMTP_IS_SSL" value="1"  />&nbsp;是</label>							</td>
		</tr>
                <tr>
			<th width="190">SMTP验证：</th>
			<td>
									<!-- 单选 -->
					<label><input type="radio" name="SMTP_AUTH" value="0"  />&nbsp;否</label><!-- 单选 -->
					<label><input type="radio" name="SMTP_AUTH" value="1" checked="checked" />&nbsp;是</label>							</td>
		</tr>
                </table></div>
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