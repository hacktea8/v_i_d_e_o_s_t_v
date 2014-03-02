<!-- head -->
<div class="mainDiv">

<div class="line_space"></div>
<div class="folder_div box_7">
<div style="margin: 4px 0 0;" id="folderlist">
<div class="tab-nav-1 tab-nav-1_index block">
<ul style="float: left;" id="hotnavs" class="ul block">
	<li class="on"
		onmouseover=""
		onmouseout=""
		id="foldertagg_0"><a href="javascript:void(0);"
		target="_blank">最新</a></li>
	<li
		onmouseover=""
		onmouseout=""
		id="foldertagg_1" class=""><a
		href="" target="_blank">随机</a></li>
	<li
		onmouseover=""
		onmouseout=""
		id="foldertagg_2" class=""><a
		href="javascript:void(0);" target="_blank">最热</a></li>
</ul>
</div>
<div id="index" class="clearfix">
<div class="id_left">
<div class="vc_old main vc_old_index" id="folderdiv_index_0" style="">
<ul  class="clearfix ul">
<?php
foreach($emuleIndex['new'] as $row){
?>
	<li class="list">
	<div class="cover_3"><a href="<?php echo $row['url'];?>" target="_blank" onclick=""><img class="lazy"  data-original="<?php echo $showimgapi,$row['cover'];?>" style="width: 100px; height: 100px" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /></noscript></a></div>
	<div class="cv_title">
	<ul>
	<li class="strong"><a href="<?php echo $row['url'];?>" onclick="" target="_blank"><?php echo $row['name'];?></a></li>
		<li></li>
	</ul>
	</div>
	</li>
<?php
}
?>
</ul>
</div>
<div class="vc_old main vc_old_index" id="folderdiv_index_1" style="display: none">
<ul class="clearfix ul">
<?php
foreach($emuleIndex['rand'] as $row){
?>
	<li class="list">
	<div class="cover_3"><a href="<?php echo $row['url'];?>" target="_blank" onclick=""><img class="lazy"  data-original="<?php echo $showimgapi,$row['cover'];?>" style="width: 100px; height: 100px" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /></noscript></a></div>
	<div class="cv_title">
	<ul>
		<li class="strong"><a href="<?php echo $row['url'];?>" onclick="" target="_blank"><?php echo $row['name'];?></a></li>
	</ul>
	</div>
	</li>
<?php
}
?>
</ul>
</div>
<div class="vc_old main vc_old_index" id="folderdiv_index_2" style="display: none">
<ul class="clearfix ul">
<?php
foreach($emuleIndex['hot'] as $row){
?>
	<li class="list">
	<div class="cover_3"><a href="<?php echo $row['url'];?>" target="_blank" onclick=""><img class="lazy"  data-original="<?php echo $showimgapi,$row['cover'];?>" style="width: 100px; height: 100px" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /></noscript></a></div>
	<div class="cv_title">
	<ul>
		<li class="strong"><a href="<?php echo $row['url'];?>" onclick="" target="_blank"><?php echo $row['name'];?></a></li>
	</ul>
	</div>
	</li>
<?php
}
?>
</ul>
</div>
</div>
<div class="id_right">
<div class="box_7">
<div class="sidebar_hot main clearfix">
<div class="side_hot_nav side_hot_nav_index clearfix">
<ul id="hotnavs" class="ul clearfix">
<?php
foreach($emuleIndex['catehot'] as $key=>$row){
?>
	<li
		onmouseout=""
		onmouseover=""
		id="hotnav_<?php echo $key;?>" class="<?php echo $key?'':'on';?>"><a onclick="void(0);return false;"
		target="_blank" name="for_pad" href="<?php echo $row['url'];?>"><?php echo $row['name'];?></a></li>
<?php
}
?>
</ul>
</div>
<div class="side_hot_list side_hot_list_index">
<?php
foreach($emuleIndex['catehot'] as $key=>$list){
?>
<ul id="hottab_index_<?php echo $key;?>" class="clearfix" style="<?php  if($key){ ?>display:none <?php } ?>">
<?php
foreach($list['list'] as $k=>$row){
?>
	<li class="<?php if(!$k){ ?>on <?php } ?>" onmouseout=""
		onmouseover=""
		id="hot1tag_<?php echo $k;?>"><a title="<?php echo $row['name'];?>"
		onclick=""
		href="<?php echo $row['url'];?>" class="clearfix">
	<div class="list_ins">
	<div class="list_top clearfix">
	<div class="li_view_num"><?php echo $row['hits']?></div>
	<div class="li_title"><span class="compositor red_compositor"><?php echo $k+1;?></span><span>[<?php echo $row['cname'];?>]</span>&nbsp;<strong><?php echo $row['name'];?></strong></div>
	</div>
	<div class="list_main clearfix">
	<div class="li_img">
	<div class="entry_cover  show_play"><!--[if IE 6]><span class="spacer" style="width:54px;height:74px;"></span><![endif]--><img class="lazy cover_img"  data-original="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" class="cover_img" /></noscript>
	<div class="play_ico_small"></div>
	</div>
	</div>
	<div class="li_info"></div>
	</div>
	</div>
	</a></li>
<?php
}
?>
</ul>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

<div class="mainDiv" id="advertisement_bottom">
<div class="line_space"></div>
<div
	style="width: 960px; height: 90px; border: 1px solid #ccc; padding: 10px 14px;">
<!--960X90_AD--></div>
<div class="clear"></div>

<div class="mainDiv">

<div class="line_space"></div>

<?php
foreach($emuleIndex['topiclist'] as $key=>$value){
?>
<div class="folder_div folder_div_<?php echo $key;?> box_7">
<div style="margin: 4px 0 0;" id="folderlist">
<div class="tab-nav-1 tab_nav_<?php echo $key;?> block">
<ul style="float: left;" id="hotnavs" class="ul block cate_list">
<?php
foreach($value['subcate']['cate'] as $kk=>$val){
?>
	<li relcla="cate_class_<?php echo $key;?>" relid="cate_<?php echo $key;?>" class="<?php if(!$kk){ ?>on<?php } ?>"
		onmouseover=""
		onmouseout=""
		id="foldertagg_<?php echo $kk;?>"><a href="<?php echo $val['url'];?>"
		target="_blank"><?php echo $val['name'];?></a></li>
<?php } ?>
</ul>
</div>
<div class="clearfix">
<div class="id_left id_moreleft">
<?php
foreach($value['subcate']['list'] as $ky=>$v){
?>
<div class="vc_old main moremain cate_class_<?php echo $key;?>" id="cate_<?php echo $key,'_',$ky;?>" style="<?php if($ky){ ?>display:none;<?php } ?>">
<ul class="clearfix ul">
<?php
foreach($v as $k=>$row){
?>
	<li class="list">
	<div class="cover_3"><a
		href="<?php echo $row['url'];?>" target="_blank"
		onclick=""><img class="lazy"  data-original="<?php echo $showimgapi,$row['cover'];?>" style="width: 100px; height: 100px" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /><noscript><img src="<?php echo $showimgapi,$row['cover'];?>" title="<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" /></noscript></a></div>
	<div class="cv_title">
	<ul>
		<li class="strong"><a
			href="<?php echo $row['url'];?>"
			onclick=""
			target="_blank"><?php echo $row['name'];?></a></li>
		<li></li>
	</ul>
	</div>
	</li>
<?php } ?>
</ul>
<div style="" class="more_t"><a
	onclick="" target="_blank"
	href="<?php echo $val['url'];?>">更多<?php echo $row['cname'];?>&gt;&gt;</a></div>
</div>
<?php } ?>
</div>
<div class="id_right">
<div class="idr_out">
<div class="idr_in">
<div class="red_title">
<h3><span>随机精选</span></h3>
</div>
<div class="side_list_2">                
   <ul class="ul">                                   
<?php
foreach($value['rand'] as $key=>$row){
?>
 <li>                        
  <span class="left">                            
<span class="compositor red_compositor"><?php echo $key+1;?></span>                            
<a href="<?php echo $row['url'];?>" title="<?php echo $row['name'];?>" onclick=""><?php echo $row['name'];?></a>
</span>
<span class="right"></span>
</li>
<?php } ?>
   </ul>        
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
} ?>
</div>

<div class="mainDiv" id="advertisement_bottom">
<div class="line_space"></div>
<div
	style="width: 960px; height: 90px; border: 1px solid #ccc; padding: 10px 14px;">
<!--960X90_AD--></div>
<div class="clear"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
var index=0;
  $('.side_hot_nav_index #hotnavs li').mouseover(function(){
     index=$(this).index();
     $('.side_hot_nav_index #hotnavs li').removeClass('on');
     $(this).addClass('on');
     $('.side_hot_list_index ul').hide();
     $('#hottab_index_'+index).show();
  });
  $('.side_hot_list_index ul li').mouseover(function(){
     $('.side_hot_list_index ul li').removeClass('on');
     $(this).addClass('on');
  });
  $('.tab-nav-1_index #hotnavs li').mouseover(function(){
     index=$(this).index();
     $('.tab-nav-1_index #hotnavs li').removeClass('on');
     $(this).addClass('on');
     $('#index .id_left div.vc_old_index').hide();
     $('.id_left #folderdiv_index_'+index).show();
  });
  $('.cate_list li').mouseover(function(){
     index=$(this).index();
     $('.cate_list li').removeClass('on');
     $(this).addClass('on');
     var id=$(this).attr('relid');
     var cla=$(this).attr('relcla');
     $('.'+cla).hide();
     $('#'+id+'_'+index).show();
  });
});
</script>
