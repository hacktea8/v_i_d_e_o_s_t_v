<?php

function getAsianVideoInfo($html){
 preg_match_all('#<li><a title=\'[^\']+\' href=\'(/play/\d+-\d+-\d+.html)\' target="_blank">([^<]+)</a></li>#Uis',$html,$match);
 $titlePool = $match[2];
 $urlPool = $match[1];
 foreach($urlPool as $key=>$u){
  $url = '';
  $html = getHtml($url);
  preg_match('#<DIV class=player><script type="text/javascript" src="(/playdata/[^"]+)"></script>#Uis',$html,$match);
  $html = getHtml($url);
  exit;
 }
 var_dump($match);exit;
}

?>
