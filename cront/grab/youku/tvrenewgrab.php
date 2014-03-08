<?php

$APPPATH = dirname(__FILE__).'/';
$psize = 10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'function.php');
include_once($APPPATH.'../model.php');
include_once($APPPATH.'../config.php');
include_once($APPPATH.'config.php');

$model = new Model();

/*============ Get Cate article =================*/
$data_head = array('site'=>$sid);
$data_body = array();
$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';

for($page = 1; ; $page++){
  $taskList = $model->getNoneRenewList($sid,$lastRtime,$limit);
  if(empty($taskList)){
    sleep(60);
    exit(1);
  }
  foreach($taskList as $val){
    $url = sprintf('%s/show_episode/id_%s.html?dt=json&divid=reload_1&__rt=1&__ro=reload_1', $domain, $val['ourl']);
    $html = getHtml($url);
    preg_match_all('#<li><a href="http://v\.youku\.com/v_show/id_([\d\S]+)\.html" title="[^"]+" charset="[^"]+" target="_blank">([^<]+)</a></li>#Uis', $html, $match);
    var_dump($match);exit;
    //更新影片状态
    $model->updateTableData($table = 'video_head',$data = array('rtime'=>time()),$where = array('id'=>$val['id']));
    $model->updateTableData($table = 'play_type',$data = array('rtime'=>time()),$where = array('vid'=>$val['id'],'sid'=>$sid));
    if( empty($match[1])){
      break;
    }
    $model->addVideoDramData($data);
    sleep(3);
  }
}



?>
