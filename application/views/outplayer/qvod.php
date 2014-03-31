<script language="javascript" type="text/javascript" src="<?php echo $js_url;?>player/jquery.qvod.min.js"></script>
<div id="player" style="width:<?php echo $player_config['width'];?>px; height:<?php echo $player_config['height'];?>px;"></div>
<script type="text/javascript">
$(function(){
//页面加载自动打开播放器
var url = "<?php echo $info['playurl'];?>";
//下一集资源地址
var nextqvod = "<?php echo $info['nextplayurl'];?>";
var adUrl = "<?php echo $ads['playbuffer'];?>";
//下一集播放页面 播放结束自动跳转到该页面
var nextpage = "<?php echo $info['nexturl'];?>";
//调用播放器
$("#player").qvod({PlayerArea:"player", AdUrl:adUrl,width:"<?php echo $player_config['width'];?>", height:"<?php echo $player_config['height'];?>", AutoPlay:"<?php echo $player_config['autoplay'];?>",QvodUrl:url,NextWebPage:nextpage, NextQvod:nextqvod});
/*参数说明*/
//width: "500", /*播放器的宽度*/		
//height: "400", /*播发器的高度*/
		
//AutoPlay: "true", /*自动播放 默认开启*/
		
//FullScreen: "false", /*自动全屏 默认关闭*/
		
//PlayerArea: "",	/*播放器插入的位置，标签的id属性*/
		
//QvodUrl: "", /*本集资源地址*/
		
//NextWebPage: "", /*下一集播放页地址*/
		
//NextQvod: "", /*下一集资源地址，预缓冲时使用*/
		
//ShowControl: "1", /*是否显示控制栏，0=不显示  1= 显示 默认参数是显示*/
		
//AdUrl: "http://buffer-ad.qvod.com/" /*缓冲广告 注：3.0.0.58及将来发布的客户端版本才支持*/

//该插件，能自动根据用户观看影片上一集是否全屏，设置自动跳转之后下一集的全屏状态。
});
</script>
