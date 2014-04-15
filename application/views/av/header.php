<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $seo_info['title'],$web_title;?></title>
<meta name="keywords" content="<?php echo $seo_info['keywords'];?>" />
<meta name="description" content="<?php echo $seo_info['description'];?>" />
<link href="<?php echo $css_url;?>Common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $css_url,$_c,'_',$_a;?>.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo $js_url;?>common.js"></script>
<script src="<?php echo $js_url;?>function.js"></script>
<?php if(in_array($_a,array('content','play'))){ ?>
<link href="<?php echo $css_url;?>channel.css" rel="stylesheet" type="text/css" />
<?php } ?>
<?php if('play' === $_a){ ?>
<?php }elseif('channel_tv' === $_a){ ?>
<link href="<?php echo $css_url;?>index.css" rel="stylesheet" type="text/css" />
<?php }elseif('channel' === $_a){ ?>
<link href="<?php echo $css_url;?>channel-list.css" rel="stylesheet" type="text/css" />
<?php } ?>
<link rel="favicon icon" href="<?php echo $img_url;?>favicon.ico">
<script type="text/javascript" src="<?php echo $js_url;?>language.js"></script>
<script type="text/javascript">var sitePath='';</script>
<script src="<?php echo $js_url;?>Commons.js"></script>
</head>
<body>
<div class="header">
  <div class="topBar">
    <div class="w960">
      <div class="Top-sign fa-left"><?php echo $web_title;?>欢迎您光临！</div>
	<div class="Top-a fa-right" style="width:510px;">
	  <p>
	   <a href="/support/faq#sendmessage" id="a-gbook">网站留言</a><em>&nbsp;</em>
<?php if(0){?>
           <a href="/allmovie.html" id="a-all">最新更新</a><em>&nbsp;</em>
<?php }?>
	   <a id="a-home" href="javascript:void(0);" onclick="">设为首页</a><em>&nbsp;</em>
	   <a id="a-sc" href="javascript:void(0);" onclick="">加入收藏</a><em>&nbsp;</em>
	   <a class="color" href="javascript:transformLan();" id="a-lang" title="點擊以繁體中文方式浏覽" name="a-lang">繁體中文切換</a><em>&nbsp;</em>
</p>
          <div id="header_login">
<span class="link_box">
<ul>
<?php if(0){ ?>
        <li type="history" name="dropmenu" class="watching" status="hide"
                original_class="watching"><a
                onclick=""
                class="watching_item" href="javascript: void(0);">我正在看
<span
                class="top_arrow"></span></a></li>
<?php }
?>
  <li>
   <div id="user_login">
   <span class="user">Œ</span>
   <div class="iconList" style="display: none;">
   <ul>
<?php if(0){ ?>
    <li><a href="/history/" title="我看過的"><em class="watch">图片</em>我
看過的</a></li>
    <li><a href="/bookmark/" title="我的書簽"><em class="iconfont">ŷ</em><cite>我的書簽</cite></a></li>
<?php } ?>
<li><a href="/<?php echo $_c;?>/fav/" title="我的收藏"><em class="iconfont">ũ</em><cite>我的收藏</cite></a></li>
    <li><a href="/<?php echo $_c;?>/loginout" title="登出"><em class="iconfont">ơ</em><cite>登出</cite></a></li>
   </ul>
   </div>
   <div class="dropMenu" style="display: none;">
   <ul>
    <li><a class="btn" title="登入" href="/<?php echo $_c;?>/login">登入</a></li>
   </ul>
   </div>
  </div>
   <?php echo '<a href="'.$loginurl.'" title="'.$logintitle.'">'.$logintitle.'</a>';?>
  </li>
</ul>
</span></div>
</div>
       </div>
     </div>
   </div>
   <div class="headerContent clearfix">
    <div class="headerLogo fa-left">
     <a href="/maindex">
      <img src="<?php echo $img_url;?>headerLogoBg.gif" width="250" height="57" title="<?php echo $web_title;?>" alt="<?php echo $web_title;?>"></a>
      <span><?php echo $web_title;?>(<?php echo $domain;?>)</span>
    </div>
    <div class="headerSearch fa-right">
     <div class="SearchTop">
       <div class="FormSearch">
	 <form id="formsearch" target="_top" action="/index/search/" method="get">
	 <div class="searchForm clearfix" id="searchForm">
	  <input class="searchInput" type="text" autocomplete="off" name="searchword" id="keyword" value="请在此处输入影片片名或演员名称。" onfocus="if(this.value=='请在此处输入影片片名或演员名称。'){this.value='';}" onblur="if(this.value==''){this.value='请在此处输入影片片名或演员名称。';};" baiduSug="1">
	  <input type="submit" value="" class="searchSubmit">
	 </div>
	 </form>
       </div>
<?php if(0){?>
       <div class="headerHistory" id="headerHistory">
       <span class="spanB">
       <a href="/top.html">最新排行榜</a>
  </span>
  <div class="headerHistoryBtn"><a href="/live.html">电视直播</a></div>
  <div class="clear">
  </div>
</div>
<?php }?>
</div>
<div class="searchHotWords" id="searchHotWords">热门搜索：<?php echo $hot_keywords;?></div>
</div>
</div>
<div class="menuBar">
  <div class="menu w960 fa-clear">
    <ul class="menulistA">
     <li class="current"><a href="/">首页</a></li>
     <?php foreach($menuList['menuListA'] as $k => $row){ ?>
     <li <?php if(0){?>onMouseOver="smenuTab(<?php echo $k+1;?>);" <?php }?>><a href="<?php echo $row['url'];?>"><?php echo $row['title'];?></a></li>
     <?php } ?>
   </ul>
   <b class="split"></b>
   <ul class="menulistB">
   <?php foreach($menuList['menuListB'] as $k => $row){ ?>
    <li><a href="<?php echo $row['url'];?>"><?php echo $row['title'];?></a></li>
   <?php } ?>
   </ul>
  </div>
<!-- // Menu End -->
</div>
<?php if(0){?>
<div class="navBar">
  <div class="nav w960 fa-clear" id="showList">
   <div class="index-tags fa-clear" id="index-tagsb">
    <div class="index-tags-movie">
    <label class="movie">电影：</label>
    {pipicms:menulist type=5,6,7,8,9,10,11,12,28}
     <a href="[menulist:link]">[menulist:typename]</a><em> | </em>
    {/pipicms:menulist}
    </div>
   </div>
   <div class="index-tags fa-clear">
    <div class="index-tags-tv" id="index-tagsa">
     <label class="tv">电视剧：</label>
     {pipicms:menulist type=13,14,15,16,28}
      <a href="[menulist:link]">[menulist:typename]</a><em> | </em>
     {/pipicms:menulist}
    </div>
   </div>
   <div class="index-tags fa-clear" id="index-tagsd">
     <div class="index-tags-zy">
      <label class="zy">综艺：</label>
      {pipicms:areacaslist}
       <a href="[areacaslist:link]&tid=3">[areacaslist:value]</a><em>|</em>
      {/pipicms:areacaslist}
     </div>
    </div>
    <div class="index-tags fa-clear" id="index-tagsc">
     <div class="index-tags-dm">
     <label class="dm">动漫：</label>
     {pipicms:areacaslist}
      <a href="[areacaslist:link]&tid=4">[areacaslist:value]</a><em>|</em>
     {/pipicms:areacaslist}
    </div>
   </div>
  </div>
<!-- // Nav End -->
<SCRIPT language="javascript" type="text/javascript">
function smenuTab(index) {
$("#showList .index-tags").stop(true,false).hide().eq(index-1).stop(true,false).show();
}
//smenuTab(0);
</SCRIPT>
<?php }?>
</div>
</div>
<div id="notetips"><?php if($uinfo['isvip'] < 1){?>温馨提示:<?php if(!$uinfo['uid']){?>您未登录,不能免费观看影片！<a href="/<?php echo $_c;?>/login">请登录</a><?php }?>
<?php if($uinfo['uid']){?>您的账户不是VIP,24小时之内免费观看1部影片<a href="/payment/">立即升级VIP</a><?php }?>
<?php }?>
</div>
