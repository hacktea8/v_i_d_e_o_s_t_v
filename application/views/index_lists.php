<div id="wrap">
<div id="nav">

<div class="box_7 rightBox">
<div class="rightTitle title_bg">
<div class="h3"><span>图书分类</span></div>
</div>
<div class="main" style="padding:0 5px;">
<dl id="libCatalog">
<?php
foreach($subcatelist as $row){
?>
     <dd><a href="<?php echo $row['url'];?>">&gt;<?php echo $row['name'];?><span class="recordCount">(<?php echo $row['atotal'];?>)</span></a></dd>
<?php
}
?>
</dl>
</div>
</div>
<div style="height:10px;background:#fff;"></div>

<div class="box_7 rightBox">

<div class="rightTitle title_bg">
<div class="h3"><span>相关链接</span></div>
</div>
<div class="main" style="padding:10px;">
<dl id="someLinks">
<dd><a href="#" title="订阅本站资源">订阅本站资源</a></dd>
<dd><a href="#" id="emuleOld" title="Download eMule">电驴(eMule)经典版下载</a></dd>
<dd><a href="#" title="get firefox" id="getfirefox" target="_blank">推荐使用 Firefox 浏览器</a></dd>
<dd style=" clear:both;"></dd>
</dl>
</div>
</div>

<div style="height:10px;background:#fff;"></div>


<!---->

<div class="box_7 rightBox">
<div class="rightTitle title_bg">
<div class="h3"><span>今日热门</span></div>
</div>

<div class="main" style="padding:10px;">
<!---->
<dl class="indexLeftItem">
<?php
foreach($hotTopic as $row){
?>
<dd class="leftMiddle">
   <a href="<?php echo $row['url'];?>" onClick="" style="text-decoration:none;" id="entry_link_<?php echo $row['id'];?>"><img class="lazy hot_img" data-original="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" style="width: 100px; height: 100px" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" class="hot_img" /></noscript></a><br>
<a href="<?php echo $row['url'];?>" onClick=""><?php echo $row['name'];?></a>
            </dd>
<?php
}
?>
            
</dl>

</div>

</div>
<div style="height:10px;background:#fff;"></div>
<p style="text-align: center;">

</p>

</div>
<div id="content">

    <ul class="topic-list" style="*margin-top:-19px">
 <li id="searchBar">
<form id="advance_search_form" method="get" action="/index/lists/" target="_blank">
    <div class="left_class_order" style="margin-bottom:10px!important;">
        <span>
        排序:
        <span class="left_class_new left_class_filter">
        <a href="javascript:void(0);">发布
                    <img alt="<?php echo $web_title;?>" title="<?php echo $web_title;?>" src="<?php echo $img_url;?>new02.gif?v=<?php echo $version;?>">
        </a>
                <img src="<?php echo $img_url;?>newtopic_bg.gif?v=<?php echo $version;?>" alt="<?php echo $web_title;?>" title="<?php echo $web_title;?>">
        更新
                    <img src="<?php echo $img_url;?>new02_red.gif?v=<?php echo $version;?>" alt="<?php echo $web_title;?>" title="<?php echo $web_title;?>">
                </span>
    </span>
    <select name="sort" id="sort" onChange="" class="selectClass">
        <option value="default">默认排序</option>
        <option value="post">发布时间从老到新</option>
        <option value="rpost">发布时间从新到老</option>
        <option value="update">更新时间从老到新</option>
        <option value="rupdate" selected="selected">更新时间从新到老</option>
    </select>
    <span class="left_class_filter"><img alt="<?php echo $web_title;?>" title="<?php echo $web_title;?>" src="<?php echo $img_url;?>line.gif?v=<?php echo $version;?>"></span>
        </div>
</form></li>
<?php
foreach($infolist as $row){
?>
        <li>
          <a href="<?php echo $row['url'];?>" onClick=""><img class="lazy file_img" data-original="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" class="file_img" /></noscript></a>
 <h3>
<span class="left_topics_class_sort"><a href="<?php echo $row['curl'];?>"><?php echo $row['cname'];?></a></span> <a href="<?php echo $row['url'];?>" onClick=""><?php echo $row['name'];?></a>
 </h3>
        <div class="blog_entry">
<?php if(0){
?>
     <div class="face">
        <a href="http://www.verycd.com/i/4489064/" onClick="VeryCD.Track('/stat/indexUserface/');"><img src="{@theme:css}/64_avatar_small.jpg" hoverstyle="2" hovertips="type=2&amp;id=4489064" class="fixsize"></a><p style="WORD-WRAP: break-word;TABLE-LAYOUT: fixed;word-break:break-all"><a hoverstyle="2" hovertips="type=2&amp;id=4489064" href="http://www.verycd.com/i/4489064/" onClick="VeryCD.Track('/stat/indexUsername/');">cctv098998</a></p></div>
<?php } ?>
<!--[if IE 6]><span style="text-indent:-24px;margin-left:-12px"></span><![endif]-->
<?php echo isset($row['intro'])? $row['intro']:'';;?>
(<a href="<?php echo $row['url'];?>" class="fullarticle" onClick="">全文</a>)
                    <br>
    	<span style="color:green;">
    	<span class="date-time"><?php echo $row['ptime'];?></span> 发布, <?php if(0){ ?><span class="date-time"></span> 更新 - <strong>128</strong>个文件, <strong>4.05GB</strong>, <strong>1630</strong>条评论</span>
<?php } ?>
        <div class="blog_metadata">        </div>
        </div>
        </li>
<?php

} 
?>	
        </ul>
<div class="pnav">
<div class="pages-nav" style="margin: 10px 7px 0px 0px;padding:0 0 20px 0px!important;padding-bottom:0;">
<?php echo $page_string;?>

<span href="#" style="display:none">  </span>
</div>
</div>
</div><!--End of content-->
<div style="clear:both"></div>
</div><!-- End of page wrap-->
