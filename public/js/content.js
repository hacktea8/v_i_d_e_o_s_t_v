jQuery.cookie = function(w, p, i) {
    if (typeof p != "undefined") {
        i = i || {};
        if (p === null) {
            p = "";
            i.expires = -1
        }
        var t = "";
        if (i.expires && (typeof i.expires == "number" || i.expires.toUTCString)) {
            var s;
            if (typeof i.expires == "number") {
                s = new Date();
                s.setTime(s.getTime() + (i.expires * 24 * 60 * 60 * 1000))
            } else {
                s = i.expires
            }
            t = "; expires=" + s.toUTCString()
        }
        var n = i.path ? "; path=" + (i.path) : "";
        var r = i.domain ? "; domain=" + (i.domain) : "";
        var x = i.secure ? "; secure": "";
        document.cookie = [w, "=", encodeURIComponent(p), t, n, r, x].join("")
    } else {
        var u = null;
        if (document.cookie && document.cookie != "") {
            var o = document.cookie.split(";");
            for (var q = 0; q < o.length; q++) {
                var v = jQuery.trim(o[q]);
                if (v.substring(0, w.length + 1) == (w + "=")) {
                    u = decodeURIComponent(v.substring(w.length + 1));
                    break
                }
            }
        }
        return u
    }
};
var yiyi = yiyi || {};
yiyi.score = {
	texts:['超酷，好看极了','好看，不错的视频','很一般噢','很无聊，小娱乐','忒差劲了，不值一看'],
	data:{},
	get:function(){
		$.getJSON("/inc/ajax.asp?action=videoscore&id="+video.vid+"", function(ret){
		yiyi.score.data=ret;
		yiyi.score.format();
		});
	},
	send:function(s){
		$.get("/inc/ajax.asp",{id:video.vid,action:'score',score:s},function(msg){if(msg==1){alert('评分已提交，非常感谢您的参与！');}else{alert('囧,-_-|||，您已经评过分了哦？明天再来吧……');}});
	},
	format:function(){
		var data = this.data;
		var s = data.s;
		var Num=parseInt(s)/2;
		$(".score_avg em").html(s.toFixed(1));
		$(".score_avg i").html(s.toFixed(1));
		for(var i=0;i<Num;i++)
		{
			$("#starlist li a").eq(i).addClass("on")
		}
		
	},
	hasSend:function(){
		var voted = $.cookie('voted');
		if(voted==null||voted=='')
			return false;
		else{
			return (','+voted+',').indexOf(','+video.vid+',')==-1?false:true;
		}
	},
	init:function(){
		this.get();
		var star_width = 26;
		//$('#star_current_rating').css('width',0);
		$('#starlist > li').click(function(){
			if(!yiyi.score.hasSend()){
				var i = $(this).attr('i');
				yiyi.score.send(i);
				//$('#star_current_rating').css({'width':star_width*i});
				//yiyi.score.data.s[i-1]++;
				yiyi.score.format();
			}else{
				alert('囧,-_-|||，您已经评过分了哦？明天再来吧……');
			}
		});
		$('#starlist > li').hover(function(){
										$("#starlist li a").removeClass("on");
										var Num = $(this).attr('i');
										for(var i=0;i<6;i++)
										{
											if(i<Num)
											{
												$("#starlist li a").eq(i).addClass("is");
											}
											else{
												$("#starlist li a").eq(i).removeClass("is");
											}
											$("#starlist li a").eq(i).attr("title",yiyi.score.texts[5-i]);
										}
										/*   $('#star_tip').show();
										   $('#star_tip_arrow').css('left',star_width*i-20 + 'px');
										   $('#star_current_rating').html(i + '星，' + yiyi.score.texts[5-i]);
										   },function(){
											   $('#star_tip').hide();
										*/
										}
		);
	}
};