<div class="fanwe-header">
	<div class="fh-top">
		<div class="fht-logo"><img src="<?php echo $img_url;?>logo.gif" /></div>
		<div class="fht-links">
			<span>欢迎您！<?php echo $uinfo['uname']?></span>
			<a class="edit-pwd" href="/admin/index.php?m=Index&a=password" target="mainFrame">修改密码</a>
			<a class="browse-index" href="/" target="brank">浏览首页</a>
			<a href="/admin/systemcache" target="mainFrame">更新缓存</a>
			<a href="/admin/index.php?m=Public&a=logout" target="mainFrame">退出</a>
		</div>
		<div class="fht-navs">
			<div class="active">
				<p>
					<a href="/admin/index_left"  target="leftFrame">美图</a>
				</p>
			</div><div class="">
				<p>
					<a href="/admin/index_album"  target="leftFrame">相册</a>
				</p>
			</div><div class="">
				<p>
					<a href="/admin/index_user"  target="leftFrame">会员</a>
				</p>
			</div><div class="">
				<p>
					<a href="/admin/index_system"  target="leftFrame">系统</a>
				</p>
			</div>		</div>
	</div>
	<!--<div class="fh-bottom">
		<div class="fhb-body">
			
		</div>
	</div>-->
</div>
<div class="ajax-loading" style="top:36px; right:0;"></div>
