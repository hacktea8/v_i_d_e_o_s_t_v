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
				<dt><div><strong>杂志社分类管理</strong></div></dt>
				<dd><p><a href="/admin/album_cate" target="mainFrame">分类列表</a></p></dd><dd><p><a href="/admin/ablum_cate_detail" target="mainFrame">添加分类</a></p></dd>			</dl><dl>
				<dt><div><strong>杂志社管理</strong></div></dt>
				<dd><p><a href="/admin/index.php?m=Album&a=index" target="mainFrame">杂志社列表</a></p></dd>			</dl>		</div>
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