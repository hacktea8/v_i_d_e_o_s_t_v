</body>
<script type="text/javascript">
jQuery(function(){
	$(".fht-navs div").click(function(){
		$(".fht-navs div").removeClass("active");
		$(this).addClass("active");
		$('a',this).blur();
	});
	
	$(".fht-navs div").click(function(){
		$(".fht-navs div").removeClass("active");
		$(this).addClass("active");
		$('a',this).blur();
	});
<?php if('index_change' == $_a){ ?>
	$(".fanwe-change").click(function(){
		var rel = this.getAttribute("rel");
		if(rel == 'left')
		{
			rel = 'right';
			$(this).addClass("fanwe-change-right");
			window.parent.document.getElementById("bodyFrameset").cols = "0,14,*";
		}
		else
		{
			rel = 'left';
			$(this).removeClass("fanwe-change-right");
			window.parent.document.getElementById("bodyFrameset").cols = "190,14,*";
		}
		
		this.setAttribute("rel",rel);
	});
<?php }elseif('index_left' == $_a){ ?>
		if($("a:first").attr("href"))
		{
			top.document.getElementById("mainFrame").src = $("a:first").attr("href");
			$("a:first").parent().parent().addClass("cur");
		};
		
		$("a").click(function(){
			$("a").each(function(){
				$(this).parent().parent().removeClass("cur");
			});
			$(this).parent().parent().addClass("cur");
			$(this).blur();
		});
<?php }elseif(in_array($_a, array('index_main','index_share'))){ ?>
	updateBodyDivHeight();
	$(window).resize(function(){
		updateBodyDivHeight();
	});
function updateBodyDivHeight(){
	jQuery(".body-table-div").height(jQuery(".fanwe-body").height() - 36);
	if(jQuery(".body-table-div").get(0).scrollHeight > jQuery(".body-table-div").height())
	{
		var width = jQuery(".body-table-div").width() - 16;
		jQuery(".body-table-div > *").each(function(){
			if(!$(this).hasClass('ajax-loading'))
			{
				$(this).width(width)	
			}
		});
	}
}
<?php } ?>
});
</script>
</html>
