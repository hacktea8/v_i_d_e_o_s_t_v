	function focusTag(index) {
		$("#focustag-content ul").stop(true,false).hide().eq(index).stop(true,false).show();
		$("#focustag-li li").stop(true,false).removeClass("on").eq(index).stop(true,false).addClass("on");
	}

	$(function() {
		var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
		var len = $("#focus ul li").length; //获取焦点图个数
		var index = 0;
		var picTimer;
		
		//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
		var btn = "<div class=\"focus-hd\"><div class='bg'></div><h2 id=\"poster_title\" class=\"tit\">";
		for(var h=0; h < len; h++) {
			btn += "<a href=\""+$("#focus ul li a").eq(h).attr("href")+"\""+(h==0?"":" style=\"display: none;\"")+"><i class=\"playicon\"></i><em>《"+$("#focus ul li img").eq(h).attr("_alt")+"》</em>"+$("#focus ul li img").eq(h).attr("alt")+"</a>";
		}
		btn += "</h2><div class='change'>";
		for(var i=0; i < len; i++) {
			btn += "<a></a>";
		}
		btn += "</div></div><div class='preNext pre'></div><div class='preNext next'></div>";
		$("#focus").append(btn);
		$("#focus .bg").css("opacity",0.5);

		//为小按钮添加鼠标滑入事件，以显示相应的内容
		$("#focus .change a").mouseenter(function() {
			index = $("#focus .change a").index(this);
			showPics(index);
		}).eq(0).trigger("mouseenter");

		//上一页、下一页按钮透明度处理
		$("#focus .preNext").css("opacity",0.1).hover(function() {
			//$(this).stop(true,false).animate({"opacity":"0.5"},300);
			$("#focus .preNext").stop(true,false).animate({"opacity":"0.7"},500);
		},function() {
			$("#focus .preNext").stop(true,false).animate({"opacity":"0.1"},500);
			//$(this).stop(true,false).animate({"opacity":"0.2"},300);
		});

		//上一页按钮
		$("#focus .pre").click(function() {
			index -= 1;
			if(index == -1) {index = len - 1;}
			showPics(index);
		});

		//下一页按钮
		$("#focus .next").click(function() {
			index += 1;
			if(index == len) {index = 0;}
			showPics(index);
		});

		//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
		$("#focus ul").css("width",sWidth * (len));
		
		//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
		$("#focus").hover(function() {
			clearInterval(picTimer);
		},function() {
			picTimer = setInterval(function() {
				showPics(index);
				index++;
				if(index == len) {index = 0;}
			},4000); //此4000代表自动播放的间隔，单位：毫秒
		}).trigger("mouseleave");
		
		function showPics(index) { //普通切换
			var nowLeft = -index*sWidth;
			$("#focus ul").stop(true,false).animate({"left":nowLeft},300);
			$("#focus .change a").stop(true,false).removeClass("on").eq(index).stop(true,false).addClass("on");
			$("#focus #poster_title a").stop(true,false).hide().eq(index).stop(true,false).show();
		}
	});