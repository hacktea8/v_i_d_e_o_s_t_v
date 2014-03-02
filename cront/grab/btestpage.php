<?php

 
    // create JavaScript context 
    $js = new JSContext(); 
    // define PHP variables 
    $a = 10; 
    $b = 2; 
    // assign variables to JavaScript context 
    $js->assign('a', $a); 
    $js->assign('b', $b); 
    // define script code 
    $script ="
    c = a + b;
    ";
    $url='http://tel.dm5.com/m139918-p2/chapterimagefun.ashx?cid=139918&page=2&language=1&key=';
    $script=file_get_contents($url);
    // evaluate script and display result 
    var_dump($js->evaluateScript($script));exit;
    //echo "The sum of $a and $b is: ".$js->evaluateScript($script); 
exit;    


$head='<div class="destext">';
$htm='rrrtt<div class="destext">12345';
$pos=stripos($htm,$head);
$str=substr($htm,$pos);
echo $str;exit;

$APPPATH=dirname(__FILE__).'/';
include_once($APPPATH.'function.php');


/*i*/
$url='http://www.ed2kers.com/图书/生活/435006.html';
$name='《DK目击者旅游指南：英国》全彩版[PDF]';
$ainfo=array('url'=>$url,'name'=>$name);
//getinfodetail($ainfo);
/**/

$string=file_get_contents('string.html');
$head='<div class="destext">';
$end='</div>';
$same='<div';
$str='';

#file_put_contents('string.html',$string);

getTagpair($str,$string,$head,$end,$same);

file_put_contents('str.html',$str);

die('It is OK!');
$cid=24;
$path=dirname(__FILE__).'/config/';
$lastgrab=$path.'24_wgrap.php';
$cateurl='http://www.ed2kers.com//资料/管理营销';
//getinfolist($cateurl);

/**/

/*=========== Get All Cate Info =================*/

//getAllcate();exit;

/*============ Get Cate article =================*/

getCatearticle(1);




?>
