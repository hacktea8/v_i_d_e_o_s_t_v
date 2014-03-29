<?php

$APPPATH = dirname(__FILE__).'/';
$psize = 10;
$channelid = 2;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'function.php');
include_once($APPPATH.'../db.class.php');
include_once($APPPATH.'../model.php');
include_once($APPPATH.'../config.php');
include_once($APPPATH.'config.php');

$model = new Model();

/*============ Get Cate article =================*/
$data_head = array('site'=>$sid);
$data_body = array();
$lastgrab = basename(__FILE__);
$path = $APPPATH.'config/';
$lastRtime = time() - 12*3600;
$limit = 100;
for($page = 1; ; $page++){
  $taskList = $model->getNoneRenewList($channelid,$sid,$lastRtime,$limit);
  if(empty($taskList)){
   echo "\n== Movice renew Task list empty! ==\n"; sleep(60);
    exit(1);
  }
//var_dump($taskList);exit;
  foreach($taskList as $row){
    $url = sprintf('%s/show_page/id_%s.html', $domain, $row['ourl']);;
    $html = getHtml($url);
    preg_match_all('#<a class="btnShow btnplayposi"  charset="[^"]+" href="http://[\S+]+/v_show/id_([\S]+)\.html" target="_blank"><em>播放正片</em></a>#Uis', $html, $match);
    $status = empty($match[1])?0:1;
    $model->updateTableData($table = 'play_type',$data = array('flag'=>$status,'rtime'=>time()),$where = array('vid'=>$row['vid'],'sid'=>$sid));
    if( empty($match[1])){
      echo "\n$url \nGet play Url Error $row[vid]\n";continue;
    }
    //var_dump($match);exit;
    $playUrl = $match[1];
    //更新影片状态
    $model->updateTableData($table = 'video_head',$data = array('renew'=>1,'rtime'=>time()),$where = array('id'=>$row['vid']));
    $status = 1;
    $param = array('url'=>$playUrl);
    $param = serialize($param);
    $data = array('vid'=>$row['vid'],'playnum'=>1,'param'=>$param,'atime'=>time());
    $model->addVideoDramData($data);
    sleep(3);
    echo "\n+++++ renew Vid:$row[vid] OK!+++++\n";
  }
}

?>
