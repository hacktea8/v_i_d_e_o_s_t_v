<?php

define('ROOTPATH',dirname(__FILE__).'/');
require_once ROOTPATH.'config.php';
require_once ROOTPATH.'../function.php';
require_once ROOTPATH.'function.php';
require_once ROOTPATH.'../db.class.php';
require_once ROOTPATH.'../avmodel.php';

$m = new avmodel();
$post_data = array('cate'=>'成人动漫','playmode'=>5,'flag'=>3,'intro'=>'');
$_list = 'avlist';

for($page = 1;;$page ++){
 $pUrl = $page>1?sprintf('/9_%d.html',$page):'/9.html';
 $url = sprintf('%s%s%s',$_domain,$_list,$pUrl);
 $html = getHtml($url);
 $html = iconv('GBK','UTF-8//IGNORE',$html);
 preg_match_all('#<DT><A href="(/avhtml/\d+.html)"><IMG onerror="src=[^"]+" src="([^"]+)" alt="([^"]+)"></A>\s*</DT>#Uis',$html,$match);
 $urlPool = $match[1];
 if(empty($urlPool)){
  echo "\n== Get $post_data[cate] Url List Empty! ==\n";break;
 }
 $titlePool = $match[3];
 $coverPool = $match[2];
 preg_match_all('#<DD>主演：([^<]*)</DD>#Uis',$html,$match);
 $actorPool = $match[1];
 //var_dump($match);exit;
 foreach($titlePool as $key =>$title){
  $title = trim($title);
  $check = $m->checkVideoByTitle($title);
  if($check){
   echo "\n Title: $title already exist!\n";continue;
  }
  $url = sprintf('%s%s',$_domain,$urlPool[$key]);
  $html = getHtml($url);
  $html = iconv('GBK','UTF-8//IGNORE',$html);
  $info = getAsianVideoInfo($html);
//  var_dump($info);exit;
  if(count($info) >1){
   write_log($url);
   $post_data['ourl'] = $urlPool[$key];
   //sleep(600);exit;
  }
  $post_data['title'] = $title;
  $post_data['keyword'] = $actorPool[$key];
  $post_data['thum'] = $coverPool[$key];
  $post_data['vlist'] = $info;
  $post_data['atime'] = date('Ymd');
//debug($post_data);
  $vid = $m->addVideoByData($post_data);
  echo "\n++ Add video $title Vid:$vid OK! \n";sleep(3);
 }
//exit;
}


?>
