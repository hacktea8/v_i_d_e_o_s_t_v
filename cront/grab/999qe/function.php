<?php
function getAsianVideoInfo($html){
 preg_match('#\[影片尺度\]：<span[^>]*>([^<]+)</span>#Uis',$html,$match);
 $info['mosaic'] = $match[1] === '无码'?0:1;
 preg_match('#<embed [^>]* src=\'([^\']+video_id=\d+)[^\d]+[^\']+\'></object>#Uis',$html,$match);
 $info['playurl'] = $match[1];
 return $info;
}
function getAsianBTVideoInfo($html){
 
}
function striptags($html){
 preg_match('#<body(.+)</body>#Uis',$html,$match);
 $html = $match[1];
 $html = preg_replace('#<script.+</script>#Uis','',$html);
 $html = preg_replace('#onclick=\'[^\']*\'#Uis','',$html);
 $html = preg_replace('#onclick="[^"]*"#Uis','',$html);
 $html = preg_replace('#\s\s+#',' ',$html);
 return $html;
}
?>
