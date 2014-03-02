<?php
/**
* 单例模式的进程模式
* 删除多余的自己进程
*/

exec('ps -ax|grep grab.',$list);
//$pattern = 'php qgrab.php';
$result = array();
//$list = trim($list);
//$list = explode("\n",$list);
//var_dump($list);exit;
if(empty($list)){
   echo "The process lists is Empty!\n";
}

foreach($list as $process){
  $process = trim($process);
  if(false !== stripos($process,$pattern)){
     $process = preg_replace('#\s+#is',',',$process);
     $tmp = explode(',',$process);
//   var_dump($tmp);exit;
//     $result[$tmp[1]] = array('pid' => $tmp[1]);
     $result[$tmp[0]] = array('pid' => $tmp[0]);
  }
}
sort($result);
//var_dump($result);exit;
$i = 0;
foreach($result as $process){
  $i++;
  if(1 == $i){
     continue;
  }
  $pid = $process['pid'];
  exec('kill '.$pid);
  echo 'kill '.$pid,"\n";
}
/*
if( 1 == count($result)){
//当前已有运行实例,结束本次实例
   exit(0);
}
*/
