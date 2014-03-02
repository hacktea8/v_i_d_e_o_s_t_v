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
				<dt><div><strong>会员配置管理</strong></div></dt>
				<dd><p><a href="/admin/user_setting" target="mainFrame">设置配置</a></p></dd>			</dl><dl>
				<dt><div><strong>会员管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=User&a=index" target="mainFrame">会员列表</a></p></dd><dd><p><a href="/admin/index.php?m=User&a=add" target="mainFrame">添加会员</a></p></dd>			</dl><dl>
				<dt><div><strong>达人管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=UserDaren&a=index" target="mainFrame">达人列表</a></p></dd><dd><p><a href="/admin/index.php?m=UserDaren&a=add" target="mainFrame">添加达人</a></p></dd>			</dl><dl>
				<dt><div><strong>会员组管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=UserGroup&a=index" target="mainFrame">会员组列表</a></p></dd><dd><p><a href="/admin/index.php?m=UserGroup&a=add" target="mainFrame">添加会员组</a></p></dd>			</dl><dl>
				<dt><div><strong>会员信件管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=UserMsg&a=index" target="mainFrame">会员信件列表</a></p></dd><dd><p><a href="/admin/index.php?m=UserMsg&a=groupSend" target="mainFrame">发送系统信件</a></p></dd><dd><p><a href="/admin/index.php?m=UserMsg&a=groupList" target="mainFrame">系统信件列表</a></p></dd>			</dl><dl>
				<dt><div><strong>会员整合</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=Integrate&a=index" target="mainFrame">会员整合</a></p></dd>			</dl><dl>
				<dt><div><strong>会员积分日志</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=UserScoreLog&a=index" target="mainFrame">日志列表</a></p></dd>			</dl><dl>
				<dt><div><strong>会员邀请日志</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=Referrals&a=index" target="mainFrame">日志列表</a></p></dd>			</dl>		</div>
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