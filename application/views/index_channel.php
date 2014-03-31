<div class="wrap w960">
 <div class="maxBox lb mb10 mt10">
  <div class="filter_select_con">
   <div class="filter_select_con_th"><a href="/casecade.php" class="resetBtn">重置条件</a><span class="sNum">
    <h1></h1>
    </span><span class="sMark">影片索引</span><span class="filter_select_con_hot"><!--a href="#" style="color:red;">X</a--></span>
   </div>
   <div class="filter_select_con_tb clearfix">
   <!--dl class="p2">
   <dt></dt>
   <dd></dd>
   </dl-->
   <dl class="p3">
    <dt><b style="color:#00ADFF;font-weight:bold;margin: 0 5px;">按地区</b>|</dt>
    <dd>{pipicms:areacaslist}<a href='[areacaslist:link]&tid={pipicms:currenttypeid}'>[areacaslist:value]</a><em>|</em>{/pipicms:areacaslist}</dd>
  </dl>
<?php if(0){?>
  <dl class="p4">
   <dt><b style="color:#00ADFF;font-weight:bold;margin: 0 5px;">按年份</b>|</dt>
    <dd>{pipicms:yearcaslist}<a href='[yearcaslist:link]&tid={pipicms:currenttypeid}'>[yearcaslist:value]</a><em>|</em>{/pipicms:yearcaslist}</dd>
  </dl>
  <dl>
  <dt><b style="color:#00ADFF;font-weight:bold;margin: 0 5px;">按语言</b>|</dt>
   <dd>{pipicms:langcaslist}<a href='[langcaslist:link]&tid={pipicms:currenttypeid}'>[langcaslist:value]</a><em>|</em>{/pipicms:langcaslist}</dd>
  </dl>
  <dl>
  <dt><b style="color:#00ADFF;font-weight:bold;margin: 0 5px;">首字母</b>|</dt>
   <dd>{pipicms:lettercaslist}<a href='[lettercaslist:link]&tid={pipicms:currenttypeid}'>[lettercaslist:value]</a><em>|</em>{/pipicms:lettercaslist}</dd>
  </dl>
<?php }?>
  </div>
 </div>
</div>
<div class="maxBox mt10 mb10">
 <div class="box">
  <div class="tips">当前位置：{channelpage:typetext}</div>
 </div>
</div>
<div class="ad960 mt10 mb10">954*80 顶部广告位</div>
<div class="maxBox lb">
 <div class="cntBar fa-left">
  <div class="sideRow">
   <div class="box mb10">
    <div class="caption fa-clear">
     <h3 class="hide-self fa-left"><?php echo $channel[$cid]['title'];?>月排行</h3>
     <span>
<!--<a href="/film9/">更多</a>-->
     </span>
    </div>
    <div class="content">
     <ul class="ul-top">
<?php foreach($month_rank as $row){?>
      <li><a href="<?php echo $row['url'];?>"><?php echo $row['title'];?><em><?php echo $row['note'];?></em></a><span><strong><?php echo $row['rtime'];?></strong></span></li>
<?php }?>
     </ul>
    </div>
   </div>
  <div class="box">
   <div class="caption fa-clear">
    <h3 class="hide-self fa-left"><?php echo $channel[$cid]['title'];?>推荐榜</h3>
    <span>
    <!--<a href="/film9/">更多</a>-->
    </span>
   </div>
   <div class="content">
    <ul class="ul-top">
<?php foreach($recommend_rank as $row){?>
     <li><a href="<?php echo $row['url'];?>"><?php echo $row['title'];?><em><?php echo $row['note'];?></em></a><span><strong><?php echo $row['rtime'];?></strong></span></li>
<?php }?>
    </ul>
   </div>
  </div>
 </div>
</div>
<div class="cntBox fa-right">
 <div class="conBox">
  <div class="box">
   <div class="caption bigCaption channel-title fa-clear">
    <h2 class="hide-self fa-left"><?php echo $channel[$cid]['title'];?></h2>
   <div class="fenye fa-right" {if:"{channellist:recordcount}"<"10"}style="display:none;"{end if} >
	{channellist:page} / {channellist:pagecount} {if:"{channellist:page}"="1"}<a href="{channellist:nextlink}" class="xyy">下一页</a>{elseif:{channellist:page}={channellist:pagecount}}<a href="{channellist:backlink}" class="syy">上一页</a>{else}<a href="{channellist:backlink}" class="syy">上一页</a><a href="{channellist:nextlink}" class="xyy">下一页</a>{end if}
  </div>
 </div>
<div class="channel-content">
 <ul>
<?php foreach($channelList as &$row){?>
  <li onmousemove="this.className='cbg'" onmouseout="this.className=''" class=""> <a href="<?php echo $row['url'];?>" title="<?php echo $row['title'];?>" class="ah"><img src="<?php echo $row['pic'];?>" alt="<?php echo $row['title'];?>"></a>
   <h2><a href="<?php echo $row['url'];?>"><?php echo $row['title'];?></a></h2>
   <p><b>主演：</b><?php echo $row['linkactor'];?></p>
   <p><b>地区：</b><?php echo $row['linkarea'];?><em>年份：未知</em></p>
  <p><b>语言：</b>未知<em>备注：<?php echo $row['note'];?></em></p>
  <p><b>时间：</b><?php echo $row['rtime'];?></p>
  <p class="xb"><a href="<?php echo $row['url'];?>" class="xq bg"></a><a href="<?php echo $row['playurl'];?>" class="bf bg"></a></p>
 </li>
<?php } ?>
 </ul>
</div>
<div class="page">
 [channellist:pagenumber len=5]
</div>
</div>
</div>
</div>
</div>
<div class="ad960 mt10">954*80 底部广告位</div>
</div>
<!--网站底部-->
