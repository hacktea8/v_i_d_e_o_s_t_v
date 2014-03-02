<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $seo_title,' - ',$web_title;?></title>
<meta name='robots' content='noindex,follow' />
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<meta name="generator" content="hacktea8 v<?php echo $version;?>" />
<meta name="description" content="<?php echo $seo_description;?>" />
<meta name="keywords" content="<?php echo $seo_keywords;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $css_url;?>emu_search_base.css?v=<?php echo $version;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $css_url;?>emu_search_list.css?v=<?php echo $version;?>" />
<style type="text/css">
em{color:red;}
</style>
<script type="text/javascript" src="<?php echo $js_url;?>jquery-1.7.2.js?v=<?php echo $version;?>"></script>
</head>
<body>
<div class="container">
    <div class="top-menu-row" style="display:none">  
        <div class="row">
            <div class="top-menu fl">
                <s id="66" class="xzbTestPos"></s>
            </div>
        </div> 
    </div><!-- /.top-info -->
    <div class="header">
        <div class="row">
            <div class="logo fl"><a href="/" title="<?php echo $web_title;?>_软件下载,绿色软件,手机软件下载尽在绿色<?php echo $web_title;?>">
<?php echo $web_title;?>
</a></div>
            <div class="search-form">
                <form action="/index/search/" method="get" >
                    <input type="text" id="keyword" autocomplete="off" class="search-wrod" name="q" placeholder="请输入需要搜索的关键词" x-webkit-speech="" speech="" value="<?php echo $q;?>"/>
                    <button type="submit" id="search_submit" class="search-btn">立即搜索</button>
                </form>
                <div class="search-keys">
<?php foreach($hot_search as $row){ ?>
                    <a href="" rel="nofollow" target="_blank" class="c666"></a>
<?php } ?>
                </div>
            </div>
            <div class="search-test">
                <s id="65" class="xzbTestPos"></s>
            </div>
        </div>
    </div><!-- /.header -->
    <div class="mian-menu">
        <div class="row">
            <ul class="mian-nav" id="j_main_nav">
                <li><a href="/">首页</a></li>
<?php foreach($rootCate as $row){ ?>
                 <li rel="<?php echo $row['id'];?>"><a  href="<?php echo $row['url'];?>"><?php echo $row['name'];?></a></li>
<?php
} ?>
     </ul>
   </div>
<!-- 
       <div class="sub-menu j-sub-menu-10" style="display:none;">
          <div class="sub-menu-in">
          <p>
           <a href="/downlist/127.html">手机游戏</a>
           <i class="cccc">|</i>
          </p>
          </div>
        </div>
-->
    </div><!-- /.mian-menu -->
    <div class="row mt10">
        <div class="page-position">
            <p>您所在的位置：<a href="/" class="imp"><?php echo $web_title;?></a> <span class="ext">&raquo;</span> <span class="ext">搜索</span> <span class="ext">&raquo;</span> 
<span class="c666"><?php echo $q;?></span></p>
        </div>
    </div>
    <div class="row mt6">
        <div class="test-90"><s id="71" class="xzbTestPos"></s></div>
    </div>
    <div class="row mt10">
        <div class="lay-740 fl">
            <div class="idx-title h3 clearfix">
                <span class="fl">您搜索的关键词：“</span><h1 class="fl h3"><?php echo $q;?></h1><span class="fl">”的相关内容如下</span>
            </div>
            <div class="list-title title mt10">
                <span class="name h3">名称</span>
                <p class="list-type" id="j_list_type">
                  <a href="javascript:;"><i class="txt"></i></a>
                  <a href="javascript:;" class="current"><i class="img"></i></a>
                </p>
                <ul class="list-ord">
                    <li><a href="javascript:void(0);" rel="nofollow">收藏次数<i class="down"></i></a></li>
                    <li><a href="javascript:void(0);" rel="nofollow">浏览次数<i class="down"></i></a></li>
                    <li><a href="javascript:void(0);" rel="nofollow">更新时间<i class="down"></i></a></li>
                </ul>
            </div>
                <ul class="list-soft" id="j_soft_list">
<?php foreach($searchlist['items'] as $row){ 
$row['update_timestamp']=date('Y-m-d',$row['update_timestamp']);
?>
  <li>
    <div class="li-title">
       <a href="<?php echo $row['url'];?>" class="title h3" title="<?php echo strip_tags($row['title']);?>"><?php echo $row['title'];?></a>
                      <p class="soft-ext ext">
                          <span class="size imp"><?php echo $row['focus_count'];?>次</span>
                          <span class="num"><?php echo $row['hit_num'];?>次</span>
                          <span class="date"><?php echo $row['update_timestamp'];?> </span>
                      </p>
                  </div>
                  <div class="li-contnet">
                      <a href="<?php echo $row['url'];?>" class="pic"><img onerror="javascript:this.src='<?php echo $img_url;?>show404.jpg';" src="<?php echo $row['thumbnail'];?>" title="<?php echo strip_tags($row['title']); ?>" alt="<?php echo strip_tags($row['title']);?>" /></a>
<!--
                      <p class="soft-info ext">
                          <span class="item"><span class="til">语言：</span>简体中文</span>
                          <span class="item"><span class="til">类型：</span>国产软件</span>
                          <span class="item"><span class="til">插件情况：</span>无插件</span>
                          <span class="item star-bar"><span class="til">软件评分：</span><span class="star"><i style="width:80%;"></i></span></span>
                      </p>
-->
                      <p class="desc c666"><?php echo $row['body'];?></p>
                  </div>
                </li>
<?php } ?>
            </ul>
            <div class="page-num">
<?php echo $page_string;?>
            </div>
                    </div><!-- /.lay-740 -->
        <div class="lay-240 fr">
<!--             <div class="xzb-app" style="margin-top:0;">
                
            </div> -->
            <div class="sub-tab-box mt10">
                <div class="sub-title">
                    <span class="title h3">编辑推荐</span>
                    <ul class="mod-tab" rel="xtaberTabs">
                        <li rel="xtaberTabItem" class="current">游戏</li>
                        <li rel="xtaberTabItem">书籍</li>
                    </ul>
                </div>
                <div class="sub-tab-wrap" rel="xtaberItems">
                    <ul class="app-txt-list clearfix xtaber-item">
<?php foreach($recommen_topic[1] as $key => $row){ ?>
                        <li>
 <a href="" rel="nofollow" class="ico"><img src="" alt="" width="60px" height="60px" target="_blank" /></a> <a href="" rel="nofollow" class="name h3"></a> <p class="ext"></p>
 </li>
<?php } ?>
                    </ul>
                    <ul class="app-txt-list clearfix xtaber-item" style="display:none">
<?php foreach($recommen_topic[2] as $key => $row){ ?> 
                         <li>
        <a href="" class="ico" target="_blank"><img src="" alt="" width="60px" height="60px"></a>
        <a href="" class="name h3" target="_blank"></a>
        <p class="ext"></p>
</li>
<?php } ?>
                    </ul>
                </div>
            </div><!-- /.sub-tab-box -->
            
            <div class="sub-tab-box mt10">
                <div class="sub-title">
                    <span class="title h3">下载排行榜</span>
                    <ul class="mod-tab" rel="xtaberTabs">
                        <li rel="xtaberTabItem" class="current">热门浏览</li>
                        <li rel="xtaberTabItem">最热收藏</li>
                    </ul>
                </div>
                <div class="sub-tab-wrap" rel="xtaberItems">
                    <ul class="soft-top-list xtaber-item j-hover-2">
<?php foreach($hot_topic['hit'] as $key => $row){ ?>
                        <li class="hover">
    <div class="single">
        <span class="num num1">1</span>
        <a href="" target="_blank"></a>
        <span class="star-bar"><span class="in" style="width:100%;"></span></span>
    </div>
    <div class="app-img">
        <a href="" class="pic" target="_blank"><img src="" alt=""></a>
        <a href="" class="name" target="_blank"></a>
        <span class="ext">次</span>
        <a href="" class="btn" target="_blank"></a>
    </div>
</li>
<?php } ?> 
      </ul>
      <ul class="soft-top-list xtaber-item j-hover-2" style="display:none">
<?php foreach($hot_topic['focus'] as $key => $row){ ?>
        <li class="hover">
    <div class="single">
        <span class="num num1">1</span>
        <a href="" target="_blank"></a>
        <span class="star-bar"><span class="in" style="width:60%;"></span></span>
    </div>
    <div class="app-img">
        <a href="" class="pic" target="_blank"><img src="" alt=""></a>
        <a href="" class="name" target="_blank"></a>
        <span class="ext">次</span>
        <a href="" class="btn" target="_blank"></a>
    </div>
</li>
<?php } ?>                           
</ul>
    </div>
            </div><!-- /.sub-tab-box -->
            <div class="test mt10">
                <s id="77" class="xzbTestPos"></s>
            </div>
        </div><!-- /.lay-240 -->
    </div><!-- /.row -->
    <div class="footer">
<br>
&copy;2013 - <script>
   var copyrightdate = new Date();
   document.write(copyrightdate.getFullYear());
</script>
如果侵犯了你的权益，请通知我们，我们会及时删除侵权内容，谢谢合作！ 联系信箱：<?php echo $admin_email;?><br />
<?php echo $domain;?> Inc. All rights reserved Powered <?php echo $web_title;?>
</div><!-- /.container --> 
<script type="text/javascript" src="http://www.xiazaiba.com/static/js/jquery.xhover.js"></script>
<div style="display:none">
</div>
<script type="text/javascript">
$(document).ready(function(){
$('.mod-tab li').mouseover(function(){
var index = $(this).index();
$('.mod-tab li').removeClass('current');
$(this).addClass('current');
var nextson = $(this).parent().parent().next().children("ul");
nextson.css({"display":"none"});
nextson.eq(index).css({"display":"block"});
});
$('#j_list_type a i').click(function(){
$('#j_list_type a').removeClass('current');
if('txt' == $(this).attr('class')){
$('#j_soft_list li div.li-contnet').css({"display":"none"});
}else{
$('#j_soft_list li div.li-contnet').css({"display":"block"});
}
$(this).parent().addClass('current');
});
});
</script>
</body>
</html>
