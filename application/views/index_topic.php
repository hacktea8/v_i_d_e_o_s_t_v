<div id="wrap">
    <div id="content" style="width:730px">
        <div id="favBox" class="glassbox" style="display:none">
    <div class="title-bar"><span class="title">收藏了该资源的用户还收藏了:</span></div>
    <div class="boxContent">
    <div id="favBoxContent">
        </div>
    <div class="favBottom">
    <a href="javascript://" class="closeButton" id="closeFavButton" onClick="closeFavBox()">关闭</a>
    </div>
    </div>
    </div>
     <div id="contentInfo">
        <h1 id="topicstitle"><?php echo $info['name'];?> 
 <?php if($uinfo['uid'] === $info['uid'] || $uinfo['isadmin']){echo "<a href='$editeUrl/$info[id]'>编辑</a>"; }?>
</h1>
                                 <input value="" name="entryid" id="entryid" type="hidden">
                 <div class="topicImg">
     		            <a id="topicImgUrl" href="<?php echo $info['id'];?>" title="<?php echo $info['name'];?>">
                <img alt="<?php echo $info['name'];?>" title="<?php echo $info['name'];?>" class="cover" src="<?php echo $showimgapi,$info['cover'];?>" >
              </a>
                <div>
                    <div id="visitTimes" style="margin-top:5px; display:none">
                      <strong id="visitTimes-title" style="display:inline-block;vertical-align:top;"></strong>
                     <span id="current-page-views" style="display: inline-block; vertical-align: top;"><?php echo $info['hits'];?>次 浏览</span><br>
                            <span id="favoriteNumber" favorites="274" style="display:inline-block;vertical-align:top;"><?php echo $info['fav'];?>次 收藏</span>
                                            </div>
               </div>
        </div>
        <div style="float:left;width:500px;overflow:hidden;">
        <div class="block1">
            <div class="block11" id="block11">
                <ul>
                    <li><strong style="display:inline-block;vertical-align:top;">发布：</strong>
                        <span style="display:inline-block;vertical-align:top;"><?php echo $info['ptime'];?>
                        </span>
                    </li>
                    <li>
                    <strong style="display:inline-block;vertical-align:top;">更新：</strong>
                    <span class="date-time" style="display:inline-block;vertical-align:top;"><?php echo $info['utime'];?></span>
                    </li>
                </ul>
            </div>
<?php if (0){ ?>            
	<div class="resInfoBox" id="membertable">
	  <div class="header">
	   <a class="imgs" href="http://www.verycd.com/i/4416523/" onClick="" style="text-decoration:none;"><img src="">
	    <span class="follow">关注 <em>2</em></span>
	      <span class="fans">粉丝 <em>340</em></span>
                	</a>
				</div>
				<div class="context">
					<p class="text">
						<strong><a hoverstyle="3" hovertips="type=2&amp;id=4416523" href="http://www.verycd.com/i/4416523/" onClick="VeryCD.TrackEvent('topic','发布者','用户名');">达漫V</a></strong>
						<span><img src="/15.gif" class="honorimage" title="金光盘(Exp:17641)" align="absmiddle" height="20" width="25"></span>
											</p>
					<p class="num">精华资源: <a onClick="" href="http://www.verycd.com/i/4416523/create/folders/?stat=elite">169</a></p>
					<p class="num">全部资源: <a onClick="" href="http://www.verycd.com/i/4416523/create/folders/?stat=total">172</a></p>
										<div class="btn">
						<div class="haddle_btn">
					        <div data-follow-type="0" data-follow-id="4416523" data-follow="0" style="" class="haddle_btn" onClick="">
					        	<a data-follow="0" style="" class="light_addbtn" href="#"><span class="addicon"></span>加关注</a>
								<span data-follow="1" style="display:none;" class="addbtn_even"><span class="addbtn_dgray"></span>已关注<em>|</em><a class="red" style="cursor:pointer;">取消</a></span>
								<a data-follow="2" style="display:none;" class="light_addbtn" href="#"><span class="addicon_a"></span><em>|</em><span class="addicon"></span>加关注</a>
						    	<span data-follow="3" style="display:none;" class="addbtn_even"><span class="addicon_c"></span>相互关注<em>|</em><a class="red" style="cursor:pointer;">取消</a></span>
					        </div>
						</div>
					</div>
									</div>
			</div>
<?php } ?>
			        </div>
<!-- .block1 -->
        <div id="showFolderBaseDoDiv" style="float: left;"></div>
        <div class="block2" style="float:left;">
            <div style="float:left;">
                                <div id="addFavModule" style="float:left;position:relative;width:125px;margin-left:5px">
                    <a class="addFav addFavModule_a" title="收藏该资源" id="addFav"></a>
                    <div style="position: absolute; left: 133px; top: -17px; margin: 0px; border: 1px solid rgb(205, 180, 126); width: 310px; background: none repeat scroll 0% 0% rgb(255, 255, 205); height: 55px;z-index:3;" id="folderfavoritatips">
                        <div style="position: absolute; height: 30px; width: 12px; top: 18px;left:-12px; background: url(<?php echo $img_url;?>tipsleft.gif) no-repeat scroll 0% 0% transparent;">
                        </div>
                        <div style="padding: 4px; color: rgb(104, 100, 89);">
                            <span style="margin-left: 3px; padding-top: 4px; float: left;"><img alt="<?php echo $info['name'];?>" title=""<?php echo $info['name'];?>" src="<?php echo $img_url;?>light.gif"></span>
                            <div style="padding: 4px; color: rgb(104, 100, 89);">
                                <div style="padding: 0px; margin: 0px 0px 0px 17px;text-align:left;">
                                    <span style="float: left;">收藏资源后，一旦有新更新（字幕、文件）我们</span>
                                    <a onClick="$('#folderfavoritatips').hide();return false;" style="float:right;display:block;padding:3px 7px 0pt 3px;width: 5px;height: 30px;" href="#"><img alt="<?php echo $info['name'];?>" title=""<?php echo $info['name'];?>" src="<?php echo $img_url;?>canceltips.gif?v=<?php echo $version;?>"></a>
                                    <div>将会用站内消息和电子邮件通知你。</div>
                                    <div style="clear: both;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- #addFavModule -->
            </div>
            <div style="padding:5px 0px 5px 0px;width:170px;position: absolute;right: 60px;top: 30px;">
                <span>
                    <strong>相关：</strong>
                    <div id="shte_mainbox">
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a></div>
                    </div>

                        <div id="folderfavoritatips" style="position:absolute;margin:-35px 0 0 -38px;*margin:-15px 0 0 -239px;border:1px solid #cdb47e;width:310px;background:#ffffcd;display:none;height:55px;">
                        <div style="position:absolute;height:12px;width:23px;margin:-12px 0 0 18px;background:url(<?php echo $img_url;?>tipstop.gif) no-repeat;"></div>
                        <div style="padding:4px;color:#686459;">
                            <span style="margin-left:3px;padding-top:4px;float:left;"><img alt="<?php echo $info['name'];?>" title=""<?php echo $info['name'];?>" src="<?php echo $img_url;?>light.gif?v=<?php echo $version;?>"></span>
                            <div style="padding:4px;color:#686459;">
                                <div style="padding:0px;margin:0px;margin-left:17px;">
                                <span style="float:left">收藏资源后，一旦有新更新（字幕、文件）我们</span>
                                <a href="#" style="float:right;display:block;padding:3px 7px 0 3px;padding:3px 3px 0 0\9;width:5px;height:30px;" onClick="return hidden_favorite_tips();"><img alt="<?php echo $info['name'];?>" title=""<?php echo $info['name'];?>" src="<?php echo $img_url;?>canceltips.gif?v=<?php echo $version;?>"></a>
                                <div>将会用站内消息和电子邮件通知你。</div>
                                <div style="clear:both"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                </span>
            </div>
            <div id="feedbackspan" style="float:left;width:100%;text-align:right;"></div>
        </div>
     </div>

</div>
        <div id="favWindow" class="glassbox" style="display:none">
        <div class="loginNote"><span style="margin-left:6px;margin-top:2px;display:inline-block;">请登录</span></div><iframe id="favIframe" src="" marginwidth="0" marginheight="0" border="0" allowtransparency="true" frameborder="0" scrolling="no"></iframe><div class="bottom-bar">
        <a href="javascript://" class="closeButton" onClick="closeLoginBox()">关闭</a>
                </div>
                </div>
        <div style="clear:both"></div>
        <!-- ads start -->
                <!-- ads over -->
                <div class="tab-nav group-mods" id="theCon">
			<ul>
				<li class="current"><a href="#theCon">详细内容</a></li>
				<li><a href="#theRel">相关资源</a></li>
				<li><a href="#theRes">补充资源</a></li>
				<li><a href="#theCom">用户评论</a></li>
			</ul>
        </div>
        <div class="blog_entry">
            <div class="iptcom" id="iptcomED2K">
                 <div>
<?php
echo $info['downurl'];
if($verifycode){
  echo '<form id="verify_form">',$verifycode,'</form>';
?>
<button id="startcheck" title="输入验证码，展示下载地址!" style="width: 80px;height: 30px;background-color: green;cursor: pointer;margin-left: 100px;">开始校验</button>
<script type="text/javascript">
function clearcode(){
var obj = $('.YXM-input .sub-wrap a');
var href = obj.attr('href');
  if(href.indexOf('www.yinxiangma.com')>=0){
    obj.attr('title','验证码');
    obj.html('验证码');
    obj.attr('href','javascript:void(0);');
    $('#clickable_img').attr('href','javascript:void(0);');
    clearTimeout(t);
  }
  t = setTimeout("clearcode()",1500);
}
  var t = setTimeout("clearcode()",4000);
$('#startcheck').click(function(){
var aid=<?php echo $info['id'];?>;
var code = $("input[name='YinXiangMa_response']").val();
if(aid <0 || code.length <1){
alert('验证码为空!');return false;
}
$.post("/verifys/check/"+aid,$('#verify_form').serialize(),function(result){
if(1 == result){
window.location.reload();
return true;
}
alert('验证码输入有误!');
});
});
</script>
<?php
}
?>
</div>
                 <div onclick="_hmt.push(['_trackEvent', 'VIPdownload', 'click', '<?php echo $info['url'];?>'])"  style="border:1px solid #faccaa; background:#ffffce; text-align:center; clear:both; padding: 5px 10px; margin:5px 10px 5px 0; font-size:1.2em">
VIP通道:<?php echo $info['vipdwurl'];?>
</div>
            </div>
            <div class="iptcom" id="iptcomCname">
<?php echo $info['intro'];?>
        <!--Wrap-tail end--></div>
                </div>
  <div class="tab-nav group-mods">
	<ul>
	<li><a href="#theCon">详细内容</a></li>
	<li class="current" ><a id="theRel" href="#theRel" index='1' onclick="show_hide_tab('theRel','tab_con_tab')">相关资源</a></li>
	<li><a id="theRes" href="#theRes" index='2' onclick="show_hide_tab('theRes','tab_con_tab')">补充资源</a></li>
	<li><a id="theCom" href="#theCom" index='3' onclick="show_hide_tab('theCom','tab_con_tab')">用户评论</a></li>
 </ul>
   </div>
        <div id="con_theRel" class="tab_con_tab">
    	<table class="restable topic_class_restable">
	<tbody>
<?php foreach($info['relatdata'] as $key=>$row){
if($key%5==0){
   echo '<tr>';
}
?>	   	            			<td>
<a title="<?php echo $row['name'];?>" class="folder-entry-title" href="<?php echo $row['url'];?>" onClick="" target="_blank">
<img class="lazy folder-entry-thumb" data-original="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>" class="folder-entry-thumb" /></noscript></a>
<a title="<?php echo $row['name'];?>" class="folder-entry-title" href="<?php echo $row['url'];?>" onClick="" target="_blank"><?php echo $row['name'];?></a>
</td>
<?php
  if($key%5==0){
     echo '</tr>';
  }
}
?>
    </tbody>
    </table>
</div>
<div class="tab_con_tab" id="con_theRes">
            <h3>这里是其它用户补充的资源(<a href="#commentFolder" id="extred2k">我也要补充</a>):</h3>
                			<div class="emuletop-no">
    				暂无补充资源
    			</div>
</div>									
<div id="con_theCom" class="tab_con_tab">
<!-- Comment BEGIN -->	
<div class="ds-thread topic_admin_class_edit"></div>
<script type="text/javascript">var duoshuoQuery = {short_name:"emu"};	(function() {		var ds = document.createElement('script');		ds.type = 'text/javascript';ds.async = true;		ds.src = 'http://static.duoshuo.com/embed.js';		ds.charset = 'UTF-8';		(document.getElementsByTagName('head')[0] 		|| document.getElementsByTagName('body')[0]).appendChild(ds);	})();	
</script><!-- Comment END -->
</div>
</div>
   <a id="commentFolder"></a>
<div class="clearBoth"></div><br>
 <div id="navside">
		                            
 <div id="userres">
   <h3>该用户的其它精华资源</h3> <img title="<?php echo $info['name'];?>" alt="="<?php echo $info['name'];?>"" id="closeUser" class="closebtn" alt="" src="<?php echo $img_url;?>toggle.gif?v=<?php echo $version;?>">
	            <div id="userMore">
<?php if(0){ ?>
	        		<table border="0" cellpadding="0" cellspacing="0" width="100%">
	                    <tbody><tr>
	                    <td style="width:48px">
	                        <a class="relatelink" href="http://www.verycd.com/topics/2960998/" onClick="VeryCD.Track('/stat/topicsOther/'+this.href);" target="_blank">
	                        <img title="PDF[2013/08/23 23:43:47]资源更新 共1个文件 28.53MB" src="/thumb_025.jpg" class="resimg" height="48" width="48">
	                        </a>
	                    </td>
	                    <td valign="middle">
	                    <a title="PDF[2013/08/23 23:43:47]资源更新 共1个文件 28.53MB" class="topic-title" href="http://www.verycd.com/topics/2960998/" onClick="VeryCD.Track('/stat/topicsOther/'+this.href);" target="_blank">
	                    《荷塘月色：钢琴弹奏流行歌曲集2  简易版》扫描版[PDF]
	                    </a>
	                    <img class="png" title="这是一个精华资源" src="/elite_on.gif">	                    </td>
	                    </tr>
	                    </tbody></table>
	        		<p class="checkall"><a href="" target="_blank">更多 &gt;&gt;</a></p>
<?php } ?>
	</div> <!-- end of userMore -->
	</div> <!-- end of userres -->
<div id="favriteuser">
<h3>刚收藏了本资源的用户</h3><img title="<?php echo $info['name'];?>" alt="<?php echo $info['name'];?>" id="closeRell" class="closebtn" alt="" src="<?php echo $img_url;?>toggle.gif">
	<div id="closeRellmore">
<?php if(0){ ?>	
<div style="width:252px;height:65px;margin-left:5px;">
	<a style="margin-right:5px;" target="_blank" title="" href="" onClick=""><img hoverstyle="3" hovertips="type=2&amp;id=1681550" alt="apocn" class="resimg" src="/50_avatar_small.jpg" height="48px" width="48px"></a>
						<a hoverstyle="3" hovertips="type=2&amp;id=1681550" target="_blank" style="height22px;line-height:22px;text-align:center;white-space:nowrap;" title="" onClick="" href="">apocn</a>
						<br><p style="margin:6px 0px 0px 65px;color:#999999"><span title="2013/08/24 09:37:20" class="date-time">7小时前</span>&nbsp;收藏了</p>
					</div>
<?php } ?>
</div>
</div>
<div id="relativeres">
  <h3>相关资源</h3> <img alt="<?php echo $info['name'];?>" title="<?php echo $info['name'];?>" id="closeRel" class="closebtn" alt="" src="<?php echo $img_url;?>toggle.gif?v=<?php echo $version;?>">
  <div id="relMore">
<?php
foreach($info['relatdata'] as $row){
?>
  <p class="itshot">
   <a class="relatelink" href="<?php echo $row['id'];?>" onClick="" target="_blank">
           <img class="lazy hot_img"  data-original="<?php echo $showimgapi,$row['cover'];?>" style="width: 100px; height: 100px" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" class="hot_img" /></noscript></a>
			 <a title="{$row['name']}" class="topic-title" href="<?php echo $row['url'];?>" onClick="" target="_blank"><?php echo $row['name'];?></a>
</p>
<?php
} ?>
 <dl id="hotres">
  <dt>今日热门</dt>
    				                                               
<?php
foreach($hotTopic as $row){
?>
<dd class="itshot">
<a id="entry_link_<?php echo $row['id'];?>" title="<?php echo $row['name'];?>" href="<?php echo $row['url'];?>" onClick="" target="_blank" style="text-decoration:none;"><img class="lazy hot_img"  data-original="<?php echo $showimgapi,$row['cover'];?>" style="width: 100px; height: 100px;display:inline;" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>" class="hot_img" /></noscript>
  <div id="entry_<?php echo $row['id'];?>" style="display:none;" class="entry_score_small"></div>
</a>
  <br>
<a title="<?php echo $row['name'];?>" href="<?php echo $row['url'];?>" onClick="" target="_blank"><?php echo $row['name'];?></a>
</dd>
<?php
} ?>	        
   </dl>  <!-- end of hotres -->
</div>
</div> 
  </div><!-- end of navside -->
</div><!-- end of page wrap-->
<script type="text/javascript">
function show_hide_tab(show,hide){
  $('.'+hide).hide();
  $('.group-mods ul li').removeClass('current');
  $('#'+show).parent().addClass('current');
  $('#con_'+show).show();
}
</script>
