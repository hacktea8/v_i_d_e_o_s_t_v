<?php
function getAsianVideoInfo($html){
 preg_match('#\[影片尺度\]：<span[^>]*>([^<]+)</span>#Uis',$html,$match);
 $info['ma'] = $match[1] === '无码'?0:1;
 preg_match('#<embed [^>]* src=\'([^\']+)\'></object>#Uis',$html,$match);
 $info['playurl'] = $match[1];
 return $info;
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
function write_log($html){
 $log = ROOTPATH.'cache/not_match_url.txt';
 if(file_exists($log)){
  file_put_contents($log,"$html\r\n",FILE_APPEND);
  return true;
 }
 file_put_contents($log,"$html\r\n");
 return true;
}
function debug($var){
var_dump($var);exit;
}
?>
