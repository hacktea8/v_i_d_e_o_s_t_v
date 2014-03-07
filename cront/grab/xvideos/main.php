<?php

define('ROOTPATH',dirname(__FILE__));

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/phpcurl.php';
require_once ROOTPATH.'/model.php';
require_once ROOTPATH.'/function.php';

$tvckcurl = new CurlModel();
$tvckcurl->config['proxy'] = $proxyip.':9990';
$tvckcurl->config['cookie'] = 'discuz3455867';
$dzcurl = &$tvckcurl;

$xtvcurl = new CurlModel();
$xtvcurl->config['proxy'] = $proxyip.':9990';
$xtvcurl->config['cookie'] = 'cookiexvideos';

$model = new Model();

$dwcurl = new CurlModel();
$dwcurl->config['proxy'] = $proxyip.':9990';
$dwcurl->config['cookie'] = 'cookiedownload';


for($page = 1;;$page ++){
  $url = sprintf($domain.$listurl,$page);
  $xtvcurl->config['url'] = $url;
  $html = $xtvcurl->getHtml();
  preg_match_all($listpattern['url'],$html,$matchlist,PREG_PATTERN_ORDER);
//var_dump($matchlist);exit;
  if( !isset($matchlist[1])){
     echo "Page:$page List is Empty!\n";break;
  }
  foreach($matchlist[1] as $k => $v){
     if($currgrabvideo > $grabvideolimit){
        echo "今日抓取任务已完成!\n";break;
     }
     $id = $matchlist[2][$k];
     $status = $model->checkvideoid($id);
     if($status){
        echo "Id:$id already exists!";continue;
     }
     
     $xtvcurl->config['url'] = $domain.$v;
//     echo $xtvcurl->config['url'],"\n";
     $html = $xtvcurl->getHtml();
     preg_match($detailpattern['flvurl'],$html,$match);
     if(!isset($match[1])){
       echo "$v 获取FLV file url Failed!\n";continue;
     }
     $flvurl = urlDecode($match[1]);
     preg_match($detailpattern['title'],$html,$match);
     if(!isset($match[1])){
       echo "获取FLV title Failed!\n";continue;
     }
     $videodata['title'] = trim($match[1]);
     $videodata['intro'] = $videodata['title'];
     preg_match($detailpattern['tags'],$html,$match);
     $match[1] = isset($match[1]) ? $match[1] : '';
     if($match[1]){
        $match[1] = preg_replace('#<li><a href="[^"]+">#is','',$match[1]);
        $match[1] = preg_replace('#</a>,\s*</li>#is',',',$match[1]);
        $match[1] = preg_replace('#\s+#is','',$match[1]);
        $match[1] = trim($match[1],',');
     }
     $videodata['tags'] = checkvideotags($match[1]);
     $videodata['cid'] = getvideocate($videodata['tags']);
     if(!$videodata['cid']){
        echo "放棄獲取 ",$xtvcurl->config['url'],"信息!\n";continue;
     }
     $path = parse_url($flvurl);
     $ext = getext($path['path']);
     $videodata['flvurl'] = downflvfile($flvurl,$id.$ext);
     if(!$videodata['flvurl']){
        echo $xtvcurl->config['url']." Video FLV File Download Failed!\n";continue;
     }
     $status = postnewvideo($videodata);
     if($status){
        $model->addvideoid($id);
        @unlink($videodata['flvurl']);
        $currgrabvideo ++;
     }
     sleep(5);
  }
  if($currgrabvideo > $grabvideolimit){
     break;
  }

}


