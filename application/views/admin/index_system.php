<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/public/css/admin/style.css" rel="stylesheet" />
<script type="text/javascript" src="/public/js/jquery.js"></script>
</head>
<body style="background:#DEE4ED;padding:0; overflow:hidden; overflow-y:scroll;">
	<div>
		<div class="fanwe-menu" valign="top">
			<dl>
				<dt><div><strong>系统管理</strong></div></dt>
				<dd><p><a href="/admin/system_config" target="mainFrame">系统设置</a></p></dd>			</dl><dl>
				<dt><div><strong>云盘接口管理</strong></div></dt>
				<dd><p><a href="/admin/yundisk_list" target="mainFrame">接口列表</a></p></dd>
				<dd><p><a href="/admin/yundisk_config" target="mainFrame">接口配置</a></p></dd>
				<dd><p><a href="/admin/yundisk_add" target="mainFrame">增加接口</a></p></dd></dl><dl>
				<dt><div><strong>同步登陆管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=LoginModule&a=index" target="mainFrame">模块列表</a></p></dd>			</dl><dl>
				<dt><div><strong>缓存管理</strong></div></dt>
				<dd><p><a href="/admin/systemcache/1" target="mainFrame">清除系统缓存</a></p></dd>
				<dd><p><a href="/admin/systemcache/2" target="mainFrame">清除程序缓存</a></p></dd>			</dl><dl>
				<dt><div><strong>临时文件管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=TempFile&a=index" target="mainFrame">临时文件列表</a></p></dd>			</dl><dl>
				<dt><div><strong>操作日志管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=AdminLog&a=index" target="mainFrame">操作日志列表</a></p></dd>			</dl><dl>
				<dt><div><strong>城市管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=Region&a=index" target="mainFrame">城市列表</a></p></dd><dd><p><a href="/admin/index.php?m=Region&a=add" target="mainFrame">添加城市</a></p></dd>			</dl><dl>
				<dt><div><strong>敏感词分类管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=WordType&a=index" target="mainFrame">分类列表</a></p></dd><dd><p><a href="/admin/index.php?m=WordType&a=add" target="mainFrame">添加分类</a></p></dd>			</dl><dl>
				<dt><div><strong>敏感词管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=Word&a=index" target="mainFrame">敏感词列表</a></p></dd><dd><p><a href="/admin/index.php?m=Word&a=add" target="mainFrame">添加敏感词</a></p></dd>			</dl><dl>
				<dt><div><strong>点高广告API</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=DianGao&a=index" target="mainFrame">一键开通</a></p></dd>			</dl>		</div>
	</div>
	<script>
		if($("a:first").attr("href"))
		{
			top.document.getElementById("mainFrame").src = $("a:first").attr("href");
			$("a:first").parent().parent().addClass("cur");
		};
		
		$("a").click(function(){
			$("a").each(function(){
				$(this).parent().parent().removeClass("cur");
			});
			$(this).parent().parent().addClass("cur");
			$(this).blur();
		});
	</script>
</body>
</html>