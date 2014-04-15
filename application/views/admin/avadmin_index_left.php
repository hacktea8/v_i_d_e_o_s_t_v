<div>
 <div class="fanwe-menu" valign="top">
  <dl>
<?php if('video'==$type){?>
   <dt><div><strong>影片管理</strong></div></dt>
   <dd><p><a href="/<?php echo $_c;?>/avlist" target="mainFrame">影片列表</a></p></dd>
   <dd><p><a href="/<?php echo $_c;?>/avchecklist" target="mainFrame">影片审核列表</a></p></dd>
   <dd><p><a href="/<?php echo $_c;?>/avdetail" target="mainFrame">影片添加</a></p></dd>
<?php }elseif('cate'==$type){?>
   <dt><div><strong>分类管理</strong></div></dt>
   <dd><p><a href="/<?php echo $_c;?>/avcate" target="mainFrame">分类列表</a></p></dd>
   <dd><p><a href="/<?php echo $_c;?>/avcatedetail" target="mainFrame">分类添>加</a></p></dd>
<?php }?>
  </dl>
 </div>
 </div>
<script>
</script>
