<?php

$APPPATH = dirname(__FILE__).'/';
$psize = 10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'../model.php');
include_once($APPPATH.'../db.class.php');
include_once($APPPATH.'config.php');

$model = new Model();

/*============ Get Cate article =================*/
$lastgrab = basename(__FILE__);
$data_head = array();
$path = $APPPATH.'config/';

$lists = $model->getNoCoverList(100);
//var_dump($lists);exit;
foreach($lists as $row){
    $up_data['imgurl'] = $row['thum'].'.jpg';
    $data_head['cover'] = substr(uploadPic($up_data),3);
//var_dump($data_head['cover']);exit;
    $where = array('id'=>$row['id']);
    $model->updateDataByTable('video_head',$data_head, $where);
    echo "\n== update vid $row[id] success! ==\n";
exit;
    sleep(3);
}



?>
