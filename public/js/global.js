is_ie=navigator.appName=="Microsoft Internet Explorer"?true:false;
is_opera=navigator.appName.indexOf("Opera")>=0?true:false;
userAgent=navigator.userAgent.toLowerCase();
ie=(userAgent.indexOf("msie")!=-1&&!is_opera)&&userAgent.substr(userAgent.indexOf("msie")+5,3);
cookie={get:function(b){var f=b+"=";var a=document.cookie.split(";");for(var d=0;d<a.length;d++){var g=a[d];while(g.charAt(0)==" "){g=g.substring(1,g.length)}if(g.indexOf(f)==0){return decodeURIComponent(g.substring(f.length,g.length))}}return null},set:function(d,g,j,h,f){var a="";if(j){var b=new Date();b.setTime(b.getTime()+(j*24*60*60*1000));a=";expires="+b.toGMTString()}if(h==null){h="/"}h=h?";path="+h:"";f=(f==null)?"":";domain="+f;document.cookie=d+"="+encodeURIComponent(g)+a+h+f},del:function(a,d,b){var f=new Date();f.setTime(f.getTime()-99999);if(d==null){d="/"}d=d?";path="+d:"";b=(b==null)?"":";domain="+b;document.cookie=a+"=''; expires="+f.toGMTString()+d+b}
};
var Sizzle=function(a,f,d,b){return jQuery.find(a,f,d,b)};
_iniHtml_run_Once=[];
iniHtmlOnce=function(a){if(typeof a=="function"){_iniHtml_run_Once=_iniHtml_run_Once||[];_iniHtml_run_Once.push(a)}};

_msgRunHidden=null;
Msg=function(d,a,k){
  k=k||6;
  if(a){
    cookie.set("flash_message_",d);
    document.location.href=a;
    return true
  }
  if(typeof d!="string"){
    d=cookie.get("flash_message_");
    if(d){
      cookie.del("flash_message_","/")
    }
  }
  if(d){
    var l=0;
    var p=0;
    var b;
    var g=Sizzle("#show_msg_div_")[0];
    if(is_ie&&ie<7){
      var f=setInterval(function(){
      var q=Math.ceil(Math.random()*10);
      g.style.bottom=q+"px";g.style.bottom="0px"
      },20)
    }
    var j=function(s){l++;p=b;var q=80-80*l/20;
      if(l<=20){g.style.left=p+"px";
        g.style.opacity=q/100;
        g.style.filter="alpha(opacity="+q+")";
        setTimeout(function(){j(s)},100)}
      else{
        l=0;
      if(is_ie&&ie<7){
        clearInterval(f)
      }
     _msgRunHidden=null;
     if(typeof s=="function"){
       try{s()}catch(r){}}}
    };
    if(_msgRunHidden){
      clearTimeout(_msgRunHidden);
      b=g.offsetWidth*0.5;
      j(function(){Msg(d,a,k)});
      return true
    }
    if(!g){
      g=document.createElement("div");
      g.style.cssText="z-index:111111;position:fixed;opacity:0.01;filter:alpha(opacity=1);_position:absolute;left:0;bottom:0px;padding:3px 12px;border:1px solid #ccc;overflow:hidden;background:#FF6600;width:27%;color:#fff;text-align:left;";
      g.id="show_msg_div_";
      document.body.appendChild(g)
    }
    g.innerHTML=d;
    b=g.offsetWidth*0.5;
    var h=g.offsetWidth*0.5;
    var m=function(){l++;var q=80*l/20;
    if(l<=20){
      g.style.left=b+"px";g.style.opacity=q/100;
      g.style.filter="alpha(opacity="+q+")";setTimeout(m,10)
    }else{
      g.style.left="0px";l=0;_msgRunHidden=setTimeout(j,k*1000)}
    };
    g.style.bottom=h+"px";
    setTimeout(m,500)}};
    iniHtmlOnce(function(){Msg()});
addfavorite=function(a,b){
  a=a||document.location.href;
  b=b||document.title|"";
  if(is_ie){
    window.external.addFavorite(a,b)
  }else{
    if(window.sidebar){
      window.sidebar.addPanel(b,a,"")
    }else{
      Msg("您的浏览器不支持此功能，请手动按" + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cmd' : 'CTRL') + " + D加入，谢谢。");
    }
  }
};
