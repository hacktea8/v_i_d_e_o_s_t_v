<div class="PlayBody">
  <div class="play">
    <div class="pl fa-left">
      <div class="player" id="player">
<?php
/*
代码说明：
1、打开优酷视频网页，浏览器地址栏有地址，如上面播放的“神枪狙击”地址：http://v.youku.com/v_show/id_XNjA3MTc2NTg4.html ,将其中粉色部分XNjA3MTc2NTg4摘取出来，替换代码中的“视频网址”四个字；
2、“视频名称“自己填上；
3、s=1 为自动播放，s=0 为手动播放。
http://player.opengg.me/loader.swf
*/
 if(1 == $info['sid']){ ?>
<embed type="application/x-shockwave-flash" src="<?php echo $js_url;?>player/ykloader.swf?VideoIDS=XNjA3MTc2NTg4&isAutoPlay=false&isShowRelatedVideo=false&embedid=-&showAd=0" id="movie_player" name="movie_player" bgcolor="#FFFFFF" quality="high" wmode="transparent" allowfullscreen="true"
flashvars="isShowRelatedVideo=false&showAd=0&show_pre=1&show_next=1&isAutoPlay=false&isDebug=false&UserID=&winType=interior&playMovie=true&MM
Control=false&MMout=false&RecordCode=1001,1002,1003,1004,1005,1006,2001,3001,3002,3003,3004,3005,3007,3008,9999"
pluginspage="http://www.macromedia.com/go/getflashplayer" width="450" height="327"></embed>

<?php } ?>
  </div>
 </div>
	<!--div class="pr fa-right">
	<div class="300x250 mb5" id="ad_300_01"></div>
	<div class="300x250" id="ad_300_02"></div>
	</div-->
  </div>
</div>
<div class="wrap w960">
 <div class="maxBox">
 <?php foreach($info['vlist'] as $v){?>
  <div class="box Video-list" id="PlayList_1">
   <div class="play-list b mb">
    <div class="title">
     <h3><span class="{if:"[playlist:from]"="百度影音"}p_baidu{elseif:"[playlist:from]"="优酷"}p_youku{else}p_tudou{end if}"></span>[playlist:from]<span class="tips">( [playlist:intro] )</span></h3>
     <span class="pa order hascoll">排序：<a id="desc_[playlist:i]" class="desc" href="javascript:void(0);" onclick="desc(1,[playlist:i],this)">降序</a> <em>|</em> <a id="asc_[playlist:i]" href="javascript:void(0);" class="asc asc_on" onclick="desc(0,[playlist:i],this)">升序</a></span></div>
    <div id="play_[playlist:i]">
     <ul>
     [playlist:link]
    </ul>
   </div>
  </div>
 </div>
 <?php }?>
<script>PlayHistoryObj.addPlayHistory('<?php echo $info['title'],$info['playnum'];?>',location.href)</script>
</div>
 <div class="maxBox mb10">
  <div class="box BigBox">
   <div class="title">
    <h3>《<?php echo $info['title'];?>》评论：</h3>
   </div>
   <div class="pl">
<!-- UY BEGIN -->
   <div id="uyan_frame"></div>
<script type="text/javascript">
  var uyan_config = {'du':'<?php echo $siteurl;?>','su':'<?php echo $info['id'];?>'};
</script>
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1723358" async=""></script>
<!-- UY END -->
  </div>
 </div>
</div>
</div>
