<?php

$APPPATH = dirname(__FILE__).'/';
$psize = 10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'function.php');
include_once($APPPATH.'../model.php');
include_once($APPPATH.'../db.class.php');
include_once($APPPATH.'config.php');

$model = new Model();

/*============ Get Cate article =================*/
$data_head = array('site'=>1,'cid'=>'综艺');
$data_body = array();
$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';

for($page = 1; ; $page++){
  $url = sprintf($variety_list_url, $domain, $page);
  $html = getHtml($url);
  preg_match_all('#<div class="p-link">\s+<a href="http://[\S]+/show_page/id_([^"]+)\.html" target="_blank" title="([^"]+)"></a>\s+</div>#Uis', $html, $match);
//var_dump($match);exit;
  if( empty($match[1])){
    echo "\n== Get List Empty! ===\n";sleep(600);break;
  }
  foreach($match[2] as $k => $title){
    $data_head['title'] = trim($title);
    $flag = $model->checkVideoByTitleSid($data_head['title'],$data_head['site']);
    if($flag){
      echo "\n== title: $title already exists! ==\n";continue;
    }
    $data_head['ourl'] = trim($match[1][$k]);
    $data_head['rtime'] = strtotime(date('Y-m-d'));
    $url = sprintf('%s/show_page/id_%s.html', $domain, $data_head['ourl']);
//echo $url;exit;
    //http://www.youku.com/show_page/id_z5b3cddd898e411e2b2ac.html
    $info = getYoukuVarietyDetail($url);
//var_dump($info);exit;
    $data_head['thum'] = $info['thum'];
    $data_head['cover'] = 0;
    $data_head['alias'] = $info['alias'];
    $data_head['actor'] = $info['actor'];
    $data_head['director'] = $info['director'];
    $data_head['area'] = $info['area'];
    $data_head['type'] = $info['type'];
    $data_head['cate'] = $info['cate'];
//集数
    $data_head['setnum'] = $info['setnum'];
//更新到集数
    $data_head['renew'] = $info['renew'] = 0;
    $data_body['intro'] = $info['intro'];

    $vid = $model->addVideoByData($data_head,$data_body);
    echo "\n== add vid $vid success! ==\n";
exit;
    sleep(3);
  }
}



?>
