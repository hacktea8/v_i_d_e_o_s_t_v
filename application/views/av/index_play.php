<div class="PlayBody">
  <div class="play">
    <div class="pl fa-left">
      <div class="player" id="player">
<?php
 $playerFile = APPPATH.'views/outplayer/'.$info['player'];
 if(file_exists($playerFile)){
   require_once $playerFile;
 }
 ?>
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
 <?php foreach($info['vlist'] as $key => $v){?>
  <div class="box Video-list" id="PlayList_1">
   <div class="play-list b mb">
    <div class="title">
     <h3><span class="<?php if($info['playmode']==4){echo 'p_baidu';}?>"></span>播放列表<span class="tips">(  )</span></h3>
     <span class="pa order hascoll">排序：<a id="desc_<?php echo $key;?>" class="desc" href="javascript:void(0);" onclick="desc(1,<?php echo $key;?>,this)">降序</a> <em>|</em> <a id="asc_<?php echo $key;?>" href="javascript:void(0);" class="asc asc_on" onclick="desc(0,<?php echo $key;?>,this)">升序</a></span></div>
    <div id="play_<?php echo $key;?>">
     <ul>
    <li><a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a></li> 
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
   </div>
   <div class="pl">
  </div>
 </div>
</div>
</div>
