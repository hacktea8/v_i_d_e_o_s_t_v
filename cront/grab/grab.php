<?php

$APPPATH=dirname(__FILE__).'/';
include_once($APPPATH.'db.class.php');

$pattern = '/ed2kers/grab.php';
require_once $APPPATH.'singleProcess.php';

$db=new DB_MYSQL();

$data = array('url' => 'http://img.hacktea8.com/avimgapi/uploadurl?seq=', 'imgurl'=>'');
$task = 600;
while($task){
$list = getnocoverlist();
if(empty($list)){
sleep(600);
exit;
}
//var_dump($list);exit;
foreach($list as $val){
if('http://' != substr($val['thum'],0,7)){
  $val['thum'] = 'http://www.400ks.com/'.$val['thum'];
}
echo "== $val[thum] ==\n";
$data['imgurl'] = $val['thum'];
$cover = getHtml($data);
//去除字符串前3个字节
$cover = substr($cover,3);
echo $cover,"\n";
//exit;
//echo strlen($cover);exit;
if(44 == $cover){
  die('Token 失效!');
}
if(0 == $cover){
  echo "$val[vid] cover is down!\n";
  setcoverByid(4,$val['vid']);
  continue;
}
//
setcoverByid($cover,$val['vid']);
sleep(5);
}
//var_dump($list);exit;
$task --;
//2min
sleep(8);
}


function getnocoverlist($limit = 20){
    global $db;
    $sql=sprintf('SELECT `vid`,`thum` FROM `av_video_head` WHERE `cover`=\'0\' LIMIT %d',$limit);
    $res=$db->result_array($sql);
    return $res;
}

function setcoverByid($cover = '',$id = 0){
    if(!$id){
       return false;
    }
    global $db;
    $sql = sprintf('UPDATE `av_video_head` SET `cover`=\'%s\' WHERE `vid`=%d LIMIT 1',mysql_real_escape_string($cover),$id);
    $db->query($sql);
}
function getHtml(&$data){
  $curl = curl_init();
  $url = $data['url'];
  unset($data['url']);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl, CURLOPT_POST, count($data));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  $data['url'] = $url;
  return $tmpInfo;
}

