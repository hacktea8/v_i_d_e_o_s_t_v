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
$channelid = 1;
$data_body = array();
$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';
$lastRtime = time() 12*3600;$limit = 100;
$taskList = $model->getNoneRenewList($channelid,$sid,$lastRtime,$limit);
if(empty($taskList)){
  echo "\n== tv renew task list empty! ==\n";sleep(600);
  exit(1);
}
//var_dump($taskList);exit;
foreach($taskList as $val){
  $data_body = array();
  $url = sprintf('%s/show_page/id_%s.html', $domain, $val['ourl']);
  $html = getHtml($url);
  preg_match_all('#<li data="(reload_\d+)"#Uis',$html, $match);
  $reload = $match[1];
  $reload = empty($reload)? array('reload_1') :$reload;
  foreach($reload as $red){
    $url = sprintf('%s/show_episode/id_%s.html?dt=json&divid=%s&__rt=1&__ro=%s', $domain, $val['ourl'],$red,$red);
    $html = getHtml($url);
    preg_match_all('#<li><a href="http://[\S]+/v_show/id_([\d\S]+)\.html" title="[^"]+" charset="[^"]+" target="_blank">([^<]+)</a></li>#Uis', $html, $match);
 //   var_dump($match);exit;
    if( empty($match[1])){
      echo "\n== Get play Error! ==\n";continue;
    }
    $baseNum = preg_replace('#[^\d]+#Uis','',$red);
    $baseNum = intval($baseNum);
    foreach($match[1] as $k => $v){
      $key = $baseNum+$k;
      if($key < 1){
        echo "\n== Get $val[ourl] Volnum Error! ==\n";exit;
      }
      $data_body[$key] = array('vid'=>$v,'title'=>$match[2][$k]);
    }
  }
  $status = count($data_body) === $val['setnum'] ?1:0;
    $model->updateTableData($table = 'play_type',$data = array('flag'=>$status,'rtime'=>time()),$where = array('vid'=>$val['id'],'sid'=>$sid));
  if(empty($data_body)){
     break;
  }
//var_dump($data_body);exit;
    //更新影片状态
    $model->updateTableData($table = 'video_head',$data = array('rtime'=>time()),$where = array('id'=>$val['id']));
    foreach($data_body as $k => $v){
      $param = array('vid'=>$v['vid']);
      $param = serialize($param);
      $info = array('vid'=>$val['vid'],'title'=>$v['title'], 'playnum'=>$k, 'param'=>$param, 'atime'=>time());
      $model->addVideoDramData($info);
    }
 echo "\n+++ Update Vid:$val[vid] OK!++++\n";sleep(3);
}

?>
