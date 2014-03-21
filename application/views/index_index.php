<div class="wrap w960">
	<div class="ad960 mt10 mb10">954*80 顶部广告位</div>
	<div class="maxBox mb10 mt5" id="latest-focus">
		<div class="latest-tab">
			<ul>
				<li id="latest1" onmouseover="setTab(1);" class="active">热门影片推荐</li>
				<li id="latest2" onmouseover="setTab(2);" class="">最新电视剧</li>
				<li id="latest3" onmouseover="setTab(3);" class="">最新电影</li>
				<li id="latest4" onmouseover="setTab(4);" class="">最新动漫</li>
				<li id="latest5" onmouseover="setTab(5);" class="">最新综艺</li>
			</ul>
		</div>
		<SCRIPT language="javascript" type="text/javascript">function setTab(index) {for (var i=1;i<=5;i++){document.getElementById("latest"+i).className ="";document.getElementById("latest"+index).className ="active";document.getElementById("con_latest_"+i).style.display="none";}document.getElementById ("con_latest_"+index).style.display  ="block";}</SCRIPT>
		<div class="box box-blue-bold">
			<div id="con_latest_1" class="hot-latest active" style="display: block; ">
				<ol class="pic-list">
					{pipicms:videolist type=1 num=7 order=hit}
					<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" alt="[videolist:name]">
						<label class="bg">&nbsp;</label>
						<label class="time">[videolist:note]</label>
						</a>
						<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=8]</a></p>
					</li>
					{/pipicms:videolist}
				</ol>
				<!-- // pic-list End -->
				<ul class="txt-list">
					{pipicms:videolist type=1 num=12 order=hit start=9}
					<li><span>[videolist:time]</span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a> / <a class="gray" href="[videolist:link]">[videolist:note]</a></li>
					{/pipicms:videolist}
				</ul>
				<!-- // txt-list End -->
			</div>
			<div id="con_latest_2" class="fa-hide" style="display: none; ">
				<ol class="pic-list">
					{pipicms:videolist type=2 num=7 order=time}
					<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"> <img src="[videolist:pic]" alt="[videolist:name]">
						<label class="bg">&nbsp;</label>
						<label class="time">[videolist:note]</label>
						</a>
						<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=8]</a></p>
					</li>
					{/pipicms:videolist}
				</ol>
				<!-- // pic-list End -->
				<ul class="txt-list">
					{pipicms:videolist type=2 num=12 order=time start=9}
					<li><span>[videolist:time]</span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a> / <a class="gray" href="[videolist:link]">[videolist:note]</a></li>
					{/pipicms:videolist}
				</ul>
				<!-- // txt-list End -->
			</div>
			<div id="con_latest_3" class="fa-hide" style="display: none; ">
				<ol class="pic-list">
					{pipicms:videolist type=1 num=7 order=time}
					<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" alt="[videolist:name]">
						<label class="bg">&nbsp;</label>
						<label class="time">电影</label>
						</a>
						<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=8]</a></p>
					</li>
					{/pipicms:videolist}
				</ol>
				<!-- // pic-list End -->
				<ul class="txt-list">
					{pipicms:videolist type=1 num=12 order=time start=9}
					<li><span>[videolist:time]</span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a> / <a class="gray" href="[videolist:link]">[videolist:note]</a></li>
					{/pipicms:videolist}
				</ul>
				<!-- // txt-list End -->
			</div>
			<div id="con_latest_4" class="fa-hide" style="display: none; ">
				<ol class="pic-list">
					{pipicms:videolist type=4 num=7 order=time}
					<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"> <img src="[videolist:pic]" alt="[videolist:name]">
						<label class="bg">&nbsp;</label>
						<label class="time">[videolist:note]</label>
						</a>
						<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=8]</a></p>
					</li>
					{/pipicms:videolist}
				</ol>
				<!-- // pic-list End -->
				<ul class="txt-list">
					{pipicms:videolist type=4 num=12 order=time start=9}
					<li><span>[videolist:time]</span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a> / <a class="gray" href="[videolist:link]">[videolist:note]</a></li>
					{/pipicms:videolist}
				</ul>
				<!-- // txt-list End -->
			</div>
			<div id="con_latest_5" class="fa-hide" style="display: none; ">
				<ol class="pic-list">
					{pipicms:videolist type=3 num=7 order=time}
					<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"> <img src="[videolist:pic]" alt="[videolist:name]">
						<label class="bg">&nbsp;</label>
						<label class="time">[videolist:note]</label>
						</a>
						<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=8]</a></p>
					</li>
					{/pipicms:videolist}
				</ol>
				<!-- // pic-list End -->
				<ul class="txt-list">
					{pipicms:videolist type=3 num=12 order=time start=9}
					<li><span>[videolist:time]</span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a> / <a class="gray" href="[videolist:link]">[videolist:note]</a></li>
					{/pipicms:videolist}
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
							{pipicms:videolist type=2 num=1 order=time}
							<div class="ui-focus"><a class="play-pic" href="[videolist:link]"><img src="[videolist:pic]" alt="" style="display: block;">
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:name]</label>
								</a>
								<ul class="ui-focus-text">
									<li><strong>导演：</strong>{if:"[videolist:director]"=""}未知{else}[videolist:director]{end if}</li>
									<li><strong>主演：</strong>[videolist:nolinkactor]</li>
									<li class="desc"><strong>简介：</strong>[videolist:des len=70]</li>
								</ul>
							</div>
							{/pipicms:videolist}
							<!-- // ui-focus End -->
							<div class="ui-will">
								<h4>本站推荐</h4>
								<ul class="ui-will-cnt">
									{pipicms:videolist type=2 num=5 order=commend}
									<li><strong class="c_txt2"><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=10]</a></strong> [videolist:note] <a href="[videolist:typelink]" title="[videolist:typename]">[videolist:typename]</a></li>
									{/pipicms:videolist}
								</ul>
							</div>
							<!-- // ui-synch End -->
						</div>
						<div class="pic-list pic-list-focus">
							<ul>
								{pipicms:videolist type=2 num=6 order=time start=2}
								<li><a class="play-pic" href="[videolist:link]"><img src="[videolist:pic]" style="display: block; "><span class="play-icon">&nbsp;</span>
									<label class="bg">&nbsp;</label>
									<label class="time">[videolist:note]</label>
									</a>
									<p> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a> </p>
									<p class="txt">{if:"[videolist:nolinkactor]"=""}未录入{else}[videolist:nolinkactor]{end if}</p>
									<p class="txt"><span class="ratbar"> <span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span> </span> <strong class="ratbar-num">[videolist:score]</strong> </p>
								</li>
								{/pipicms:videolist}
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
						<h3>{pipicms:menulist type=2}<a href="[menulist:link]">[menulist:typename]最新更新排行</a>{/pipicms:menulist}</h3>
					</div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=2 num=10 order=time}
							<li><span><strong>[videolist:time]</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
				<!-- // topBox End -->
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
							{pipicms:videolist type=1 num=1 order=commend}
							<div class="ui-focus"><a class="play-pic" href="[videolist:link]"><img src="[videolist:pic]" alt="" style="display: block;">
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:name]</label>
								</a>
								<ul class="ui-focus-text">
									<li><strong>导演：</strong>{if:"[videolist:director]"=""}未知{else}[videolist:director]{end if}</li>
									<li><strong>主演：</strong>[videolist:nolinkactor]</li>
									<li class="desc"><strong>简介：</strong>[videolist:des len=70]</li>
								</ul>
							</div>
							{/pipicms:videolist}
							<div class="ui-will">
								<h4>本站推荐</h4>
								<ul class="ui-will-cnt">
									{pipicms:videolist type=1 num=5 order=commend start=2}
									<li><strong class="c_txt2"><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=10]</a></strong> [videolist:note] <a href="[videolist:typelink]" title="[videolist:typename]">[videolist:typename]</a></li>
									{/pipicms:videolist}
								</ul>
							</div>
							<!-- // ui-synch End -->
						</div>
						<div class="pic-list pic-list-focus">
							<ul>
								{pipicms:videolist type=1 num=6 order=time}
								<li><a class="play-pic" href="[videolist:link]"><img src="[videolist:pic]" style="display: block; "><span class="play-icon">&nbsp;</span>
									<label class="bg">&nbsp;</label>
									<label class="time">[videolist:note]</label>
									</a>
									<p> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a> </p>
									<p class="txt">{if:"[videolist:nolinkactor]"=""}未录入{else}[videolist:nolinkactor]{end if}</p>
									<p class="txt"><span class="ratbar"><span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span></span><strong class="ratbar-num">[videolist:score]</strong> </p>
								</li>
								{/pipicms:videolist}
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
						<h3>{pipicms:menulist type=1}<a href="[menulist:link]">[menulist:typename]最新更新排行</a>{/pipicms:menulist}</h3>
					</div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=1 num=10 order=hot}
							<li><span><strong>[videolist:score] 分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
				<!-- // topBox End -->
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
							{pipicms:videolist type=4 num=15 order=time}
							<li><a class="play-pic" href="/film7/huoyingluokeliwaichuan/"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
								<p class="txt"><span class="ratbar"><span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span></span><strong class="ratbar-num">[videolist:score]</strong></p>
							</li>
							{/pipicms:videolist}
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
						<h3>{pipicms:menulist type=4}[menulist:typename]最新排行{/pipicms:menulist}</h3>
					</div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=4 num=14 order=hit}
							<li><span><strong>[videolist:time]</strong></span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
				<!-- // topBox End -->
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
							{pipicms:videolist type=3 num=15 order=time}
							<li><a class="play-pic" href="[videolist:link]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
								<p class="txt"><span class="ratbar"><span class="ratbar-item" style="width:[videolist:score]%;">&nbsp;</span></span><strong class="ratbar-num">[videolist:score]</strong></p>
							</li>
							{/pipicms:videolist}
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
						<h3>{pipicms:menulist type=3}[menulist:typename]最新排行{/pipicms:menulist}</h3>
					</div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=3 num=14 order=hit}
							<li><span><strong>[videolist:time]</strong></span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
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
			</div>
		</div>
	</div>
	<div class="maxBox listc">
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
	<div class="ad960 mt10 mb10">954*80 底部广告位</div>
	<div class="IndexLink">
		<div class="mod_cooperation">
			<h2 class="mod_tit">友情链接</h2>
			<div class="mod_cont">
				<ul>
					{pipicms:linklist style=font}
					<li><a href="[linklist:link]">[linklist:name]</a></li>
					{/pipicms:linklist}
					<li><a href="http://www.dyzplay.com">大眼仔高清</a></li>
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
	<script type="text/javascript" src="images/../js/SiteEnd.js"></script>
</div>
<!--网站底部-->
