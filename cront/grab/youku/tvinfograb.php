<?php

$APPPATH = dirname(__FILE__).'/';
$psize = 10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'../model.php');
include_once($APPPATH.'config.php');

/*============ Get Cate article =================*/
$data_head = array('site'=>1);
$data_body = array();
$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';

for($page = 1; ; $page++){
  $url = sprintf($tv_list_url, $domain, $page);
  $html = getHtml($url);
  preg_match_all('#<div class="p-link">\s+<a href="http://www\.youku\.com/show_page/([^"]+)\.html" target="_blank" title="([^"]+)"></a>\s+</div>#Uis', $html, $match);
//var_dump($match);exit;
  if( empty$match[1])){
    break;
  }
  foreach($match[2] as $k => $title){
    $data_head['title'] = trim($title);
    $flag = $model->checkVideoByTitle($data_head['title']);
    if($flag){
      echo "\n== title: $title already exists! ==\n";continue;
    }
    $data_head['ourl'] = trim($match[1][$k]);
    $data_head['rtime'] = strtotime(date('Y-m-d'));
    $url = sprintf('%s/show_page/%s.html', $domain, $data_head['ourl']);
    $info = getYoukuDetail($url);
    $data_head['cover'] = '0';
    $data_head['thum'] = $info['thum'];
    $data_head['actor'] = $info['actor'];
    $data_head['area'] = $info['area'];
    $data_head['type'] = $info['type'];
//集数
    $data_head['setnum'] = $info['setnum'];
//更新到集数
    $data_head['rnum'] = $info['rnum'];
//播放源
    $data_body['playtype'] = '';
    $data_body['intro'] = $info['intro'];

    $vid = $model->addVideoByData($data_head,$data_body);
  
    sleep(3);
  }
}



?>
