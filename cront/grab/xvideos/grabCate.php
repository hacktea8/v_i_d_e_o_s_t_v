<?php

define('ROOTPATH',dirname(__FILE__));

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/phpCurl.php';
require_once ROOTPATH.'/model.php';
require_once ROOTPATH.'/function.php';

$tvckCurl = new curlModel();
//$tvckCurl->config['proxy'] = $proxy.':9990';
$tvckCurl->config['cookie'] = 'discuz3455867';
$dzCurl = &$tvckCurl;

$xtvCurl = new curlModel();
//$xtvCurl->config['proxy'] = $proxy.':9990';
$xtvCurl->config['cookie'] = 'cookiexvideos';

$model = new Model();

$dwCurl = new curlModel();
//$dwCurl->config['proxy'] = $proxy.':9990';
$dwCurl->config['cookie'] = 'cookiedownload';


foreach($_cate as $cate){
  for($page = 0; $page < 30;$page ++){
    $url = sprintf($domain.$cate['list'],$page);
    $xtvCurl->config['url'] = $url;
    $html = $xtvCurl->getHtml();
    preg_match_all($cate['pattern']['listurl'],$html,$matchList,PREG_PATTERN_ORDER);
//  var_dump($matchList);exit;
    if( !isset($matchList[1])){
       echo "Page:$page List is Empty!\n";break;
    }
    foreach($matchList[1] as $k => $v){
       $id = $matchList[2][$k];
       $status = $model->checkVideoVid($id);
       if($status){
          echo "Id:$id already exists!\n";continue;
       }
     
       $xtvCurl->config['url'] = $domain.$v;
//     echo $xtvCurl->config['url'],"\n";
       $html = $xtvCurl->getHtml();
       preg_match($detailPattern['flvUrl'],$html,$match);
       if(!isset($match[1])){
         echo "$v 获取FLV file url Failed!\n";continue;
       }
       $flvUrl = urlDecode($match[1]);
       preg_match($detailPattern['title'],$html,$match);
       if(!isset($match[1])){
         echo "获取FLV title Failed!\n";continue;
       }
       $videoData['title'] = trim($match[1]);
       $videoData['intro'] = $videoData['title'];
       preg_match($detailPattern['tags'],$html,$match);
       $match[1] = isset($match[1]) ? $match[1] : $cate['tags'];
       if($match[1]){
         $match[1] = preg_replace('#<li><a href="[^"]+">#is','',$match[1]);
         $match[1] = preg_replace('#</a>,\s*</li>#is',',',$match[1]);
         $match[1] = preg_replace('#\s+#is','',$match[1]);
         $match[1] = trim($match[1],',');
       }
       $videoData['tags'] = checkVideoTags($match[1]);
       $videoData['pcid'] = $cate['pcid'];
       $videoData['cid'] = $cate['cid'];
       if(!$videoData['cid']){
          echo "放棄獲取 ",$xtvCurl->config['url'],"信息!\n";continue;
       }
       $path = parse_url($flvUrl);
       $ext = getExt($path['path']);
//       $videoData['flvUrl'] = $flvUrl;
       $videoData['flvUrl'] = downFlvfile($flvUrl,$id.$ext);
       if(!$videoData['flvUrl']){
         echo $xtvCurl->config['url']." Video FLV File Download Failed!\n";continue;
       }
//var_dump($videoData);exit;
       $status = postNewVideo($videoData);
       if($status){
         $model->addVideoVid($id);
         @unlink($videoData['flvUrl']);
       }
//exit;
       sleep(5);
    }// end foreach list

  } // end foreach page
}// end foreach cate


