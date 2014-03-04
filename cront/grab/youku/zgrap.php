<?php

$APPPATH=dirname(__FILE__).'/';
$psize=10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'config.php');


/*
$url='http://www.ed2kers.com/图书/生活/435006.html';
$url='http://www.ed2kers.com/%E6%95%99%E8%82%B2/%E8%AE%A1%E7%AE%97%E6%9C%BA/395137.html';
$name='《DK目击者旅游指南：英国》全彩版[PDF]';
$ainfo=array('ourl'=>$url,'name'=>$name);
getinfodetail($ainfo);

/**/

/*=========== Update Cate Article Total =========*/
//updateCateatotal();//exit;
/*=========== Get All Cate Info =================*/

//getAllcate();

/*============ Get Cate article =================*/
$lastgrab=basename(__FILE__);
$path=$APPPATH.'config/';
$res='excres.txt';

//$rootcate=$model->getCateInfoBypid(0);
getsubcatelist($subcate);
$i=0;
$num=167;
//var_dump($subcate);exit;
foreach($subcate as $_cate){
$i++;
//135,139,143,147,151,155,159,163,167,171,175
//87,91,95,99,103,107,111,115,119,123,127,131
//31,35,39,43,47,51,55,59,63,67,71,75,79,83 isok
if($i>$num){
  break;
}
if($i!=$num){
continue;
}
   $lastgrab=$path.$_cate['id'].'_'.$lastgrab;
   //getCatearticle($_cate['id']);
   getSubCatearticle($_cate);
file_put_contents($res,"num $num 已抓取完毕!\r\n",FILE_APPEND);
sleep(10);
}



?>
