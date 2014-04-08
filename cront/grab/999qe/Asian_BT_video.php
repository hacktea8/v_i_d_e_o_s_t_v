<?php

define('ROOTPATH',dirname(__FILE__).'/');
require_once ROOTPATH.'config.php';
require_once ROOTPATH.'function.php';
require_once ROOTPATH.'../function.php';
require_once ROOTPATH.'../db.class.php';
require_once ROOTPATH.'../avmodel.php';

$m = new avmodel();
$post_data = array('cate'=>'亚洲BT','playmode'=>2,'flag'=>3);
$listUrl = 'xzavs1';
for($page = 1;;$page ++){
 $next = $page == 1 ? '':sprintf('index_%d.html',$page);
 $url = sprintf('%s%s/%s',$_domain,$listUrl,$next);
 $html = getHtml($url);
 $html = striptags($html);
 preg_match_all('#<A href="(/'.$listUrl.'/\d+\.html)" title="[^"]+" target="_blank">([^<]+)</A>#Uis',$html,$match);
 $urlPool = $match[1];
//debug($urlPool);
 if(empty($urlPool)){
  echo "\n== Get $post_data[cate] Url List Empty! ==\n";break;
 }
 $titlePool = $match[2];
 foreach($titlePool as $key => $title){
  $title = trim($title);
  $check = $m->checkVideoByTitle($title);
  if($check){
   echo "\n Title: $title already exist!\n";continue;
  }
  $url = sprintf('%s%s',$_domain,$urlPool[$key]);
  $html = getHtml($url);
  $info = getAsianBTVideoInfo($html);
  var_dump($info);exit;
  if(empty($info['playurl'])){
   write_log($url);
   sleep(600);exit;
  }
  $check = $m->checkVideoByTitle($info['title']);
  if($check){
   echo "\n Title: $title already exist!\n";continue;
  }
  $post_data['title'] = $info['title'];
  $post_data['keyname'] = $title;
  $post_data['m'] = $info['m'];
  $post_data['playurl'] = $info['playurl'];
  $vid = $m->addVideoByData($post_data);
  echo "\n++ Add video $title Vid:$vid OK! \n";sleep(3);
 }
}
?>
