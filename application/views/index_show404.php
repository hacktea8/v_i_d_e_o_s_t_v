<table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%">
<tr>
	<td align="center" style="padding-top:60px;">
    <img src="<?php echo $img_url;?>show_404.jpg" />    </td>
</tr>
<tr>
<form name=loading>
<td align=center>
<p><font color=gray>正在载入首页，请稍候.......</font></p>
<p>
<input type=text name=chart size=46 style="font-family:Arial;
font-weight:bolder; color:red;
background-color:white; padding:0px; border-style:none;">
<br>
<input type=text name=percent size=46 style="font-family:Arial;
color:red; text-align:center;
border-width:medium; border-style:none;">
<script>var bar = 0
var line = "||"
var amount ="||"
count()
function count(){
bar= bar+1
amount =amount + line
document.loading.chart.value=amount
document.loading.percent.value=bar+"%"
if (bar<99)
{setTimeout("count()",100);}
else
{window.location = '<?php echo $goto;?>';}
}
</script>
</p>
</td>
</form>
</tr>
</table>
