<?php

$APPPATH=dirname(__FILE__).'/';
$psize=10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'config.php');

/*
$url='http://www.ed2kers.com/图书/生活/435006.html';
$name='《DK目击者旅游指南：英国》全彩版[PDF]';
$ainfo=array('url'=>$url,'name'=>$name);
getinfodetail($ainfo);

*/

/*=========== Update Cate Article Total =========*/
updateCateatotal();exit;
/*=========== Get All Cate Info =================*/

//getAllcate();

/*============ Get Cate article =================*/

$res='excres.txt';

$lastgrab=basename(__FILE__);
$path=$APPPATH.'config/';

//$rootcate=$model->getCateInfoBypid(0);
getsubcatelist($subcate);
$i=0;
$num=152;
foreach($subcate as $_cate){
$i++;
//128,132,136,140,144,148,152,156,160,164
//84,88,92,96,100,104,108,112,116,120,124
//28,32,36,40,44,48,52,56,60,64,68,72,76,80
//3,6,9,12,15,18,21,,24,27 isok
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
