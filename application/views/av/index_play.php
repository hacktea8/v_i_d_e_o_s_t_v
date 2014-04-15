<div class="PlayBody">
<div id="MasklayerPlayer" style="position: absolute; z-index: 999;"></div>
  <div class="play">
    <div class="pl fa-left">
      <div class="player" id="player">
<?php
 if($uinfo['isvip'] > 0 || !$lastFreeLog){
   $playerFile = APPPATH.'views/outplayer/'.$info['player'];
   if(file_exists($playerFile)){
     require_once $playerFile;
   }
 }else{
?>
 <div class="noplaytips">
 <div>温馨提示:您未登录 或者 您不是VIP会员并且免费的福利已经使用完了？！建议<a href="/payment">立即升级VIP</a> 或 <a href="/<?php echo $_c;?>/login">立即登录</a></div> 
 </div>
<?php
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
 <div class="maxBox mb10">
  <div class="box BigBox">
   <div class="title">
   </div>
   <div class="pl">
  </div>
 </div>
</div>
</div>
<script type="text/javascript">
//PlayHistoryObj.addPlayHistory('<?php echo $info['title'],$info['playnum'];?>',location.href)</script>
</div>
