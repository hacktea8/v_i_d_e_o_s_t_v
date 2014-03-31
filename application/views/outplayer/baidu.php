<div id="baidu_player">
<object classid="clsid:02E2D748-67F8-48B4-8AB4-0A085374BB99" id="BaiduPlayer" name="BaiduPlayer" onError=if(window.confirm('请您先安装百度影音软件,然后刷新本页才可以正常播放.')){window.open('http://player.baidu.com')}else{self.location='http://player.baidu.com'}>
</object>
</div>
<script language="javascript">
var BdPlayer = new Array();
BdPlayer['time'] = <?php echo $player_config['time'];?>;//缓冲广告展示时间(如果设为0,则根据缓冲进度自动控制广告展示时间)
BdPlayer['buffer'] = '<?php echo $ads['playbuffer'];?>';//贴片广告网页地址
BdPlayer['pause'] = '<?php echo $ads['playpause'];?>';//暂停广告网页地址
BdPlayer['end'] = '<?php echo $ads['playend'];?>';//影片播放完成后加载的广告
BdPlayer['tn'] = '12345678';//播放器下载地址渠道号
BdPlayer['width'] = <?php echo $player_config['width'];?>;//播放器宽度(只能为数字)
BdPlayer['height'] = <?php echo $player_config['height'];?>;//播放器高度(只能为数字)
BdPlayer['showclient'] = 1;//是否显示拉起拖盘按钮(1为显示 0为隐藏)
BdPlayer['url'] = '<?php echo $info['playurl'];?>';//当前播放任务播放地址
BdPlayer['nextcacheurl'] = '<?php echo $info['nextplayurl'];?>';//下一集播放地址(没有请留空)
BdPlayer['lastwebpage'] = '<?php echo $info['lasturl'];?>';//上一集网页地址(没有请留空)
BdPlayer['nextwebpage'] = '<?php echo $info['nexturl'];?>';//下一集网页地址(没有请留空)
</script>
<script language="javascript" src="http://php.player.baidu.com/bdplayer/player.js" charset="utf-8"></script>
