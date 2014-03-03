<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $web_title;?></title>
<meta name="keywords" content="<?php echo $seo_keywords;?>" />
<meta name="description" content="<?php echo $seo_description;?>" />
<link href="<?php echo $css_url;?>Common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $css_url,$_a;?>.css" rel="stylesheet" type="text/css" />
 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $js_url;?>language.js"></script>
</head>
<body>
<div class="header">
		<div class="topBar">
		<div class="w960">
			<div class="Top-sign fa-left">
			<?php echo $web_title;?>欢迎您光临！
			</div>
			<div class="Top-a fa-right">
				<p>
					<a href="#" id="a-gbook">网站留言</a>
					<em>&nbsp;</em>
					<a href="/allmovie.html" id="a-all">最新更新</a>
					<em>&nbsp;</em>
					<a id="a-home" href="javascript:void(0);" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://{pipicms:siteurl}')">设为首页</a>
					<em>&nbsp;</em>
					<a id="a-sc" href="javascript:void(0);" onclick="javascript:window.external.AddFavorite('http://{pipicms:siteurl}', '{pipicms:sitename}')">加入收藏</a>
					<em>&nbsp;</em>
					<a class="color" href="javascript:transformLan();" id="a-lang" title="點擊以繁體中文方式浏覽" name="a-lang">繁體中文切換</a>
				</p>
			</div>
		</div>
	</div>
	<div class="headerContent clearfix">
			<div class="headerLogo fa-left">
				<a href="http://{pipicms:siteurl}">
					<img src="images/headerLogoBg.gif" width="250" height="57" title="{pipicms:sitename}" alt="{pipicms:sitename}">
				</a>
				<span>{pipicms:sitename}({pipicms:siteurl})</span>
			</div>
			<div class="headerSearch fa-right">
				<div class="SearchTop">
					<div class="FormSearch">
					<form id="formsearch" target="_top" action="/search.php" method="post">
						<div class="searchForm clearfix" id="searchForm">
							<input class="searchInput" type="text" autocomplete="off" name="searchword" id="keyword" value="请在此处输入影片片名或演员名称。" onfocus="if(this.value=='请在此处输入影片片名或演员名称。'){this.value='';}" onblur="if(this.value==''){this.value='请在此处输入影片片名或演员名称。';};" baiduSug="1">
							<input type="submit" value="" class="searchSubmit">
						</div>
					</form>
					</div>
					<div class="headerHistory" id="headerHistory">
						<span class="spanB">
							<a href="/top.html">最新排行榜</a>
						</span>
						<div class="headerHistoryBtn"><a href="/live.html">电视直播</a></div>
						<div class="clear">
						</div>
					</div>
				</div>
				<div class="searchHotWords" id="searchHotWords">热门搜索：{pipicms:keywords}</div>
			</div>
	</div>
	<div class="menuBar">
		<div class="menu w960 fa-clear">
			<ul class="menulistA">
				<li class="current"><a href="/">首页</a></li>
				{pipicms:menulist type=1,2,3,4}
				<li onMouseOver="smenuTab([menulist:i]);"><a href="[menulist:link]">[menulist:typename]</a></li>
				{/pipicms:menulist}
			</ul>
			<b class="split"></b>
			<ul class="menulistB">
				{pipicms:menulist type=5,6,7,8,9,10,11,12,29}
				<li><a href="[menulist:link]">[menulist:typename]</a></li>
				{/pipicms:menulist}
			</ul>
		</div>
		<!-- // Menu End -->
	</div>
	
	<div class="navBar">
		<div class="nav w960 fa-clear" id="showList">
			<div class="index-tags fa-clear" id="index-tagsb">
				<div class="index-tags-movie">
					<label class="movie">电影：</label>
					{pipicms:menulist type=5,6,7,8,9,10,11,12,28}
					<a href="[menulist:link]">[menulist:typename]</a><em> | </em>{/pipicms:menulist}</div>
			</div>
			<div class="index-tags fa-clear">
				<div class="index-tags-tv" id="index-tagsa">
					<label class="tv">电视剧：</label>
					{pipicms:menulist type=13,14,15,16,28}
					<a href="[menulist:link]">[menulist:typename]</a><em> | </em>{/pipicms:menulist}</div>
			</div>
			
			<div class="index-tags fa-clear" id="index-tagsd">
				<div class="index-tags-zy">
					<label class="zy">综艺：</label>
					{pipicms:areacaslist}<a href="[areacaslist:link]&tid=3">[areacaslist:value]</a><em>|</em>{/pipicms:areacaslist}</div>
			</div>
			<div class="index-tags fa-clear" id="index-tagsc">
				<div class="index-tags-dm">
					<label class="dm">动漫：</label>
					{pipicms:areacaslist}<a href="[areacaslist:link]&tid=4">[areacaslist:value]</a><em>|</em>{/pipicms:areacaslist}</div>
			</div>
		</div>
		<!-- // Nav End -->
		<SCRIPT language="javascript" type="text/javascript">
		function smenuTab(index) {
			$("#showList .index-tags").stop(true,false).hide().eq(index-1).stop(true,false).show();
		}
		smenuTab(0);
		</SCRIPT>
	</div>
</div>
