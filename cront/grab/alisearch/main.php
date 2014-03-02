<?php

$root = dirname(__FILE__);

require_once $root.'/model.php';
require_once $root.'/config.php';
require_once $root.'/../../../src/library/base/AliyunSearchApi.php';

$search = new AliyunSearchApi();
$model = new Model();
$count = 20;

while($count){
   $lists = $model->getNoneSearchLimit(5);
//var_dump($lists);exit;
   $_itemsArr = array();
   $idarr = array();
   foreach($lists as $val){
      $itemArr['id'] = 'emu_article_'.$val['id'];
      $itemArr['group_id'] = $val['uid'];
      $itemArr['title'] = $val['name'];
      $itemArr['cat'] = $val['cid'];
      $itemArr['tag'] = $val['keyword'];
      $itemArr['focus_count'] = $val['collectcount'];
      $itemArr['create_timestamp'] = $val['ptime'];
      $itemArr['update_timestamp'] = $val['utime'];
      $itemArr['body'] = trim(preg_replace('#\s+#is',' ',strip_tags($val['intro'])));
      $itemArr['body'] = mb_substr($itemArr['body'], 0, 256, 'utf-8');
//var_dump($val['intro']);
//var_dump($itemArr['body']);exit;
      $itemArr['thumbnail'] = 'http://img.hacktea8.com/showpic.php?key='.$val['cover'];
      $itemArr['hit_num'] = $val['hits'];
      $itemArr['url'] = '/index.php?m=emule&c=topic&a=run&aid='.$val['id'];
      $_itemsArr[] = $itemArr;
      $idarr[] = $val['id'];
   }
//var_dump($_itemsArr);exit;
   $search->adddocument($_itemsArr);
   $model->setIsSearch($idarr);
   $count --;
}
  echo "执行完毕!\n";exit; 

