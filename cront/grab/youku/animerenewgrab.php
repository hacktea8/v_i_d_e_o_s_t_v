<?php

$APPPATH = dirname(__FILE__).'/';
$psize = 10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'function.php');
include_once($APPPATH.'../db.class.php');
include_once($APPPATH.'../model.php');
include_once($APPPATH.'../config.php');
include_once($APPPATH.'config.php');

$model = new Model();

/*============ Get Cate article =================*/
$channelid = 3;
$data = array();
$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';
$lastRtime = time() ;$limit = 100;
$taskList = $model->getNoneRenewList($channelid,$sid,$lastRtime,$limit);
if(empty($taskList)){
  sleep(600);
  exit(1);
}
//var_dump($taskList);exit;
foreach($taskList as $val){
    $url = sprintf('%s/show_episode/id_%s.html?dt=json&divid=reload_1&__rt=1&__ro=reload_1', $domain, $val['ourl']);
    $html = getHtml($url);
    preg_match_all('#<li><a href="http://[\S]+/v_show/id_([\d\S]+)\.html" title="[^"]+" charset="[^"]+" target="_blank">([^<]+)</a></li>#Uis', $html, $match);
    var_dump($match);exit;
    if( empty($match[1])){
      echo "\n== Get play Error! ==\n";break;
    }
    foreach($match[1] as $k => $v){
      $key = intval($match[2][$k]);
      if($key < 1){
        echo "\n== Get $val[ourl] Volnum Error! ==\n";exit;
      }
      $data[$key] = $v;
    }
    //更新影片状态
    $model->updateTableData($table = 'video_head',$data = array('rtime'=>time()),$where = array('id'=>$val['id']));
    $model->updateTableData($table = 'play_type',$data = array('rtime'=>time()),$where = array('vid'=>$val['id'],'sid'=>$sid));
    foreach($data as $k => $vid){
      $param = array('vid'=>$vid);
      $param = serialize($param);
      $info = array('vid'=>$val['id'], 'playnum'=>$k, 'param'=>$param, 'atime'=>time());
      $model->addVideoDramData($info);
    }
    sleep(3);
  
}



?>
