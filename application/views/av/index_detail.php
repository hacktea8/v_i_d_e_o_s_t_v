<div class="wrap w960">
 <div class="ad960 mt10 mb10">954*80 顶部广告位</div>
 <div class="maxBox mt10">
  <div class="box">
   <div class="tips">当前位置：<a href="/">首页</a>&gt;<a href="<?php echo $channel[$info['cid']]['url'];?>"><?php echo $channel[$info['cid']]['title'];?></a>
   &gt;<?php echo $info['title'];?>
<?php if($uinfo['isadmin']){?>
<a href="<?php echo $editVideoUrl,$info['vid'];?>" target="_blank">编辑</a>
<?php }?>
   </div>
  </div>
 </div>
 <div class="maxBox mb10 mt10">
  <div class="box">
    <div class="vod_t">
     <h3 class="title"><?php echo $info['title'];?></h3>
     <div class="more"></div>
   </div>
   <div class="introduce" id="introduce">
    <div class="vod-img"><a><img src="<?php echo $info['pic'];?>" title="<?php echo $info['title'];?>" alt="<?php echo $info['title'];?>"></a></div>
   <div class="vod-c">
   <div class="vod_bigc">
    <div class="vod_l">
     <div class="info">
<?php if(0){?>
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
     <dd>
<a href="<?php echo $channel[$info['cid']]['url'];?>"><?php echo $channel[$info['cid']]['title'];?></a>
     </dd>
     </dl>
     <dl class="Time">
     <dt style="width:60px">马赛克：</dt>
     <dd><?php echo $info['mosaic']?'有码':'无码';?></dd>
     </dl>
     <dl class="Time">
     <dt>时间：</dt>
     <dd><?php echo $info['atime'];?></dd>
     </dl>
     <dl class="gather">
     <dt>人气：</dt>
     <dd><?php echo $info['hits'];?></dd>
     </dl>
<?php if(0){?>
     <dl class="Intr">
     <dt>剧情：</dt>
     <dd><span><?php echo $info['intro'];?></span></dd>
     </dl>
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
   <h3><span class="p_baidu"></span>影片列表<span class="tips">(  )</span></h3>
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
   <p>温馨提示：您正在观看的“<?php echo $info['title'];?>》在线观看”的剧情介绍来自于[<font style="text-transform:uppercase;"><?php echo $web_title;?></font>-<?php echo $domain;?>，如果您喜欢本站，请推荐给您的朋友，谢谢您的支持! 最后更新：<font color="red"><?php echo $info['atime'];?></font></p>
  </div>
  </div>
</div>
<div class="maxBox mb10">
<div class="box BigBox">
<div class="pl">
  </div>
  </div>
 </div>
<div class="ad960 mt10">954*80 底部广告位</div>
</div>
<!--网站底部-->
