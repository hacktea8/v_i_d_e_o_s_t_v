		(function () {
			$("#rightMenu").click(function () {
				$("html, body").animate({ scrollTop: 0 },1);
			})
			$backToTopFun = function () {
				var st = $(document).scrollTop(), winh = $(window).height();
				(st > 0) ? $("#rightMenu").show() : $("#rightMenu").hide();
				//IE6下的定位
				if (!window.XMLHttpRequest) {
					$("#rightMenu").css("top", st + winh - 250);
				}
			};
			$(window).bind("scroll", $backToTopFun);
			$(function () { $backToTopFun(); });
		})();