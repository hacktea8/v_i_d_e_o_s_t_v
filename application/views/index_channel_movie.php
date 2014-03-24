<div class="silderBox">
	<div class="videoFocus clearfix m10">
		<div class="ui-silder-tip movie_png">&nbsp;</div>
		<a href="javascript:videoFocusTab();" target="_self" id="videoFocus_Left_Btn" class="pngMap btnLeft"></a>
		<div id="videoFocus_Con" class="videoFocusPicCon">
			<div id="focusA" style="width:920px">
				<div id="focus">
					<ul id="videoFocus_c1">
						{pipicms:videolist type=1 num=5 order=commend}
						<li>
							<div class="pngMap focusPic"><a href="[videolist:link]"><img src="[videolist:pic]" width="153" height="204" alt="[videolist:name]"><i class="pngMap videoStyleLogo "></i> <i class="pngMap picHoverBg"></a></i></div>
							<span class="sTit"><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=12]</a></span> </li>
							{/pipicms:videolist}
					</ul>
					<ul id="videoFocus_c2" style="display: none;">
						{pipicms:videolist type=1 num=5 order=commend start=6}
						<li>
							<div class="pngMap focusPic"><a href="[videolist:link]"><img src="[videolist:pic]" width="153" height="204" alt="[videolist:name]"><i class="pngMap videoStyleLogo "></i> <i class="pngMap picHoverBg"></a></i></div>
							<span class="sTit"><a href="[videolist:link]" title="[videolist:name]">[videolist:name len=12]</a></span> </li>
						{/pipicms:videolist}	
					</ul>
				</div>
			</div>
		</div>
		<a href="javascript:videoFocusTab();" target="_self" id="videoFocus_Right_Btn" class="pngMap btnRight"></a>
		<SCRIPT language="javascript" type="text/javascript">function videoFocusTab() {$('#videoFocus_c1').toggle();$('#videoFocus_c2').toggle();}</SCRIPT>
	</div>
</div>
<div class="wrap w960">
	<div class="maxBox mb10">
		<div class="box">
			<div class="tips">当前位置：{channelpage:typetext}</div>
		</div>
	</div>
	<div class="ad960 mt10 mb10">954*80 顶部广告位</div>
	<div class="maxBox mb10">
		<div class="cntBox fa-left">
			<div class="conBox" >
				<div class="box">
					<div class="caption bigCaption fa-clear">
						<h2 class="hide-self fa-left">最新电影</h2>
						<span><!--a href="#">更多</a--></span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=1 num=10 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						<h3 class="hide-self fa-left">最新排行榜</h3>
						<span><!--a href="#">更多</a--></span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=1 num=13 order=hit}
							<li><span><strong>[videolist:time]</strong></span><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=5}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=5 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=5}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=5 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=6}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=6 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=6}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=6 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=7}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=7 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=7}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=7 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=8}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=8 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=8}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=8 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=9}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=9 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=9}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=9 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=10}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=10 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=10}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=10 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=11}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=11 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=11}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=11 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="maxBox lb mb10">
		<div class="cntBox fa-left">
			<div class="conBox">
				<div class="box">
					<div class="caption bigCaption fa-clear">
						{pipicms:menulist type=12}
						<h2 class="hide-self fa-left">[menulist:typename]</h2>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="pic-list">
							{pipicms:videolist type=12 num=5 order=time}
							<li><a class="play-pic" href="[videolist:link]" title="[videolist:name]"><img src="[videolist:pic]" style="display: block;"><span class="play-icon">&nbsp;</span>
								<label class="bg">&nbsp;</label>
								<label class="time">[videolist:note]</label>
								</a>
								<p><a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></p>
								<p class="txt">[videolist:nolinkactor]</p>
							</li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cntBar fa-right">
			<div class="sideRow">
				<div class="box">
					<div class="caption fa-clear">
						{pipicms:menulist type=12}
						<h3 class="hide-self fa-left">[menulist:typename]排行</h3>
						<span><a href="[menulist:link]">更多</a>{/pipicms:menulist}</span></div>
					<div class="content">
						<ul class="ul-top">
							{pipicms:videolist type=12 num=7 order=hit}
							<li><span><strong>[videolist:score]分</strong></span> <a href="[videolist:link]" title="[videolist:name]">[videolist:name]</a></li>
							{/pipicms:videolist}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ad960 mt10">954*80 底部广告位</div>
</div>
<!--网站底部-->
