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

/*============== 实时更新 =======================*/
getCatearticle(0);
exit;
/*============ Get Cate article =================*/
$res='excres.txt';
$lastgrab=basename(__FILE__);
$path=$APPPATH.'config/';

//$rootcate=$model->getCateInfoBypid(0);
getsubcatelist($subcate);
$i=0;
$num=166;
//var_dump($subcate);exit;
foreach($subcate as $_cate){
$i++;
//146,150,154,158,162,166,170,174,178
//114,118,122,126,130,134,138,142
//74,78,82,86,90,94,98,102,106,110
//30,34,38,42,46,50,54,58,62,66,70
//1,4,7,10,13,16,19,22,25, isok
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
