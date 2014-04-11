<div class="fanwe-header">
	<div class="fh-top">
		<div class="fht-logo"><img src="<?php echo $img_url;?>logo.gif" /></div>
		<div class="fht-links">
			<span>欢迎您！<?php echo $uinfo['uname']?></span>
			<a class="edit-pwd" href="http://www.hacktea8.com/" target="mainFrame">修改密码</a>
			<a class="browse-index" href="/" target="brank">浏览首页</a>
			<a href="/<?php echo $_c;?>/systemcache" target="mainFrame">更新缓存</a>
			<a href="#" target="mainFrame">退出</a>
		</div>
		<div class="fht-navs">
			<div class="active">
				<p>
					<a href="/<?php echo $_c;?>/index_left"  target="leftFrame">影片管理</a>
				</p>
			</div><div class="">
				<p>
					<a href="/<?php echo $_c;?>/index_left/cate"  target="leftFrame">分类</a>
				</p>
			</div><div class="">
				<p>
					<a href="/<?php echo $_c;?>/index_user"  target="leftFrame">会员</a>
				</p>
			</div><div class="">
				<p>
					<a href="/<?php echo $_c;?>/index_system"  target="leftFrame">系统</a>
				</p>
			</div>		</div>
	</div>
	<!--<div class="fh-bottom">
		<div class="fhb-body">
			
		</div>
	</div>-->
</div>
<div class="ajax-loading" style="top:36px; right:0;"></div>
