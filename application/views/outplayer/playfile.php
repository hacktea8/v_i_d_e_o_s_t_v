<script src="//vjs.zencdn.net/4.5.1/video.js"></script>
<link href="<?php echo $css_url;?>video-js.css" rel="stylesheet">
<div id="playerDialog">
<video id="my_video_1" class="video-js vjs-default-skin" controls
 preload="auto" width="<?php echo $player_config['width'];?>" height="<?php echo $player_config['height'];?>" poster="<?php echo $info['pic'];?>"
 data-setup="{}">
 <source src="<?php echo $info['playurl'];?>" type='video/mp4'>
</video>
</div>
