<div class="foot">
 <p class="footermenu">
  <a href="/support/faq" target="_blank">使用帮助</a> |
  <a href="/support/faq#sendmessage" target="_blank" title="给我留言" class="color">给我留言</a> |
<?php if(0){?>
  <a href="/allmovie.html">最新更新</a> |
  <a href="/top.html" class="color">排 行 榜</a> |
  <a href="/search.php?searchtype=5">索 引 库</a>
<?php }?>
 </p>
<?php if(0){?>
 <p class="copyrighten">{pipicms:copyright}</p>
<?php }?>
 <p class="copyrighten2">Copyright &copy;  2008-<?php echo date('Y');?> 
 <a class="color" href="/maindex"><?php echo $web_title,$domain;?></a></p>
 <p class="copyrightzh">联系我们：<?php echo $admin_email;?></p>
 <p class="dn" style="display:none;">

 </p>
</div>
<script type="text/javascript">
function _Userlogin(){
  var timer=null;
  var _hide=function(){
    $('.iconList').hide();$('.dropMenu').hide();}
  var init=function(){
    $('#user_login').mouseout(function(){
      timer=setTimeout(_hide,500);});
    $('#user_login').mouseover(function(){
     clearTimeout(timer);
     if($('.iconList').is(":visible") || $('.dropMenu').is(":visible")){
       return false;}
     $.get('/maindex/isUserInfo/',function(data){
       if(data.status==1){
         $('.iconList').show();$('.dropMenu').hide();
       }else{
         $('.iconList').hide();$('.dropMenu').show();}
      },"json");});}
  init();}
_Userlogin();
</script>
</body>
</html>
