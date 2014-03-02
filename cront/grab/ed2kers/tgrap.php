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
//updateCateatotal();//exit;
/*=========== Get All Cate Info =================*/

//getAllcate();

/*============ Get Cate article =================*/

$res='excres.txt';
$lastgrab=basename(__FILE__);
$path=$APPPATH.'config/';

//$rootcate=$model->getCateInfoBypid(0);
getsubcatelist($subcate);
$i=0;
$num=149;
foreach($subcate as $_cate){
$i++;
//149,153,157,161,165,169,173,177,181
//113,117,121,125,129,133,137,141,145
//69,73,77,81,85,89,93,97,101,105,109,
//29,33,37,41,45,49,53,57,61,65
//2,5,8,11,14,17,20,23,26 is ok
if($i>$num){
break;
}
if($i!=$num){
continue;
}
   $lastgrab=$path.$_cate['id'].'_'.$lastgrab;
//   getCatearticle($_cate['id']);
   getSubCatearticle($_cate);
file_put_contents($res,"num $num 已抓取完毕!\r\n",FILE_APPEND);
sleep(10);
}



?>
