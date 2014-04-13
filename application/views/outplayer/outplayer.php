<?php if($uinfo['isvip'] || !$lastFreeLog){?>
<object width='<?php echo $player_config['width'];?>' height='<?php echo $player_config['height'];?>'><param value='transparent' name='wmode'><param value='<?php echo $player_config['autoplay'];?>' name='autostart'><param value='true' name='loop'><param value='high' name='quality'><embed width='<?php echo $player_config['width'];?>' height='<?php echo $player_config['height'];?>' wmode='transparent' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' quality='high' src='<?php echo $info['playurl'];?>'></object>
<?php }else{?>
No VIP
<?php }?>
<script type="text/javascript">
MasklayerDiv('#player',0,0,-20,0);
jQuery("#MasklayerPlayer").bind("contextmenu",function(){window.event.returnValue=false;});
</script>
