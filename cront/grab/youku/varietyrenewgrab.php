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
echo "debug va";exit;
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
  $url = $url = sprintf('%s/show_page/id_%s.html',$domain, $val['ourl']);;
  $html = getHtml($url);
  preg_match_all('#<li data="(reload_\d+)" #Uis',$html, $match);
  $reload_year = $match[1];
//var_dump($reload_year);exit;
  if(!empty($reload_year)){
    foreach($reload_year as $ayear){
      $url = sprintf('%s/show_episode/id_%s.html?dt=json&divid=reload_%d&__rt=1&__ro=reload_%d', $domain, $val['ourl'],$ayear,$ayear);
      $html = getHtml($url);
      preg_match_all('#<li class="[^"]+"><label>[^<]+</label>\s*<a charset="[^"]+" title="[^"]+" href="http://[\S]+/v_show/id_([^"]+)\.html" target="_blank">[^<]+(\d+)</a></li>#Uis', $html, $match);
      if(empty($match[1])){
        continue;
      }
    //var_dump($match);exit;
      foreach($match[1] as $kk => $vv){
        $data_body[] = array('title'=>$match[2][$kk],'vid'=>$vv);
      }
    }
  }
  if(empty($data_body)){
    $url = sprintf('%s/show_episode/id_%s.html?dt=json&divid=reload_1&__rt=1&__ro=reload_1', $domain, $val['ourl']);
    $html = getHtml($url);
    preg_match_all('#<label>(\d+)</label>\s*<a charset="[^"]+" title="[^"]+" href="http://[\S]+/v_show/id_([^"]+)\.html" target="_blank">([^<]+)</a>#Uis', $html, $match);
$fname = $path.'varealerrormatch.txt';
file_put_contents($fname,"$val[ourl]");
    //var_dump($match);exit;
  }
//var_dump($data_body);exit;
  $status = 0;
  $model->updateTableData($table = 'play_type',$data = array('flag'=>$status,'rtime'=>time()),$where = array('vid'=>$val['vid'],'sid'=>$sid));
  if( empty($data_body)){
    echo "\n== Get play Error! ==\n";break;
  }
    //更新影片状态
    $model->updateTableData($table = 'video_head',$data = array('rtime'=>time()),$where = array('id'=>$val['vid']));
    foreach($data_body as $k => $v){
      $param = array('vid'=>$v['vid']);
      $param = serialize($param);
      $info = array('vid'=>$val['vid'],'title'=>$v['title'], 'playnum'=>$k+1, 'param'=>$param, 'atime'=>time());
      $model->addVideoDramData($info);
    }
    sleep(3);
 echo "\nrenew Vid $val[vid] OK!\n"; 
exit;
}



?>
