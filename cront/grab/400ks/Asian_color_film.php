<?php

define('ROOTPATH',dirname(__FILE__).'/');
require_once ROOTPATH.'config.php';
require_once ROOTPATH.'../function.php';
require_once ROOTPATH.'function.php';
require_once ROOTPATH.'../db.class.php';
require_once ROOTPATH.'../avmodel.php';

$m = new avmodel();
$post_data = array('cate'=>'亚洲色片','playmode'=>3,'flag'=>3);
$_list = 'avlist';

for($page = 1;;$page ++){
 $pUrl = $page>1?sprintf('/5_%d.html',$page):'/5.html';
 $url = sprintf('%s%s%s',$_domain,$_list,$pUrl);
 $html = getHtml($url);
 $html = iconv('GBK','UTF-8',$html);
 preg_match_all('#<DT><A href="(/avhtml/\d+.html)"><IMG onerror="src=[^"]+" src="([^"]+)" alt="([^"]+)"></A>\s*</DT>#Uis',$html,$match);
 $urlPool = $match[1];
 if(empty($urlPool)){
  echo "\n== Get $post_data[cate] Url List Empty! ==\n";break;
 }
 $titlePool = $match[3];
 $coverPool = $match[2];
 //var_dump($match);exit;
 foreach($titlePool as $key =>$title){
  $title = trim($title);
  $check = $m->checkVideoByTitle($title);
  if($check){
   echo "\n Title: $title already exist!\n";continue;
  }
  $url = sprintf('%s%s',$_domain,$urlPool[$key]);
  $html = getHtml($url);
  $html = iconv('GBK','UTF-8',$html);
  $info = getAsianVideoInfo($html);
  var_dump($info);exit;
  if(empty($info['playurl'])){
   write_log($url);
   sleep(600);exit;
  }
  
 }
}


?>
