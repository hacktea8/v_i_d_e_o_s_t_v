<?php

$APPPATH=dirname(__FILE__).'/';
include_once($APPPATH.'../db.class.php');

$pattern = '/ed2kers/grab.php';
require_once $APPPATH.'singleProcess.php';

$db=new DB_MYSQL();

$data = array('url' => 'http://img.hacktea8.com/imgapi/uploadurl?seq=', 'imgurl'=>'');
$task = 600;
while($task){
$list = getnocoverlist();
foreach($list as $val){
if('http://' != substr($val['thum'],0,7)){
  $val['thum'] = str_replace('/res','',$val['thum']);
  $val['thum'] = 'http://i.ed2kers.com/'.$val['thum'];
}
//echo "== $val[thum] ==\n";
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
  echo "$val[id] cover is down!\n";
  setcoverByid(4,$val['id']);
  continue;
}
//
setcoverByid($cover,$val['id']);
sleep(5);
}
//var_dump($list);exit;
$task --;
//2min
sleep(8);
}
file_put_contents('imgres.txt',$val['id']);


function getnocoverlist($limit = 20){
    global $db;
    $sql=sprintf('SELECT `id`,`thum` FROM %s WHERE `cover`=\'0\' LIMIT %d',$db->getTable('emule_article'),$limit);
    $res=$db->result_array($sql);
    return $res;
}

function setcoverByid($cover = '',$id = 0){
    if(!$cover || !$id){
       return false;
    }
    global $db;
    $sql = sprintf('UPDATE %s SET `cover`=\'%s\' WHERE `id`=%d LIMIT 1',$db->getTable('emule_article'),mysql_real_escape_string($cover),$id);
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

