<?php

$APPPATH=dirname(__FILE__).'/';
include_once($APPPATH.'../db.class.php');
$db=new DB_MYSQL();

$task = 500;
while($task){
$list = getnocoverlist();
foreach($list as $val){
/*
if(22357 < $val['id']){
   die('The task is OK!');
}
*/
if('http://' != substr($val['thum'],0,7)){
  $val['thum'] = str_replace('/res','',$val['thum']);
  $val['thum'] = 'http://i.ed2kers.com/'.$val['thum'];
}
//var_dump($val);exit;
echo $val['id']," == ",$val['thum'],"\n";
$default_opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0\r\n".
              "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n".
              "Accept-Language: zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3\r\n".
              "Cache-Control: max-age=0"

  )
);
$default = stream_context_get_default($default_opts);
$data = get_headers($val['thum'], 1);
//var_dump($data);exit;
//echo substr($data['Content-Type'],0,6);exit;
if('image/' != substr($data['Content-Type'],0,6) || $data['Content-Length'] < 1000){
  echo "$val[id] cover is down!\n";
  setcoverByid(44,$val['id']);
  continue;
}
//
setcoverByid(0,$val['id']);
//exit;
sleep(5);
}
//var_dump($list);exit;
$task --;
//2min
sleep(8);
}
file_put_contents('errcover.txt',$val['id']);


function getnocoverlist($limit = 20){
    global $db;
    //$sql=sprintf('SELECT `id`,`thum`,`cover`,`ourl` FROM %s WHERE `cover`=\'4\' LIMIT %d',$db->getTable('emule_article'),$limit);
    $sql=sprintf('SELECT `id`,`thum` FROM %s WHERE `cover`=\'4\' LIMIT %d',$db->getTable('emule_article'),$limit);
    $res=$db->result_array($sql);
    return $res;
}

function setcoverByid($cover = '',$id = 0){
    if(!$id){
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

