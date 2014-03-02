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

$res='newexcres.txt';
$lastgrab=basename(__FILE__);
$path=$APPPATH.'config/';

//$rootcate=$model->getCateInfoBypid(0);
//$subcate = array(47);
getsubcatelist($subcate);
foreach($subcate as $_cate){
   $lastgrab=$path.$_cate['id'].'_'.$lastgrab;
   getSubCatearticle($_cate);
file_put_contents($res,"num $_cate[id] 已抓取完毕!\r\n",FILE_APPEND);
sleep(10);
}


?>
