<div class="wrap w960">
	<div class="ad960 mt10 mb10">954*80 顶部广告位</div>
	<div class="maxBox mb10 mt5" id="latest-focus">
		<div class="latest-tab">
			<ul>
	<li id="latest1" onmouseover="setTab(1);" class="active">热门影片推荐</li>
	<li id="latest2" onmouseover="setTab(2);" class="">最新亚洲BT视频</li>
	<li id="latest3" onmouseover="setTab(3);" class="">最新欧美BT视频</li>
	<li id="latest4" onmouseover="setTab(4);" class="">最新国产色片</li>
	<li id="latest5" onmouseover="setTab(5);" class="">最新经典三级</li>
	</ul>
		</div>
		<SCRIPT language="javascript" type="text/javascript">function setTab(index) {for (var i=1;i<=5;i++){document.getElementById("latest"+i).className ="";document.getElementById("latest"+index).className ="active";document.getElementById("con_latest_"+i).style.display="none";}document.getElementById ("con_latest_"+index).style.display  ="block";}</SCRIPT>
		<div class="box box-blue-bold">
			<div id="con_latest_1" class="hot-latest active" style="display: block; ">
				<ol class="pic-list">
<?php foreach($videolist['hotvideo'] as $k => $v){
if($k>6){
break;
}
?>
					<li><a class="play-pic" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><img src="<?php echo $v['pic'];?>" title="<?php echo $v['title'];?>" alt="<?php echo $v['title'];?>">
						<label class="bg">&nbsp;</label>
						<label class="time"><?php echo $v['atime'];?></label>
						</a>
						<p><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a></p>
					</li>
<?php }?>
				</ol>
				<!-- // pic-list End -->
				<ul class="txt-list">
<?php foreach($videolist['hotvideo'] as $k => $v){
if($k<7){
continue;
}
?>
				<li><span><?php echo $v['atime'];?></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a> / <a class="gray" href="[videolist:link]"><?php echo $v['atime'];?></a></li>
<?php }?>
				</ul>
				<!-- // txt-list End -->
			</div>
			<div id="con_latest_2" class="fa-hide" style="display: none; ">
				<ol class="pic-list">
<?php foreach($videolist['newasiavideo'] as $k => $v){
if($k>6){
break;
}
?>
	<li><a class="play-pic" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"> <img src="<?php echo $v['pic'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>">
	<label class="bg">&nbsp;</label>
	<label class="time"><?php echo $v['atime'];?></label>
	</a>
	<p><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a></p>
	</li>
<?php }?>
	</ol>
				<!-- // pic-list End -->
	<ul class="txt-list">
<?php foreach($videolist['newasiavideo'] as $k => $v){
if($k<7){
continue;
}
?>
	<li><span><?php echo $v['atime'];?></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a> / <a class="gray" href="<?php echo $v['url'];?>"><?php echo $v['atime'];?></a></li>
<?php }?>
	</ul>
				<!-- // txt-list End -->
			</div>
			<div id="con_latest_3" class="fa-hide" style="display: none; ">
				<ol class="pic-list">
<?php foreach($videolist['newusavideo'] as $k => $v){
if($k>6){
break;
}
?>
	<li><a class="play-pic" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><img src="<?php echo $v['pic'];?>" alt="<?php echo $v['title'];?>">
	<label class="bg">&nbsp;</label>
	<label class="time"><?php echo $v['atime'];?></label>
	</a>
	<p><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a></p>
	</li>
<?php }?>
	</ol>
	<!-- // pic-list End -->
	<ul class="txt-list">
<?php foreach($videolist['newusavideo'] as $k => $v){
if($k<7){
continue;
}
?>
	<li><span><?php echo $v['atime'];?></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a> / <a class="gray" href="<?php echo $v['url'];?>"><?php echo $v['atime'];?></a></li>
<?php }?>
	</ul>
				<!-- // txt-list End -->
	</div>
	<div id="con_latest_4" class="fa-hide" style="display: none; ">
	<ol class="pic-list">
<?php foreach($videolist['newchinacolor'] as $k => $v){
if($k>6){
break;
}
?>
<li><a class="play-pic" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><img src="<?php echo $v['pic'];?>" alt="<?php echo $v['title'];?>">
        <label class="bg">&nbsp;</label>
        <label class="time"><?php echo $v['atime'];?></label>
        </a>
        <p><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a></p>
        </li>
<?php }?>
	</ol>
	<!-- // pic-list End -->
	<ul class="txt-list">
<?php foreach($videolist['newchinacolor'] as $k => $v){
if($k<7){
continue;
}
?>
        <li><span><?php echo $v['atime'];?></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a> / <a class="gray" href="<?php echo $v['url'];?>"><?php echo $v['atime'];?></a></li>
<?php }?>
	</ul>
	<!-- // txt-list End -->
	</div>
	<div id="con_latest_5" class="fa-hide" style="display: none; ">
	<ol class="pic-list">
<?php foreach($videolist['newclassicthree'] as $k => $v){
if($k>6){
break;
}
?>
<li><a class="play-pic" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><img src="<?php echo $v['pic'];?>" alt="<?php echo $v['title'];?>">
        <label class="bg">&nbsp;</label>
        <label class="time"><?php echo $v['atime'];?></label>
        </a>
        <p><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a></p>
        </li>
<?php }?>
	</ol>
	<!-- // pic-list End -->
	<ul class="txt-list">
<?php foreach($videolist['newclassicthree'] as $k => $v){
if($k<7){
continue;
}
?>
        <li><span><?php echo $v['atime'];?></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,8);?></a> / <a class="gray" href="<?php echo $v['url'];?>"><?php echo $v['atime'];?></a></li>
<?php }?>
	</ul>
	<!-- // txt-list End -->
	</div>
		</div>
	</div>
	<!-- 电视 -->
	<div class="ad960 mb10">954*80 中部广告位</div>
	<a name="TV"></a>
	<div class="maxBox mb10" id="tv">
		<div class="box ui-yiyi fa-clear">
			<label class="videoIco"></label>
			<div class="conBox ui-tab fa-left">
				<div class="caption fa-clear">
					<h2></h2>
					<p class="tv-link">{pipicms:menulist type=13,14,15,16,28}<a href="[menulist:link]">[menulist:typename]</a>{/pipicms:menulist}</p>
				</div>
				<div class="content">
					<div class="ui-tab-item  fa-clear">
						<div class="sideRow fa-left">
<?php foreach($videolist['asiavideo'] as $k => $v){
if($k>0)break;
?>
	<div class="ui-focus"><a class="play-pic" href="<?php echo $v['url'];?>"><img src="<?php echo $v['pic'];?>" alt="<?php echo $v['title'];?>" style="display: block;">
	<label class="bg">&nbsp;</label>
	<label class="time"><?php echo $v['title'];?></label>
	</a>
<?php if(0){?>
	<ul class="ui-focus-text">
									<li><strong>导演：</strong>{if:"[videolist:director]"=""}未知{else}[videolist:director]{end if}</li>
									<li><strong>主演：</strong>[videolist:nolinkactor]</li>
									<li class="desc"><strong>简介：</strong>[videolist:des len=70]</li>
	</ul>
<?php }?>
	</div>
<?php }?>
	<!-- // ui-focus End -->
	<div class="ui-will">
	<h4>本站推荐</h4>
	<ul class="ui-will-cnt">
<?php foreach($videolist['asiavideo'] as $k => $v){
if($k<1)continue;
if($k>5)break;
?>
	<li><strong class="c_txt2"><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,10);?></a></strong> <?php echo $v['atime'];?> <a href="<?php echo $channel[$v['cid']]['url']?>" title="<?php echo $channel[$v['cid']]['title']?>"><?php echo $channel[$v['cid']]['title']?></a></li>
<?php }?>
	</ul>
	</div>
<!-- // ui-synch End -->
	</div>
	<div class="pic-list pic-list-focus">
	<ul>
<?php foreach($videolist['asiavideo'] as $k => $v){
if($k<6)continue;
if($k>11)break;
?>
	<li><a class="play-pic" href="<?php echo $v['url'];?>"><img src="<?php echo $v['pic'];?>" style="display: block; "><span class="play-icon">&nbsp;</span>
									<label class="bg">&nbsp;</label>
									<label class="time"><?php echo $v['atime'];?></label>
									</a>
	<p> <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a> </p>
<?php if(0){?>
	<p class="txt"></p>
	<p class="txt"><span class="ratbar"> <span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span> </span> <strong class="ratbar-num">[videolist:score]</strong> </p>
<?php }?>
	</li>
<?php }?>
	</ul>
	</div>
	<!-- // pic-list End -->
	</div>
	<!-- // ui-tab-item End -->
	</div>
	</div>
	<!-- // conBox End -->
	<div class="sideBar fa-right">
	<div class="ui-top-tab">
	<div class="caption fa-clear">
	<h3><a href="<?php echo $channel[2]['url'];?>"><?php echo $channel[2]['title'];?>最新更新排行</a></h3>
	</div>
	<div class="content">
	<ul class="ul-top">
<?php foreach($videolist['asiavideo'] as $k => $v){
if($k<12)continue;
?>
	<li><span><strong><?php $v['atime'];?></strong></span> <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></li>
<?php }?>
	</ul>
	</div>
	</div>
	<!-- // topBox End -->
<?php if(0){?>
	<div class="ui-sort">
	<div class="caption">
	<h3>{pipicms:menulist type=2}<a href="[menulist:link]">[menulist:typename]类型</a>{/pipicms:menulist}</h3>
					</div>
					<div class="tb_c">
						<dl class="videoSortList clearfix">
							<dt>按类型</dt>
							<dd>{pipicms:menulist type=13,14,15,16,28}<span><a href="[menulist:link]">[menulist:typename]</a></span>{/pipicms:menulist}</dd>
							<dt>按地区</dt>
							<dd>{pipicms:areacaslist}<span><a href="[areacaslist:link]&tid=2">[areacaslist:value]</a></span>{/pipicms:areacaslist}</dd>
							<!--dt>按年代</dt>
						<dd>{pipicms:yearcaslist}<span><a href="[yearcaslist:link]&tid=2">[yearcaslist:value]</a></span>{/pipicms:yearcaslist}</dd-->
						</dl>
					</div>
				</div>
				<!-- // ui-sort End -->
<?php }?>
	</div>
	</div>
	</div>
	<!-- 电影 -->
	<div class="ad960 mb10">954*80 中部广告位</div>
	<a name="Movie"></a>
	<div class="maxBox mb10" id="Movie">
		<div class="box ui-yiyi fa-clear">
	<label class="videoIco"></label>
	<div class="conBox ui-tab fa-left">
	<div class="caption fa-clear">
	<h2></h2>
	<p class="tv-link">{pipicms:menulist type=5,6,7,8,9,10,11,12}<a href="[menulist:link]">[menulist:typename]</a>{/pipicms:menulist}</p>
	</div>
	<div class="content">
	<div class="ui-tab-item fa-clear">
	<div class="sideRow fa-left">
<?php foreach($videolist['usavideo'] as $k => $v){
if($k>0)break;
?>
	<div class="ui-focus"><a class="play-pic" href="<?php echo $v['url'];?>"><img src="<?php echo $v['pic'];?>" alt="" style="display: block;">
	<label class="bg">&nbsp;</label>
	<label class="time"><?php echo $v['title'];?></label>
	</a>
<?php if(0){?>
	<ul class="ui-focus-text">
<li><strong>导演：</strong>{if:"[videolist:director]"=""}未知{else}[videolist:director]{end if}</li>
									<li><strong>主演：</strong>[videolist:nolinkactor]</li>
									<li class="desc"><strong>简介：</strong>[videolist:des len=70]</li>
								</ul>
<?php }?>
	</div>
<?php }?>
	<div class="ui-will">
	<h4>本站推荐</h4>
	<ul class="ui-will-cnt">
<?php foreach($videolist['usavideo'] as $k => $v){
if($k<1)continue;
if($k>6)break;
?>
	<li><strong class="c_txt2"><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo mb_substr($v['title'],0,10);?></a></strong> <?php echo $v['atime'];?> <a href="<?php echo $channel[$v['cid']]['url'];?>" title="<?php echo $channel[$v['cid']]['title'];?>"><?php echo $channel[$v['cid']]['title'];?></a></li>
<?php }?>
	</ul>
	</div>
	<!-- // ui-synch End -->
	</div>
<div class="pic-list pic-list-focus">
	<ul>
<?php foreach($videolist['usavideo'] as $k => $v){
if($k<7)continue;
if($k>12)break;
?>
	<li><a class="play-pic" href="<?php echo $v['url'];?>"><img src="<?php echo $v['pic'];?>" style="display: block; "><span class="play-icon">&nbsp;</span>
	<label class="bg">&nbsp;</label>
	<label class="time"><?php echo $v['atime'];?></label>
	</a>
	<p> <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a> </p>
<?php if(0){?>
<p class="txt">{if:"[videolist:nolinkactor]"=""}未录入{else}[videolist:nolinkactor]{end if}</p>
									<p class="txt"><span class="ratbar"><span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span></span><strong class="ratbar-num">[videolist:score]</strong> </p>
<?php }?>
	</li>
<?php }?>
	</ul>
	</div>
	<!-- // pic-list End -->
	</div>
<!-- // ui-tab-item End -->
	</div>
	</div>
	<!-- // conBox End -->
	<div class="sideBar fa-right">
	<div class="ui-top-tab">
	<div class="caption fa-clear">
	<h3><a href="<?php echo $channel[3]['url'];?>"><?php echo $channel[3]['title'];?>最新更新排行</a></h3>
	</div>
	<div class="content">
	<ul class="ul-top">
<?php foreach($videolist['usavideo'] as $k => $v){
if($k<13)continue;
?>
	<li><span><strong>0 分</strong></span> <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></li>
<?php }?>
	</ul>
	</div>
	</div>
	<!-- // topBox End -->
<?php if(0){?>
	<div class="ui-sort">
	<div class="caption">
	<h3>{pipicms:menulist type=1}<a href="[menulist:link]">[menulist:typename]类型</a>{/pipicms:menulist}</h3>
	</div>
	<div class="tb_c">
	<dl class="videoSortList clearfix">
	<dt>按分类</dt>
							<dd>{pipicms:menulist type=5,6,7,8,9,10,11,12}<span><a href="[menulist:link]">[menulist:typename]</a></span>{/pipicms:menulist}</dd>
							<dt>按地区</dt>
							<dd>{pipicms:areacaslist}<span><a href="[areacaslist:link]&tid=1">[areacaslist:value]</a></span>{/pipicms:areacaslist}</dd>
							<!--dt>按年代</dt>
						<dd>{pipicms:yearcaslist}<span><a href="[yearcaslist:link]&tid=1">[yearcaslist:value]</a></span>{/pipicms:yearcaslist}</dd-->
						</dl>
					</div>
				</div>
	<!-- // ui-sort End -->
<?php }?>
	</div>
	</div>
	</div>
	<!-- 动漫 -->
	<div class="ad960 mb10">954*80 中部广告位</div>
	<a name="cartoonm"></a>
	<div class="maxBox mb10" id="Cartoon">
		<div class="box ui-yiyi fa-clear">
			<label class="videoIco"></label>
			<div class="conBox ui-tab fa-left">
				<div class="caption fa-clear">
					<h2></h2>
					<p class="tv-link">
	<!--A链接-->
	</p>
	</div>
	<div class="content">
	<div class="ui-tab-item fa-clear">
	<ol class="pic-list pic-list-focus">
<?php foreach($videolist['usavideo'] as $k => $v){
if($k>15)break;
?>
	<li><a class="play-pic" href="<?php echo $v['url'];?>"><img src="<?php echo $v['pic'];?>" style="display: block;"><span class="play-icon">&nbsp;</span>
	<label class="bg">&nbsp;</label>
	<label class="time"><?php echo $v['atime'];?></label>
	</a>
	<p><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></p>
<?php if(0){?>
	<p class="txt">[videolist:nolinkactor]</p>
	<p class="txt"><span class="ratbar"><span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span></span><strong class="ratbar-num">[videolist:score]</strong></p>
<?php }?>
	</li>
<?php }?>
	</ol>
	<!-- // pic-list End -->
	</div>
	<!-- // ui-tab-item End -->
	</div>
	</div>
	<!-- // conBox End -->
	<div class="sideBar fa-right">
	<div class="ui-top-tab">
	<div class="caption fa-clear">
	<h3><?php echo $channel[7]['title'];?>最新排行</h3>
	</div>
	<div class="content">
	<ul class="ul-top">
<?php foreach($videolist['usavideo'] as $k => $v){
if($k<16)continue;
?>
	<li><span><strong><?php echo $v['atime'];?></strong></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></li>
<?php }?>
	</ul>
	</div>
	</div>
	<!-- // topBox End -->
<?php if(0){?>
				<div class="ui-sort">
					<div class="caption">
						<h3>{pipicms:menulist type=4}[menulist:typename]类型{/pipicms:menulist}</h3>
					</div>
					<div class="tb_c">
						<dl class="videoSortList clearfix">
							<dt>按地区</dt>
							<dd>{pipicms:areacaslist}<span><a href="[areacaslist:link]&tid=4">[areacaslist:value]</a></span>{/pipicms:areacaslist}</dd>
							<dt>按语言</dt>
							<dd>{pipicms:langcaslist}<span><a href="[langcaslist:link]&tid=4">[langcaslist:value]</a></span>{/pipicms:langcaslist}</dd>
							<dt>按年代</dt>
							<dd>{pipicms:yearcaslist}<span><a href="[yearcaslist:link]&tid=4">[yearcaslist:value]</a></span>{/pipicms:yearcaslist}</dd>
						</dl>
	</div>
	</div>
	<!-- // ui-sort End -->
<?php }?>
	</div>
	</div>
	</div>
	<!-- 综艺节目 -->
	<div class="ad960 mb10">954*80 中部广告位</div>
	<a name="variety"></a>
	<div class="maxBox mb10" id="Variety">
		<div class="box ui-yiyi fa-clear">
			<label class="videoIco"></label>
			<div class="conBox ui-tab fa-left">
				<div class="caption fa-clear">
					<h2></h2>
					<p class="tv-link"> </p>
				</div>
	<div class="content">
	<div class="ui-tab-item  fa-clear">
	<ol class="pic-list pic-list-focus">
<?php foreach($videolist['adultanimevideo'] as $k => $v){
if($k>14)break;
?>
	<li><a class="play-pic" href="<?php echo $v['url'];?>"><img src="<?php echo $v['pic'];?>" style="display: block;"><span class="play-icon">&nbsp;</span>
	<label class="bg">&nbsp;</label>
	<label class="time"><?php echo $v['atime'];?></label>
	</a>
	<p><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></p>
<?php if(0){?>
	<p class="txt">[videolist:nolinkactor]</p>
								<p class="txt"><span class="ratbar"><span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span></span><strong class="ratbar-num">[videolist:score]</strong></p>
<?php }?>
	</li>
<?php }?>
	</ol>
	<!-- // pic-list End -->
	</div>
	<!-- // ui-tab-item End -->
	</div>
	</div>
	<!-- // conBox End -->
	<div class="sideBar fa-right">
	<div class="ui-top-tab">
	<div class="caption fa-clear">
	<h3><?php echo $channel[11]['title'];?>最新排行</h3>
	</div>
	<div class="content">
	<ul class="ul-top">
<?php foreach($videolist['adultanimevideo'] as $k => $v){
if($k<15)continue;
?>
	<li><span><strong><?php echo $v['atime'];?></strong></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>"><?php echo $v['title'];?></a></li>
<?php }?>
	</ul>
	</div>
	</div>
<?php if(0){?>
				<div class="ui-sort">
					<div class="caption">
						<h3>{pipicms:menulist type=3}[menulist:typename]类型{/pipicms:menulist}</h3>
					</div>
					<div class="tb_c">
						<dl class="videoSortList clearfix">
							<dt>按地区</dt>
							<dd>{pipicms:areacaslist}<span><a href="[areacaslist:link]&tid=3">[areacaslist:value]</a></span>{/pipicms:areacaslist}</dd>
							<dt>按语言</dt>
							<dd>{pipicms:langcaslist}<span><a href="[langcaslist:link]&tid=3">[langcaslist:value]</a></span>{/pipicms:langcaslist}</dd>
							<dt>按年代</dt>
							<dd>{pipicms:yearcaslist}<span><a href="[yearcaslist:link]&tid=3">[yearcaslist:value]</a></span>{/pipicms:yearcaslist}</dd>
						</dl>
					</div>
				</div>
	<!-- // ui-sort End -->
<?php }?>
	</div>
	</div>
	</div>
	<div class="maxBox listc">
<?php if(0){?>
		<div class="box">
			<div class="silder-box" id="index-silder">
				<ol class="index-list">
					<li>
						<dl>
							<dt>电视剧</dt>
							{pipicms:menulist type=5,6,7,8,9,10,11,12}
							<dd><a href="[menulist:link]">[menulist:typename]</a></dd>
							{/pipicms:menulist}
						</dl>
					</li>
					<li>
						<dl>
							<dt>电影</dt>
							{pipicms:menulist type=13,14,15,16,28}
							<dd><a href="[menulist:link]">[menulist:typename]</a></dd>
							{/pipicms:menulist}
						</dl>
					</li>
					<li>
						<dl class="dm">
							<dt>动漫</dt>
							{pipicms:videolist type=4 num=5 order=random}
							<dd><a href="[videolist:link]">[videolist:name]</a></dd>
							{/pipicms:videolist}
						</dl>
					</li>
					<li>
						<dl class="zy">
							<dt>综艺娱乐</dt>
							{pipicms:videolist type=3 num=5 order=random}
							<dd><a href="[videolist:link]">[videolist:name]</a></dd>
							{/pipicms:videolist}
						</dl>
					</li>
				</ol>
			</div>
			<div class="index-search fa-clear">
				<div class="FormSearch">
					<form id="formsearch" target="_top" action="/search.php" method="post">
						<div class="searchForm clearfix" id="searchForm">
							<input class="searchInput" type="text" autocomplete="off" name="searchword" id="keyword" value="请在此处输入影片片名或演员名称。" onfocus="if(this.value=='请在此处输入影片片名或演员名称。'){this.value='';}" onblur="if(this.value==''){this.value='请在此处输入影片片名或演员名称。';};">
							<input type="submit" value="" class="searchSubmit">
						</div>
					</form>
				</div>
				<div class="hotKeys fa-right"> <strong> 热门搜索：</strong>{pipicms:keywords}</div>
			</div>
		</div>
	</div>
<?php }?>
	<div class="ad960 mt10 mb10">954*80 底部广告位</div>
	<div class="IndexLink">
		<div class="mod_cooperation">
			<h2 class="mod_tit">友情链接</h2>
			<div class="mod_cont">
				<ul>
<?php foreach($friendLink as $v){?>
<li><a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a></li>
<?php }?>
				</ul>
			</div>
		</div>
	</div>
	<!-- 浮动 -->
	<div class="rightMenu" style="display: block; position: fixed; top: 340px; " id="rightMenu">
 		<a href="#Movie">电影</a>
   		<a href="#TV">电视剧</a>
    	<a href="#cartoonm">动漫</a>
    	<a href="#variety">综艺</a>
    	<a href="javascript:window.scrollTo(0, 0);" class="backTop"></a>
    	<div class="fa-clear"></div>
    </div>
	<script type="text/javascript" src="<?php echo $js_url;?>SiteEnd.js"></script>
</div>
<script type="text/javascript">
function execCrondtab(){
  $.get("/<?php echo $_c;?>/crondtab");
}
window.setTimeout(execCrondtab,5000);
</script>
<!--网站底部-->
