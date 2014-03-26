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
  foreach($taskList as $row){
    $url = sprintf('%s/show_page/%s.html', $domain, $row['ourl']);;
    $html = getHtml($url);
    preg_match_all('#<a class="btnShow btnplayposi"  charset="[^"]+" href="http://[\S+]+/v_show/id_([\S]+)\.html" target="_blank"><em>播放正片</em></a>#Uis', $html, $match);
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
