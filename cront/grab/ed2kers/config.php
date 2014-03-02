<?php

$cateid=2;$pageno=1;
$head='<div class="destext">';
$end='</div>';
$same='<div';
$str='';
$_root='http://www.ed2kers.com/';
//
$catelistPattern='#<li><a title=".+" href="(.+)"><span>(.+)</span></a></li>#Uis';
$subcatelistPattern='#<li><a href="(.+)">(.+)</a></li>#U';
#$listPattern='#<a target="_blank" href="/(.+)\.html">(.+)</a>\s+</li>\s+<li>\s+<b>发布:</b>(.+)<br />\s+<b>更新:</b>(.+)\s+<li>\s+</ul>#Ums';
$listPattern='#</a>\s*<a target="_blank" href="/(.+)\.html">(.+)</a>\s*</li>#Us';
$listPatterntwo='#<a target="_blank" href="/(.+)\.html">(.+)</a>\s+</li>\s+<li>\s+<b>摘要:</b>.+<br />\s+<b>发布:</b>(.+)<br />\s+<b>更新:</b>(.+)\s+<li>\s+</ul>#Ums';
$pagesizePattern='#<span class="pageinfo">\s+\d+\s+条记录\s+\d+/(\d+)\s+页#s';
//
$bookimg='#<div class="litimg fLeft">\s*<img alt="[^"]+" src="([^"]+)" style="width:128px;height:128px" />\s*</div>#Us';
$detailPattern='#<div class="basetext fLeft mL10">\s+<b>类别:</b><a href="/.+" id="catename" title=".+">.+</a>-<a href=".+">.+</a><br />\s+<b>状态:</b>.+<br/>\s+<b>发布:</b>(.+)<br/>\s+<b>更新:</b>(.+)\s+</div>#Us';
//
$bookdownPattern='#<table id="ed2k">(.+)</table>#s';
//
$bookdesPattern='#<div class="destext">\s*<table>(.+)</table>\s*</div>#s';
//
$strreplace=array(
array('from'=>'http://hi.baidu.com/ed2kers/item/4fd50d532f2c8d30aaf6d72d','to'=>'/aboutus/serverlist'),
array('from'=>'http://hi.baidu.com/ed2kers/item/5af6243b27e7a7e32e8ec22f','to'=>'/aboutus/connectsrv'),
array('from'=>'http://hi.baidu.com/ed2kers/item/4b66a3c6b8b679f796445257','to'=>'/aboutus/connectkad')
,array('from'=>'www.ed2kers.com','to'=>'emu.hacktea8.com')
,array('from'=>'\"','to'=>'"')
,array('from'=>'\r\n','to'=>'')
,array('from'=>'\n','to'=>'')
);
//
$pregreplace=array(
array('from'=>'#<br>引用.+</td>#Us','to'=>'</td>')
,array('from'=>'#<script [^>]+>.+</script>#','to'=>'')
);


?>
