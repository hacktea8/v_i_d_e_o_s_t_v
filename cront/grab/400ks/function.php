<?php

function getAsianVideoInfo($html){
 global $_domain;
 preg_match_all('#<li><a title=\'[^\']+\' href=\'(/play/\d+-\d+-\d+.html)\' target="_blank">([^<]+)</a></li>#Uis',$html,$match);
 $titlePool = $match[2];
 $urlPool = $match[1];
 $info = array();
 foreach($urlPool as $key=>$u){
  $url = $_domain.$u;
  $html = getHtml($url);
  $html = iconv('GBK','UTF-8//IGNORE',$html);
  preg_match('#<DIV class=player><script type="text/javascript" src="(/playdata/[^"]+)"></script>#Uis',$html,$match);
  $url = $_domain.$match[1];
  $html = getHtml($url);
  $html = iconv('GBK','UTF-8//IGNORE',$html);
  preg_match('#\$(qvod:.+)\$qvod#Uis',$html,$match);
  
  $info[] = array('title'=>$titlePool[$key],'playnum'=>$key+1,'playurl'=>$match[1]);
  
 }
 return $info;
}

?>
