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
$data = $data_body = array();
$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';
$lastRtime = time() ;$limit = 100;
$taskList = $model->getNoneRenewList($channelid,$sid,$lastRtime,$limit);
if(empty($taskList)){
  echo "\n== variety renew task list empty! ==\n";sleep(600);
  exit(1);
}
//var_dump($taskList);exit;
foreach($taskList as $val){
  preg_match('#\s+([\d]+)#',$val['title'],$match);
  $addYear = trim($match[1]);
  if($addYear){
    for($i=1;$i<13;$i++){
      $ayear = $addYear.sprintf('%02d',$i);
      $url = sprintf('%s/show_episode/id_%s.html?dt=json&divid=reload_%d&__rt=1&__ro=reload_%d', $domain, $val['ourl'],$ayear,$ayear);
      $html = getHtml($url);
      preg_match_all('#<li class="ititle_w"><label>[^<]+</label>\s*<a charset="[^"]+" title="[^"]+" href="http://[\S]+/v_show/id_([^"]+)\.html" target="_blank">[^<]+(\d+)</a></li>#Uis', $html, $match);
      if(empty($match[1])){
        break;
      }
    var_dump($match);exit;
      foreach($match[1] as $kk => $vv){
        $data_body[] = array('title'=>$match[2][$kk],'vid'=>$vv,'playnum'=>$kk+1);
      }
    }
  }
  if(empty($data_body)){
    $url = sprintf('%s/show_episode/id_%s.html?dt=json&divid=reload_1&__rt=1&__ro=reload_1', $domain, $val['ourl']);
    $html = getHtml($url);
    preg_match_all('#<label>(\d+)</label>\s*<a charset="[^"]+" title="[^"]+" href="http://[\S]+/v_show/id_([^"]+)\.html" target="_blank">([^<]+)</a>#Uis', $html, $match);
    var_dump($match);exit;
  }
  $model->updateTableData($table = 'play_type',$data = array('rtime'=>time()),$where = array('vid'=>$val['id'],'sid'=>$sid));
  if( empty($data_body)){
    echo "\n== Get play Error! ==\n";break;
  }
    //更新影片状态
    $model->updateTableData($table = 'video_head',$data = array('rtime'=>time()),$where = array('id'=>$val['id']));
    foreach($data as $k => $vid){
      $param = array('vid'=>$vid);
      $param = serialize($param);
      $info = array('vid'=>$val['id'], 'playnum'=>$k, 'param'=>$param, 'atime'=>time());
      $model->addVideoDramData($info);
    }
    sleep(3);
  
}



?>
