<div class="wrap w960">
 <div class="ad960 mt10 mb10">954*80 顶部广告位</div>
 <div class="maxBox mt10">
  <div class="box">
   <div class="tips">当前位置：{playpage:textlink}</div>
  </div>
 </div>
 <div class="maxBox mb10 mt10">
  <div class="box">
   <div class="introduce" id="introduce">
    <div class="vod-img"><a href="{playpage:link}"><img src="{playpage:pic}" alt="{playpage:name}"></a></div>
   <div class="vod-c">
    <div class="vod_t">
     <h3 class="title"><?php echo $info['title'];?></h3>
     <div class="more">
      <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_qzone"></a> <a class="bds_baidu"></a> <a class="bds_renren"></a> <a class="bds_kaixin001"></a> <a class="bds_tqf"></a> <a class="bds_hi"></a> <a class="bds_qq"></a> <a class="bds_taobao"></a> </div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=5004441" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
    </span> </div>
   </div>
   <div class="vod_bigc">
    <div class="vod_l">
     <div class="info">
      <div class="score_avg"><font>{playpage:scorenum}</font></div>
      <dl class="Actor">
      <dt>主演：</dt>
      <dd><?php foreach($info['actor'] as $v){
      echo "<a href=\"$v[url]\">$v[title]</a> | ";
      }?></dd>
      </dl>
      <dl class="status">
      <dt>导演：</dt>
      <dd><?php echo $info['director']?"<a href=\"".$info['director']['url']."\">".$info['director']['title']."</a>":'';?></dd>
      </dl>
<?php if(0){?>
     <dl class="Lang">
     <dt>语言：</dt>
     <dd>{playpage:lang}</dd>
     </dl>
     <dl class="Age">
     <dt>年份：</dt>
     <dd>{playpage:publishtime}</dd>
     </dl>
<?php } ?>
     <dl class="Type">
     <dt>类型：</dt>
     <dd><?php foreach($info['type'] as $v){
     echo "<a href=\"$v[url]\">$v[title]</a> | ";
     } ?></dd>
     </dl>
     <dl class="Time">
     <dt>时间：</dt>
     <dd><?php echo $info['atime'];?></dd>
     </dl>
     <dl class="gather">
     <dt>人气：</dt>
     <dd><?php echo $info['hits'];?></dd>
     </dl>
     <dl class="Intr">
     <dt>剧情：</dt>
     <dd><span><?php echo $info['intro'];?></span></dd>
     </dl>
<?php if(0){?>
     <dl class="Grade">
     <dt>评分：</dt>
     <dd>
     {playpage:mark len=9 style=star}
     </dd>
     </dl>
<?php }?>
    </div>
   </div>
   <div class="vod_r">300*250 广告位</div>
  </div>
 </div>
</div>
</div>
</div>
<div class="maxBox">
 <div class="box">
  <div class="tips">【电影观看小贴士】：[DVD：普通清晰版] [BD：高清无水印] [HD：高清版] [TS：抢先非清晰版] - 其中，BD和HD版本不太适合网速过慢的用户观看</div>
 </div>
</div>
<div class="maxBox">
<?php foreach($info['vlist'] as $row){?>
<div class="box Video-list mt10">
 <div class="play-list b mb">
  <div class="title">
   <h3><span class="{if:"[playlist:from]"="百度影音"}p_baidu{elseif:"[playlist:from]"="优酷"}p_youku{else}p_tudou{end if}"></span>[playlist:from]<span class="tips">( [playlist:intro] )</span></h3>
   <span class="pa order hascoll">排序：<a id="desc_<?php echo $row['id'];?>" class="desc" href="javascript:void(0);" onclick="desc(1,<?php echo $row['id'];?>,this)">降序</a><em>|</em><a id="asc_<?php echo $row['id'];?>" href="javascript:void(0);" class="asc asc_on" onclick="desc(0,<?php echo $row['id'];?>,this)">升序</a></span></div>
<div id="play_<?php echo $row['id'];?>">
 <ul>
<li><a href="<?php echo $row['url'];?>"><?php echo $row['title'];?></a></li>
 </ul>
</div>
</div>
</div>
<?php }?>
</div>
<div class="maxBox mb10 mt5">
 <div class="box BigBox">
  <div class="title">
   <h3>热门<?php echo $channel[$info['cid']]['title'];?>：</h3>
  </div>
  <div class="hotVideo">
   <ul class="pic-list">
<?php foreach($hotlist as $row){?>
    <li><a class="play-pic" href="<?php $row['url'];?>" title="<?php echo $row['title'];?>"><img src="<?php echo $row['pic'];?>" style="display: block;"><span class="play-icon">&nbsp;</span>
     <label class="bg">&nbsp;</label>
     <label class="time"><?php echo $row['note'];?></label>
     </a>
     <p><a href="<?php $row['url'];?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a></p>
     <p class="txt"><?php echo $row['nolinkactor'];?></p>
    </li>
<?php }?>
   </ul>
  </div>
 </div>
</div>
<a name="Introduce" id="Introduce"></a>
<div class="maxBox mb10">
 <div class="box BigBox">
  <div class="title">
   <h3>《<?php echo $info['title'];?>》剧情介绍：</h3>
  </div>
  <div class="js">
   <p><?php echo $info['intro'];?></p>
   <p>温馨提示：您正在观看的“<?php echo $info['title'];?>》在线观看”的剧情介绍来自于[<font style="text-transform:uppercase;"><?php echo $siteurl;?></font>-<?php echo $sitename;?>，如果您喜欢本站，请推荐给您的朋友，谢谢您的支持! 最后更新：<font color="red"><?php $info['atime'];?></font></p>
  </div>
  </div>
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
  var uyan_config = {'du':'<?php echo $siteurl;?>','su':'<?php $info['vid'];?>'};
  </script>
  <script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1723358" async=""></script>
<!-- UY END -->
  </div>
  </div>
 </div>
<div class="ad960 mt10">954*80 底部广告位</div>
</div>
<!--网站底部-->
