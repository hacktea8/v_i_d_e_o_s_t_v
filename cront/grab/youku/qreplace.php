<?php

$root = dirname(__FILE__).'/';

require_once $root.'../model.php';
require_once $root.'../db.class.php';

$model = new Model();

$strreplace = array(
array('from'=>'www.ed2kers.com','to'=>'emu.hacktea8.com')
,array('from'=>'\"','to'=>'"')
,array('from'=>'\r\n','to'=>'')
,array('from'=>'\n','to'=>'')
);

$info = array();

for($page = 500; $page<800;$page++){
  $list = $model->getArticleList($page, $limit = 500);
  if(empty($list)){
    break;
  }

  foreach($list as $val){
    $data = $model->getArticleByid($val['id']);
    foreach($strreplace as $replace){
      $data['downurl'] = str_replace($replace['from'],$replace['to'],$data['downurl']);
      $data['intro'] = str_replace($replace['from'],$replace['to'],$data['intro']);
    }
    $info['downurl'] = $data['downurl'];
    $info['intro'] = $data['intro'];
     $info['id'] = $val['id'];
//var_dump($info);
    $model->update_article_contents($info );
//    exit;
  }

  sleep(5);
}

echo "\n== 执行完毕! ===\n";
