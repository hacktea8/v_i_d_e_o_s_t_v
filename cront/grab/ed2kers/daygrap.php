<?php

$APPPATH=dirname(__FILE__).'/';
$psize=10;
include_once($APPPATH.'../function.php');
include_once($APPPATH.'config.php');


/*=========== Update Cate Article Total =========*/
//updateCateatotal();exit;
/*=========== Get All Cate Info =================*/


/*============ Get Cate article =================*/

$res='excres.txt';

$lastgrab=basename(__FILE__);
$path=$APPPATH.'config/';

//$rootcate=$model->getCateInfoBypid(0);
getsubcatelist($subcate);
//var_dump($subcate);exit;
foreach($subcate as $_cate){
   $lastgrab=$path.$_cate['id'].'_'.$lastgrab;
   //getCatearticle($_cate['id']);
   if(!$_cate['url']){
      continue;
   }
   getSubCatearticle($_cate);
file_put_contents($res,"cate $_cate[id] 已抓取完毕!\r\n",FILE_APPEND);
sleep(5);
}

updateCateatotal();

?>
